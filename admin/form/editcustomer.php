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
                        <form role='form' onsubmit='return false;'>
                            
                            <div class='form-group'>
                                <label>ID Tài Khoản</label>
                                <input type='text' readonly='readonly' class='form-control' id='userid' placeholder='ID' data-val='true' data-val-length-max='25' data-val-length-min='3' maxlength='25' name='KH.userid' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.user' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Tài khoản</label>
                                <input type='text' class='form-control' id='user' placeholder='Tài khoản' data-val='true' data-val-length='T&#xEA;n &#x111;&#x103;ng nh&#x1EAD;p t&#x1EEB; 3 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;' data-val-length-max='25' data-val-length-min='3' data-val-regex='T&#xE0;i kho&#x1EA3;n ph&#x1EA3;i b&#x1EAF;t &#x111;&#x1EA7;u b&#x1EB1;ng ch&#x1EEF;' data-val-regex-pattern='^[a-zA-Z][\w]{1,}' data-val-required='T&#xE0;i kho&#x1EA3;n b&#x1EAF;t bu&#x1ED9;c' maxlength='25' name='KH.user' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.user' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Mật khẩu</label>
                                <input type='password' class='form-control' id='pass' placeholder='Mật khẩu' data-val='true' data-val-length='M&#x1EAD;t kh&#x1EA9;u t&#x1EEB; 4 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;' data-val-length-max='25' data-val-length-min='4' data-val-required='M&#x1EAD;t kh&#x1EA9;u l&#xE0; b&#x1EAF;t bu&#x1ED9;c' maxlength='25' name='KH.pass'>
                                <span class='field-validation-valid' data-valmsg-for='KH.pass' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Nhập lại mật khẩu</label>
                                <input type='password' class='form-control' id='repass' placeholder='Nhập lại mật khẩu' data-val='true' data-val-equalto='Nh&#x1EAD;p l&#x1EA1;i m&#x1EAD;t kh&#x1EA9;u kh&#xF4;ng kh&#x1EDB;p v&#x1EDB;i m&#x1EAD;t kh&#x1EA9;u &#x111;&#xE3; nh&#x1EAD;p' data-val-equalto-other='*.pass' name='KH.repass'>
                                <span class='field-validation-valid' data-valmsg-for='KH.repass' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Họ tên</label>
                                <input type='text' class='form-control' id='full_name' placeholder='Họ tên' data-val='true' data-val-length='H&#x1ECD; t&#xEA;n t&#x1EEB; 4 &#x111;&#x1EBF;n 100 k&#xED; t&#x1EF1;' data-val-length-max='100' data-val-length-min='4' data-val-required='H&#x1ECD; t&#xEA;n l&#xE0; b&#x1EAF;t bu&#x1ED9;c' maxlength='100' name='KH.full_name' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.full_name' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Số điện thoại</label>
                                <input type='text' class='form-control' id='phone' placeholder='Số điện thoại' data-val='true' data-val-regex='S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i ph&#x1EA3;i l&#xE0; s&#x1ED1; v&#xE0; d&#xE0;i t&#x1EEB; 10 &#x111;&#x1EBF;n 11' data-val-regex-pattern='^([\d]{10,11})' data-val-required='S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='KH.phone' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.phone' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Thư điện tử</label>
                                <input type='text' class='form-control' id='mail' placeholder='Thư điện tử' data-val='true' data-val-email='Th&#x1B0; &#x111;i&#x1EC7;n t&#x1EED; kh&#xF4;ng ph&#xF9; h&#x1EE3;p' data-val-required='Th&#x1B0; &#x111;i&#x1EC7;n t&#x1EED; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='KH.mail' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.mail' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Địa chỉ</label>
                                <input type='text' class='form-control' id='address' placeholder='Địa chỉ' data-val='true' data-val-required='&#x110;&#x1ECB;a ch&#x1EC9; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='KH.address' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.address' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Giới tính</label>
                                <select id='sex' style='height: 30px; margin-left: 5%;'>
                                    <option value='Nam'>Nam</option>
                                    <option value='N&#x1EEF;'>Nữ</option>
                                </select>
                                <span class='field-validation-valid' data-valmsg-for='KH.sex' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Ngày sinh</label>
                                <input type='date' class='form-control' id='dateborn' placeholder='Ngày sinh' data-val='true' data-val-required='Ng&#xE0;y sinh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='KH.dateborn' value=''>
                                <span class='field-validation-valid' data-valmsg-for='KH.dateborn' data-valmsg-replace='true'></span>
                            </div>
                            <div class='checkbox'>
                            </div>
                            <button type='submit' class='btn btn-success btn-block' onclick='SubmitEditKH()' id='button_submit'>Sửa</button>
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
        $('#sex').val('');
        $('#dateborn').val(''); 
        $('#title-modal').html('Thêm Khách Hàng ');
        $('#button_submit').html('Thêm');
        $('#button_submit').attr('onclick', 'SubmitAddKH()');
        $('#myModal').modal();
        
    }
    function SubmitAddKH() {
        if($('#pass').val() != $('#repass').val()){
            Swal.fire({
                    type: 'error',
                    title: 'mật khẩu xác nhận không cùng giá trị xin thử lại'
                });
            return;
        }
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
        $('#button_submit').attr('onclick', 'SubmitEditKH()');
        $('#myModal').modal();
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
        if($('#pass').val() != $('#repass').val()){
            Swal.fire({
                    type: 'error',
                    title: 'mật khẩu xác nhận không cùng giá trị xin thử lại'
                });
            return;
        }
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