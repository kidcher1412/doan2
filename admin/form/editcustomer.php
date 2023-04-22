<div class='container'>
        <!-- Modal -->
        <div class='modal fade' id='myModal' role='dialog'>
            <div class='modal-dialog'>

                <!-- Modal content-->
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h4><span id='title-modal'>Login</span></h4>
                    </div>
                    <div class='modal-body' style='padding:40px 50px;'>
                        <form role='form' id="custommeraccount">
                            
                            <div class='form-group'>
                                <label>ID Tài Khoản</label>
                                <input type='text' readonly='readonly' class='form-control' id='userid' placeholder='ID' name='KH.userid' value=''>
                            </div>
                            <div class='form-group'>
                                <label>Tài khoản</label>
                                <input required type='text' class='form-control' id='user' placeholder='Tài khoản' maxlength='25' name='KH.user' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.user'></span>
                            </div>
                            <div class='form-group'>
                                <label>Mật khẩu</label>
                                <input required type='password' class='form-control' id='pass' placeholder='Mật khẩu'  name='KH.pass'>
                                <span class='field-validation-valid' data-valmsg-for='KH.pass'></span>
                            </div>
                            <div class='form-group'>
                                <label>Nhập lại mật khẩu</label>
                                <input required type='password' class='form-control' id='repass' placeholder='Nhập lại mật khẩu'  data-val-equalto-other='*.pass' name='KH.repass'>
                                <span class='field-validation-valid' data-valmsg-for='KH.repass'></span>
                            </div>
                            <div class='form-group'>
                                <label>Họ tên</label>
                                <input required type='text' class='form-control' id='full_name' placeholder='Họ tên'  name='KH.full_name' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.full_name'></span>
                            </div>
                            <div class='form-group'>
                                <label>Số điện thoại</label>
                                <input required type='text' class='form-control' id='phone' placeholder='Số điện thoại'  name='KH.phone' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.phone'></span>
                            </div>
                            <div class='form-group'>
                                <label>Thư điện tử</label>
                                <input required type='mail' class='form-control' id='mail' placeholder='Thư điện tử' name='KH.mail' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.mail'></span>
                            </div>
                            <div class='form-group'>
                                <label>Địa chỉ</label>
                                <input required type='text' class='form-control' id='address' placeholder='Địa chỉ' name='KH.address' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.address'></span>
                            </div>
                            <div class='form-group'>
                                <label>Giới tính</label>
                                <select id='sex' style='height: 30px; margin-left: 5%;'>
                                    <option value='Nam'>Nam</option>
                                    <option value='N&#x1EEF;'>Nữ</option>
                                </select>
                                <span class='field-validation-valid' data-valmsg-for='KH.sex'></span>
                            </div>
                            <div class='form-group'>
                                <label>Ngày sinh</label>
                                <input required type='date' class='form-control' id='dateborn' placeholder='Ngày sinh' data-val='true' data-val-required='Ng&#xE0;y sinh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='KH.dateborn' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.dateborn'></span>
                            </div>
                            <div class='checkbox'>
                            </div>
                            <button type='submit' class='btn btn-success btn-block'>Sửa</button>
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
            const user = document.getElementById("user");
    const pass = document.getElementById("pass");
    const repass = document.getElementById("repass");
    const phone = document.getElementById("phone");
    const sex = document.getElementsByName("sex");
    const dateborn = document.getElementById("dateborn");
    const address = document.getElementById("address");
    const mail = document.getElementById("mail");
    const full_name = document.getElementById("full_name");
    const usermess = document.querySelector('[data-valmsg-for="KH.user"]');
    const passmess = document.querySelector('[data-valmsg-for="KH.pass"]');
    const repassmess = document.querySelector('[data-valmsg-for="KH.repass"]');
    const phonemess = document.querySelector('[data-valmsg-for="KH.phone"]');
    const sexmess = document.querySelector('[data-valmsg-for="KH.sex"]');
    const datebornmess = document.querySelector('[data-valmsg-for="KH.dateborn"]');
    const addressmess = document.querySelector('[data-valmsg-for="KH.address"]');
    const mailmess = document.querySelector('[data-valmsg-for="KH.mail"]');
    const full_namemess = document.querySelector('[data-valmsg-for="KH.full_name"]');
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
    <script>
    function TimKiem(){
        var type = $('#select').val();
        var input = $('#input_search').val();
        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action:"getAllCustommer"
            },
            success: function (responseText) {
                var s = 'Không tìm thấy dữ liệu';
                var data = JSON.parse(responseText);
                console.log(data);
                switch (type) {
                    case "all":
                        break;
                    case "kh_user_id":
                        data =data.filter(productType => productType.kh_user_id === input);
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
                                <td>`+ data[i].kh_user_id +`</td>
                                <td>`+ data[i].user +`</td>
                                <td>`+ data[i].full_name +`</td>
                                <td>`+ data[i].phone +`</td>
                                <td>`+ data[i].mail +`</td>
                                <td>`+ data[i].address +`</td>
                                <td>`+ data[i].sex +`</td>
                                <td>`+ data[i].dateborn +`</td>`;
                                if(data[i].status == 1){
                                    s += `<td>Hiện</td>`;
                                }
                                else{
                                    s += `<td>Ẩn</td>`;
                                }
                        s +=    `<td>
                                    <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditKH(${data[i].user_id})'><i class='pe-7s-config'></i></button>`;
                                    if (data[i].status != 0)
                                    {
                                        s+= `<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveKH(${data[i].user_id})'><i class='pe-7s-lock'></i></button>`;
                                    }
                                    else
                                    {
                                        s+= `<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='BackKH(${data[i].user_id})'><i class='pe-7s-unlock'></i></button>`;
                                    }
                        s +=    `</td>
                            </tr>`;
                    }
                }
                $('#suakh1').html(s);
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi tìm kiếm khách hàng => TimKiem',
                    html: e.responseText
                });
            }
        });
    }
    function AddKH() {
        // $('.form-group span').text('');
        $('#userid').val('');
        $('#user').val('');
        $('#pass').val('');
        $('#repass').val('');
        $('#full_name').val('');
        $('#phone').val('');
        $('#mail').val('');
        $('#address').val('');
        $('#sex').val('Nam');
        $('#dateborn').val(''); 
        $('#title-modal').html('Thêm Khách Hàng ');
        $('#button_submit').html('Thêm');
        $('#myModal').modal();
        $('#custommeraccount').attr('onsubmit', 'SubmitAddKH()');
        document.getElementById('custommeraccount').removeAttribute('novalidate');
        
    }
    function SubmitAddKH() {
        event.preventDefault();
        $.ajax({
            url: './index.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'addCustommer',
                userid: $('#userid').val(),
                user: $('#user').val(),
                pass: $('#pass').val(),
                full_name: $('#full_name').val(),
                phone: $('#phone').val(),
                mail: $('#mail').val(),
                address: $('#address').val(),
                sex: $('#sex').val(),
                dateborn: $('#dateborn').val()
            },
            success: function (data) {
                if(data != false){
                    Swal.fire({
                    type: 'success',
                    title: 'Thêm Tài Khoản thành công'
                    }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
                }
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi sửa tài khoản'
                });
            }
        });
    }
    function EditKH(user) {
        $('.form-group span').text('');
        $('#title-modal').html('Sửa Khách Hàng ' + user);
        $('#user').attr('readonly', true);
        $('#button_submit').html('Sửa');
        $('#myModal').modal();
        document.getElementById('custommeraccount').setAttribute('novalidate','novalidate');
        $('#custommeraccount').attr('onsubmit', 'SubmitEditKH()');
        $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                action: "getCustommer",
                userID: user
                    
                },
                success: (responseText) => {
                    var data = JSON.parse(responseText);
                    if (data != false) {
                        $('#userid').val(data.user_id);
                        $('#user').val(data.user);
                        // $('#pass').val(data.pass);
                        // $('#repass').val(data.pass);
                        $('#full_name').val(data.full_name);
                        $('#phone').val(data.phone);
                        $('#mail').val(data.mail);
                        $('#address').val(data.address);
                        $('#sex').val(data.sex);
                        $('#dateborn').val(formatDate(data.dateborn)); 

                }
                },
                error: function (e) {
                    Swal.fire({
                        type: 'error',
                        title: 'Lỗi mở khóa Tài Khoản Khách Hàng',
                        html: e.responseText
                    });
                }
            })

    }
    function SubmitEditKH() {
        event.preventDefault();
        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action: 'editCustommer',
                userid: $('#userid').val(),
                user: $('#user').val(),
                pass: $('#pass').val(),
                full_name: $('#full_name').val(),
                phone: $('#phone').val(),
                mail: $('#mail').val(),
                address: $('#address').val(),
                sex: $('#sex').val(),
                dateborn: $('#dateborn').val()
            },
            async: false,
            success: function (data) {
                if(data != false){
                    Swal.fire({
                    type: 'success',
                    title: 'Sửa Thông Tin Tài Khoản Thành Công'
                    }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
                }
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi sửa tài khoản'
                });
            }
        });
    }
    function BackKH(user) {
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

    function RemoveKH(user) {
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
    $(document).ready(function () {
        $('#myBtn').click(function () {
            $('#myModal').modal();
        });
    });

    function cc() {
        $('#myModal').modal();
    }

</script>