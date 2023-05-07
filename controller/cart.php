<?php
    include "../page/libindex.php"; 
    require_once('../model/CartModel.php');
    require_once('../model/ProductModel.php');
    class CartController{
        private $db;
        public function __construct(){
          $this->db = new Database();
       }
       public function index(){
        Session::init();
        $User_id=Session::get("ID_User_login");
        $cartmodel = new Cart();
        $totalPayment = 0;
        $cartData = $cartmodel->getCart_ByUser();
        include('../page/header.php');
        include('../view/CartView.php');
        include('../view/BannerView.php');
        include('../page/footer.php');
       }
       public function rederSiteCart(){
        Session::init();
        $User_id=Session::get("ID_User_login");
        require_once('../model/CartModel.php');
        $cartmodel = new Cart();
        $cartData = $cartmodel->getCart_ByUser();
        $totalMoneyPay = 0;
        if($cartData!=false){
            foreach ($cartData as $value)
            $totalMoneyPay+=$value["price"]*$value["cartAmount"];
            include('../view/CartView.php');
        }
        else{
            include "../page/noneincart.php";
        }
       }
       public function rederSiteCartinNav(){
            require_once('../model/CartModel.php');
            $cartmodel = new Cart();
            $totalPayment = 0;
            $cartData = $cartmodel->getCart_ByUser();
            if($cartData==false){
                echo "Không có sản phẩm trong giỏ hàng";
                exit();
            }
            echo '<div class="select-items">
            <table id="loadcartlayout"><tbody>';
            foreach ($cartData as $value) {
                    $totalPayment+=$value["price"]*$value["cartAmount"];
                    echo "
                        <tr>
                        <td class='si-pic'><img src='".$value["img"]."' alt=''>
                        </td>
                        <td class='si-text'>
                            <div class='product-selected'>
                                <p>".number_format($value["price"], 0, ',', '.')." x ".$value["cartAmount"]."</p>
                                <h6>".$value["name"]."</h6>
                            </div>
                        </td>
                        <td class='si-close'>
                            <i class='ti-close' onclick='RemoveCartinNav(".$value["cart_id"].")'></i>
                        </td>
                    </tr>
                    ";
                }
                echo "
                        </tbody></table>
                </div>                   
                <div class='select-total' id='loadtotalcartlayout'><span>Tổng:</span>
                    <h5>".number_format($totalPayment, 0, ',', '.')." đ</h5></div>
                <div class='select-button'>
                    <a href='./cart.php' class='primary-btn view-card'>Xem chi tiết</a>
                </div>";
       }
       public function updateCart($cartID,$amount){
        $db = new Database();
            $query = "UPDATE carts SET carts.amonut  = $amount WHERE cart_id='$cartID'";
            $result = $db->update($query);
            echo "Sussces!!!";
    }
    
       public function RemoveCart($cartID){
            $query = "DELETE FROM carts WHERE cart_id = $cartID";
            $this->db->delete($query);
            // include('../view/CartView.php');
            echo "xoa cart có ID là ".$cartID;
       }
       public function checkoutCart($user_id){
            $classCart = new Cart();
            $output = $classCart->checkoutCart($user_id);
       }
       public function checkoutCart_getAddress($user_id,$address){
            $classCart = new Cart();
            $output = $classCart->checkoutCart_getAddress($user_id,$address);
       }
    }
    
?>