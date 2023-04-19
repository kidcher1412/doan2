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
                            <input type='text' class='form-control' id='hero_id' placeholder='Mã Hero' data-val='true' readonly="readonly" name='HR.hero_id' value=''>
                            <span class='field-validation-valid' data-valmsg-for='SP.product_id' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Câu Tiêu Đề</label>
                            <input type='text' class='form-control' id='slogent' placeholder='Câu tiêu đề để hiển thị' data-val='true' data-val-required='Câu Hiển Thị là Bắt Buộc' name='HR.slogent' value=''>
                            <span class='field-validation-valid' data-valmsg-for='SP.name' data-valmsg-replace='true'></span>
                        </div>
                        <div class='form-group'>
                            <label>Hình ảnh</label>
                            <img id="sp_img" src="" class="img-fluid" style="width: 85px; height: 80px;object-fit: contain;">
                            <input class='form-control' id='img' onchange='openFile(event)' type='file' data-val='true' data-val-required='H&#xEC;nh &#x1EA3;nh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='photo'>
                            <span class='field-validation-valid' data-valmsg-for='SP.img' data-valmsg-replace='true'></span>
                        </div>
                        <div class='checkbox'>
                        </div>
                        <button type='button' class='btn btn-success btn-block' onclick='SubmitEditHero()'>Thêm</button>
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

    function TimKiem(){
        var type = $('#select').val();
        var input = $('#input_search').val();
        $.ajax({
            url: '/Admin/Product/TimKiem',
            type: 'post',
            dataType: 'json',
            data: {
                type: type,
                input: input
            },
            success: function (data) {
                if (data != -1) {
                    var s ='';
                    for(let i = 0; i < data.length; ++i){
                        s += `<tr>
                                    <td>`+ data[i].product_id +`</td>
                                    <td style='width: 80px; height: 80px;'><img src='`+ data[i].img +`' style='width: 100%; height: 100%;'></td>
                                    <td>`+ data[i].name +`</td>
                                    <td>`+ data[i].product_type_id +`</td>
                                    <td>`+ data[i].brand_id +`</td>
                                    <td>`+ data[i].amount +`</td>
                                    <td>`+ data[i].price +`</td>
                                    <td>`+ data[i].description +`</td>
                                    <td>`+ data[i].use +`</td>`;
                                    if(data[i].status == 1){
                                        s += `<td>Còn bán</td>`;
                                    }
                                    else{
                                        s += `<td>Hết bán</td>`;
                                    }
                        s+=         `<td>
                                        <button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditSP(`+ data[i].product_id +`)'><i class='pe-7s-config'></i></button>`;
                                        if (data[i].status != 0)
                                        {
                                            s += `<button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveSP(`+ data[i].product_id +`)'><i class='pe-7s-lock'></i></button>`;
                                        }
                                        else
                                        {
                                            s += `<button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Trash' onclick='BackSP(`+ data[i].product_id +`)'><i class='pe-7s-unlock'></i></button>`;
                                        }
                        s +=        `</td>
                                </tr>`;
                    }
                    $('#suasp1').html(s);
                }
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi tìm kiếm sản phẩm => TimKiem',
                    html: e.responseText
                });
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

    function SubmitEditHero(){
        MAHR = document.querySelector('#hero_id').value;
        SLOGENT = document.querySelector('#slogent').value;


        if(!SLOGENT||!Img){
            alert('không được bỏ trống phần tử Quan trọng');
            return
        }
        if(MAHR != ''){
            // Update
            if(Img ==''){
                alert('hình ảnh minh họa không được thiếu')
                return;
            }
        $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'editHero',
                hero_id: MAHR,
                slogent: SLOGENT,
                img: Img
            },
            success: (response) => {
                Swal.fire({
                    type: 'success',
                    title: 'Thêm Trang Truyền bá thành công',
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
                    title: 'Lỗi mở khóa Dữ liệu',
                    html: e.responseText
                });
            }
        })
        }
        else{
            // Thêm Mới cột
            
            if(Img ==null){
                console.log('Khong update hinh');
            }
            $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'addHero',
                slogent: SLOGENT,
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

    function ThemHero(){
        $('#title-modal').html('Thêm Hero ');
        $('#hero_id').val('');
        $('#slogent').val('');
        $('.btn-success').html('Thêm');
        document.querySelector('#sp_img').src='';
        $('#myModal').modal();
    }
    function EditHero(hero_id) {
        $('#title-modal').html('Sửa sản phẩm mã ' + hero_id);
        $('.btn-success').html('Sửa');
        $('#hero_id').attr('readonly', true);
        $.ajax({
            type: 'POST',
            url: './index.php',
            data:{
                action: 'getHero',
                hero_id: hero_id
            },
            success: function(responseText) {
                
                var data = JSON.parse(responseText);
                $('#hero_id').val(data.id_hero);
                console.log(data);
                $('#slogent').val(data.slogent);
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

    function removeHero(hero_id) {
        Swal.fire({
            type: 'question',
            title: 'Xác nhận',
            text: 'Bạn có muốn Xóa Hero này?',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                    action: 'removeHero',
                    hero_id: hero_id
    
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