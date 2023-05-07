<?php 
    require_once('../model/ShopModel.php');
    require_once('../model/ProductModel.php');
    class Shop{
        private $db;
        public function __construct(){
            $this->db = new Database();
         }
         public function index() {
            $shopmodel = new ShopModel();
            include('../page/header.php');
            include('../view/ShopView.php');
            include('../view/BannerView.php');
            include('../page/footer.php');
    }
    public function addProductonCart($productID){
        Session::init();
        include "../Model/CartModel.php";
        $UserID=Session::get("ID_User_login");
        if(!$UserID){
            $modal = new Modal();
            echo 'false-login';
            exit();
        }
        $CartModel = new Cart();
        $CartModel->addnewCart($UserID,$productID);
    }
    public function addProductonCart_Amount($productID,$amount){
        Session::init();
        include "../Model/CartModel.php";
        $UserID=Session::get("ID_User_login");
        if(!$UserID){
            $modal = new Modal();
            echo 'false-login';
            exit();
        }
        $CartModel = new Cart();
        $CartModel->addnewCart_Amount($UserID,$productID,$amount);
    }
    public function getAllProduct(){
        $shopmodel = new ShopModel();
        $allproduct = $shopmodel->getProduct();
        echo json_encode($allproduct);
    }
    public function searchProduct($valueSearch){
        $shopmodel = new ProductModel();
        $shopmodel->searchProduct($valueSearch);
    }
    public function GetProduct_ByBrand($ID){
        $shopmodel = new ShopModel();
        $getData = $shopmodel->getProduct_byBrand($ID);
        echo json_encode($getData);
    }
    public function GetProduct_ByType($ID){
        $shopmodel = new ShopModel();
        $getData = $shopmodel->GetProduct_ByType($ID);
        echo json_encode($getData);
    }
    public function getProductbystock($type,$name,$brand,$page,$sort,$coster){
        $shopmodel = new ShopModel();
        return $shopmodel->getProductbystock($type,$name,$brand,$page,$sort,$coster);
    }
}
?>