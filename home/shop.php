<?php 
    include "../page/libindex.php";
    // include necessary files
    require_once('../controller/shop.php');
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
        if(isset($_POST['amount'])){
            $shop->addProductonCart_Amount($_POST['ProductID'],$_POST['amount']);
            exit;
        }
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
    if (isset($_POST['action']) && $_POST['action'] == 'GetProduct_ByBrand') {
        // Tạo một đối tượng MyClass
        $myClass = new shop();
      
        // Gọi hàm getData() trong MyClass
        $myClass->GetProduct_ByBrand($_POST['value']);
      }
    if (isset($_POST['action']) && $_POST['action'] == 'GetProduct_ByType') {
        // Tạo một đối tượng MyClass
        $myClass = new shop();
      
        // Gọi hàm getData() trong MyClass
        $myClass->GetProduct_ByType($_POST['value']);
      }
    if (isset($_POST['action']) && $_POST['action'] == 'stockdataProduct') {
        // Tạo một đối tượng MyClass
        $myClass = new shop();
        $valuename = isset($_POST['name'])?$_POST['name']:"";
        $valuetype = isset($_POST['type'])?$_POST['type']:"";
        $valuebrand = isset($_POST['brandA'])?$_POST['brandA']:"";
        $valuepage = isset($_POST['page'])?$_POST['page']:"0";
        $valuesort = isset($_POST['sort'])?$_POST['sort']:"";
        $coster = isset($_POST['coster'])?$_POST['coster']:"";
        // Gọi hàm getData() trong MyClass
        echo json_encode($myClass->getProductbystock($valuetype,$valuename,$valuebrand,$valuepage,$valuesort,$coster));
      }
?>