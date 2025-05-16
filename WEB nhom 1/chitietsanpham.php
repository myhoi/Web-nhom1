<?php
// Kết nối cơ sở dữ liệu
include 'db.php';

// Lấy id từ URL và kiểm tra tồn tại
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Tránh SQL Injection
$stmt = $conn->prepare("SELECT id, ten_san_pham, hinh_anh, gia, mo_ta, Giamgia FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="demo.css">
    <style>
    .product-detail img {
        width: 300px;
        height: auto;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }
    </style>
</head>
<body>

<div class="product-detail">
    <?php if ($product) { ?>
        <h1><?php echo htmlspecialchars($product['ten_san_pham']); ?></h1>
        <img src="<?php echo htmlspecialchars($product['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($product['ten_san_pham']); ?>">
        <p class="price">
    <?php
    if ($product['Giamgia'] > 0) {
        echo "<span class='original-price'>" . number_format($product['gia'], 0, ',', '.') . " VND</span> ";
        echo "<span class='sale-price'>" . number_format($product['Giamgia'], 0, ',', '.') . " VND</span>";
    } else {
        echo "<span class='sale-price'>" . number_format($product['gia'], 0, ',', '.') . " VND</span>";
    }
    ?>
</p>
        <p><?php echo nl2br(htmlspecialchars($product['mo_ta'])); ?></p>
    <?php } else { ?>
        <h2>Không tìm thấy sản phẩm.</h2>
    <?php } ?>

    <a href="index.php" class="btn">Quay lại</a>
</div>

</body>
<?php
    include ("footer.php");
?>
</html>
