<?php 
    class Product{
        private $db;
        public function __construct(){
            $this->db = new Database();
         }
         public function index() {
            $shopmodel = new ShopModel();
            $ProductID = empty($_GET["product_id"]) ? 1: $_GET["product_id"];
            $productInfo = $shopmodel->getProduct_byID($ProductID);
            if($productInfo == false||$productInfo["status"]=="0") {
                ob_end_clean(); // discard any output generated so far
                include("../page/404.php");
                return;
            }
            include('../page/header.php');
            include('../view/ProductView.php');
            include('../view/BannerView.php');
            include('../page/footer.php');
    }
}
?>