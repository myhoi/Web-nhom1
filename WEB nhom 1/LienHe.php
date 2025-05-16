<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - GROUP1 SPORTS</title>
    <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="LienHe.css">
</head>


<body>
    <div class="main-content">
        <div class="contact-form">
            <h2>Liên Hệ Với Chúng Tôi</h2>
            <p>Nếu bạn có bất kỳ thắc mắc hay góp ý nào, vui lòng điền thông tin vào biểu mẫu bên dưới:</p>
            <form action="#" method="post">
                <label for="name">Họ và Tên:</label><br>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br><br>

                <label for="subject">Tiêu đề:</label><br>
                <input type="text" id="subject" name="subject" required><br><br>

                <label for="message">Nội dung:</label><br>
                <textarea id="message" name="message" rows="5" required></textarea><br><br>

                <button type="submit">Gửi Liên Hệ</button>
            </form>
        </div>
    </div>
</body>
<?php
include ("footer.php");
?>
</html>
