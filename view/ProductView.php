<?php 
    ob_start(); // start output buffering
    $ProductID = empty($_GET["product_id"]) ? 1: $_GET["product_id"];
    if($ProductID == 0) {
        header("Location:../page/404.php");
        return;
    } 
?>
<style>
    .thumbnail {
  border: 1px solid #ccc;
  padding: 5px;
  cursor: pointer;
}

.thumbnail.active {
  border-color: orange;
}

.product-big-img {
  max-width: 100%;
  height: auto;
}
</style>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.php"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Sản Phẩm Chi Tiết</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
   <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic">
                                <img class="product-big-img" src="
                                    <?php echo $productInfo["img"]?>
                                " alt=""style="min-width: 555px;min-height: 375px;">
                                <div class="thumbnails" style="display: flex; margin-top: 20px;">
                                <?php $img = $productInfo["img"]?>
                                    <div class="thumbnail active"  style="width: 80px;height: 80px;cursor: pointer; margin-left: 20px;"onclick="changeBigImage('<?php echo $img?>')">
                                        <img data-src='<?php echo  $img?>' src="<?php echo  $img?>" alt="">
                                    </div>
                                    <div class="thumbnail" style="width: 80px;height: 80px;cursor: pointer; margin-left: 20px;"onclick="changeBigImage('../asset/image/sp1.jpg')">
                                        <img data-src="../asset/image/sp1.jpg" src="../asset/image/sp1.jpg" alt="">
                                    </div>
                                    <div class="thumbnail" style="width: 80px;height: 80px;cursor: pointer; margin-left: 20px;"onclick="changeBigImage('../asset/image/sp2.jpg')">
                                        <img data-src="../asset/image/sp2.jpg" src="../asset/image/sp2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3>
                                        <?php echo $productInfo["name"]?>
                                    </h3>
                                </div>
                                <div class="pd-desc">
                                    <h4>
                                        <?php echo number_format($productInfo["price"], 0, ',', '.')." đ";?>
                                    </h4>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <span class='dec qtybtn'>-</span>
                                        <input type="number" value="1" min='1' max='<?php echo $productInfo["amount"];?>' oninput='if(this.value><?php echo $productInfo["amount"];?>) this.value=<?php echo $productInfo["amount"];?>' maxlength="10" id="slsp">
                                        <span class='inc qtybtn'>+</span>
                                    </div>
                                    <a class="primary-btn pd-cart" onclick="ShopThemSPAjax(<?php echo $productInfo['product_id'];
                                    ?>)">Thêm vào giỏ</a>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>THƯƠNG HIỆU</span>: 
                                        <?php 
                                            echo $productInfo["namethuonghieu"];
                                        ?>
                                </li>
                                    <li><span>LOẠI</span>: 
                                    <?php 
                                            echo $productInfo["type"];
                                        ?>
                                </li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Mã sản phẩm : 
                                    <?php 
                                            echo $productInfo["product_id"];
                                        ?>
                                    </div>
                                    <br><div class="p-code">Số lượng : 
                                        <?php 
                                                echo $productInfo["amount"];
                                            ?>
                                    </div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <h5>Mô tả</h5>
                                        <p>
                                        <?php echo $productInfo["description"]?>
                                        </p>
                                        <h5>Cách sử dụng</h5>
                                        <p>
                                        <?php echo $productInfo["use"]?>
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
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
                     // Don't allow decrementing below max
                     if (oldValue < parseInt(document.getElementById("slsp").max)) {
                        var newVal = parseFloat(oldValue) + 1;
                    } else {
                        var newVal = parseInt(document.getElementById("slsp").max);
                    }
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
        $button.parent().find('input').val(newVal).promise().done(function() {
        var event = new Event('change');
        $button.parent().find('input')[0].dispatchEvent(event);
            document.querySelector(".pd-desc h4").innerHTML = parseInt(newVal*<?php echo $productInfo["price"];?>).toLocaleString('vi-VN', {style: 'currency', currency: 'VND'});
        });
        })
        })
        function ShopThemSPAjax(ProductID){
            if(document.querySelector("#slsp").value<=<?php echo $productInfo["amount"]?>)
                $.ajax({
                    type: 'POST',
                    url: './shop.php',
                    data:{
                        action: "addCartProduct",
                        ProductID: ProductID,
                        amount: document.querySelector("#slsp").value
                    },
                    success: function(responseText) {
                        if(responseText=='false-login'){
                            Swal.fire({
                                type: 'error',
                                title: 'Vui Lòng Đăng Nhập để Thêm Giỏ Hàng',
                                html: "<a href='./login.php'>Đăng Nhập Ngay</a>"
                            });
                            return;
                        }
                        if(responseText=='false-slg'){
                            Swal.fire({
                                type: 'error',
                                title: 'Hàng Không Đủ để có thể thêm vào giỏ hàng',
                                html: "liên hệ với chúng tôi để phản ảnh tình trạng hàng hóa"
                            });
                            return;
                        }
                        else{
                            Swal.fire({
                                type: 'success',
                                title: responseText
                            });
                        }
                        getCartByAjaxinNav();
                    }
                });
            else
                Swal.fire({
                    type: 'error',
                    title: 'Hàng Không Đủ để có thể thêm vào giỏ hàng',
                    html: "liên hệ với chúng tôi để phản ảnh tình trạng hàng hóa"
                });
        }
    function clearActiveThumbnails() {
  const thumbnails = document.querySelectorAll('.thumbnail');
  thumbnails.forEach(thumbnail => thumbnail.classList.remove('active'));
}
function setActiveThumbnail(thumbnail) {
  thumbnail.classList.add('active');
}
    function changeBigImage(src) {
        var bigImg = document.querySelector('.product-big-img');
        bigImg.src = src;
    }
    const thumbnails = document.querySelectorAll('.thumbnail');
thumbnails.forEach(thumbnail => {
  thumbnail.addEventListener('click', () => {
    clearActiveThumbnails();
    setActiveThumbnail(thumbnail);
  });
});
</script>