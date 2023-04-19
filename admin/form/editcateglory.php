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
                                <label>Mã loại sản phẩm</label>
                                <input readonly='readonly' type='text' class='form-control' id='product_type_id' placeholder='Mã loại' data-val='true' data-val-required='M&#xE3; lo&#x1EA1;i s&#x1EA3;n ph&#x1EA9;m l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='LSP.product_type_id' value=''>
                                <span class='field-validation-valid' data-valmsg-for='LSP.product_type_id' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Tên loại</label>
                                <input required type='text' class='form-control' id='name' placeholder='Tên loại' data-val='true' data-val-required='T&#xEA;n lo&#x1EA1;i s&#x1EA3;n ph&#x1EA9;m l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='LSP.name' value=''>
                                <span class='field-validation-valid' data-valmsg-for='LSP.name' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Mô tả</label>
                                <input required  type='text' class='form-control' id='description' placeholder='Mô tả' data-val='true' data-val-required='M&#xF4; t&#x1EA3; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='LSP.description' value=''>
                                <span class='field-validation-valid' data-valmsg-for='LSP.description' data-valmsg-replace='true'></span>

                            </div>
                            <div class='checkbox'>
                            </div>
                            <button type='submit' class='btn btn-success btn-block' onclick='SubmitEditLSP()' id='button_submit'>Sửa</button>
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
        var s="Không Tìm Thấy Sản Phẩm";
        $.ajax({
            type: 'POST',
            url: './index.php',
            data:{
                    action:"getAllType"
                },
            success: function(responseText) {
                var data = JSON.parse(responseText);
                switch (type) {
                    case "all":
                        break;
                    case "product_type_id":
                        data =data.filter(productType => productType.product_type_id === input);
                        break;
                    case "name":
                        data =data.filter(productType => productType.name.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    case "description":
                        data =data.filter(productType => productType.description.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    default:
                        break;
                }
                    for(let i = 0; i < data.length; ++i){
                        s += `<tr>
                                <td>`+ data[i].product_type_id +`</td>
                                <td>`+ data[i].name +`</td>
                                <td>`+ data[i].description +`</td>
                                <td>
                                    <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditLSP(`+ data[i].product_type_id +`)'><i class='pe-7s-config'></i></button>
                                    <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveLSP(`+ data[i].product_type_id +`)'><i class='pe-7s-trash'></i></button>
                                </td>
                            </tr>`;
                    }
                    $('#sualsp1').html(s);                
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi tìm kiếm loại sản phẩm => TimKiem',
                    html: e.responseText
                });
            }            
        });
        // $.ajax({
        //     url: '/Admin/Type/TimKiem',
        //     type: 'post',
        //     dataType: 'json',
        //     data: {
        //         type: type,
        //         input: input
        //     },
        //     success: function (data) {
        //         if (data != -1) {
        //             var s = '';
        //             for(let i = 0; i < data.length; ++i){
        //                 s += `<tr>
        //                         <td>`+ data[i].product_type_id +`</td>
        //                         <td>`+ data[i].name +`</td>
        //                         <td>`+ data[i].description +`</td>
        //                         <td>
        //                             <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditLSP(`+ data[i].product_type_id +`)'><i class='pe-7s-config'></i></button>
        //                             <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveLSP(`+ data[i].product_type_id +`)'><i class='pe-7s-trash'></i></button>
        //                         </td>
        //                     </tr>`;
        //             }
        //             $('#sualsp1').html(s);
        //         }
        //     },
        //     error: function (e) {
        //         Swal.fire({
        //             type: 'error',
        //             title: 'Lỗi tìm kiếm loại sản phẩm => TimKiem',
        //             html: e.responseText
        //         });
        //     }
        // });
    }

    function EditLSP(product_type_id) {
        $('.form-group span').text('');
        $('#title-modal').html('Sửa loại sản phẩm ' + product_type_id);
        $('#product_type_id').attr('readonly', true);
        
        $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                    action: 'getType',
                    typeID: product_type_id
                },
                success: (responseText) => {
                    var dataset = JSON.parse(responseText)
                    $('#product_type_id').val(dataset.product_type_id);
                    $('#name').val(dataset.name);
                    $('#description').val(dataset.description);
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
        $('#button_submit').attr('onclick', 'SubmitLSP()');
        $('#myModal').modal();

    }

    function ThemLSP(){
        document.querySelector('#product_type_id').value='';
        document.querySelector('#name').value='';
        document.querySelector('#description').value='';
        $('.form-group span').text('');
        $('#title-modal').html('Thêm loại sản phẩm');
        $('#button_submit').html('Thêm');
        $('#button_submit').attr('onclick', 'SubmitLSP()');
        $('#myModal').modal();
    }

    function SubmitThemLSP(){
        $('#button_submit').focus();
        var product_type_id = parseInt($('#product_type_id').val());
        var name = $('#name').val();
        var description = $('#description').val();
        if(name.trim() == '' || description.trim() == ''){
            return;
        }
        $.ajax({
            url: '/Admin/Type/SubmitThemLSP',
            type: 'post',
            dataType: 'json',
            data: {
                product_type_id: product_type_id,
                name: name,
                description: description
            },
            async: false,
            success: function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'Thêm Loại Sản Phẩm Thành Công'
                }).then((result) => {
                    if (result.value) {
                      location.reload();
                    }
                  })
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi thêm loại sản phẩm'
                });
            }
        });
    }

    function SubmitLSP() {

        var product_type_id = document.querySelector('#product_type_id').value;
        var name = document.querySelector('#name').value;
        var description = document.querySelector('#description').value;
        if(product_type_id==''){
            // thêm
            console.log("them loai")
            $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                    action: 'addType',
                    name: name,
                    description: description
                },
                success: (response) => {
                    Swal.fire({
                        type: 'success',
                        title: 'Thêm loại sản phẩm thành công',
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
        else{
            // update
            console.log("sửa loai")
            $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                    action: 'editType',
                    typeID: product_type_id,
                    name: name,
                    description: description
                },
                success: (response) => {
                    Swal.fire({
                        type: 'success',
                        title: 'Sửa loại sản phẩm thành côngm',
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

    }

    function RemoveLSP(product_type_id) {
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn xóa loại sản phẩm và tất cả các sản phẩm thuộc loại sản phẩm này?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'removeType',
                typeID: product_type_id
            },
            success: (response) => {
                Swal.fire({
                    type: 'success',
                    title: 'Xóa Loại Sản Phẩm Thành Công',
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
</script>