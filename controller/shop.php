<?php 
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
    public function getAllProduct(){
        $shopmodel = new ShopModel();
        echo json_encode($shopmodel->getProduct());
    }
    public function searchProduct($valueSearch){
        $shopmodel = new ProductModel();
        $shopmodel->searchProduct($valueSearch);
    }
}
?>