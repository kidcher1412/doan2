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
                                <label>Mã quyền</label>
                                <input readonly="readonly" type='text' class='form-control' id='permission_id' placeholder='Mã quyền' data-val='true' name='Quyen.permission_id' value=''>
                                <span class='field-validation-valid' data-valmsg-for='Quyen.permission_id' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Tên quyền</label>
                                <input type='text' class='form-control' id='name' placeholder='Tên quyền' data-val='true' data-val-required='T&#xEA;n quy&#x1EC1;n l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='Quyen.name' value=''>
                                <span class='field-validation-valid' data-valmsg-for='Quyen.name' data-valmsg-replace='true'></span>
                            </div>
                            <div class='form-group'>
                                <label>Chi tiết quyền</label>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>Sản phẩm</label>
                                <input type='checkbox' style='margin-left: 20%;' id='SanPham' onclick='changecheck("SanPham")'>
                                <select style='margin-left: 5%;' id='QSanPham' onchange="checkChangeQ('SanPham')">
                                    <option value='xemSanPham'>Chỉ được xem</option>
                                    <option value='qlSanPham'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='SanPhamThem' onclick='getchangevalue("SanPham")'>
                                <input type='checkbox' style='margin-right: 20px;' id='SanPhamSua' onclick='getchangevalue("SanPham")'>
                                <input type='checkbox' style='margin-right: 20px;' id='SanPhamXoa' onclick='getchangevalue("SanPham")'>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>Quyền</label>
                                <input type='checkbox' style='margin-left: 20%;' id='Quyen' onclick='changecheck("Quyen")'>
                                <select style='margin-left: 5%;' id='QQuyen' onchange="checkChangeQ('Quyen')">
                                    <option value='xemQuyen'>Chỉ được xem</option>
                                    <option value='qlQuyen'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='QuyenThem' onclick='getchangevalue("Quyen")'>
                                <input type='checkbox' style='margin-right: 20px;' id='QuyenSua' onclick='getchangevalue("Quyen")'>
                                <input type='checkbox' style='margin-right: 20px;' id='QuyenXoa' onclick='getchangevalue("Quyen")'>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>Nhân viên</label>
                                <input type='checkbox' style='margin-left: 20%;' id='NhanVien' onclick='changecheck("NhanVien")'>
                                <select style='margin-left: 5%;' id='QNhanVien' onchange="checkChangeQ('NhanVien')">
                                    <option value='xemNhanVien'>Chỉ được xem</option>
                                    <option value='qlNhanVien'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='NhanVienThem' onclick='getchangevalue("NhanVien")'>
                                <input type='checkbox' style='margin-right: 20px;' id='NhanVienSua' onclick='getchangevalue("NhanVien")'>
                                <input type='checkbox' style='margin-right: 20px;' id='NhanVienXoa' onclick='getchangevalue("NhanVien")'>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>Khách hàng</label>
                                <input type='checkbox' style='margin-left: 20%;' id='KhachHang' onclick='changecheck("KhachHang")'>
                                <select style='margin-left: 5%;' id='QKhachHang' onchange="checkChangeQ('KhachHang')">
                                    <option value='xemKhachHang'>Chỉ được xem</option>
                                    <option value='qlKhachHang'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='KhachHangThem' onclick='getchangevalue("KhachHang")'>
                                <input type='checkbox' style='margin-right: 20px;' id='KhachHangSua' onclick='getchangevalue("KhachHang")'>
                                <input type='checkbox' style='margin-right: 20px;' id='KhachHangXoa' onclick='getchangevalue("KhachHang")'>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>Nhà cung cấp</label>
                                <input type='checkbox' style='margin-left: 20%;' id='NCC' onclick='changecheck("NCC")'>
                                <select style='margin-left: 5%;' id='QNCC' onchange="checkChangeQ('NCC')">
                                    <option value='xemNCC'>Chỉ được xem</option>
                                    <option value='qlNCC'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='NCCThem' onclick='getchangevalue("NCC")'>
                                <input type='checkbox' style='margin-right: 20px;' id='NCCSua' onclick='getchangevalue("NCC")'>
                                <input type='checkbox' style='margin-right: 20px;' id='NCCXoa' onclick='getchangevalue("NCC")'>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>Hóa đơn</label>
                                <input type='checkbox' style='margin-left: 20%;' id='HoaDon' onclick='changecheck("HoaDon")'>
                                <select style='margin-left: 5%;' id='QHoaDon' onchange="checkChangeQ('HoaDon')">
                                    <option value='xemHoaDon'>Chỉ được xem</option>
                                    <option value='qlHoaDon'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='HoaDonThem' onclick='getchangevalue("HoaDon")'>
                                <input type='checkbox' style='margin-right: 20px;' id='HoaDonSua' onclick='getchangevalue("HoaDon")'>
                                <input type='checkbox' style='margin-right: 20px;' id='HoaDonXoa' onclick='getchangevalue("HoaDon")'>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label  class="title">Nhập hàng</label>
                                <input type='checkbox' style='margin-left: 20%;' id='NhapHang' onclick='changecheck("NhapHang")'>
                                <select style='margin-left: 5%;' id='QNhapHang' onchange="checkChangeQ('NhapHang')">
                                    <option value='xemNhapHang'>Chỉ được xem</option>
                                    <option value='qlNhapHang'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='NhapHangThem' onclick='getchangevalue("NhapHang")'>
                                <input type='checkbox' style='margin-right: 20px;' id='NhapHangSua' onclick='getchangevalue("NhapHang")'>
                                <input type='checkbox' style='margin-right: 20px;' id='NhapHangXoa' onclick='getchangevalue("NhapHang")'>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>MAKETING</label>
                                <input type='checkbox' style='margin-left: 20%;' id='Maketing' onclick='changecheck("Maketing")'>
                                <select style='margin-left: 5%;' id='QMaketing' onchange="checkChangeQ('Maketing')">
                                    <option value='xemMaketing'>Chỉ được xem</option>
                                    <option value='qlMaketing'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='MaketingThem' onclick='getchangevalue("Maketing")'>
                                <input type='checkbox' style='margin-right: 20px;' id='MaketingSua' onclick='getchangevalue("Maketing")'>
                                <input type='checkbox' style='margin-right: 20px;' id='MaketingXoa' onclick='getchangevalue("Maketing")'>
                            </div>
                            <!-- <div class='form-group' style='margin-left: 5%;'>
                                <label>Tài khoản</label>
                                <input type='checkbox' style='margin-left: 20%;' id='TaiKhoan' onclick='changecheck("TaiKhoan")'>
                                <select style='margin-left: 5%;' id='QTaiKhoan'>
                                    <option value='xemTaiKhoan'>Chỉ được xem</option>
                                    <option value='qlTaiKhoan'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='TaiKhoanThem' onclick='changecheck("TaiKhoan")'>
                                <input type='checkbox' style='margin-right: 20px;' id='TaiKhoanSua' onclick='changecheck("TaiKhoan")'>
                                <input type='checkbox' style='margin-right: 20px;' id='TaiKhoanXoa' onclick='changecheck("TaiKhoan")'>
                            </div> -->
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>Hỗ Trợ</label>
                                <input type='checkbox' style='margin-left: 20%;' id='Support' onclick='changecheck("Support")'>
                                <select style='margin-left: 5%;' id='QSupport' onchange="checkChangeQ('Support')">
                                    <option value='xemSupport'>Chỉ được xem</option>
                                    <option value='qlSupport'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='SupportThem' onclick='getchangevalue("Support")'>
                                <input type='checkbox' style='margin-right: 20px;' id='SupportXoa' onclick='getchangevalue("Support")'>
                                <input type='checkbox' style='margin-right: 20px;' id='SupportSua' onclick='getchangevalue("Support")'>
                            </div>
                            <div class='form-group' style='margin-left: 5%;'>
                                <label>Thống kê</label>
                                <input type='checkbox' style='margin-left: 20%;' id='ThongKe' onclick='changecheck("ThongKe")'>
                                <select style='margin-left: 5%;' id='QThongKe' onchange="checkChangeQ('ThongKe')">
                                    <option value='xemThongKe'>Chỉ được xem</option>
                                    <option value='qlThongKe'>Xem và quản lý</option>
                                </select>
                                <input type='checkbox' style='margin-right: 20px;' id='ThongKeThem' onclick='getchangevalue("ThongKe")'>
                                <input type='checkbox' style='margin-right: 20px;' id='ThongKeSua' onclick='getchangevalue("ThongKe")'>
                                <input type='checkbox' style='margin-right: 20px;' id='ThongKeXoa' onclick='getchangevalue("ThongKe")'>
                            </div>
                            <div class='checkbox'>
                            </div>
                            <button type='submit' class='btn btn-success btn-block' onclick='SubmitEditQuyen()' id='button_submit'>Sửa</button>
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
    function checkChangeQ(id){
        if(document.getElementById('Q'+id).value == ('xem'+id))
            unsetchecked(id)
        else
            setchecked(id)
    }
    function unsetchecked(id) {
        $('#' +id+'Them' ).prop( 'checked', false );
        $('#' +id+'Sua' ).prop( 'checked', false );
        $('#' +id+'Xoa' ).prop( 'checked', false );

    }
    function setchecked(id) {
            $('#' +id+'Them' ).prop( 'checked', true );
            $('#' +id+'Sua' ).prop( 'checked', true );
            $('#' +id+'Xoa' ).prop( 'checked', true );
    }
    function setcheck(id,value1,value2,value3) {
        if(value1!='0')
            $('#' +id+'Them' ).prop( 'checked', true );
        else
            $('#' +id+'Them' ).prop( 'checked', false );
        if(value2!='0')
            $('#' +id+'Sua' ).prop( 'checked', true );
        else
            $('#' +id+'Sua' ).prop( 'checked', false );
        if(value3!='0')
            $('#' +id+'Xoa' ).prop( 'checked', true );
        else
            $('#' +id+'Xoa' ).prop( 'checked', false );

    }
    function getchangevalue(id){
        var t = document.getElementById(id).checked;
        var them = document.getElementById(id+"Them").checked;
        var sua = document.getElementById(id+"Sua").checked;
        var xoa = document.getElementById(id+"Xoa").checked;
        if(t){
            var variable =  them? '1': '0';
            variable+= sua? '-1': '-0';
            variable+= xoa? '-1': '-0';
            if(variable == '0-0-0'){
                document.getElementById("Q"+id).value = 'xem'+id
            }
            if(variable != '0-0-0'){
                document.getElementById("Q"+id).value = 'ql'+id;
            }
            variable+='-1';
        }
        else{
            variable = '0-0-0-0';
        }
        return variable;
    }
    function changecheck(id){
        var t = document.getElementById(id).checked;
        var them = document.getElementById(id+"Them").checked;
        var sua = document.getElementById(id+"Sua").checked;
        var xoa = document.getElementById(id+"Xoa").checked;
        if(t){
            $('#Q' + id).prop( 'disabled', false );
            $('#' + id+"Them").prop( 'disabled', false );
            $('#' + id+"Xoa").prop( 'disabled', false );
            $('#' + id+"Sua").prop( 'disabled', false );
        }
        else{
            $('#Q' + id).prop( 'disabled', true );
            them.checked = false;
            sua.checked = false;
            xoa.checked = false;
            $('#' + id+"Them").prop( 'disabled', true );
            $('#' + id+"Xoa").prop( 'disabled', true );
            $('#' + id+"Sua").prop( 'disabled', true );
        }
        
    }
    function TimKiem(){
        var type = $('#select').val();
        var input = $('#input_search').val();
        $.ajax({
            type: 'POST',
            url: './index.php',
            data:{
                    action:"getAllPermission"
                },
            success: function (responseText) {
                var s = 'Không tìm thấy dữ liệu';
                var data = JSON.parse(responseText);
                console.log(data);
                switch (type) {
                    case "all":
                        break;
                    case "permission_id":
                        data =data.filter(productType => productType.permission_id === input);
                        break;
                    case "name":
                        data =data.filter(productType => productType.name.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    case "details":
                        data =data.filter(productType => productType.details.toLowerCase().indexOf(input.toLowerCase())!=-1);
                        break;
                    default:
                        break;
                }
                console.log(data);
                if (data.length>0) {
                    var s = '';
                    for(let i = 0; i < data.length; ++i){
                        s += `<tr>
                                    <td>`+ data[i].permission_id +`</td>
                                    <td>`+ data[i].name +`</td>
                                    <td>`+ data[i].details +`</td>
                                    <td>
                                        <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditQuyen(`+ data[i].permission_id +`)'><i class='pe-7s-config'></i></button>
                                    </td>
                                </tr>`;
                    }
                }
                $('#suaquyen1').html(s);
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi tìm kiếm quyền => TimKiem',
                    html: e.responseText
                });
            }
        });
    }

    function EditQuyen(permission_id) {
        $('#title-modal').html('Sửa quyền ' + permission_id);
        $('#permission_id').attr('readonly', true);
        $.ajax({
            url: './index.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: 'getPermission',
                permissionID: permission_id
            },
            success: function (data) {
                if (data != -1) {
                    var s = data.details.toLowerCase();
                    $('#permission_id').val(data.permission_id);
                    $('#name').val(data.name);
                    if(s.indexOf('nhaphang') >= 0){
                        document.getElementById('NhapHang').checked = true;
                        if(s.indexOf('xemnhaphang') >= 0){
                            document.getElementById('QNhapHang').value = 'xemNhapHang';
                        }
                        else {
                            document.getElementById('QNhapHang').value = 'qlNhapHang';
                        }
                        $('#QNhapHang').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('NhapHang').checked = false;
                        $('#QNhapHang').prop( 'disabled', true );
                    }

                    if(s.indexOf('nhanvien') >= 0){
                        document.getElementById('NhanVien').checked = true;
                        if(s.indexOf('xemnhanvien') >= 0){
                            document.getElementById('QNhanVien').value = 'xemNhanVien';
                        }
                        else {
                            document.getElementById('QNhanVien').value = 'qlNhanVien';
                        }
                        $('#QNhanVien').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('NhanVien').checked = false;
                        $('#QNhanVien').prop( 'disabled', true );
                    }
                    
                    if(s.indexOf('sanpham') >= 0){
                        document.getElementById('SanPham').checked = true;
                        if(s.indexOf('xemsanpham') >= 0){
                            document.getElementById('QSanPham').value = 'xemSanPham';
                        }
                        else {
                            document.getElementById('QSanPham').value = 'qlSanPham';
                        }
                        $('#QSanPham').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('SanPham').checked = false;
                        $('#QSanPham').prop( 'disabled', true );
                    }

                    if(s.indexOf('hoadon') >= 0){
                        document.getElementById('HoaDon').checked = true;
                        if(s.indexOf('xemhoadon') >= 0){
                            document.getElementById('QHoaDon').value = 'xemHoaDon';
                        }
                        else {
                            document.getElementById('QHoaDon').value = 'qlHoaDon';
                        }
                        $('#QHoaDon').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('HoaDon').checked = false;
                        $('#QHoaDon').prop( 'disabled', true );
                    }

                    if(s.indexOf('khachhang') >= 0){
                        document.getElementById('KhachHang').checked = true;
                        if(s.indexOf('xemkhachhang') >= 0){
                            document.getElementById('QKhachHang').value = 'xemKhachHang';
                        }
                        else {
                            document.getElementById('QKhachHang').value = 'qlKhachHang';
                        }
                        $('#QKhachHang').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('KhachHang').checked = false;
                        $('#QKhachHang').prop( 'disabled', true );
                    }

                    if(s.indexOf('maketing') >= 0){
                        document.getElementById('Maketing').checked = true;
                        if(s.indexOf('xemMaketing') >= 0){
                            document.getElementById('QMaketing').value = 'xemMaketing';
                        }
                        else {
                            document.getElementById('QMaketing').value = 'qlMaketing';
                        }
                        $('#QMaketing').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('Maketing').checked = false;
                        $('#QMaketing').prop( 'disabled', true );
                    }

                    if(s.indexOf('ncc') >= 0){
                        document.getElementById('NCC').checked = true;
                        if(s.indexOf('xemncc') >= 0){
                            document.getElementById('QNCC').value = 'xemNCC';
                        }
                        else {
                            document.getElementById('QNCC').value = 'qlNCC';
                        }
                        $('#QNCC').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('NCC').checked = false;
                        $('#QNCC').prop( 'disabled', true );
                    }

                    if(s.indexOf('taikhoan') >= 0){
                        document.getElementById('TaiKhoan').checked = true;
                        if(s.indexOf('xemtaikhoan') >= 0){
                            document.getElementById('QTaiKhoan').value = 'xemTaiKhoan';
                        }
                        else {
                            document.getElementById('QTaiKhoan').value = 'qlTaiKhoan';
                        }
                        $('#QTaiKhoan').prop( 'disabled', false );
                    }
                    // else{
                    //     document.getElementById('TaiKhoan').checked = false;
                    //     $('#QTaiKhoan').prop( 'disabled', true );
                    // }

                    if(s.indexOf('quyen') >= 0){
                        document.getElementById('Quyen').checked = true;
                        if(s.indexOf('xemquyen') >= 0){
                            document.getElementById('QQuyen').value = 'xemQuyen';
                        }
                        else {
                            document.getElementById('QQuyen').value = 'qlQuyen';
                        }
                        $('#QQuyen').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('Quyen').checked = false;
                        $('#QQuyen').prop( 'disabled', true );
                    }

                    if(s.indexOf('support') >= 0){
                        document.getElementById('Support').checked = true;
                        if(s.indexOf('xemSupport') >= 0){
                            document.getElementById('QSupport').value = 'xemSupport';
                        }
                        else {
                            document.getElementById('QSupport').value = 'qlSupport';
                        }
                        $('#QSupport').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('ThongKe').checked = false;
                        $('#QThongKe').prop( 'disabled', true );
                    }
                    if(s.indexOf('thongke') >= 0){
                        document.getElementById('ThongKe').checked = true;
                        if(s.indexOf('xemthongke') >= 0){
                            document.getElementById('QThongKe').value = 'xemThongKe';
                        }
                        else {
                            document.getElementById('QThongKe').value = 'qlThongKe';
                        }
                        $('#QThongKe').prop( 'disabled', false );
                    }
                    else{
                        document.getElementById('ThongKe').checked = false;
                        $('#QThongKe').prop( 'disabled', true );
                    }
                    changecheck('NhapHang');
                    changecheck('Quyen');
                    changecheck('NhanVien');
                    changecheck('KhachHang');
                    changecheck('NCC');
                    changecheck('HoaDon');
                    changecheck('NhapHang');
                    changecheck('Maketing');
                    changecheck('Support');
                    changecheck('ThongKe');
                    $.ajax({
                        url: './index.php',
                        type: 'post',
                        dataType: 'json',
                        data: {
                            action: 'getPermissionFuture',
                            permissionID: permission_id
                        },
                        success: function (response) {
                            setcheck('SanPham',response[0].valueadd,response[0].valueedit,response[0].valuedelete)
                            setcheck('Quyen',response[3].valueadd,response[3].valueedit,response[3].valuedelete)
                            setcheck('NhanVien',response[4].valueadd,response[4].valueedit,response[4].valuedelete)
                            setcheck('KhachHang',response[5].valueadd,response[5].valueedit,response[5].valuedelete)
                            setcheck('NCC',response[6].valueadd,response[6].valueedit,response[6].valuedelete)
                            setcheck('HoaDon',response[7].valueadd,response[7].valueedit,response[7].valuedelete)
                            setcheck('NhapHang',response[8].valueadd,response[8].valueedit,response[8].valuedelete)
                            setcheck('Maketing',response[9].valueadd,response[9].valueedit,response[9].valuedelete)
                            setcheck('Support',response[10].valueadd,response[10].valueedit,response[10].valuedelete)
                            setcheck('ThongKe',response[11].valueadd,response[11].valueedit,response[11].valuedelete)

                        }
                    })
                }
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi lấy thông tin quyền => EditQuyen'
                });
            }
        });
        $('#button_submit').html('Sửa');
        $('#button_submit').attr('onclick', 'SubmitEditQuyen()');
        $('#myModal').modal();

    }
    function SubmitEditQuyen() {
        var permission_id = parseInt($('#permission_id').val());
        var name = $('#name').val();
        var details = '';
        if(document.getElementById('SanPham').checked){
            details += document.getElementById('QSanPham').value + '-';
        }                
        if(document.getElementById('Quyen').checked){
            details += document.getElementById('QQuyen').value + '-';
        }        
        if(document.getElementById('NhanVien').checked){
            details += document.getElementById('QNhanVien').value + '-';
        }        
        if(document.getElementById('KhachHang').checked){
            details += document.getElementById('QKhachHang').value + '-';
        }        
        if(document.getElementById('NCC').checked){
            details += document.getElementById('QNCC').value + '-';
        }        
        if(document.getElementById('HoaDon').checked){
            details += document.getElementById('QHoaDon').value + '-';
        }        
        if(document.getElementById('NhapHang').checked){
            details += document.getElementById('QNhapHang').value + '-';
        }
        if(document.getElementById('Maketing').checked){
            details += document.getElementById('QMaketing').value + '-';
        }
        if(document.getElementById('Support').checked){
            details += document.getElementById('QSupport').value + '-';
        }
        if(document.getElementById('ThongKe').checked){
            details += document.getElementById('QThongKe').value + '-';
        }
        details = details.substring(0, details.length - 1);
        const admincode = getchangevalue('SanPham')+ '-'+
                    getchangevalue('Quyen')+ '-'+
                    getchangevalue('NhanVien')+ '-'+
                    getchangevalue('KhachHang')+ '-'+
                    getchangevalue('NCC')+ '-'+
                    getchangevalue('HoaDon')+ '-'+
                    getchangevalue('NhapHang')+ '-'+
                    getchangevalue('Maketing')+ '-'+
                    getchangevalue('Support')+ '-'+
                    getchangevalue('ThongKe');
        console.log(admincode)
        $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                action: "editPermission",
                permissionID: permission_id,
                name: name,
                details: details,
                admincode: admincode
                },
                success: (responseText) => {
                    Swal.fire({
                        type: 'success',
                        title: 'Sửa Quyền thành công',
                        html: responseText
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

    function ThemQuyen(){
        $('#title-modal').html('Thêm quyền');
        $('#myModal').modal();
        document.getElementById('permission_id').value = '';
        document.getElementById('name').value = '';
        document.getElementById('SanPham').checked = true;
        document.getElementById('QSanPham').value = 'xemSanPham';        
        document.getElementById('Quyen').checked = true;
        document.getElementById('QQuyen').value = 'xemQuyen';        
        document.getElementById('NhanVien').checked = true;
        document.getElementById('QNhanVien').value = 'xemNhanVien';        
        document.getElementById('KhachHang').checked = true;
        document.getElementById('QKhachHang').value = 'xemKhachHang';        
        document.getElementById('NCC').checked = true;
        document.getElementById('QNCC').value = 'xemNCC';
        document.getElementById('HoaDon').checked = true;
        document.getElementById('QHoaDon').value = 'xemHoaDon';
        document.getElementById('NhapHang').checked = true;
        document.getElementById('QNhapHang').value = 'xemNhapHang';
        document.getElementById('Maketing').checked = true;
        document.getElementById('QMaketing').value = 'xemMaketing';
        document.getElementById('Support').checked = true;
        document.getElementById('QSupport').value = 'xemSupport';
        document.getElementById('ThongKe').checked = true;
        document.getElementById('QThongKe').value = 'xemThongKe';

        changecheck('NhapHang');
        changecheck('Quyen');
        changecheck('NhanVien');
        changecheck('KhachHang');
        changecheck('NCC');
        changecheck('HoaDon');
        changecheck('NhapHang');
        changecheck('Maketing');
        changecheck('Support');
        changecheck('ThongKe');
        $('#button_submit').html('Thêm');
        $('#button_submit').attr('onclick', 'SubmitThemQuyen()');
    }

    function SubmitThemQuyen(){
        var permission_id = parseInt($('#permission_id').val());
        var name = $('#name').val();
        var details = '';
        if(document.getElementById('SanPham').checked){
            details += document.getElementById('QSanPham').value + '-';
        }                
        if(document.getElementById('Quyen').checked){
            details += document.getElementById('QQuyen').value + '-';
        }        
        if(document.getElementById('NhanVien').checked){
            details += document.getElementById('QNhanVien').value + '-';
        }        
        if(document.getElementById('KhachHang').checked){
            details += document.getElementById('QKhachHang').value + '-';
        }        
        if(document.getElementById('NCC').checked){
            details += document.getElementById('QNCC').value + '-';
        }        
        if(document.getElementById('HoaDon').checked){
            details += document.getElementById('QHoaDon').value + '-';
        }        
        if(document.getElementById('NhapHang').checked){
            details += document.getElementById('QNhapHang').value + '-';
        }
        if(document.getElementById('Maketing').checked){
            details += document.getElementById('QMaketing').value + '-';
        }
        if(document.getElementById('Support').checked){
            details += document.getElementById('QSupport').value + '-';
        }
        if(document.getElementById('ThongKe').checked){
            details += document.getElementById('QThongKe').value + '-';
        }
        details = details.substring(0, details.length - 1);
        const admincode = getchangevalue('SanPham')+ '-'+
                    getchangevalue('Quyen')+ '-'+
                    getchangevalue('NhanVien')+ '-'+
                    getchangevalue('KhachHang')+ '-'+
                    getchangevalue('NCC')+ '-'+
                    getchangevalue('HoaDon')+ '-'+
                    getchangevalue('NhapHang')+ '-'+
                    getchangevalue('Maketing')+ '-'+
                    getchangevalue('Support')+ '-'+
                    getchangevalue('ThongKe');
        console.log(admincode)
        $.ajax({
                    type: 'POST',
                url: './index.php',
                data: {
                action: "addPermission",
                name: name,
                details: details,
                admincode: admincode
                },
                success: (responseText) => {
                    Swal.fire({
                        type: 'success',
                        title: 'Thêm Quyền thành công',
                        html: responseText
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