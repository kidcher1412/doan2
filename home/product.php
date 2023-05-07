<?php 
    include "../page/libindex.php";
    // include necessary files
    require_once('../controller/product.php');
    require_once('../model/ShopModel.php');
    require_once('../model/ProductModel.php');
    $shop = new Product();
    $shop->index();
?>