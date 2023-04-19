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
                            <li>Địa chỉ: 28/33/12 Thanh Đa phường 27 Bình Thạnh</li>
                            <li>Số điện thoại: 0364117408</li>
                            <li>Thư điện tử: tructruong.070202@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/thien926"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
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
        
        if(url.indexOf(checkShop) !== -1){
            $(".nav-menu li").removeClass( "active" );
            $("#page_shop").addClass("active");
        }
        if(url.indexOf(checkProduct) !== -1){
            $(".nav-menu li").removeClass( "active" );
        }
        if(url.indexOf(checkLogin) !== -1){
            $(".nav-menu li").removeClass( "active" );
            $("#page_login").addClass("active");
        }
        if(url.indexOf(checkRegister) !== -1){
            $(".nav-menu li").removeClass( "active" );
            $("#page_register").addClass("active");
        }
        if(url.indexOf(checkCart) !== -1){
            $(".nav-menu li").removeClass( "active" );
            $("#page_cart").addClass("active");
        }
        if(url.indexOf(checkSearch) !== -1){
            document.querySelector("#TypeSeacher").innerHTML = " Tìm Kiếm";


            const currentUrl = window.location.href;

            // Tìm vị trí của ký tự "?" trong URL
            const searchIndex = currentUrl.indexOf("?");

            // Lấy chuỗi tham số sau ký tự "?"
            const queryString = currentUrl.substr(searchIndex + 1);

            // Tách các cặp key-value trong chuỗi tham số và lưu vào một đối tượng
            const queryParams = {};
            queryString.split("&").forEach((pair) => {
            const [key, value] = pair.split("=");
            queryParams[key] = decodeURIComponent(value);
            });

            // Lấy giá trị của tham số "SearchString"
            const searchString = queryParams["SearchString"];
            console.log(searchString); // In ra giá trị Search
            if(searchString){
                document.getElementById("valueSearcher").value = searchString;
                searchProduct();
            }
        }
        if(url.indexOf(checkType) !== -1){
            var xhr = new XMLHttpRequest();

            // Thiết lập hàm xử lý sự kiện để xử lý kết quả trả về từ máy chủ
            xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(JSON.parse(xhr.responseText))
                    dataView = JSON.parse(xhr.responseText)
                    document.getElementById("TypeSeacher").innerHTML = "Kết quả tìm kiếm: "+JSON.parse(xhr.responseText)[0].type
                // Hiển thị kết quả trả về từ máy chủ
                } else {
                console.log('Lỗi khi thực hiện cuộc gọi AJAX.');
                }
            }
            };

            // Gửi cuộc gọi AJAX đến máy chủ để lấy dữ liệu
            xhr.open('POST', '../valueapi/getData.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('value='+type+'&action=GetTypeNow');
        }
        else{
            $.ajax({
                        type: 'POST',
                    url: '../valueapi/getData.php',
                    data: {
                        action: 'GetAllProduct'
                    },
                    success: (response) => {
                        dataView=JSON.parse(response);
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
    function searchProduct(){
        if(url.indexOf("shop.php")==-1){
            event.preventDefault();
            const urls = "./shop.php?SearchString="+document.getElementById("valueSearcher").value;
            window.open(urls,"_parent");
        }
        else{
            console.log("không chuyển");
            if(event)
        event.preventDefault();
    var value= document.querySelector("#valueSearcher").value.toLowerCase();
    if(dataView.length ==0){
        console.log("gọi lệnh khi không có data");
        $.ajax({
        type: 'POST',
        url: './shop.php',
        data:{
            action: "findProduct",
            SearchString: value
        },
        success: function(responseText) {
            if(responseText === "0"){
                document.querySelector(".product-list").innerHTML = "Không tìm thấy Sản Phẩm";
                document.querySelector(".loading-more").innerHTML = "";

            }
            else{
                dataView = [];
            JSON.parse(responseText).forEach(element => {
            dataView.push(element);
            });
            document.querySelectorAll(".checkerBrand").forEach(element => {
                element.checked = false;
            });
            RenderView(0);
            }
        }
    });
    }
    else{
        console.log("gọi lệnh khi có data");
        dataView = dataView.filter(element => element.name.toLowerCase().indexOf(value) !== -1);
        RenderView(0);
    }
        }
}
    </script>
</html>