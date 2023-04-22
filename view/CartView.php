<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.php"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Giỏ hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<!-- Shopping Cart Section Begin -->
                                        <!-- <tr>
                                            <td class="cart-pic first-row"><img src="/image/sp1.jpg" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5>GOLDEN ROSE EYESHADOW PRIMER</h5>
                                            </td>
                                            <td class="p-price first-row">167,000 đ</td>
                                            <td class="qua-col first-row">
                                                <input type="text" value="2" readonly style="display: none;" class="input_none" />
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="1" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="3" onchange="ChangeSL(this, 2)">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="total-price first-row">167,000 đ</td>
                                            <td class="close-td first-row"><i class="ti-close" oncl ick="RemoveCart(2)"></i></td>
                                        </tr> -->
                            <?php 
                                if($cartData != false){
                                    echo "
                                    <section class='shopping-cart spad'>
                                    <div class='container'>
                                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div class='cart-table'>
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Ảnh</th>
                                                                <th class='p-name'>Tên sản phẩm</th>
                                                                <th>Giá</th>
                                                                <th>Số lượng</th>
                                                                <th>Tổng tiền</th>
                                                                <th><i class='ti-close'></i></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='sua_listSP'>";
                                                        foreach ($cartData as $value) {
                                                            echo "
                                                            <tr>
                                                            <td class='cart-pic first-row'><img src='".$value["img"]."' alt=''></td>
                                                            <td class='cart-title first-row'>
                                                                <h5>".$value["name"]."  [Số Lượng Tồn:".$value["amount"]."]  "."</h5>
                                                            </td>
                                                            <td class='p-price first-row'>".number_format($value["price"], 0, ',', '.')." đ"."</td>
                                                            <td class='qua-col first-row'>
                                                                <input type='text' value='2' readonly style='display: none;' class='input_none' />
                                                                <div class='quantity'>
                                                                    <div class='pro-qty'>
                                                                        <span class='dec qtybtn'>-</span>
                                                                        <input id='giatriSL' type='text' value='".$value["cartAmount"]."' onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength='3' onchange='updateCart(this,".$value["cart_id"].")'>
                                                                        <span class='inc qtybtn'>+</span>    
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class=total-price first-row>".number_format($value["cartAmount"]*$value["price"], 0, ',', '.')." đ"."</td>
                                                            <td class=close-td first-row><i class='ti-close' onclick='RemoveCart(".$value["cart_id"].")'></i></td>
                                                        </tr>
                                                            ";
                                                        }
                                }
                                else{
                                    // echo "Không Có Gì Trong Này Cả";
                                    include "../page/noneincart.php";
                                    return;
                                }
                    
                                
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="discount-coupon">
                            <h6>Phương thức thanh toán</h6>
                            <select class="left_cart_select">
                                <option value="Thanh to&#xE1;n khi nh&#x1EAD;n h&#xE0;ng">Thanh toán khi nhận hàng</option>
                                <option value="Thanh to&#xE1;n qua th&#x1EBB; ng&#xE2;n h&#xE0;ng" disabled="">Thanh toán qua thẻ ngân hàng(Đang xấy dựng)</option>
                            </select>
                        </div>
                        <div class="discount-coupon">
                            <h6>Địa chỉ thanh toán</h6>
                            <select class="left_cart_select" onchange="onchange_dc(this)" id="thay_doi_dia_chi">
                                <option value="dcmacdinh">Chọn địa chỉ mặc định của tài khoản để nhận hàng</option>
                                <option value="diachi">Chọn địa chỉ nhận hàng khác</option>
                            </select>
                            <form id="intput_dcnh" style="display: none;">
                                <input type="text" placeholder="Nhập địa chỉ nhận hàng" class="left_cart_select" id="input_nhapdcnh">
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Tổng sản phẩm <span id="tongsp">
                                    <?php 
                                        echo count($cartData);
                                    ?>
                                </span></li>
                                <li class="cart-total">Thành tiền <span id="tongtien">
                                    <?php
                                        if(count($cartData)!=0)
                                            echo number_format($totalMoneyPay, 0, ',', '.')." đ";
                                        else
                                            echo "Hãy Mua Hàng Để Có Thông Tin Chi Tiết";
                                    ?>
                                </span></li>
                            </ul>
                            <p onclick="CheckOutCart(<?php echo $User_id?>)" class="proceed-btn btn btn-primary">Thanh toán</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- qualuty -->
<script>
    window.addEventListener('load', function() {
        var event = new Event('change');
        document.querySelector(".row").dispatchEvent(event);
		});
    document.querySelector(".row").addEventListener("change",function(){
        var proQty = $('.pro-qty');
    proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
    $button.parent().find('input').val(newVal).promise().done(function() {
    var event = new Event('change');
    $button.parent().find('input')[0].dispatchEvent(event);
        console.log(newVal);
    });
    })
    })
</script>
<script>
    function CheckOutCart(user_id) {
        if(document.querySelector("#thay_doi_dia_chi").value=="dcmacdinh")
            $.ajax({
                        type: 'POST',
                    url: './cart.php',
                    data: {
                        action: 'checkoutCart',
                        user_id: user_id
        
                    },
                    success: (response) => {
                        if(response=="false")
                        Swal.fire({
                            type: 'error',
                            html: "giỏ hàng có sản phẩm không đủ số lượng tồn hay bị ngừng kinh doanh"
                        });
                        else
                        Swal.fire({
                            type: 'success',
                            html: response
                        }).then((result) => {
                            if (result.value) {
                            location.reload();
                            }
                        });;
                    },
                    error: function (e) {
                        Swal.fire({
                            type: 'error',
                            title: 'Lấy Thông Tin Giỏ Hàng',
                            html: e.responseText
                        });
                    }
                })
            else{
                if(document.querySelector("#input_nhapdcnh").value==""){
                    Swal.fire({
                        type: 'error',
                        html: "Vui Lòng điền trường địa chỉ"
                    });
                }
                else{
                    const addressC = document.querySelector("#input_nhapdcnh").value;
                        $.ajax({
                            type: 'POST',
                        url: './cart.php',
                        data: {
                            action: 'checkoutCart',
                            user_id: user_id,
                            address: addressC
                        },
                        success: (response) => {
                            if(response=="false")
                            Swal.fire({
                                type: 'error',
                                html: "giỏ hàng có sản phẩm không đủ số lượng tồn hay bị ngừng kinh doanh"
                            });
                            else
                            Swal.fire({
                                type: 'success',
                                html: response
                            });
                        },
                        error: function (e) {
                            Swal.fire({
                                type: 'error',
                                title: 'Lỗi mở khóa sản phẩm',
                                html: e.responseText
                            });
                        }
                    })
                }

            }
    }
    function onchange_dc(tag){
            if(tag.value == "dcmacdinh"){
                $("#intput_dcnh").css("display", "none");
            }
            else if(tag.value == "diachi"){
                $("#intput_dcnh").css("display", "block");
            }
        }
        var dataView =[]
        function renderCart(){

        }
        function updateCart(input,cartID){
            var amount = input.value;
            $.ajax({
                url: './cart.php',
                type: 'POST',
                data: {
                    action: 'addCart',
                    cartID: cartID,
                    amount: amount
                },
                success: function(responseText) {
                    console.log(responseText)
                    getCartByAjax();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        function getCartByAjax(){
            $.ajax({
                type: 'POST',
                url: 'cart.php',
                data:{
                    action:"rederCart"
                },
                success: function(response) {
                    document.querySelector(".root").innerHTML = response;
                    var event = new Event('change');
                    document.querySelector(".row").dispatchEvent(event);
                    getCartByAjaxinNav();
                }
            });
        }
        function RemoveCart(CartID){
            $.ajax({
                url: '../valueapi/postData.php',
                type: 'POST',
                data: {
                    action: 'removeCart',
                    cartID: CartID
                },
                success: function(responseText) {
                    console.log(responseText)
                    getCartByAjax();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
</script>