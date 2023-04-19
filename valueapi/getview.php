<?php 
    require_once('../controller/cart.php');
    require_once('../model/CartModel.php');
    class View{
        public function __construct(){
            $this->db = new Database();
         }
        public function GetViewCart(){
            include('../view/CartView.php');
        }
        
    }
    if (isset($_POST['action']) && $_POST['action'] == 'rederCart') {
        $class = new View();
        $class->GetViewCart();
    }
?>