<?php
session_start();
include 'db.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if (empty($fullname) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        $error = "Vui lòng điền đầy đủ thông tin.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ.";
    } elseif ($password !== $confirmPassword) {
        $error = "Mật khẩu không khớp.";
    } else {
        // Kiểm tra username đã tồn tại chưa
        $stmt = $conn->prepare("SELECT id FROM nguoi_dung WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Tên đăng nhập đã tồn tại.";
        } else {
            $hashedPassword = $password; // Giữ nguyên nếu bạn muốn lưu plain-text
            // hoặc dùng md5 nếu muốn mã hóa nhẹ: $hashedPassword = md5($password);
            $now = date('Y-m-d H:i:s');

            $insert = $conn->prepare("INSERT INTO nguoi_dung (hoten, email, username, mat_khau, thoi_gian_tao) VALUES (?, ?, ?, ?, ?)");
            $insert->bind_param("sssss", $fullname, $email, $username, $hashedPassword, $now);

            if ($insert->execute()) {
                $success = "Đăng ký thành công. <a href='DangNhap.php'>Đăng nhập ngay</a>.";
            } else {
                $error = "Lỗi hệ thống: " . $insert->error;
            }
            $insert->close();
        }
        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng Ký</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #2c2c2c;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .register-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      width: 400px;
    }

    .register-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .register-container input[type="text"],
    .register-container input[type="email"],
    .register-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .register-container button {
      width: 100%;
      padding: 10px;
      background-color: #198754;
      color: white;
      border: none;
      border-radius: 5px;
      margin-top: 10px;
    }

    .error-message {
      color: red;
      margin-bottom: 10px;
      text-align: center;
    }

    .success-message {
      color: green;
      margin-bottom: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Đăng Ký Tài Khoản</h2>

    <?php if (!empty($error)) echo "<div class='error-message'>$error</div>"; ?>
    <?php if (!empty($success)) echo "<div class='success-message'>$success</div>"; ?>

    <form method="POST" action="">
      <input type="text" name="fullname" placeholder="Họ và tên" value="<?= isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '' ?>" />
      <input type="email" name="email" placeholder="Email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" />
      <input type="text" name="username" placeholder="Tên đăng nhập" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" />
      <input type="password" name="password" placeholder="Mật khẩu" />
      <input type="password" name="confirmPassword" placeholder="Nhập lại mật khẩu" />
      <button type="submit">Đăng Ký</button>
    </form>
  </div>
</body>
</html>


