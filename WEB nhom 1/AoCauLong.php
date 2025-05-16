<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8"> <!-- Hỗ trợ tiếng Việt -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÁO CẦU LÔNG</title>
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
            $sql = "SELECT id, ten_san_pham, hinh_anh, gia FROM products WHERE Loại = 1";
            $result = $conn->query($sql);

            // Kiểm tra nếu có sản phẩm
            if ($result->num_rows > 0) {
                echo "<div class='products'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='" . htmlspecialchars($row['hinh_anh']) . "' alt='" . htmlspecialchars($row['ten_san_pham']) . "' width='200' height='200'>";
                    echo "<h3>" . htmlspecialchars($row['ten_san_pham']) . "</h3>";
                    echo "<p class='price'>Giá: " . number_format($row['gia'], 0, ',', '.') . " VND</p>";
                    echo "<div class='buttons'>";
                    echo "<a href='chitietsanpham.php?id=" . $row['id'] . "' class='btn'>Chi tiết</a> ";
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

        <div class="sidebar">
          

            <!-- Phần sản phẩm bán chạy -->
            <div class="best-sellers">
                <h3>Sản Phẩm Bán Chạy</h3>
                <div class="best-sellers-products">
                    <?php
                    // Truy vấn sản phẩm bán chạy
                    include 'db.php';

                    $sql_best_sellers = "SELECT id, ten_san_pham, hinh_anh, gia FROM products WHERE is_hot = 1 LIMIT 5";
                    $result_best_sellers = $conn->query($sql_best_sellers);

                    // Kiểm tra nếu có sản phẩm bán chạy
                    if ($result_best_sellers->num_rows > 0) {
                        while ($row = $result_best_sellers->fetch_assoc()) {
                            echo "<div class='product'>";
                            echo "<img src='" . htmlspecialchars($row['hinh_anh']) . "' alt='" . htmlspecialchars($row['ten_san_pham']) . "' width='200' height='200'>";
                            echo "<h4>" . htmlspecialchars($row['ten_san_pham']) . "</h4>";
                            echo "<p class='price'>" . number_format($row['gia'], 0, ',', '.') . " VND</p>";
                            echo "<a href='chitietsanpham.php?id=" . $row['id'] . "' class='btn'>Xem Chi Tiết</a>";
                            echo "</div>";
                        }
                    } else {
                        echo "<p>Không có sản phẩm bán chạy nào.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--
    <div class="pagination">
        <a href="#" class="prev">« Trước</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#" class="next">Tiếp theo »</a>
    </div>
    -->

    <!-- Tin Tức Section -->
    <div class="news-section">
        <h2>Tin Tức Mới Nhất</h2>

        <div class="news-item">
            <h3>Giới thiệu Giày Cầu Lông Mới</h3>
            <p>Giày cầu lông Li-Ning mới nhất đã có mặt tại cửa hàng với nhiều tính năng ưu việt. Xem thêm...</p>
            <a href="#">Xem Chi Tiết</a>
        </div>

        <div class="news-item">
            <h3>Áo Cầu Lông Li-Ning cho Nam</h3>
            <p>Áo cầu lông Li-Ning mang lại sự thoải mái và hiệu suất cao cho các vận động viên. Đọc thêm...</p>
            <a href="#">Xem Chi Tiết</a>
        </div>

        <div class="news-item">
            <h3>Khuyến Mại Mới Từ Li-Ning</h3>
            <p>Khuyến mãi đặc biệt với giá giảm cho các sản phẩm Li-Ning. Đừng bỏ lỡ cơ hội này! Chi tiết...</p>
            <a href="#">Xem Chi Tiết</a>
        </div>
    </div>
</body>
<?php
    include ("footer.php");
?>
</html>