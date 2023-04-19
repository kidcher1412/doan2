<?php  
include "../lib/database.php";
include "./model-ex/getdata.php";

$login = new loginadmin();


// // load tai khoan nguoi dung
// $login->User_kh();
// echo "===========================================";
// // load tai khoan nhan vien
// $login->User_staff();
// echo "===========================================";
// // load san pham
$login->product_info();
// echo "===========================================";
// // load san pham theo id brand
// $brand = 1;
// $login->product_brand($brand);
// echo "===========================================";
// // load san pham theo loai
// $type = 1;
// $login->product_type($type);
// echo "===========================================";


?>