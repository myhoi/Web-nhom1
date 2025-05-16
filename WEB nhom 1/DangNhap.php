<?php
session_start();
include 'db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"]; // giữ nguyên, không mã hóa

  $sql = "SELECT * FROM nguoi_dung WHERE username = ? AND mat_khau = ? AND da_xoa = 0";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && $result->num_rows == 1) {
      $user = $result->fetch_assoc();
      $_SESSION["username"] = $user["username"];
      $_SESSION["hoten"] = $user["hoten"];
      $_SESSION["ma_vai_tro"] = $user["ma_vai_tro"];
      header("Location: index.php"); // chuyển hướng sau khi đăng nhập thành công
      exit;
  } else {
      $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
  }

  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng Nhập</title>
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

    .login-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      width: 350px;
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-container button {
      width: 100%;
      padding: 10px;
      background-color: #0d6efd;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .login-container button:hover {
      background-color: #0b5ed7;
    }

    .error-message {
      color: red;
      font-size: 14px;
      margin-bottom: 10px;
      text-align: center;
    }

    p {
      text-align: center;
    }
  </style>
</head>

<body>
  <form class="login-container" method="POST" action="">
      <h2>Đăng nhập tài khoản</h2>

      <?php if (!empty($error)) echo "<div class='error-message'>$error</div>"; ?>

      <input type="text" name="username" placeholder="Tên đăng nhập" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <button type="submit">Đăng nhập</button>
      <p>Chưa có tài khoản? <a href="DangKy.php">Đăng ký</a></p>
  </form>
</body>
</html>


