<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        //$conn = mysqli_connect('localhost', 'root', '', 'caulong');
        $servername = "localhost";
        $username = "root"; // Thay bằng tên người dùng MySQL của bạn
        $password = ""; // Thay bằng mật khẩu MySQL của bạn
        $dbname = "caulong"; // Tên cơ sở dữ liệu của bạn
        
        // Kết nối đến MySQL
        $conn = new mysqli($servername, $username, $password, $dbname);
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(id) as total from products');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 9;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $result = mysqli_query($conn, "SELECT * FROM products LIMIT $start, $limit");
 
        ?>
        <div class = "products">
            <?php 
            while ($row = mysqli_fetch_assoc($result)){
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
            ?>
        </div>
