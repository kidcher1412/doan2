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
                                <label>Mã Hóa Đơn</label>
                                <input type='text' class='form-control' id='bill_id' placeholder='Mã loại' data-val='true' data-val-required='M&#xE3; h&#xF3;a &#x111;&#x1A1;n b&#x1EAF;t bu&#x1ED9;c' name='HD.bill_id' value=''>
                                <span class='field-validation-valid' data-valmsg-for='HD.bill_id' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Trạng thái</label>
                                <select id='status' style='width: 100%; height: 40px;'>
                                    <option value='1'>Đang xử lý</option>
                                    <option value='2'>Đang giao hàng</option>
                                    <option value='3'>Đã giao hàng</option>
                                    <option value='4'>Đã hủy đơn hàng</option>
                                </select>
                                <span class='field-validation-valid' data-valmsg-for='HD.status' data-valmsg-replace='true'></span>
                            </div>
                            <div class='checkbox'>
                            </div>
                            <button type='submit' class='btn btn-success btn-block' onclick='SubmitEditHD()'>Sửa</button>
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
        var status = $('#select_trangthai').val();
        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action: "getAllBill"
            },
            success: function (responseText) {
                var s = 'Không tìm thấy dữ liệu';
                var data = JSON.parse(responseText);
                data = data.filter(order => {
                        const daymax = document.querySelector('#datezoneMax').value;
                        const daymin = document.querySelector('#datezoneMin').value;
                        const date = new Date(order.date_order.split('-').reverse().join('-'));
                            return date > new Date(daymin) && date <= new Date(daymax); // So sánh các giá trị ngày
                });
                switch (type) {
                    case "all":
                        break;
                    case "bill_id":
                        data =data.filter(bill => bill.bill_id == input);
                        break;
                    case "user_kh":
                        data =data.filter(bill => bill.user_kh == input);
                        break;
                    case "user_nv":
                        data =data.filter(bill => bill.user_nv === input);
                        break;
                    default:
                        break;
                }
                if(status != 0){
                    data =data.filter(bill => bill.status==status);
                }
                if (data.length>0) {
                    var s = '';
                    for(let i = 0; i < data.length; ++i){
                        s += `<tr>
                                    <td>`+ data[i].bill_id +`</td>
                                    <td>`+ data[i].user_kh +`</td>
                                    <td>`+ data[i].user_nv +`</td>
                                    <td>`+ data[i].phone +`</td>
                                    <td>`+ data[i].address +`</td>
                                    <td>`+data[i].date_order+`</td>`;
                        s +=        `<td>`+ data[i].date_receice +`</td>
                                    <td>`+data[i].total+`</td>`;
                        switch(parseInt(data[i].status)){
                                        case 1: s += `<td>Đang xử lý</td>`;
                                                break;
                                        case 2: s += `<td>Đang giao hàng</td>`;
                                                break;
                                        case 3: s += `<td>Đã giao hàng</td>`;
                                                break;
                                        case 4: s += `<td>Đã hủy đơn hàng</td>`;
                                                break;
                                        default: break;
                                    }
                        s +=        `<td>`;
                                        if(data[i].status < 3){
                                            s += `<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditHD(` + data[i].bill_id
                                                
                                                + `)'><i class='pe-7s-config'></i></button>`;
                                        }
                                        s += `<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='ViewCTHD(`+ data[i].bill_id +`)'><i class='pe-7s-look'></i></button>`;
                        s +=        `</td>
                                </tr>`;
                    }
                }
                $('#suahd1').html(s);
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi tìm kiếm hóa đơn => TimKiem',
                    html: e.responseText
                });
            }
        });
    }

    function EditHD(bill_id) {
        $('#title-modal').html('Sửa hóa đơn ' + bill_id);
        $('#bill_id').attr('readonly', true);
        $('#bill_id').val(bill_id);
        $('#myModal').modal();
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

    function SubmitEditHD() {
        var bill_id = parseInt($('#bill_id').val());
        var status = $('#status').val();
        let date_receice = '';
        if(status == 3){
            let today = new Date();
            let day = today.getDate().toString().padStart(2, '0');
            let month = (today.getMonth() + 1).toString().padStart(2, '0');
            let year = today.getFullYear();
            let hours = today.getHours().toString().padStart(2, '0');
            let minutes = today.getMinutes().toString().padStart(2, '0');
            let seconds = today.getSeconds().toString().padStart(2, '0');
            date_receice = `${day}-${month}-${year}`;
        }

        $.ajax({
            url: './index.php',
            type: 'post',
            data: {
                action: 'editBill',
                bill_id: bill_id,
                status: status,
                date_receice: date_receice
            },
            success: function (response) {
                Swal.fire({
                    type: 'success',
                    title: 'sửa hóa đơn thành công',
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
                    title: 'Lỗi sửa hóa đơn'
                });
            }
        });
    }
    function ViewCTHD(bill_id){
        $.ajax({
            url: './index.php',
            type: 'post',
            dataType: 'json',
            data: {
                action:'getbill',
                bill_id: bill_id
            },
            success: function (data) {
                if(data != false){
                    var s = '';
                    var tongtien = 0;
                    var thanhtien = 0;
                    for(let i = 0; i < data.length; ++i){
                        tongtien = parseInt(data[i].price) * parseInt(data[i].amount);
                        thanhtien += tongtien;
                        s += `<tr>
                                <td>`+ data[i].product_id +`</td>
                                <td style='width: 80px; height: 80px;'><img src='`+ data[i].img +`' style='width: 100%; height: 100%;'></td>
                                <td>`+ data[i].name +`</td>
                                <td>`+ data[i].tenthuonghieu +`</td>
                                <td>`+ parseInt(data[i].price).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) +`</td>
                                <td>`+ data[i].amount +`</td>
                                <td>`+ parseInt(tongtien).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) +`</td>
                            </tr>`;
                    }
                    $('#suacthd1').html(s);
                    $('#id_thanhtien').html('Thành tiền: ' + parseInt(thanhtien).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + ' đ');
                    $('#id_cthd').html('Chi tiết hóa đơn ' + bill_id);
                    document.querySelector('.footer').scrollIntoView({
                            behavior: "smooth",
                            block: "end",
                            duration: 500
                    })
                }
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi Lấy Hóa Đơn'
                });
            }
        });
    }

</script>