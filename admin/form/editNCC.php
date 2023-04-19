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
                            
                            <div class='form-group'>
                                <label>Mã nhà cung cấp</label>
                                <input readonly='readonly' type='text' class='form-control' id='ncc_id' placeholder='Mã nhà cung cấp' name='NCC.ncc_id' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NCC.ncc_id' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Tên nhà cung cấp</label>
                                <input type='text' class='form-control' id='name' placeholder='Tên nhà cung cấp' data-val='true' data-val-required='T&#xEA;n nh&#xE0; cung c&#x1EA5;p l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='NCC.name' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NCC.name' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Địa Chỉ</label>
                                <input type='text' class='form-control' id='address' placeholder='Địa chỉ nhà cung cấp' data-val='true' name='NCC.address' value=''>
                                <span class='field-validation-valid' data-valmsg-for='NCC.name' data-valmsg-replace='true'></span>
                            </div>
                            <div class='checkbox'>
                            </div>
                            <button type='submit' class='btn btn-success btn-block' onclick='SubmitEditNCC()' id='button_submit'>Sửa</button>
                    </div>
                    <div class='modal-footer'>
                        <button type='submit' class='btn btn-danger btn-default pull-right' data-dismiss='modal'>Cancel</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
    function ThemNCC(){
        $('.form-group span').text('');
        $('#title-modal').html('Thêm nhà cung cấp');
        $('#ncc_id').val('');
        $('#name').val('');
        $('#address').val('');
        $('#myModal').modal();
        $('#button_submit').html('Thêm');
        $('#button_submit').attr('onclick', 'SubmitThemNCC()');
    }

    function SubmitThemNCC(){
        // var ncc_id = parseInt($('#ncc_id').val());
        var name = $('#name').val();
        var address = $('#address').val();
        if(name.trim() == '' || address.trim() == ''){
            Swal.fire({
                    type: 'error',
                    title: 'Lỗi thêm nhà cung cấp',
                    html: 'không được bỏ trống thành phần quan trọng',
                });
            return;
        }
        else{
            $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action: 'addNCC', 
                name: name,
                address: address    
            },
            success: function (response) {
                Swal.fire({
                    type: 'success',
                    title: 'Thêm nhà cung cấp Thành Công',
                    html: response,
                }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi thêm nhà cung cấp'
                });
            }
        });
        }
    }
    function TimKiem(){
        var type = $('#select').val();
        var input = $('#input_search').val();
        $.ajax({
            url: '/Admin/NCC/TimKiem',
            type: 'post',
            dataType: 'json',
            data: {
                type: type,
                input: input
            },
            success: function (data) {
                if (data != -1) {
                    var s = '';
                    for(let i = 0; i < data.length; ++i){
                        s += `<tr>
                                    <td>`+ data[i].ncc_id +`</td>
                                    <td>`+ data[i].name +`</td>`;
                                    if(data[i].status == 1){
                                        s += `<td>Hiện</td>`;
                                    }
                                    else{
                                        s += `<td>Ẩn</td>`;
                                    }
                        s +=        `<td>
                                        <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditNCC(`+ data[i].ncc_id +`)'><i class='pe-7s-config'></i></button>`;
                                        if (data[i].status != 0)
                                        {
                                            s += `<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveNCC(`+ data[i].ncc_id +`)'><i class='pe-7s-lock'></i></button>`;
                                        }
                                        else
                                        {
                                            s += `<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='BackNCC(`+ data[i].ncc_id +`)'><i class='pe-7s-unlock'></i></button>`;
                                        }
                        s +=        `</td>
                                </tr>`;
                    }
                    $('#suancc1').html(s);
                }
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi tìm kiếm nhà cung cấp => TimKiem',
                    html: e.responseText
                });
            }
        });
    }
    function SubmitEditNCC(){
        var ncc_id = parseInt($('#ncc_id').val());
        var name = $('#name').val();
        var address = $('#address').val();
        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action: 'editNCC',
                ncc_id: ncc_id,
                name: name,
                address: address
            },
            success: function (response) {
                Swal.fire({
                    type: 'success',
                    title: 'Sửa nhà cung cấp Thành Công',
                    html: response,
                }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi sửa nhà cung cấp'
                });
            }
        });
    }

    function EditNCC(ncc_id) {
        $('.form-group span').text('');
        $('#title-modal').html('Sửa nhà cung cấp ' + ncc_id);
        $('#ncc_id').attr('readonly', true);
        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action: 'getNCC',
                ncc_id: ncc_id
            },
            success: (response) => {
                var data = JSON.parse(response);
                $('#ncc_id').val(data.ncc_id);
                $('#name').val(data.name);
                $('#address').val(data.address);
                $('#ncc_id').attr('readonly', true);
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi thêm nhân viên'
                });
            }
        });

        $('#button_submit').html('Sửa');
        $('#button_submit').attr('onclick', 'SubmitEditNCC()');
        $('#myModal').modal();
    }

    function BackNCC(ncc_id) {
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn HIỆN nhà cung cấp này không?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: './index.php',
                    type: 'post',
                    data: {
                        action: 'backupNCC', 
                        ncc_id: ncc_id
                    },
                    success: function (response) {
                        Swal.fire({
                            type: 'success',
                            title: 'Hiện nhà cung cấp Thành Công',
                            html: response,
                        }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
                    },
                    error: function (e) {
                        Swal.fire({
                            type: 'error',
                            title: 'Lỗi HIỆN nhà cung cấp',
                            html: e.responseText
                        });
                    }
                });
            }
        });
    } 

    function RemoveNCC(ncc_id) {
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn ẨN nhà cung cấp này không?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: './index.php',
                    type: 'post',
                    data: {
                        action: 'removeNCC',
                        ncc_id: ncc_id
                    },
                    success: function (response) {
                        Swal.fire({
                            type: 'success',
                            title: 'Ẩn nhà cung cấp Thành Công',
                            html: response,
                        }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
                    },
                    error: function (e) {
                        Swal.fire({
                            type: 'error',
                            title: 'Lỗi ẨN nhà cung cấp',
                            html: e.responseText
                        });
                    }
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
                            // location.reload();
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
</script>