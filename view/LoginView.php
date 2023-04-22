<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.php"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Đăng Nhập</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Đăng nhập</h2>
                    <form id = "#myForm" onsubmit="loginaccount(); return false;">
                        
                        <div class="group-input">
                            <label for="user">Tài khoản *</label>
                            <input type="text" id="user" name="user"
                                    data-val="true"
                                    data-val-length="Tên đăng nhập từ 3 đến 25 kí tự"
                                    data-val-length-max="25"
                                    data-val-length-min="3"
                                    data-val-regex="Tài khoản phải bắt đầu bằng chữ, kế đến là chữ hoặc số"
                                    data-val-regex-pattern="^[a-zA-Z][\w]{1,}"
                                    data-val-required="Tài khoản bắt buộc"
                                    maxlength="25" value="">
                            <span class="field-validation-valid" data-valmsg-for="user" data-valmsg-replace="true"></span>
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật khẩu *</label>
                            <input type="password" id="pass" name="pass" data-val="true" data-val-length="Mật khẩu từ 4 đến 25 kí tự" data-val-length-max="25" data-val-length-min="4" data-val-required="Mật khẩu là bắt buộc" maxlength="25" required />
                            <span class="field-validation-valid" data-valmsg-for="pass" data-valmsg-replace="true"></span>
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <a href="#" class="forget-pass">Quên mật khẩu</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Đăng nhập</button>
                    </form>
                    <div class="switch-login">
                        <a class="or-login" href="./register.php">Tạo tài khoản</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function notions(type,title,container){
        Swal.fire({
                        type: type,
                        title: title,
                        html: container
         });
    };
    
</script>
<script>
  const passwordInput = document.getElementById('pass');
  const passwordValidationMessage = document.querySelector('[data-valmsg-for="pass"]');
  const userdInput = document.getElementById('user');
  const userValidationMessage = document.querySelector('[data-valmsg-for="user"]');

  userdInput.addEventListener('input', function() {
    const user = userdInput.value.trim();
    if (user.length < 4 || user.length > 25) {
        userdInput.setCustomValidity('tài khoản không được dưới 4 kí tự');
        userValidationMessage.innerText = 'Tài Khoản từ 4 đến 25 kí tự';
    } else {
        userdInput.setCustomValidity('');
        userValidationMessage.innerText = '';
    }
  });
  passwordInput.addEventListener('input', function() {
    const password = passwordInput.value.trim();
    if (password.length < 4 || password.length > 25) {
      passwordInput.setCustomValidity('Mật khẩu từ 4 đến 25 kí tự');
      passwordValidationMessage.innerText = 'Mật khẩu từ 4 đến 25 kí tự';
    } else {
      passwordInput.setCustomValidity('');
      passwordValidationMessage.innerText = '';
    }
  });
  function loginaccount() {
    const username =document.querySelector("#user").value
    const password =document.querySelector("#pass").value
    $.ajax({
            type: 'POST',
            url: './login.php',
            data:{
                action: "loginaccount",
                user: username,
                pass: password
            },
            success: function(responseText) {
                switch (responseText) {
                    case "success":
                        Swal.fire({
                            type: 'success',
                            title: 'Đăng Nhập Thành Công! Tận Hưởng Trải Nghiệm Mua Hàng Đi '+username,
                            html: responseText
                        }).then(function() {
                            // Redirect to the homepage
                            window.location.href = "./home.php";
                        });
                        break;
                    case "fail":
                        Swal.fire({
                            type: 'error',
                            title: 'Tên Đăng Nhập Và Mật Khẩu Không Khớp với Hệ Thống,Vui Lòng Thử Lại',
                            html: responseText
                        });
                        break;
                    case "block":
                        Swal.fire({
                            type: 'error',
                            title: 'Tài Khoản Đã Bị Khóa, Vui Lòng Liên Hệ ADMIN Để Được Giải Quyết',
                            html: responseText
                        });
                        break;
                    case "admin":
                        Swal.fire({
                            type: 'info',
                            title: 'Đây Là Tài Khoản Admin, Chuyển Hướng Ngay',
                            html: responseText,
                            showCancelButton: true,
                            confirmButtonText: 'Chuyển hướng',
                            cancelButtonText: 'Không'
                        }).then(function(result) {
                            if (result.value) {
                                // Redirect to the admin page
                                window.location.href = "../admin/";
                            }
                        });
                        break;
                
                    default:
                        break;
                }
            }
        })
  }
</script>