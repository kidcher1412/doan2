<?php 
    if(!isset($_GET["typeview"])||$_GET["typeview"] == 1){
        echo "
        <!-- Breadcrumb Section Begin -->
<div class='breacrumb-section'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12'>
                <div class='breadcrumb-text product-more'>
                    <a href='./home.php'><i class='fa fa-home'></i> Trang chủ</a>
                    <span>Thông Tin Tài Khoản Cá Nhân</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
    <!-- Product Shop Section Begin -->
    <section class='product-shop spad'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter'>
                    <div class='filter-widget'>
                        <h4 class='fw-title'>THÔNG TIN CÁ NHÂN</h4>
                        <ul class='filter-catagories'>
                        <li><a style='color: #e7ab3c;' href='./profile.php'>Xem thông tin cá nhân</a></li>
                        <li><a href='./profile.php?typeview=2'>Sửa thông tin cá nhân</a></li>
                        <li><a href='./profile.php?typeview=3'>Sửa mật khẩu</a></li>
                        <li><a href='./profile.php?typeview=4'>Đơn hàng của tôi</a></li>
                            <li><a href='./profile.php?logout=1'>Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class='col-lg-9 order-1 order-lg-2'>
                    <div class='product-show-option'>
                        <div class='row' style='font-weight: bold; font-size: 20px;'>
                            Xem thông tin cá nhân
                        </div>
                    </div>
                    <div class='container'>
                        <table class='table'>
                            <tbody>
                                <tr>
                                    <td>Họ tên</td>
                                    <td>
                                    ".$ProfileData['full_name']."
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số Dư Tài Khoản</td>
                                    <td>
                                    ".$ProfileData['money']."
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>".$ProfileData['phone']."</td>
                                </tr>
                                <tr>
                                    <td>Thư điện tử</td>
                                    <td>
                                    ".$ProfileData['mail']."
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>
                                    ".$ProfileData['address']."
                                    </td>
                                </tr>
                                <tr>
                                    <td>Giới tính</td>
                                    <td>
                                    ".$ProfileData['sex']."
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ngày sinh</td>
                                    <td>
                                    ".date('d-m-Y', strtotime($ProfileData['dateborn']))."
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
        ";
    }
    if(isset($_GET["typeview"]) && $_GET["typeview"] ==2){
        $checkedNam = $ProfileData["sex"]=="Nam"? "checked":"";
        $checkedNu = $ProfileData["sex"]=="Nữ"? "checked":"";
        echo "
        <!-- Breadcrumb Section Begin -->
        <div class='breacrumb-section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='breadcrumb-text product-more'>
                            <a href='./home.php'><i class='fa fa-home'></i> Trang chủ</a>
                            <span>Chỉnh Sửa Tài Khoản Cá Nhân</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
        <section class='product-shop spad'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter'>
                    <div class='filter-widget'>
                        <h4 class='fw-title'>THÔNG TIN CÁ NHÂN</h4>
                        <ul class='filter-catagories'>
                        <li><a style='color: #e7ab3c;' href='./profile.php'>Xem thông tin cá nhân</a></li>
                        <li><a href='./profile.php?typeview=2'>Sửa thông tin cá nhân</a></li>
                        <li><a href='./profile.php?typeview=3'>Sửa mật khẩu</a></li>
                        <li><a href='./profile.php?typeview=4'>Đơn hàng của tôi</a></li>
                        <li><a href='./profile.php?logout=1'>Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class='col-lg-9 order-1 order-lg-2'>
                    <div class='product-show-option'>
                        <div class='row' style='font-weight: bold; font-size: 20px;'>
                            Sửa thông tin cá nhân
                        </div>
                    </div>
                    <div class='container'>
                        <form onsubmit='editaccount()'>
                            
                            <table class='table'>
                                <tbody>
                                    <tr style='display: none;'>
                                        <td>Mã khách hàng</td>
                                        <td><input class='thien-edit-input' readonly type='text' data-val='true' data-val-length='T&#xEA;n &#x111;&#x103;ng nh&#x1EAD;p t&#x1EEB; 3 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;' data-val-length-max='25' data-val-length-min='3' data-val-regex='T&#xE0;i kho&#x1EA3;n ph&#x1EA3;i b&#x1EAF;t &#x111;&#x1EA7;u b&#x1EB1;ng ch&#x1EEF;' data-val-regex-pattern='^[a-zA-Z][\w]{1,}' data-val-required='T&#xE0;i kho&#x1EA3;n b&#x1EAF;t bu&#x1ED9;c' id='user' maxlength='25' name='user' value='".$ProfileData['user_id']."'></td>
                                        <td><span class='field-validation-valid' data-valmsg-for='user' data-valmsg-replace='true'></span></td>
                                    </tr>
                                    <tr>
                                        <td>Họ tên</td>
                                        <td><input class='thien-edit-input' type='text' data-val='true' data-val-length='H&#x1ECD; t&#xEA;n t&#x1EEB; 4 &#x111;&#x1EBF;n 100 k&#xED; t&#x1EF1;' data-val-length-max='100' data-val-length-min='4' data-val-required='H&#x1ECD; t&#xEA;n l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='full_name' maxlength='100' name='full_name' value='".$ProfileData['full_name']."'></td>
                                        <td><span class='field-validation-valid' data-valmsg-for='full_name' data-valmsg-replace='true'></span></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td><input class='thien-edit-input' type='text' data-val='true' data-val-regex='S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i ph&#x1EA3;i l&#xE0; s&#x1ED1; v&#xE0; d&#xE0;i t&#x1EEB; 10 &#x111;&#x1EBF;n 11' data-val-regex-pattern='^([\d]{10,11})' data-val-required='S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='phone' name='phone' value='".$ProfileData['phone']."'></td>
                                        <td><span class='field-validation-valid' data-valmsg-for='phone' data-valmsg-replace='true'></span></td>
                                    </tr>
                                    <tr>
                                        <td>Thư điện tử</td>
                                        <td><input class='thien-edit-input' type='email' data-val='true' data-val-email='Th&#x1B0; &#x111;i&#x1EC7;n t&#x1EED; kh&#xF4;ng ph&#xF9; h&#x1EE3;p' data-val-required='Th&#x1B0; &#x111;i&#x1EC7;n t&#x1EED; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='mail' name='mail' value='".$ProfileData['mail']."'></td>
                                        <td><span class='field-validation-valid' data-valmsg-for='mail' data-valmsg-replace='true'></span></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td><input class='thien-edit-input' type='text' data-val='true' data-val-required='&#x110;&#x1ECB;a ch&#x1EC9; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='address' name='address' value='".$ProfileData['address']."'></td>
                                        <td><span class='field-validation-valid' data-valmsg-for='address' data-valmsg-replace='true'></span></td>
                                    </tr>
                                    <tr>
                                        <td>Giới tính</td>
                                        <td>
                                            <div class='form-check-inline'>
                                                <label class='form-check-label'>
                                                    <input $checkedNam data-val='true' data-val-required='Gi&#x1EDB;i t&#xED;nh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='sex' name='sex' type='radio' value='Nam' /> Nam
                                                </label>
                                            </div>
    
                                            <div class='form-check-inline'>
                                                <label class='form-check-label'>
                                                    <input $checkedNu id='sex' name='sex' type='radio' value='Nữ' /> Nữ
                                                </label>
                                            </div>
                                        </td>
                                        <td><span class='field-validation-valid' data-valmsg-for='sex' data-valmsg-replace='true'></span></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày sinh</td>
                                        <td><input class='thien-edit-input' type='date' data-val='true' data-val-required='Ng&#xE0;y sinh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='dateborn' name='dateborn' value='".$ProfileData['dateborn']."'></td>
                                        <td><span class='field-validation-valid' data-valmsg-for='dateborn' data-valmsg-replace='true'></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type='submit' class='site-btn login-btn'>Sửa thông tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    function editaccount(){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: './profile.php',
            data:{
                action: 'editaccount',
                full_name: document.getElementById('full_name').value,
                phone: document.getElementById('phone').value,
                mail: document.getElementById('mail').value,
                address: document.getElementById('address').value,
                sex: getSexValue(),
                dateborn: document.getElementById('dateborn').value,
            },
            success: function(responseText) {
                if(JSON.parse(responseText).textRely=='success')
                    Swal.fire({
                        type: 'success',
                        title: 'Sửa Thông Tin Tài Khoản Thành Công'
                    }).then((result) => {
                        if (result.value) {
                        location.reload();
                        }
                    });
                else
                    Swal.fire({
                        type: 'error',
                        title: 'Sửa Thông Tin Tài Khoản Thất Bại',
                        html: responseText
                    }).then((result) => {
                        if (result.value) {
                        location.reload();
                        }
                    });
            }
        })   
    }
    function getSexValue() {
        for (let i = 0; i < sex.length; i++) {
            if (sex[i].checked) {
            return sex[i].value;
            }
        }
    
        return null;
        }
    </script>
        ";
    }

    if(isset($_GET["typeview"]) && $_GET["typeview"] ==3)
        echo "
        <!-- Breadcrumb Section Begin -->
        <div class='breacrumb-section'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12'>
                <div class='breadcrumb-text'>
                    <a href='/Home'><i class='fa fa-home'></i> Trang chủ</a>
                    <span>Sửa mật khẩu</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class='product-shop spad'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter'>
                <div class='filter-widget'>
                    <h4 class='fw-title'>THÔNG TIN CÁ NHÂN</h4>
                    <ul class='filter-catagories'>
                    <li><a style='color: #e7ab3c;' href='./profile.php'>Xem thông tin cá nhân</a></li>
                    <li><a href='./profile.php?typeview=2'>Sửa thông tin cá nhân</a></li>
                    <li><a href='./profile.php?typeview=3'>Sửa mật khẩu</a></li>
                    <li><a href='./profile.php?typeview=4'>Đơn hàng của tôi</a></li>
                    <li><a href='./profile.php?logout=1'>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class='col-lg-9 order-1 order-lg-2'>
                <div class='product-show-option'>
                    <div class='row' style='font-weight: bold; font-size: 20px;'>
                        Sửa mật khẩu
                    </div>
                </div>
                <div class='container'>
                    <form onsubmit='UpdatePassword()' method='post'>
                        
                        <table class='table'>
                            <tbody>
                                <tr>
                                    <td>Mật khẩu cũ</td>
                                    <td><input required class='thien-edit-input' type='password' placeholder='Nhập mật khẩu cũ' data-val='true' data-val-length='M&#x1EAD;t kh&#x1EA9;u t&#x1EEB; 4 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;' data-val-length-max='25' data-val-length-min='4' data-val-required='M&#x1EAD;t kh&#x1EA9;u l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='oldpass' maxlength='25' name='oldpass'></td>
                                    <td><span class='field-validation-valid' data-valmsg-for='oldpass' data-valmsg-replace='true'></span></td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu mới</td>
                                    <td><input required class='thien-edit-input' type='password' placeholder='Nhập mật khẩu mới' data-val='true' data-val-length='M&#x1EAD;t kh&#x1EA9;u t&#x1EEB; 4 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;' data-val-length-max='25' data-val-length-min='4' data-val-required='M&#x1EAD;t kh&#x1EA9;u l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='pass' maxlength='25' name='pass'></td>
                                    <td><span class='field-validation-valid' data-valmsg-for='pass' data-valmsg-replace='true'></span></td>
                                </tr>
                                <tr>
                                    <td>Nhập lại mật khẩu mới</td>
                                    <td><input required class='thien-edit-input' type='password' placeholder='Nhập lại mật khẩu mới' data-val='true' data-val-equalto='Nh&#x1EAD;p l&#x1EA1;i m&#x1EAD;t kh&#x1EA9;u kh&#xF4;ng kh&#x1EDB;p v&#x1EDB;i m&#x1EAD;t kh&#x1EA9;u &#x111;&#xE3; nh&#x1EAD;p' data-val-equalto-other='*.pass' id='repass' name='repass'></td>
                                    <td><span class='field-validation-valid' data-valmsg-for='repass' data-valmsg-replace='true'></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type='submit' class='site-btn login-btn'>Sửa thông tin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const oldpass = document.getElementById('oldpass');
    const pass = document.getElementById('pass');
    const repass = document.getElementById('repass');


    oldpass.addEventListener('input', () => {
    if (oldpass.value.trim().length < 6 || oldpass.value.trim().length > 24) {
        oldpass.setCustomValidity('Mật khẩu từ 4 đến 25 kí tự, không chứa khoảng trắng và kí tự đặc biệt');
    } else {
        oldpass.setCustomValidity('');
    }
    });

    pass.addEventListener('input', () => {
        if (pass.value.trim().length < 6 || pass.value.trim().length > 24) {
            pass.setCustomValidity('Mật Khẩu Mới Không Hợp Lệ Do Độ Dài Dưới 6 Hoặc Trên 25 Kí Tự');
        }
        else {
            pass.setCustomValidity('');
        }
    });

    repass.addEventListener('input', () => {
    if (repass.value !== pass.value) {
        repass.setCustomValidity('Nhập lại mật khẩu không khớp');
    } else {
        repass.setCustomValidity('');
    }
    });
function UpdatePassword(){
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: './profile.php',
        data:{
            action: 'updateAccount',
            oldpass: document.getElementById('oldpass').value,
            newpass: document.getElementById('pass').value
        },
        success: function(responseText) {
            if(JSON.parse(responseText).textRely=='success')
            Swal.fire({
                type: 'success',
                title: 'Đổi Mật Khẩu Tài Khoản Thành Công'
            })
        else
            Swal.fire({
                type: 'error',
                title: 'Đổi Mật Khẩu Tài Khoản Thất Bại',
                html:  'Vui Lòng Thử Lại: '+JSON.parse(responseText).textRely
            });
    }})
}
</script>
        ";
    if(isset($_GET["typeview"]) && $_GET["typeview"] ==4 && !isset($_GET["billid"])){
        echo "
        <!-- Breadcrumb Section Begin -->
        <div class='breacrumb-section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='breadcrumb-text product-more'>
                            <a href='./home.php'><i class='fa fa-home'></i> Trang chủ</a>
                            <span>Hóa Đơn Của Tôi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
    
    <!-- Product Shop Section Begin -->
    <section class='product-shop spad'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter'>
                    <div class='filter-widget'>
                        <h4 class='fw-title'>THÔNG TIN CÁ NHÂN</h4>
                        <ul class='filter-catagories'>
                        <li><a style='color: #e7ab3c;' href='./profile.php'>Xem thông tin cá nhân</a></li>
                        <li><a href='./profile.php?typeview=2'>Sửa thông tin cá nhân</a></li>
                        <li><a href='./profile.php?typeview=3'>Sửa mật khẩu</a></li>
                        <li><a href='./profile.php?typeview=4'>Đơn hàng của tôi</a></li>
                        <li><a href='./profile.php?logout=1'>Đăng xuất</a></li> 
                        </ul>
                    </div>
                </div>
                <div class='col-lg-9 order-1 order-lg-2'>
                    <div class='product-show-option'>
                        <div class='row' style='font-weight: bold; font-size: 20px;'>
                            Đơn hàng của tôi
                        </div>
                    </div>
                    <div class='product-list'>
                                            ";
                                        if($BillData!=false){
                                            echo "                        <div class='row'>
                                            <div class='col-lg-12'>
                                                <div class='cart-table' id='scroll'>
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Mã hóa đơn</th>
                                                                <th>Số điện thoại</th>
                                                                <th>Địa chỉ</th>
                                                                <th>Ngày đặt</th>
                                                                <th>Ngày nhận</th>
                                                                <th>Tổng tiền</th>
                                                                <th>Trạng thái</th>
                                                                <th>Xem chi tiết</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='sua_listHD'>";
                                            foreach ($BillData as $value) {
                                                echo "
                                                <tr>
                                                <td>".$value["bill_id"]."</td>
                                                <td >".$value["phone"]."</td>
                                                <td >".$value["address"]."</td>
                                                    <td>".$value["date_order"]."</td>
                                                <td>".$value["date_receice"]."</td>
                                                <td class='p-price first-row'>".$value["total"]."</td>
<td>Đang xử lý</td>
                                                <td><a href='?typeview=4&billid=".$value["bill_id"]."' target='_blank'><i class='fa fa-eye'></i></a></td>
                                            </tr>
                                                ";
                                            }
                                        }
                                        else echo "Bạn Chưa Có Hóa Đơn Nào, Tiếp Tục Mua Sắm Nào";
                                            echo "
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        ";
    }
    if(isset($_GET["typeview"]) && $_GET["typeview"] ==4 && isset($_GET["billid"])){
        $billView = $classBill->getBill_ByID($_GET["billid"]);
        echo "
        <!-- Breadcrumb Section Begin -->
        <div class='breacrumb-section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='breadcrumb-text product-more'>
                            <a href='./home.php'><i class='fa fa-home'></i> Trang chủ</a>
                            <span>Chi tiết đơn hàng</span>
                                    <span>> Mã hóa đơn ".$_GET["billid"]."</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
        <!-- Shopping Cart Section Begin -->
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
                                    </tr>
                                </thead>
                                <tbody id='sua_listSP'>
                                ";
                                $toltalPayment=0;
                                foreach ($billView as $key => $value) {
                                    $toltalPayment+= $value["price"];
                                    echo "
                                        <tr>
                                            <td class='cart-pic first-row'><img src='".$value["img"]."' alt=''></td>
                                            <td class='cart-title first-row'>
                                                <h5>".$value["name"]."</h5>
                                            </td>
                                            <td class='p-price first-row'>".$value["price"]." đ</td>
                                            <td class='qua-col first-row'>
                                                1
                                            </td>
                                            <td class='total-price first-row'>".($value["price"]*$value["amount"])." đ</td>
                                        </tr>
                                    ";
                                }
                                echo "
                                </tbody>
                            </table>
                        </div>
                        <div class='row'>
                            <div class='col-lg-4 offset-lg-4'>
                                <div class='proceed-checkout'>
                                    <ul>
                                        <li class='subtotal'>Tổng sản phẩm <span id='tongsp'>";
                                        echo count($billView);
                                        echo "</span></li>
                                        <li class='cart-total'>Thành tiền <span id='tongtien'>$toltalPayment đ</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shopping Cart Section End -->
        ";
    }
?>