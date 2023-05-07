    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="/Home/Index"><img src="./asset/img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Địa chỉ: 273 An Dương Vương Phường 2 Quận 5</li>
                            <li>Số điện thoại: 0934827457</li>
                            <li>Thư điện tử: kidcher1415@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/thongpacom"><i class="fa-brands fa-facebook"></i></i></a>
                            <a href="https://github.com/kidcher1412"><i class="fa-brands fa-github"></i></a>
                            <a href="https://www.youtube.com/channel/UCcTlzWqdHnOx3rSAbEw6ULg"><i class="fa-brands fa-youtube"></i></a>
                            <a href="../mycv/"><i class="fa-sharp fa-regular fa-code"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Cửa hàng</h5>
                        <ul>
                            <li><a href="/Shop/Index">Cửa hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tài khoản</h5>
                        <ul>
                            <li><a href="/User/Index">Tài khoản của tôi</a></li>
                            <li><a href="/User/Detail">Thông tin cá nhân</a></li>
                            <li><a href="/User/MyOrder">Đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Tham gia bản tin của chúng tôi ngay bây giờ</h5>
                        <p>Nhận thông tin cập nhật qua E-mail về cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Nhập Email">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="../asset/js/js/bootstrap.min.js"></script>
    <script src="../asset/js/js/jquery-ui.min.js"></script>
    <script src="../asset/js/js/jquery.countdown.min.js"></script>
    <script src="../asset/js/js/jquery.nice-select.min.js"></script>
    <script src="../asset/js/js/jquery.zoom.min.js"></script>
    <script src="../asset/js/js/jquery.dd.min.js"></script>
    <script src="../asset/js/js/jquery.slicknav.js"></script>
    <script src="../asset/js/js/owl.carousel.min.js"></script>
    <script src="../asset/js/js/main.js"></script>
    <script src="../asset/js/js/sweetalert2@8.js"></script>
    <script src="../asset/js/js/layout.js"></script>

    <script>
        var url = location.href;
        var urlParams = new URLSearchParams(window.location.search);
        var type = urlParams.get('type');
        var checkShop = "shop.php";
        var checkProduct = "product.php";
        var checkLogin = "login.php";
        var checkRegister = "register.php";
        var checkCart = "cart.php";
        var checkType = "type=";
        var checkBrand = "brand=";
        var checkSearch = "SearchString=";

        if (url.indexOf(checkShop) !== -1) {
            $(".nav-menu li").removeClass("active");
            $("#page_shop").addClass("active");
        }
        if (url.indexOf(checkProduct) !== -1) {
            $(".nav-menu li").removeClass("active");
        }
        if (url.indexOf(checkLogin) !== -1) {
            $(".nav-menu li").removeClass("active");
            $("#page_login").addClass("active");
        }
        if (url.indexOf(checkRegister) !== -1) {
            $(".nav-menu li").removeClass("active");
            $("#page_register").addClass("active");
        }
        if (url.indexOf(checkCart) !== -1) {
            $(".nav-menu li").removeClass("active");
            $("#page_cart").addClass("active");
        }

        async function searchProduct() {
            if (event) {
                event.preventDefault();
            }
            if (url.indexOf("shop.php") == -1) {
                event.preventDefault();
                const urls = "./shop.php?SearchString=" + document.getElementById("valueSearcher").value;
                window.open(urls, "_parent");
            } else {
                reloadpageview(0);
            }
        }
    </script>

    </html>