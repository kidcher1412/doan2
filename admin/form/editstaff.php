<style>
    .field-validation-valid{
        color: red;
    }
</style>
<div class='container'>
        <!-- Modal -->
        <div class='modal fade' id='myModal' role='dialog'>
            <div class='modal-dialog'>

                <!-- Modal contentds-->
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h4><span id='title-modal'>Login</span></h4>
                    </div>
                    <div class='modal-body' style='padding:40px 50px;'>
                        <form id="staffaccount" role='form' onsubmit='return false;'>
                            
                            <div class='form-group'>
                                <label>ID Tài khoản</label>
                                <input readonly type='text' class='form-control' id='userid' placeholder='Tài khoản' name='userid' value=''>
                            </div>
                            <div class='form-group'>
                                <label>Tài khoản</label>
                                <input type='text' class='form-control' id='user' placeholder='Tài khoản' maxlength='25' name='NV.user' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NV.user'></span>
                            </div>
                            <div class='form-group'>
                                <label>Mật khẩu</label>
                                <input required type='password' class='form-control' id='pass' placeholder='Mật khẩu' data-val='true' maxlength='25' name='NV.pass'>
                                <span class='field-validation-valid' data-valmsg-for='NV.pass'></span>
                            </div>
                            <div class='form-group'>
                                <label>Nhập lại mật khẩu</label>
                                <input required type='password' class='form-control' id='repass' placeholder='Nhập lại mật khẩu' data-val='true' data-val-equalto-other='*.pass' name='NV.repass'>
                                <span class='field-validation-valid' data-valmsg-for='NV.repass'></span>
                            </div>
                            <div class='form-group'>
                                <label>Họ tên</label>
                                <input required type='text' class='form-control' id='full_name' placeholder='Họ tên' data-val='true' maxlength='100' name='NV.full_name' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NV.full_name'></span>
                            </div>
                            <div class='form-group'>
                                <label>Số điện thoại</label>
                                <input required type='text' class='form-control' id='phone' placeholder='Số điện thoại' data-val='true' name='NV.phone' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NV.phone'></span>
                            </div>
                            <div class='form-group'>
                                <label>Thư điện tử</label>
                                <input required type='email' class='form-control' id='mail' placeholder='Thư điện tử' data-val='true' name='NV.mail' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NV.mail'></span>
                            </div>
                            <div class='form-group'>
                                <label>Địa chỉ</label>
                                <input required type='text' class='form-control' id='address' placeholder='Địa chỉ' data-val='true' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NV.address'></span>
                            </div>
                            <div class='form-group'>
                                <label>Giới tính</label>
                                <select id='sex' style='height: 30px; margin-left: 5%;'>
                                    <option value='Nam'>Nam</option>
                                    <option value='N&#x1EEF;'>Nữ</option>
                                </select>
                                <span class='field-validation-valid' data-valmsg-for='NV.sex'></span>
                            </div>
                            <div class='form-group'>
                                <label>Ngày sinh</label>
                                <input required type='date' class='form-control' id='dateborn' placeholder='Ngày sinh' data-val='true' name='NV.dateborn' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NV.dateborn'></span>
                            </div>
                            <div class='form-group'>
                                <label>Mã quyền</label>
                                <select id='permission_id' style='height: 30px; margin-left: 5%;'>
                                            <!-- <option value='1'>1 - Admin</option> -->
                                    <?php 
                                        foreach ($PermissionData as $value) {
                                            echo "<option value='".$value["permission_id"]."'>".$value["permission_id"]." - ".$value["name"]."</option>";
                                        }
                                    ?>
                                </select>
                                <span class='field-validation-valid' data-valmsg-for='NV.permission_id'></span>
                            </div>
                            
                            <div class='checkbox'>
                            </div>
                            <button type='submit' class='btn btn-success btn-block' id='button_submit'>Sửa</button>
                        </form>
                    </div>
                    <div class='modal-footer'>
                        <button type='submit' class='btn btn-danger btn-default pull-right' data-dismiss='modal'>Hủy</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script>
    function TimKiem(){
        var type = $('#select').val();
        var input = $('#input_search').val();
        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action:"getAllStaff"
            },
            success: function (responseText) {
                var s = 'Không tìm thấy dữ liệu';
                var data = JSON.parse(responseText);
                console.log(data);
                switch (type) {
                    case "all":
                        break;
                    case "user_id":
                        data =data.filter(productType => productType.nv_user_id === input);
                        break;
                    case "permission_id":
                        data =data.filter(productType => parseInt(productType.permission_id) === parseInt(input));
                        break;
                    case "user":
                        data =data.filter(productType => productType.user.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    case "full_name":
                        data =data.filter(productType => productType.full_name.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    case "phone":
                        data =data.filter(productType => productType.phone.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    case "mail":
                        data =data.filter(productType => productType.mail.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    default:
                        break;
                }
                console.log(data);
                if (data.length>0) {
                    var s = '';
                    for(let i = 0; i < data.length; ++i){
                        s +=`<tr>
                                <td>`+ data[i].nv_user_id +`</td>
                                <td>`+ data[i].user +`</td>
                                <td>`+ data[i].full_name +`</td>
                                <td>`+ data[i].phone +`</td>
                                <td>`+ data[i].mail +`</td>
                                <td>`+ data[i].address +`</td>
                                <td>`+ data[i].sex +`</td>
                                <td>`+ data[i].dateborn +`</td>
                                <td>`+ data[i].permission_id +`</td>`;
                                if(data[i].status == 1){
                                    s += `<td>Đang Làm</td>`;
                                }
                                else{
                                    s += `<td>Nghỉ Làm</td>`;
                                }
                        s +=    `<td>
                                    <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditNV(${data[i].user_id})'><i class='pe-7s-config'></i></button>`;
                                    if (data[i].status != 0)
                                    {
                                        s+= `<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveNV(${data[i].user_id})'><i class='pe-7s-lock'></i></button>`;
                                    }
                                    else
                                    {
                                        s+= `<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='BackNV(${data[i].user_id})'><i class='pe-7s-unlock'></i></button>`;
                                    }
                        s +=    `</td>
                            </tr>`;
                    }
                    $('#suanv1').html(s);
                }
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi tìm kiếm nhân viên => TimKiem',
                    html: e.responseText
                });
            }
        });
    }
    function EditNV(user) {
        $('.form-group span').text('');
        $('#title-modal').html('Sửa nhân viên ');
        $('#user').attr('readonly', true);
        $('#button_submit').html('Sửa');
        $('#myModal').modal();
        document.getElementById('staffaccount').setAttribute('novalidate','novalidate');
        $('#staffaccount').attr('onsubmit', 'SubmitEditNV()');
        $.ajax({
            url: './index.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'getStaff',
                user_id: user
            },
            success: function (data) {
                if (data != false) {
                    $('#userid').val(data.user_id);
                    $('#user').val(data.user);
                    // $('#pass').val(data.pass);
                    // $('#repass').val(data.repass);
                    $('#full_name').val(data.full_name);
                    $('#phone').val(data.phone);
                    $('#mail').val(data.mail);
                    $('#address').val(data.address);
                    $('#sex').val(data.sex);
                    $('#permission_id').val(data.permission_id);
                    var d = formatDate(data.dateborn);
                    $('#dateborn').val(d);

                }
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi lấy thông tin nhân viên => EditNV',
                    html: e.responseText
                });
            }
        });

    }
    function SubmitEditNV() {
        event.preventDefault();
        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action: 'editStaff',
                userid: $('#userid').val(),
                user: $('#user').val(),
                pass: $('#pass').val(),
                repass: $('#repass').val(),
                full_name: $('#full_name').val(),
                phone: $('#phone').val(),
                mail: $('#mail').val(),
                address: $('#address').val(),
                sex: $('#sex').val(),
                dateborn: $('#dateborn').val(),
                permissionid: $('#permission_id').val()
            },
            success: (response) => {
                    Swal.fire({
                        type: 'success',
                        title: 'Sửa Tài Khoản Thành Công',
                        html: response
                    }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi sửa tài khoản'
                });
            }
        });
    }
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }

    function BackNV(user) {
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn mở khóa tài khoản này này?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                    action: 'backupCustommer',
                    user_id: user
    
                },
                success: (response) => {
                    Swal.fire({
                        type: 'success',
                        title: 'Mở khóa tài khoản thành công',
                        html: response
                    });
                },
                error: function (e) {
                    Swal.fire({
                        type: 'error',
                        title: 'Lỗi mở khóa Tài Khoản',
                        html: e.responseText
                    });
                }
            })
            }
        });
    }

    function RemoveNV(user) {
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn khóa tài khoản này này?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: './index.php',
                    data: {
                        action: 'removeCustommer',
                        user_id: user,
        
                    },
                    success: (response) => {
                        Swal.fire({
                            type: 'success',
                            title: 'Đã Xóa Thành Công',
                            html: response
                        });
                    },
                    error: function (e) {
                        Swal.fire({
                            type: 'error',
                            title: 'Lỗi mở khóa Tài Khoản',
                            html: e.responseText
                        });
                    }
                })
            }
        });
    }
    function ThemNV(){
        $('#title-modal').html('Thêm tài khoản');
        $('#myModal').modal();
        $('.form-group span').text('');
        $('#userid').val('');
        $('#user').val('');
        $('#user').attr('readonly', false);
        $('#pass').val('');
        $('#repass').val('');
        $('#full_name').val('');
        $('#phone').val('');
        $('#mail').val('');
        $('#address').val('');
        $('#sex').val('Nam');
        $('#dateborn').val('');
        $('#permission_id').val('1');
        
        $('#button_submit').html('Thêm');
        $('#staffaccount').attr('onsubmit', 'SubmitThemNV()');
        document.getElementById('staffaccount').removeAttribute('novalidate');
    }

    function SubmitThemNV(){
        event.preventDefault();
        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action: 'addStaff',
                user: $('#user').val(),
                pass: $('#pass').val(),
                repass: $('#repass').val(),
                full_name: $('#full_name').val(),
                phone: $('#phone').val(),
                mail: $('#mail').val(),
                address: $('#address').val(),
                sex: $('#sex').val(),
                dateborn: $('#dateborn').val(),
                permission_id: $('#permission_id').val()
            },
            success: (response) => {
                        Swal.fire({
                            type: 'success',
                            title: 'Đã Thêm Thành Công',
                            html: response
                        }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
                    },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi thêm nhân viên'
                });
            }
        });
    }
    function DangXuat(){
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn Đăng Xuất',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/Admin/User/DangXuat',
                    type: 'post',
                    dataType: 'json',
                    data: {
                    },
                    success: function (data) {
                        if (data == 1) {
                            alert('Đã đăng xuất');
                            location.reload();
                        }
                        else {
                            alert('Đăng xuất không thành công');
                        }
                    },
                    error: function (e) {
                        Swal.fire({
                            type: 'error',
                            title: 'Lỗi đăng xuất',
                            html: e.responseText
                        });
                    }
                });
            }
        });
    }

        const user = document.getElementById("user");
        const pass = document.getElementById("pass");
        const repass = document.getElementById("repass");
        const phone = document.getElementById("phone");
        const sex = document.getElementsByName("sex");
        const dateborn = document.getElementById("dateborn");
        const address = document.getElementById("address");
        const mail = document.getElementById("mail");
        const full_name = document.getElementById("full_name");
        const usermess = document.querySelector('[data-valmsg-for="NV.user"]');
        const passmess = document.querySelector('[data-valmsg-for="NV.pass"]');
        const repassmess = document.querySelector('[data-valmsg-for="NV.repass"]');
        const phonemess = document.querySelector('[data-valmsg-for="NV.phone"]');
        const sexmess = document.querySelector('[data-valmsg-for="NV.sex"]');
        const datebornmess = document.querySelector('[data-valmsg-for="NV.dateborn"]');
        const addressmess = document.querySelector('[data-valmsg-for="NV.address"]');
        const mailmess = document.querySelector('[data-valmsg-for="NV.mail"]');
        const full_namemess = document.querySelector('[data-valmsg-for="NV.full_name"]');

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
            url: '../home/register.php',
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
    if (!/^[0][0-9]{8,8}$/.test(phone.value.trim())) {
        phone.setCustomValidity("Số điện thoại phải bắt đầu bằng số 0 và có đúng 9 chữ số");
        phonemess.innerText ="Số điện thoại phải bắt đầu bằng số 0 và có đúng 9 dến chữ số";
    } else {
        phone.setCustomValidity("");
        phonemess.innerText ="";
    }
    });

    address.addEventListener("input", () => {
    if (address.length<1) {
        address.setCustomValidity("Địa chỉ không được rỗng");
        addressmess.innerText ="Địa chỉ không được rỗng";
    } else {
        address.setCustomValidity("");
        addressmess.innerText ="";
    }
    });

    
</script>