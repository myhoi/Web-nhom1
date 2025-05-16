<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8"> <!-- Hỗ trợ tiếng Việt -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP DỤNG CỤ CẦU LÔNG SPORTS</title>
    <link rel="stylesheet" href="demo.css">
</head>
<body>
    <header>
        <img src="https://png.pngtree.com/png-clipart/20230820/original/pngtree-badminton-logo-vector-with-shuttlecock-and-sports-club-concept-vector-png-image_10562616.png" alt="Logo" class="logo">
        <h1 class="custom-title">GROUP1 SPORTS</h1>
        <div class="search-bar">
            <form action="search.php" method="GET">
                <input type="text" name="search" placeholder="Nhập từ khóa tìm kiếm...">
                <button type="submit">Tìm kiếm</button>
            </form>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
           <!-- <a href="giohang.html"><img src="gio.png" alt="Giỏ" id="Shopping-Cart"></a>*/-->
        
            <div class="auth-buttons" style="text-align: right; margin: 10px;">
                <?php if (isset($_SESSION['username']) || isset($_SESSION['hoten'])): ?>
                    <span style="color: #ffff;">Xin chào, <?= htmlspecialchars($_SESSION['hoten'] ?? $_SESSION['username']) ?>!</span>
                    <a href="logout.php" style="margin-left: 10px; background-color: red;">Đăng xuất</a>
                <?php else: ?>
                    <a href="DangNhap.php" style="margin-right: 10px;">Đăng nhập</a>
                    <a href="DangKy.php">Đăng ký</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div>
        <img src="imagers/web/slideshow_1.jpg" alt="bia" width="100%" height="320">
    </div>

    <nav>
        <a href="index.php">Trang Chủ</a>
        <div class="dropdown">
            <a href="#" class="dropdown-btn">Sản Phẩm <span class="arrow">&#9662;</span></a>
            <div class="dropdown-content">
                <a href="GiayCauLong.php">Giày Cầu Lông</a>
                <a href="AoCauLong.php">Áo Cầu Lông</a>
                <a href="VotCauLong.php">Vợt Cầu Lông</a>
                <a href="PhuKien.php">Phụ Kiện</a>
            </div>
        </div>
        <a href="KhuyenMai.php">Khuyến Mãi</a>
        <a href="#">Giỏ Hàng</a>
        <a href="LienHe.php">Liên Hệ</a>
    </nav>
</body>
