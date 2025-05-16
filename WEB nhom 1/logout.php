<?php
session_start();
session_unset();  // Xóa mọi biến session
session_destroy(); // Hủy session
header("Location: index.php");
exit;
