<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"> <!-- Hỗ trợ tiếng Việt -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KHUYẾN MÃI</title>
    <link rel="stylesheet" href="demo.css">
</head>
<?php
    include ("header.php");
?>
<body>
    <div class="main-content">
        <div class="products">
            <?php
            // Kết nối cơ sở dữ liệu
            include 'db.php';

            // Truy vấn sản phẩm
            $sql = "SELECT id, ten_san_pham, hinh_anh, gia, Giamgia FROM products WHERE Giamgia > 0";
            $result = $conn->query($sql);


            // Kiểm tra nếu có sản phẩm
            if ($result->num_rows > 0) {
                echo "<div class='products'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='" . htmlspecialchars($row['hinh_anh']) . "' alt='" . htmlspecialchars($row['ten_san_pham']) . "' width='200' height='200'>";
                    echo "<h3>" . htmlspecialchars($row['ten_san_pham']) . "</h3>";
        
                    echo "<p class='price'>";
                    echo "<span class='original-price'>" . number_format($row['gia'], 0, ',', '.') . " VND</span> ";
                    echo "<span class='sale-price'>" . number_format($row['Giamgia'], 0, ',', '.') . " VND</span>";
                    echo "</p>";
        
                    echo "<div class='buttons'>";
                    echo "<a href='chitietsanpham.php?id=" . $row['id'] . "&km=1' class='btn'>Chi tiết</a> ";
                    echo "<a href='themgiohang.php?id=" . $row['id'] . "' class='btn add-cart'>Thêm vào giỏ</a>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "Không có sản phẩm nào.";
            }
            ?>
        </div>

       
    </div>
</body>
<?php
    include ("footer.php");
?>
</html>
