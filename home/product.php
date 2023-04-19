<?php 
    include "../page/libindex.php";
    // include necessary files
    require_once('../controller/product.php');
    require_once('../model/ShopModel.php');
    $shop = new Product();
    $shop->index();
?>