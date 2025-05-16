<div class="products">
    <style>
.products {
    flex: 3;
    background-color: #fff;
    padding: 20px;
    display: flex
;
    flex-wrap: wrap;
    gap: 20px;
}
.product {
    flex: 0 0 calc(33.333% - 13.33px); 
    width: calc(33.333% - 14px);
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    text-align: center;
}

div {
    display: block;
    unicode-bidi: isolate;
}


.price {
    margin-top: 10px;
}

p {
    color: #e74c3c;
    font-weight: bold;
    padding: 0 5px 0 0;
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    unicode-bidi: isolate;
}

.product a {
    display: inline-block;
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}


a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
}
    </style>
            <?php
            // Kết nối cơ sở dữ liệu
            include 'db.php';

            // Truy vấn sản phẩm
            $sql = "SELECT id, ten_san_pham, hinh_anh, gia FROM products";
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