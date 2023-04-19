<?php 
        // include "../page/libindex.php";
        // // include necessary files
        require_once('../controller/cart.php');
        // require_once('../model/CartModel.php');
        if (isset($_POST['action']) && $_POST['action'] == 'rederCart') {
                $shop = new CartController();
                $shop->rederSiteCart();
        }
        if (isset($_POST['action']) && $_POST['action'] == 'rederCartinNav') {
                $shop = new CartController();
                $shop->rederSiteCartinNav();
        }
        if (isset($_POST['action']) && $_POST['action'] == 'addCart') {
                // Tạo một đối tượng MyClass
                $myClass = new Cart();
                if($_POST['amount'] == 0)
                        return $myClass->removeCart($_POST['cartID']);
                // Gọi hàm getData() trong MyClass
                else
                        $myClass->updateCart($_POST['cartID'],$_POST['amount']);
              }
        if (isset($_POST['action']) && $_POST['action'] == 'removeCart') {
                $shop = new CartController();
                $shop->RemoveCart($_POST['CartID']);
        }
        if (isset($_POST['action']) && $_POST['action'] == 'checkoutCart') {
                $shop = new CartController();
                if(!isset($_POST['address']))
                    $shop->checkoutCart($_POST['user_id']);
                else
                    $shop->checkoutCart_getAddress($_POST['user_id'],$_POST['address']);
        }
        if(!isset($_POST['action'])){
                $shop = new CartController();
                $shop->index();
        }
?>