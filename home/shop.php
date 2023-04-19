<?php 
    include "../page/libindex.php";
    // include necessary files
    require_once('../controller/shop.php');
    require_once('../model/ShopModel.php');
    require_once('../model/ProductModel.php');
    if (!isset($_POST['action'])){
        $shop = new Shop();
        $shop->index();
    }
    if (isset($_POST['action']) && $_POST['action'] == 'getallProduct') {
        $shop = new Shop();
        $shop->getAllProduct();
    }
    if (isset($_POST['action']) && $_POST['action'] == 'addCartProduct') {
        $shop = new Shop();
        $shop->addProductonCart($_POST['ProductID']);
    }
    if (isset($_POST['SearchString'])) {
        $shop = new Shop();
        $shop->searchProduct($_POST['SearchString']);
    }
    if (isset($_POST['action'])&& $_POST['action'] == 'testMaloi') {
        http_response_code(400);
        echo "Yêu cầu của bạn bị lỗi. Vui lòng thử lại.";
    }
    if (isset($_POST['brand'])) {
        $shop = new Shop();
        $shopmodel = new ShopModel();
        $currentBrand = $_POST['brand'];
        include('../view/ShopView.php');
    }
?>