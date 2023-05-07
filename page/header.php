<?php 
    require_once('../model/CartModel.php');
    $cartmodel = new Cart();
    $cartData = $cartmodel->getCart_ByUser();
    if($cartData!=false){
        $totalMoneyPay = 0;
        foreach ($cartData as $value) {
            $totalMoneyPay+=$value["price"]*$value["cartAmount"];
        }
    }
    else
        $totalMoneyPay = 0;
    // echo json_encode($cartData);
    // echo $totalMoneyPay;
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashi Shop</title>
    <meta name="description" content="Fashi Shop">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <!-- <title>Shop | Fashi</title> -->

    <!-- Google Font -->
    <link href="/web2/asset/css/css.css" rel="stylesheet" />
    <!-- Css Styles -->
    <link rel="stylesheet" href="/web2/asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="/web2/asset/css/themify-icons.css">
    <link rel="stylesheet" href="/web2/asset/css/elegant-icons.css">
    <link rel="stylesheet" href="/web2/asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/web2/asset/css/nice-select.css">
    <link rel="stylesheet" href="/web2/asset/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/web2/asset/css/slicknav.min.css">
    <link rel="stylesheet" href="/web2/asset/css/style.css">
    <script src="/web2/asset/js/js/jquery-3.3.1.min.js"></script>
    <style>
        .field-validation-valid {
            color: red;
        }

        .validation-summary-errors {
            color: red;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        thongnguyenhkt@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        0933647040
                    </div>
                </div>
                <div class="ht-right">
                            <!-- <a href="/web2/home/login.php" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a> -->
                            <?php 
                                Session::init();
                                Session::checkLoginADMIN();
                                if(!Session::getSession()){
                                    echo "<a href='/web2/home/login.php' class='login-panel'><i class='fa fa-user'></i>Đăng nhập</a>";
                                }
                                else{
                                    $username = Session::get("user");
                                    echo "<a href='/web2/home/profile.php' class='login-panel'><i class='fa fa-user'>$username</i></a>";
                                }
                            ?>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="/web2/home/">
                                <img src="/web2/asset/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <form onsubmit="searchProduct()" class="input-group">
                                <input type="text" id="valueSearcher" name="SearchString" placeholder="Nhập sản phẩm tìm kiếm">
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>

                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="cart-icon">
                                <a href="./cart.php" id="suatotalsoluongdonhanglayout"><i class="icon_bag_alt"></i>
                            <span><?php echo ($cartData!=false)? count($cartData): 0?> đ</span></a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table id="loadcartlayout"><tbody>
                                            <?php
                                                if($cartData!=false)
                                                    foreach ($cartData as $value) {
                                                        echo "
                                                            <tr>
                                                            <td class='si-pic'><img src='".$value["img"]."' alt=''>
                                                            </td>
                                                            <td class='si-text'>
                                                                <div class='product-selected'>
                                                                    <p>".number_format($value["price"], 0, ',', '.')." đ"." x ".$value["cartAmount"]."</p>
                                                                    <h6>".$value["name"]."</h6>
                                                                </div>
                                                            </td>
                                                            <td class='si-close'>
                                                                <i class='ti-close' onclick='RemoveCartinNav(".$value["cart_id"].")'></i>
                                                            </td>
                                                        </tr>
                                                        ";
                                                    }
                                            ?>
                                            <script>
                                                function RemoveCartinNav(cart_id){
                                                    $.ajax({
                                                        url: '/web2/valueapi/postData.php',
                                                        type: 'POST',
                                                        data: {
                                                            action: 'removeCart',
                                                            cartID: cart_id
                                                        },
                                                        success: function(responseText) {
                                                            console.log(responseText)
                                                            getCartByAjaxinNav();
                                                        },
                                                        error: function(xhr, status, error) {
                                                            console.log(error);
                                                        }
                                                    });
                                                }
                                                function getCartByAjaxinNav() {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'cart.php',
                                                        data:{
                                                            action:"rederCartinNav"
                                                        },
                                                        success: function(responseText) {
                                                            document.querySelector(".cart-hover").innerHTML = responseText;
                                                            document.querySelector("#suatotalsoluongdonhanglayout").querySelector("span").innerHTML=document.querySelectorAll(".cart-hover tr td").length/3;
                                                        }
                                                    });
                                                }
                                            </script>
                                        </tbody></table>
                                    </div>
                                    <div class="select-total" id="loadtotalcartlayout"><span>Tổng:</span>
                            <h5><?php echo number_format($totalMoneyPay, 0, ',', '.')?> đ</h5></div>
                                    <div class="select-button">
                                        <a href="./cart.php" class="primary-btn view-card">Xem chi tiết</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price" id="totalpricelayout"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Danh mục</span>
                        <ul class="depart-hover">
                                        <li><a href="/web2/home/shop.php?type=1">Trang &#x111;i&#x1EC3;m</a></li>
                                        <li><a href="/web2/home/shop.php?type=2">D&#x1B0;&#x1EE1;ng da</a></li>
                                        <li><a href="/web2/home/shop.php?type=3">C&#x1A1; th&#x1EC3;</a></li>
                                        <li><a href="/web2/home/shop.php?type=4">D&#x1B0;&#x1EE1;ng t&#xF3;c</a></li>
                                        <li><a href="/web2/home/shop.php?type=5">C&#x1ECD; v&#xE0; ph&#x1EE5; ki&#x1EC7;n</a></li>
                                        <li><a href="/web2/home/shop.php?type=6">N&#x1B0;&#x1EDB;c hoa</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="/web2/home/home.php">Trang chủ</a></li>
                        <li id="page_shop"><a href="/web2/home/shop.php">Sản phẩm</a></li>
                        <li id="page_login"><a href="/web2/home/login.php">Đăng nhập</a></li>
                        <li id="page_register"><a href="/web2/home/register.php">Đăng kí</a></li>
                        <li id="page_cart"><a href = "/web2/home/cart.php">Giỏ hàng</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <div class="root">
        <div class ="modalThong"></div>