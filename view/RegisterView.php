<style>
        .field-validation-error {
            color: red
        }

        .validation-summary-errors {
            color: red
        }
    </style>
    <!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.php"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Đăng Kí Tài Khoản</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container formregister">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Đăng kí</h2>
                    <form onsubmit="RegisterAccount(); return false;">
                        
                        <div class="group-input">
                            <label for="user">Tài khoản *</label>
                            <input required type="text" data-val="true" data-val-length="T&#xEA;n &#x111;&#x103;ng nh&#x1EAD;p t&#x1EEB; 3 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;" data-val-length-max="25" data-val-length-min="3" data-val-regex="T&#xE0;i kho&#x1EA3;n ph&#x1EA3;i b&#x1EAF;t &#x111;&#x1EA7;u b&#x1EB1;ng ch&#x1EEF;" data-val-regex-pattern="^[a-zA-Z][\w]{1,}" data-val-required="T&#xE0;i kho&#x1EA3;n b&#x1EAF;t bu&#x1ED9;c" id="user" maxlength="25" name="user" value="">
                            <span class="field-validation-valid" data-valmsg-for="user" data-valmsg-replace="true"></span>
                        </div>

                        <div class="group-input">
                            <label for="pass">Mật khẩu *</label>
                            <input required type="password" data-val="true" data-val-length="M&#x1EAD;t kh&#x1EA9;u t&#x1EEB; 4 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;" data-val-length-max="25" data-val-length-min="4" data-val-required="M&#x1EAD;t kh&#x1EA9;u l&#xE0; b&#x1EAF;t bu&#x1ED9;c" id="pass" maxlength="25" name="pass">
                            <span class="field-validation-valid" data-valmsg-for="pass" data-valmsg-replace="true"></span>
                        </div>

                        <div class="group-input">
                            <label for="repass">Nhập lại mật khẩu *</label>
                            <input required type="password" data-val="true" data-val-equalto="Nh&#x1EAD;p l&#x1EA1;i m&#x1EAD;t kh&#x1EA9;u kh&#xF4;ng kh&#x1EDB;p v&#x1EDB;i m&#x1EAD;t kh&#x1EA9;u &#x111;&#xE3; nh&#x1EAD;p" data-val-equalto-other="*.pass" id="repass" name="repass">
                            <span class="field-validation-valid" data-valmsg-for="repass" data-valmsg-replace="true"></span>
                        </div>

                        <div class="group-input">
                            <label for="full_name">Họ tên *</label>
                            <input required type="text" data-val="true" data-val-length="H&#x1ECD; t&#xEA;n t&#x1EEB; 4 &#x111;&#x1EBF;n 100 k&#xED; t&#x1EF1;" data-val-length-max="100" data-val-length-min="4" data-val-required="H&#x1ECD; t&#xEA;n l&#xE0; b&#x1EAF;t bu&#x1ED9;c" id="full_name" maxlength="100" name="full_name" value="">
                            <span class="field-validation-valid" data-valmsg-for="full_name" data-valmsg-replace="true"></span>
                        </div>

                        <div class="group-input">
                            <label for="phone">Số điện thoại *</label>
                            <input required type="text" data-val="true" data-val-regex="S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i ph&#x1EA3;i l&#xE0; s&#x1ED1; v&#xE0; d&#xE0;i t&#x1EEB; 10 &#x111;&#x1EBF;n 11" data-val-regex-pattern="^([\d]{10,11})" data-val-required="S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i l&#xE0; b&#x1EAF;t bu&#x1ED9;c" id="phone" name="phone" value="">
                            <span class="field-validation-valid" data-valmsg-for="phone" data-valmsg-replace="true"></span>
                        </div>

                        <div class="group-input">
                            <label for="mail">Thư điện tử *</label>
                            <input required type="email" data-val="true" data-val-email="Th&#x1B0; &#x111;i&#x1EC7;n t&#x1EED; kh&#xF4;ng ph&#xF9; h&#x1EE3;p" data-val-required="Th&#x1B0; &#x111;i&#x1EC7;n t&#x1EED; l&#xE0; b&#x1EAF;t bu&#x1ED9;c" id="mail" name="mail" value="">
                            <span class="field-validation-valid" data-valmsg-for="mail" data-valmsg-replace="true"></span>
                        </div>

                        <div class="group-input">
                            <label for="address">Địa chỉ *</label>
                            <input required type="text" data-val="true" data-val-required="&#x110;&#x1ECB;a ch&#x1EC9; l&#xE0; b&#x1EAF;t bu&#x1ED9;c" id="address" name="address" value="">
                            <span class="field-validation-valid" data-valmsg-for="address" data-valmsg-replace="true"></span>
                        </div>

                        <div class="group-input">
                            <label for="sex">Giới tính * &nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input required data-val="true" data-val-required="Gi&#x1EDB;i t&#xED;nh l&#xE0; b&#x1EAF;t bu&#x1ED9;c" id="sex" name="sex" style="width:63%;" type="radio" value="Nam" /> Nam
                                    </label>
                                </div>
                                
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input required id="sex" name="sex" type="radio" value="N&#x1EEF;" /> Nữ
                                    </label>
                                </div>

                            </label>
                            <span class="field-validation-valid" data-valmsg-for="sex" data-valmsg-replace="true"></span>
                        </div>

                        <div class="group-input">
                            <label for="dateborn">Ngày sinh *</label>
                            <input required type="date" data-val="true" data-val-required="Ng&#xE0;y sinh l&#xE0; b&#x1EAF;t bu&#x1ED9;c" id="dateborn" name="dateborn" value="">
                            <span class="field-validation-valid" data-valmsg-for="dateborn" data-valmsg-replace="true"></span>
                        </div>
                        <div class="group-input" style="display: none;">
                            <label for="status">Trạng thái *</label>
                            <input required value="1" type="number" data-val="true" data-val-required="Tr&#x1EA1;ng th&#xE1;i l&#xE0; b&#x1EAF;t bu&#x1ED9;c" id="status" name="status">
                            <span class="field-validation-valid" data-valmsg-for="status" data-valmsg-replace="true"></span>
                        </div>
                        <button type="submit" class="site-btn login-btn">Đăng kí</button>
                    </form>
                    <div class="switch-login">
                        <a class="or-login" href="./login.php">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const user = document.getElementById("user");
    const pass = document.getElementById("pass");
    const repass = document.getElementById("repass");
    const phone = document.getElementById("phone");
    const sex = document.getElementsByName("sex");
    const dateborn = document.getElementById("dateborn");
    const address = document.getElementById("address");
    const mail = document.getElementById("mail");
    const full_name = document.getElementById("full_name");
    const usermess = document.querySelector('[data-valmsg-for="user"]');
    const passmess = document.querySelector('[data-valmsg-for="pass"]');
    const repassmess = document.querySelector('[data-valmsg-for="repass"]');
    const phonemess = document.querySelector('[data-valmsg-for="phone"]');
    const sexmess = document.querySelector('[data-valmsg-for="sex"]');
    const datebornmess = document.querySelector('[data-valmsg-for="dateborn"]');
    const addressmess = document.querySelector('[data-valmsg-for="address"]');
    const mailmess = document.querySelector('[data-valmsg-for="mail"]');
    const full_namemess = document.querySelector('[data-valmsg-for="full_name"]');
    function validateForm() {
        const userValue = user.value.trim();
        const passValue = pass.value.trim();
        const repassValue = repass.value.trim();
        const phoneValue = phone.value.trim();
        const sexValue = getSexValue();
        const datebornValue = dateborn.value.trim();

        if (userValue.length < 5) {
            // alert("Tài khoản phải chứa ít nhất 5 kí tự chữ hoặc số");
            return false;
        }

        if (passValue.length < 6 || passValue.length > 24) {
            // alert("Mật khẩu phải có từ 6 đến 24 kí tự");
            return false;
        }

        if (passValue !== repassValue) {
            // alert("Mật khẩu nhập lại không khớp");
            return false;
        }

        if (!/^[0][0-9]{8,8}$/.test(phoneValue)) {
            // alert("Số điện thoại phải bắt đầu bằng số 0 và có đúng 9 chữ số");
            return false;
        }

        if (!sexValue) {
            // alert("Bạn phải chọn giới tính");
            return false;
        }

        if (datebornValue === "") {
            // alert("Ngày sinh không được để trống");
            return false;
        }

        return true;
}

function getSexValue() {
    for (let i = 0; i < sex.length; i++) {
        if (sex[i].checked) {
        return sex[i].value;
        }
    }

    return null;
    }

    user.addEventListener("input", () => {
        if (user.value.trim().length < 5) {
            user.setCustomValidity("Tài khoản phải chứa ít nhất 5 kí tự chữ hoặc số");
            usermess.innerText = "Tài khoản phải chứa ít nhất 5 kí tự chữ hoặc số";
        } else {
            user.setCustomValidity("");
            usermess.innerText = "";
        }
        $.ajax({
            type: 'POST',
            url: './register.php',
            data:{
                action: "checkusername",
                username: user.value.toLowerCase()
            },
            success: function(responseText) {
                if(responseText=="false")
                    console.log("tài khoản hợp lệ")
                else{
                    user.setCustomValidity("Tài khoản đã tồn tại trên hệ thống");
                    usermess.innerText = "Tài khoản đã tồn tại trên hệ thống";
                }
            }
        })
    });

    pass.addEventListener("input", () => {
    if (pass.value.trim().length < 6 || pass.value.trim().length > 24) {
        pass.setCustomValidity("Mật khẩu phải có từ 6 đến 24 kí tự");
        passmess.innerText ="Mật khẩu phải có từ 6 đến 24 kí tự";
    } else {
        pass.setCustomValidity("");
        passmess.innerText ="";
    }
    });

    repass.addEventListener("input", () => {
    if (repass.value.trim() !== pass.value.trim()) {
        repass.setCustomValidity("Mật khẩu nhập lại không khớp");
        repassmess.innerText ="Mật khẩu nhập lại không khớp";
    } else {
        repass.setCustomValidity("");
        repassmess.innerText ="";
    }
    });

    phone.addEventListener("input", () => {
    if (!/^0\d{7,10}$/.test(phone.value.trim())) {
        phone.setCustomValidity("Số điện thoại phải bắt đầu bằng số 0 và có từ 10 đến 11 số");
        phonemess.innerText ="Số điện thoại phải bắt đầu bằng số 0 và có từ 10 đến 11 số";
    } else {
        phone.setCustomValidity("");
        phonemess.innerText ="";
    }
    });
    document.querySelector(".formregister").addEventListener("change", function(){
        validateForm();
    })
    function RegisterAccount() {
        // event.preventDefault(); // ngăn chặn hành động mặc định của sự kiện submit form
        // các lệnh xử lý khi submit form
        $.ajax({
            type: 'POST',
            url: './register.php',
            data:{
                action: "register",
                user: user.value.toLowerCase(),
                pass: pass.value,
                repass: repass.value,
                full_name: full_name.value,
                phone: phone.value,
                mail: mail.value,
                address: address.value,
                sex: getSexValue(),
                dateborn: dateborn.value,
            },
            success: function(responseText) {
                switch (JSON.parse(responseText).textRely) {
                    case "fail":
                        Swal.fire({
                            type: 'error',
                            title: "Đăng Kí Tài Khoản Không Thành Công",
                        });
                        break;
                    case "fail_username":
                        Swal.fire({
                            type: 'error',
                            title: "tên tài khoản đã có trên hệ thống",
                        });
                        break;
                    case "fail_pass":
                        Swal.fire({
                            type: 'error',
                            title: "Mật khẩu phải có từ 6 đến 24 và không chứa kí tự đặc biệt",
                        });
                        break;
                    case "fail_name":
                        Swal.fire({
                            type: 'error',
                            title: "Họ tên không được chứa kí tự đặc biệt và kí tự số",
                        });
                        break;
                        fail_phone
                    case "fail_phone":
                        Swal.fire({
                            type: 'error',
                            title: "Số điện thoại từ 8-11 số bắt đầu từ 0",
                        });
                        break;
                    case "fail_email":
                        Swal.fire({
                            type: 'error',
                            title: "Vui lòng nhập lại email theo đúng định dạng",
                        });
                        break;
                    case "fail_dateOfBirth":
                        Swal.fire({
                            type: 'error',
                            title: "Ngày sinh phải phù hợp",
                        });
                        break;
                    case "success":
                        Swal.fire({
                            type: 'success',
                            title: "Đăng Kí Tài Khoản Thành Công",
                            html: "Vui Lòng Đăng Nhập Ngay"
                        }).then((result) => {
                            if (result.value) {
                                window.open("./login.php","_parent");
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