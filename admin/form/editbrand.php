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
                                <label>Mã thương hiệu</label>
                                <input type='text' class='form-control' id='brand_id' placeholder='Mã thương hiệu' data-val='true' data-val-required='The brand_id field is required.' name='TH.brand_id' value=''>
                                <span class='field-validation-valid' data-valmsg-for='TH.brand_id' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Tên thương hiệu</label>
                                <input type='text' class='form-control' id='name' placeholder='Tên thương hiệu' data-val='true' data-val-required='T&#xEA;n th&#x1B0;&#x1A1;ng hi&#x1EC7;u l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='TH.name' value=''>
                                <span class='field-validation-valid' data-valmsg-for='TH.name' data-valmsg-replace='true'></span>
                            </div>
                            <div class='checkbox'>
                            </div>
                            <button type='submit' class='btn btn-success btn-block' onclick='SubmitEditTH()' id='button_submit'>Sửa</button>
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
                action:"getAllBrand"
            },
            success: function(responseText) {
                var data = JSON.parse(responseText);
                var s = 'Không Tìm Thấy Dữ Liệu';
                switch (type) {
                    case "all":
                        break;
                    case "brand_id":
                        data =data.filter(productType => productType.brand_id === input);
                        break;
                    case "name":
                        data =data.filter(productType => productType.name.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    default:
                        break;
                }
                console.log(data);
                    for(let i = 0; i < data.length; ++i){
                        s += `<tr>
                                <td>`+ data[i].brand_id +`</td>
                                <td>`+ data[i].name +`</td>
                                <td>
                                    <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditBrand(`+ data[i].brand_id +`)'><i class='pe-7s-config'></i></button>
                                    <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveBrand(`+ data[i].brand_id +`)'><i class='pe-7s-trash'></i></button>
                                </td>
                            </tr>`;
                    }
                    $('#suath1').html(s);
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi tìm kiếm thương hiệu => TimKiem',
                    html: e.responseText
                });
            }
        });
    }

    function EditBrand(brand_id) {
        $('#title-modal').html('Sửa thương hiệu sản phẩm ' + brand_id);
        $('#brand_id').attr('readonly', true);
        $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'getBrand',
                brandID: brand_id
            },
            success: (response) => {
                var data = JSON.parse(response);
                $('#brand_id').val(data.brand_id);
                $('#name').val(data.name);
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi mở khóa sản phẩm',
                    html: e.responseText
                });
            }
        })
        $('#button_submit').html('Sửa');
        $('#button_submit').attr('onclick', 'SubmitEditTH()');
        $('#myModal').modal();

    }
    function SubmitEditTH() {
        var brand_id = parseInt($('#brand_id').val());
        var name = $('#name').val();
        if(name.trim() == ''){
            return;
        }
        $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'editBrand',
                brandID: brand_id,
                brandName: name
            },
            success: (response) => {
                Swal.fire({
                    type: 'success',
                    title: 'Cập Nhật Thành Công Thương Hiệu',
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
                    title: 'Lỗi mở khóa sản phẩm',
                    html: e.responseText
                }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  });
            }
        })

    }
    function RemoveBrand(brand_id){
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn xóa thương hiệu và tất cả các sản phẩm thuộc thương hiệu này?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: './index.php',
                    data: {
                        action: 'removeBrand',
                        brandID: brand_id
                    },
                    success: (response) => {
                        Swal.fire({
                            type: 'success',
                            title: 'Xóa Sản Phẩm Thành Công',
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
                            title: 'Lỗi mở khóa sản phẩm',
                            html: e.responseText
                        });
                    }
                })
            }
        });
    }
    function ThemTH(){
        $('#title-modal').html('Thêm thương hiệu');
        $('#myModal').modal();
        $('#brand_id').attr('readonly', true);
        $('#button_submit').html('Thêm');
        $('#button_submit').attr('onclick', 'SubmitThemTH()');
    }

    function SubmitThemTH(){
        $('#button_submit').focus();
        var brand_id = parseInt($('#brand_id').val());
        var name = $('#name').val();
        $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'addBrand',
                brandName: name
            },
            success: (response) => {
                Swal.fire({
                    type: 'success',
                    title: 'Thêm Thành Công Thương Hiệu',
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
                    title: 'Lỗi mở khóa sản phẩm',
                    html: e.responseText
                });
            }
        })
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