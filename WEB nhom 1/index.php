<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
    

<?php
    include ("header.php");
?>

<body>
    <div class="main-content">
        <div class="products">
            <?php
            include ("phantrang.php");
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
                            echo "<a href='chitietsanpham.php?id=" . $row['id'] . "' class='btn'>Chi tiết</a>";
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
    <div class="pagination">
    <?php
    // Nút "Prev"
    if ($current_page > 1 && $total_page > 1){
        echo '<a class="prev" href="index.php?page='.($current_page-1).'">Prev</a>';
    }

    // Các nút số trang
    for ($i = 1; $i <= $total_page; $i++){
        if ($i == $current_page){
            // Không phải <a>, mà là <span>
            echo '<span class="current-page">'.$i.'</span>';
        } else {
            echo '<a href="index.php?page='.$i.'">'.$i.'</a>';
        }
    }

    // Nút "Next"
    if ($current_page < $total_page && $total_page > 1){
        echo '<a class="next" href="index.php?page='.($current_page+1).'">Next</a>';
    }
    ?>
    </div>
    <!-- Tin Tức Section -->
    <div class="news-section">
        <h2>Tin Tức Mới Nhất</h2>

        <div class="news-item">
            <h3>Giới thiệu Giày Cầu Lông Mới</h3>
            <p>Giày cầu lông Li-Ning mới nhất đã có mặt tại cửa hàng với nhiều tính năng ưu việt. Xem thêm...</p>
            <a href="GiayCauLong.php">Xem Chi Tiết</a>
        </div>

        <div class="news-item">
            <h3>Áo Cầu Lông Li-Ning cho Nam</h3>
            <p>Áo cầu lông Li-Ning mang lại sự thoải mái và hiệu suất cao cho các vận động viên. Đọc thêm...</p>
            <a href="ao.php">Xem Chi Tiết</a>
        </div>

        <div class="news-item">
            <h3>Khuyến Mãi Mới Từ Li-Ning</h3>
            <p>Khuyến mãi đặc biệt với giá giảm cho các sản phẩm Li-Ning. Đừng bỏ lỡ cơ hội này! Chi tiết...</p>
            <a href="KhuyenMai.php">Xem Chi Tiết</a>
        </div>
    </div>
    
</body>
<?php
    include ("footer.php");
?>
</html>
