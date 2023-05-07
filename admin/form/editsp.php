    <!-- Modal -->
<div class='container'>
    <div class='modal fade' id='myModal' role='dialog'>
        <div class='modal-dialog'>

            <!-- Modal content-->
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4><span id='title-modal'>Login</span></h4>
                </div>
                <div class='modal-body' style='padding:40px 50px;'>
                    <form role='form'>
                        
                        <div class='form-group'>
                            <label>Mã sản phẩm</label>
                            <input type='text' class='form-control' id='product_id' placeholder='Mã sản phẩm' data-val='true' data-val-required='M&#xE3; s&#x1EA3;n ph&#x1EA9;m l&#xE0; b&#x1EAF;t bu&#x1ED9;c' readonly="readonly" name='SP.product_id' value='>
                            <span class='field-validation-valid' data-valmsg-for='SP.product_id' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Mã loại sản phẩm</label>
                            <select id='sl_product_type_id' onchange='changeLSP()' style='width: 100%;height: 40px;'>
                                        <option value='1'>1 - Trang &#x111;i&#x1EC3;m</option>
                                        <?php 
                                            foreach ($TypeData as $value) {
                                                echo "
                                                    <option value='".$value["product_type_id"]."'>".$value["product_type_id"]." - ".$value["name"]."</option>
                                                ";
                                            }
                                        ?>
                            </select>
                            <input type='text' class='form-control' id='product_type_id' placeholder='Mã loại sản phẩm' readonly style='display: none;' data-val='true' data-val-required='M&#xE3; lo&#x1EA1;i l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='SP.product_type_id' value=''>
                            <span class='field-validation-valid' data-valmsg-for='SP.product_type_id' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Mã thương hiệu</label>
                            <select id='sl_brand_id' onchange='changeTH()' style='width: 100%;height: 40px;'>
                                        <?php 
                                            foreach ($BrainData as $value) {
                                                echo "
                                                    <option value='".$value["brand_id"]."'>".$value["brand_id"]." - ".$value["name"]."</option>
                                                ";
                                            }
                                        ?>
                            </select>
                            <input type='text' class='form-control' id='brand_id' placeholder='Mã thương hiệu' readonly style='display: none;' data-val='true' data-val-required='M&#xE3; th&#x1B0;&#x1A1;ng hi&#x1EC7;u l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='SP.brand_id' value='>
                            <span class='field-validation-valid' data-valmsg-for='SP.brand_id' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Tên sản phẩm</label>
                            <input type='text' class='form-control' id='name' placeholder='Tên sản phẩm' data-val='true' data-val-required='T&#xEA;n s&#x1EA3;n ph&#x1EA9;m l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='SP.name' value='>
                            <span class='field-validation-valid' data-valmsg-for='SP.name' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Số lượng sản phẩm</label>
                            <input type='number' class='form-control' id='amount' placeholder='Số lượng sản phẩm' data-val='true' data-val-required='The amount field is required.' name='SP.amount' value=''>
                            <span class='field-validation-valid' data-valmsg-for='SP.amount' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Giá sản phẩm</label>
                            <input type='text' class='form-control' id='price' placeholder='Giá sản phẩm' data-val='true' data-val-required='Gi&#xE1; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='SP.price' value=''>
                            <span class='field-validation-valid' data-valmsg-for='SP.price' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Mô tả</label>
                            <input type='text' class='form-control' id='description' placeholder='Mô tả' data-val='true' data-val-required='M&#xF4; t&#x1EA3; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='SP.description' value='>
                            <span class='field-validation-valid' data-valmsg-for='SP.description' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Cách sử dụng</label>
                            <input type='text' class='form-control' id='use' placeholder='Cách sử dụng' data-val='true' data-val-required='C&#xE1;ch s&#x1EED; d&#x1EE5;ng l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='SP.use' value='>
                            <span class='field-validation-valid' data-valmsg-for='SP.use' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Hình ảnh</label>
                            <img id="sp_img" src="" class="img-fluid" style="width: 85px; height: 80px;object-fit: contain;">
                            <input class='form-control' id='img' onchange='openFile(event)' type='file' data-val='true' data-val-required='H&#xEC;nh &#x1EA3;nh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='photo'>
                            <span class='field-validation-valid' data-valmsg-for='SP.img' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Trạng thái</label>
                            <input type='text' class='form-control' placeholder='Trạng thái' id='status' readonly data-val='true' data-val-required='The status field is required.' name='SP.status' value='>
                            <span class='field-validation-valid' data-valmsg-for='SP.status' data-valmsg-replace='true'></span>
                        </div>
                        <div class='checkbox'>
                        </div>
                        <button type='button' class='btn btn-success btn-block' onclick='SubmitEditLSP()'>Sửa</button>
                    </form>
                </div>
                <div class='modal-footer'>
                    <button type='submit' class='btn btn-danger btn-default pull-right' data-dismiss='modal'>Cancel</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    let MaType;
    let MaBrand;
    let Name;
    let Amount;
    let Price;
    let Motau;
    let Use;
    let Img;
    let Imgbak='';
    let masp;

    function TimKiem(){
        var type = $('#select').val();
        var input = $('#input_search').val();
        var dataProduct;
        var s= "Không tìm thấy Yêu Cầu";
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data:{
                    action:"getAllProduct",
                },
                success: function(responseText) {
                    dataProduct = JSON.parse(responseText);
                    console.log(dataProduct)
                    switch (type) {
                        case "product_id":
                            dataProduct =dataProduct.filter(product => product.product_id === input);
                            break;
                        case "name":
                            dataProduct =dataProduct.filter(product => product.name.toLocaleLowerCase().indexOf(input.toLocaleLowerCase())>-1);
                            break
                        case "product_type_id":
                            dataProduct =dataProduct.filter(product => product.product_type_id === input);
                            break
                        case "brand_id":
                            dataProduct =dataProduct.filter(product => product.brand_id === input);
                            break
                        case "price":
                            dataProduct =dataProduct.filter(product => parseInt(product.price) <= input);
                            break
                        default:
                            break;
                    }
                    dataProduct.forEach(data => {
                                s += `<tr>
                                    <td>`+ data.product_id +`</td>
                                    <td style='width: 80px; height: 80px;'><img src='`+ data.img +`' style='width: 100%; height: 100%;'></td>
                                    <td>`+ data.name +`</td>
                                    <td>`+ data.product_type_id +`</td>
                                    <td>`+ data.brand_id +`</td>
                                    <td>`+ data.amount +`</td>
                                    <td>`+ data.price +`</td>
                                    <td>`+ data.description +`</td>
                                    <td>`+ data.use +`</td>`;
                                    if(data.status == 1){
                                        s += `<td>Còn bán</td>`;
                                    }
                                    else{
                                        s += `<td>Hết bán</td>`;
                                    }
                        s+=         `<td>
                                        <button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditSP(`+ data.product_id +`)'><i class='pe-7s-config'></i></button>`;
                                        if (data.status != 0)
                                        {
                                            s += `<button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveSP(`+ data.product_id +`)'><i class='pe-7s-lock'></i></button>`;
                                        }
                                        else
                                        {
                                            s += `<button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Trash' onclick='BackSP(`+ data.product_id +`)'><i class='pe-7s-unlock'></i></button>`;
                                        }
                        s +=        `</td>
                                </tr>`;
                            });
                    $('#suasp1').html(s);
                }
        });
    }
    var reader = new FileReader();
    var openFile = function(event) {
        const formData = new FormData();
        const fileInput = $('#img')[0];
        const file = fileInput.files[0];
      
        formData.append('photo', file);
        formData.append('action', 'uploadImage');
        if(file ==null){
            alert('Khong update hinh');
            Img =Imgbak;
            document.getElementById('sp_img').src =Imgbak;
            return;
        }
        $.ajax({
          type: 'POST',
          url: './index.php',
          data: formData,
          processData: false,
          contentType: false,
          success: (response) => {
            if(response==''){
                alert('co loi trong qua trinh tai len');
                document.getElementById('sp_img').src =''
            }

            else{
                document.querySelector('#sp_img').src=response;
                Img = response;
            }
          },
          error: function (e) {
            Swal.fire({
                type: 'error',
                title: 'Lỗi khi đăng Tải hình ảnh lên',
                html: 'try Again'
            });
        }
        });
    };

    function SubmitEditLSP(){
        masp = document.querySelector('#product_id').value;
        MaType = document.querySelector('#sl_product_type_id').value;
        MaBrand = document.querySelector('#sl_brand_id').value;
        Name = document.querySelector('#name').value;
        Amount = document.querySelector('#amount').value;
        Price = document.querySelector('#price').value;
        Mota = document.querySelector('#description').value;
        Use = document.querySelector('#use').value;

        if(!MaType||!MaBrand||!Name||!Amount||!Price||!Mota||!Use){
            Swal.fire({
                    type: 'error',
                    title: 'không được bỏ trống phần tử Quan trọng',
                    html: "try again"
            })
            return;
        }
        if(masp == ''){
            // them moi cot;
            if(Img ==''){
                Swal.fire({
                    type: 'error',
                    title: 'hình ảnh minh họa không được thiếu',
                    html: "try again"
                })
                return;
            }
        $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'AddProduct',
                typeID: MaType,
                brandID: MaBrand,
                name: Name,
                amount: Amount,
                price: Price,
                description: Mota,
                use: Use,
                img: Img
            },
            success: (response) => {
                Swal.fire({
                    type: 'success',
                    title: 'Thêm Sản Phẩm Thành Công',
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
            // update;
            
            if(Img ==null){
                console.log('Khong update hinh');
            }
            $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'EditProduct',
                productID: masp,
                typeID: MaType,
                brandID: MaBrand,
                name: Name,
                amount: Amount,
                price: Price,
                description: Mota,
                use: Use,
                img: Img
            },
            success: (response) => {
                Swal.fire({
                    type: 'success',
                    title: 'Sửa Sản Phẩm Thành Công',
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

    function AddSP(){
        $('#title-modal').html('Thêm sản phẩm ');
        $('#product_id').val('');
        $('#product_type_id').val('');
        $('#sl_product_type_id').val('');
        $('#brand_id').val('');
        $('#sl_brand_id').val('');
        $('#name').val('');
        $('#amount').val('');
        $('#price').val('');
        $('#description').val('');
        $('#use').val('');
        $('#status').val('');
        $('#myModal').modal();
        document.querySelector('#sp_img').src='';
    }
    function EditSP(product_id) {
        $('#title-modal').html('Sửa sản phẩm mã ' + product_id);
        $('#product_id').attr('readonly', true);
        $.ajax({
            type: 'POST',
            url: './index.php',
            data:{
                action: 'getProduct',
                product_id: product_id
            },
            success: function(responseText) {
                
                var data = JSON.parse(responseText);
                $('#product_id').val(data.product_id);
                console.log(data);
                $('#sl_product_type_id').val(data.product_type_id);
                $('#brand_id').val(data.brand_id);
                $('#sl_brand_id').val(data.brand_id);
                $('#name').val(data.name);
                $('#amount').val(data.amount);
                $('#price').val(data.price);
                $('#description').val(data.description);
                $('#use').val(data.use);
                $('#status').val(data.status);
                document.querySelector('#sp_img').src=data.img;
                Imgbak=data.img;
                Img=data.img;
                $('#myModal').modal();
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi Lấy Thông Tin sản Phẩm',
                    html: e.responseText
                });
            }
        });
    }
    function BackSP(product_id) {
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn mở khóa sản phẩm này?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                    action: 'backProduct',
                    productID: product_id,
    
                },
                success: (response) => {
                    Swal.fire({
                        type: 'success',
                        title: 'Mở Khóa Sản Phẩm Thành Công',
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

    function RemoveSP(product_id) {
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn khóa sản phẩm này?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                    action: 'removeProduct',
                    productID: product_id,
    
                },
                success: (response) => {
                    Swal.fire({
                        type: 'success',
                        title: 'Khóa Sản Phẩm Thành Công',
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