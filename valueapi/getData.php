<?php
    include "../lib/database.php";
    include("../lib/session.php");
    // include necessary files
    require_once('../controller/shop.php');
    require_once('../model/ShopModel.php');
    require_once('../model/CartModel.php');
    class MyData{
        public function GetType_ByID($ID){
            $shopmodel = new ShopModel();
            $getData = $shopmodel->getType_byID($ID);
            echo json_encode($getData);
        }
        public function GetProduct(){
            $shopmodel = new ShopModel();
            $getData = $shopmodel->getProduct();
            echo json_encode($getData);
        }
        public function GetProduct_ByBrand($ID){
            $shopmodel = new ShopModel();
            $getData = $shopmodel->getProduct_byBrand($ID);
            echo json_encode($getData);
        }
        public function GetProduct_ByType($type){
            $shopmodel = new ShopModel();
            $getData = $shopmodel->getProduct_byTYPE($type);
            
            echo json_encode($getData);
        }
        // public function registerUser($user,$pass,$fullName,$phone,$mail,$address,$sex,$dateborn){
        //     $db = new Database();
        //     $query = "INSERT INTO khachhangs (`user`, `pass`, `repass`, `full_name`, `phone`, `mail`, `address`, `sex`, `dateborn`, `status`) VALUES
        //     ('".$user."', '".$pass."', '".$pass."', '".$fullName."', '".$phone."', '".$mail."', '".$address."', '".$sex."', '".$dateborn."', '1')";
        //     $result = $db->insert($query);
    
        // }
        public function registerUser(){
            $db = new Database();
            $query = "INSERT INTO nccs values ('1','test','test')";
            
            try {
                if($result = $db->insert($query)){
                    echo json_encode(array('textRely' => 'success'));
                } else {
                    echo json_encode(array('textRely' => 'fail'));
                }
            } catch(mysqli_sql_exception $ex) {
                if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                    echo json_encode(array('textRely' => 'fail'));
                } else {
                    throw $ex;
                }
            }
        }
        public function getCart(){
            $cart = new Cart();
            $output = $cart->getCart_ByUser();
            echo json_encode($output);
        }
        
    }
    if (isset($_POST['action']) && $_POST['action'] == 'GetProduct_ByBrand') {
        // Tạo một đối tượng MyClass
        $myClass = new MyData();
      
        // Gọi hàm getData() trong MyClass
        $myClass->GetProduct_ByBrand($_POST['value']);
      }
    if (isset($_POST['action']) && $_POST['action'] == 'GetProduct_Sort') {
        // Tạo một đối tượng MyClass
        $myClass = new MyData();
      
        // Gọi hàm getData() trong MyClass
        $myClass->GetProduct_BySort($_POST['sort']);
      }
    if (isset($_POST['action']) && $_POST['action'] == 'GetTypeNow') {
        // Tạo một đối tượng MyClass
        $myClass = new MyData();
      
        // Gọi hàm getData() trong MyClass
        $myClass->GetProduct_ByType($_POST['value']);
      }
    if (isset($_POST['action']) && $_POST['action'] == 'GetAllProduct') {
        // Tạo một đối tượng MyClass
        $myClass = new MyData();
      
        // Gọi hàm getData() trong MyClass
        $myClass->GetProduct();
      }
    if (isset($_POST['action']) && $_POST['action'] == 'addUser') {
        // Tạo một đối tượng MyClass
        $myClass = new MyData();
      
        // Gọi hàm getData() trong MyClass
        $myClass->registerUser();
      }
    if (isset($_POST['action']) && $_POST['action'] == 'getCart') {
        // Tạo một đối tượng MyClass
        $myClass = new MyData();
        // Gọi hàm getData() trong MyClass
        $myClass->getCart();
      }
?>