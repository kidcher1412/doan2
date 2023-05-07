<?php
        if($typeview>13){
            include "./page/permission404.php";
            // echo 'Không Đủ Thẩm Quyền Truy Cập';
            include "./page/footer.php";
            exit();
        }
        if($typeview==1) ;
        else{
            if($typeview==3) $checkpoint = 2;
            if($typeview==4) $checkpoint = 2;
            if($typeview!=3||$typeview!=4)
                $checkpoint =  $typeview-2;
            if($permissionList[$checkpoint]['valueread']=='0'){
                include "./page/permission404.php";
                // echo 'Không Đủ Thẩm Quyền Truy Cập';
                include "./page/footer.php";
                exit();
            }
        }
    if($typeview==1){
        $sex_Nam = $AdminData["sex"] == "Nam"? "checked":"";
        $sex_Nu = $AdminData["sex"] == "Nu"? "checked":"";
        echo "
        <div class='content'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-md-8'>
                        <div class='card'>
                            <div class='header'>
                                <h4 class='title'>Sửa thông tin cá nhân</h4>
                            </div>
                            <div class='content'>
                                <form action='/Admin/User/Index' method='POST'>
                                    
                                    <div class='row'>
                                        <div class='col-md-5'>
                                            <div class='form-group'>
                                                <label>Tài khoản</label>
                                                <input type='text' class='form-control' placeholder='Tài khoản' data-val='true' data-val-length='T&#xE0;i kho&#x1EA3;n t&#x1EEB; 3 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;' data-val-length-max='25' data-val-length-min='3' data-val-regex='T&#xE0;i kho&#x1EA3;n ph&#x1EA3;i b&#x1EAF;t &#x111;&#x1EA7;u b&#x1EB1;ng ch&#x1EEF;' data-val-regex-pattern='^[a-zA-Z][\w]{1,}' data-val-required='T&#xE0;i kho&#x1EA3;n b&#x1EAF;t bu&#x1ED9;c' id='NV_user' maxlength='25' name='NV.user' value='".$AdminData["user"]."'>
                                                <span class='field-validation-valid' data-valmsg-for='NV.user' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                        <div class='col-md-3'>
                                            <div class='form-group'>
                                                <label>Mật khẩu</label>
                                                <input type='password' class='form-control' placeholder='Mật khẩu' data-val='true' data-val-length='M&#x1EAD;t kh&#x1EA9;u t&#x1EEB; 4 &#x111;&#x1EBF;n 25 k&#xED; t&#x1EF1;' data-val-length-max='25' data-val-length-min='4' data-val-required='M&#x1EAD;t kh&#x1EA9;u l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_pass' maxlength='25' name='NV.pass' value=".$AdminData["pass"].">
                                                <span class='field-validation-valid' data-valmsg-for='NV.pass' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                        <div class='col-md-3'>
                                            <div class='form-group'>
                                                <label>Nhập lại mật khẩu</label>
                                                <input type='password' class='form-control' placeholder='Nhập lại mật khẩu' data-val='true' data-val-equalto='Nh&#x1EAD;p l&#x1EA1;i m&#x1EAD;t kh&#x1EA9;u kh&#xF4;ng kh&#x1EDB;p v&#x1EDB;i m&#x1EAD;t kh&#x1EA9;u &#x111;&#xE3; nh&#x1EAD;p' data-val-equalto-other='*.pass' id='NV_repass' name='NV.repass' value=".$AdminData["pass"].">
                                                <span class='field-validation-valid' data-valmsg-for='NV.repass' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label>Họ và tên</label>
                                                <input type='text' class='form-control' placeholder='Họ và tên' data-val='true' data-val-length='H&#x1ECD; t&#xEA;n t&#x1EEB; 4 &#x111;&#x1EBF;n 100 k&#xED; t&#x1EF1;' data-val-length-max='100' data-val-length-min='4' data-val-required='H&#x1ECD; t&#xEA;n l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_full_name' maxlength='100' name='NV.full_name' value='".$AdminData["full_name"]."'>
                                                <span class='field-validation-valid' data-valmsg-for='NV.full_name' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label>Số điện thoại</label>
                                                <input type='text' class='form-control' placeholder='Số điện thoại' data-val='true' data-val-regex='S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i ph&#x1EA3;i l&#xE0; s&#x1ED1; v&#xE0; d&#xE0;i t&#x1EEB; 10 &#x111;&#x1EBF;n 11' data-val-regex-pattern='^([\d]{10,11})' data-val-required='S&#x1ED1; &#x111;i&#x1EC7;n tho&#x1EA1;i l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_phone' name='NV.phone' value='".$AdminData["phone"]."'>
                                                <span class='field-validation-valid' data-valmsg-for='NV.phone' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <div class='form-group'>
                                                <label>Địa chỉ</label>
                                                <input type='text' class='form-control' placeholder='Địa chỉ' data-val='true' data-val-required='&#x110;&#x1ECB;a ch&#x1EC9; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_address' name='NV.address' value='".$AdminData["address"]."'>
                                                <span class='field-validation-valid' data-valmsg-for='NV.address' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Thư điện tử</label>
                                                <input type='text' class='form-control' placeholder='Thư điện tử' data-val='true' data-val-email='Th&#x1B0; &#x111;i&#x1EC7;n t&#x1EED; kh&#xF4;ng ph&#xF9; h&#x1EE3;p' data-val-required='Th&#x1B0; &#x111;i&#x1EC7;n t&#x1EED; l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_mail' name='NV.mail' value='".$AdminData["mail"]."'>
                                                <span class='field-validation-valid' data-valmsg-for='NV.mail' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Ngày sinh</label>
                                                <input type='date' class='form-control' placeholder='Ngày sinh' data-val='true' data-val-required='Ng&#xE0;y sinh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_dateborn' name='NV.dateborn' value='".date_format(date_create($AdminData["dateborn"]), "Y-m-d")."'>
                                                <span class='field-validation-valid' data-valmsg-for='NV.dateborn' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='form-group'>
                                                <label>Giới tính</label>
                                                <div class='form-check-inline'>
                                                    <label class='form-check-label'>
                                                        <input $sex_Nam data-val='true' data-val-required='Gi&#x1EDB;i t&#xED;nh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_sex' name='NV.sex' style='width:63%;' type='radio' value='Nam' /> Nam
                                                    </label>
                                                </div>
                                                
                                                <div class='form-check-inline'>
                                                    <label class='form-check-label'>
                                                        <input $sex_Nu id='NV_sex' name='NV.sex' type='radio' value='N&#x1EEF;' /> Nữ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='row' style='display: none;'>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label>Mã quyền</label>
                                                <input type='text' class='form-control' placeholder='Mã quyền' readonly data-val='true' data-val-required='M&#xE3; quy&#x1EC1;n l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_permission_id' name='NV.permission_id' value='1'>
                                                <span class='field-validation-valid' data-valmsg-for='NV.permission_id' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                        <div class='col-md-6'>
                                            <div class='form-group'>
                                                <label>Trạng thái</label>
                                                <input type='text' class='form-control' placeholder='Trạng thái' readonly data-val='true' data-val-regex='Tr&#x1EA1;ng th&#xE1;i l&#xE0; 1 ho&#x1EB7;c 0' data-val-regex-pattern='(1|0)/g' data-val-required='Tr&#x1EA1;ng th&#xE1;i l&#xE0; b&#x1EAF;t bu&#x1ED9;c' id='NV_status' name='NV.status' value='1'>
                                                <span class='field-validation-valid' data-valmsg-for='NV.status' data-valmsg-replace='true'></span>
                                            </div>
                                        </div>
                                    </div>

                                    <button type='submit' class='btn btn-info btn-fill pull-right'>Sửa thông tin</button>
                                    <div class='clearfix'></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-4'>
                        <div class='card card-user'>
                            <div class='image'>
                                <img src='https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400' alt='...'/>
                            </div>
                            <div class='content'>
                                <div class='author'>
                                     <a href='#'>
                                    <img class='avatar border-gray' src='./assets/img/faces/face-3.jpg' alt='...'/>

                                      <h4 class='title'>".$AdminData["full_name"]."<br />
                                         
                                      </h4>
                                    </a>
                                </div>
                                <p class='description text-center'> ".$AdminData["name"]."
                                </p>
                            </div>
                            <hr>
                            <div class='text-center'>
                                <button href='#' class='btn btn-simple'><i class='fa fa-facebook-square'></i></button>
                                <button href='#' class='btn btn-simple'><i class='fa fa-twitter'></i></button>
                                <button href='#' class='btn btn-simple'><i class='fa fa-google-plus-square'></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        ";
    }
    if($typeview==2){
        echo "
        <div class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='product_id'>Tìm theo mã sản phẩm</option>
                                        <option value='name'>Tìm theo tên sản phẩm</option>
                                        <option value='product_type_id'>Tìm theo mã loại sản phẩm</option>
                                        <option value='brand_id'>Tìm theo mã thương hiệu sản phẩm</option>
                                        <option value='price'>Tìm theo giá</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>
                                    ";
                                    if($permissionList[$checkpoint]['valueadd']!='0')
                                        echo "<input type='button' value='Thêm sản phẩm' style='float: right;' onclick='AddSP()'/>"; 
                                    echo "
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
                                <thead>
                                <th>Mã</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Mã loại</th>
                                <th>Mã thương hiệu</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Mô tả</th>
                                <th>Cách sử dụng</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody id='suasp1'>
                                    ";
                                
                                foreach ($ProductData as $value) {
                                    $words = explode(" ", $value["description"]);
                                    $limitedWords = array_slice($words, 0, 15);
                                    $valuedescription=implode(" ", $limitedWords) . "...";
                                    $words = explode(" ", $value["use"]);
                                    $limitedWords = array_slice($words, 0, 15);
                                    $valueuse=implode(" ", $limitedWords) . "...";
                                    $status = $value["status"] == "1"? "Còn Bán":"Hết Bán";
                                    echo "
                                    <tr>
                                    <td>".$value["product_id"]."</td>
                                    <td style='width: 80px; height: 80px;'><img src='".$value["img"]."' style='width: 100%; height: 100%;'></td>
                                    <td>".$value["name"]."</td>
                                    <td>".$value["product_type_id"]."</td>
                                    <td>".$value["brand_id"]."</td>
                                    <td>".$value["amount"]."</td>
                                    <td>".$value["price"]."</td>
                                    <td title='".$value["description"]."'>".$valuedescription."</td>
                                    <td title='".$value["use"]."'>".$valueuse."</td>
                                        <td>$status</td>
                                    <td>
                                        ";
                                        if($permissionList[$checkpoint]['valueedit']!='0')
                                            echo "<button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditSP(".$value["product_id"].")'><i class='pe-7s-config'></i></button>";
                                        if($permissionList[$checkpoint]['valuedelete']!='0'){
                                            echo "
                                            <button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Trash' onclick='";
                                                echo $value["status"] == 1? "RemoveSP(".$value["product_id"].")":"BackSP(".$value["product_id"].")";
                                            echo "'><i class='";
                                                echo $value["status"] == 1? "pe-7s-lock":"pe-7s-unlock";
                                            echo"'></i></button>
                                    </td>
                                </tr>
                                    ";
                                        }
                                }
                                echo    "
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        ";
    }
    if($typeview==3){
        echo "
        <div class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='product_type_id'>Tìm theo mã loại sản phẩm</option>
                                        <option value='name'>Tìm theo tên loại sản phẩm</option>
                                        <option value='description'>Tìm theo mô tả loại sản phẩm</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>
                                    ";
                                    if($permissionList[$checkpoint]['valueadd']!='0')
                                        echo "<input type='button' value='Thêm loại sản phẩm' style='float: right;' onclick='ThemLSP()'/>";
                                    echo "
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
                                <thead>
                                <th>Mã loại</th>
                                <th>Tên loại</th>
                                <th>Mô tả</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody id='sualsp1'>
";
            foreach ($TypeData as $value) {
                echo "
                <tr>
                <td>".$value["product_type_id"]."</td>
                <td>".$value["name"]."</td>
                <td>".$value["description"]."</td>
                <td>
                ";
                if($permissionList[$checkpoint]['valueedit']!='0')
                    echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditLSP(".$value["product_type_id"].")'><i class='pe-7s-config'></i></button>";
                if($permissionList[$checkpoint]['valuedelete']!='0'){
                    echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveLSP(".$value["product_type_id"].")'><i class='pe-7s-trash'></i></button>";
                }
                echo "
                </td>
            </tr>
                ";
            }
  echo "                                  
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        ";

    }
    if($typeview==4){
        echo "
        <div class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='brand_id'>Tìm theo mã thương hiệu</option>
                                        <option value='name'>Tìm theo tên thương hiệu</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>
                                    ";
                                    if($permissionList[$checkpoint]['valueadd']!='0')
                                        echo "<input type='button' value='Thêm thương hiệu' style='float: right;' onclick='ThemTH()'/>";
                                    echo "
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
                                <thead>
                                <th>Mã</th>
                                <th>Tên thương hiệu</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody id='suath1'>
";
            foreach ($BrainData as $value) {
                echo "
                <tr>
                <td>".$value["brand_id"]."</td>
                <td>".$value["name"]."</td>
                <td>";
                if($permissionList[$checkpoint]['valueedit']!='0')
                    echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditBrand(".$value["brand_id"].")'><i class='pe-7s-config'></i></button>";
                if($permissionList[$checkpoint]['valuedelete']!='0')
                    echo " <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='RemoveBrand(".$value["brand_id"].")'><i class='pe-7s-trash'></i></button>";
                echo"
                </td>
            </tr>
                ";
            }
echo "

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


                

            </div>
        </div>
    </div>
        ";
    }
    if($typeview==5){
        echo "
        <div class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='permission_id'>Tìm theo mã quyền</option>
                                        <option value='name'>Tìm theo tên quyền</option>
                                        <option value='details'>Tìm theo chi tiết quyền</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>
                                    ";
                                    if($permissionList[$checkpoint]['valueadd']!='0')
                                        echo "<input type='button' value='Thêm quyền' style='float: right;' onclick='ThemQuyen()'/>";
                                    echo "
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
                                <thead>
                                <th>Mã quyền</th>
                                <th>Tên quyền</th>
                                <th>Chi tiết quyền</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody id='suaquyen1'>
";
                foreach ($PermissionData as $value) {
                    echo "
                    <tr>
                    <td>".$value["permission_id"]."</td>
                    <td>".$value["name"]."</td>
                    <td>".$value["details"]."</td>
                    <td>
                    ";
                        if($permissionList[$checkpoint]['valueedit']!='0')
                        echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditQuyen(".$value["permission_id"].")'><i class='pe-7s-config'></i></button>";
                    echo "
                    </td>
                </tr>
                    ";
                }
                echo "
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        ";
    }
        if($typeview==6){
        echo "
        <div class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='user_id'>Tìm theo Mã Nhân Viên tài khoản</option>
                                        <option value='permission_id'>Tìm theo Mã Quyền</option>
                                        <option value='user'>Tìm theo tài khoản</option>
                                        <option value='full_name'>Tìm theo họ tên</option>
                                        <option value='phone'>Tìm theo số điện thoại</option>
                                        <option value='mail'>Tìm theo thư điện tử</option>
                                        <option value='address'>Tìm theo địa chỉ</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>
                                    ";
                                    if($permissionList[$checkpoint]['valueadd']!='0'){
                                        echo "<input type='button' value='Thêm nhân viên' style='float: right;' onclick='ThemNV()'/>";
                                    }
                                    echo "
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
                                <thead>
                                <th>ID</th>
                                <th>Tài khoản</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Thư điện tử</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Mã quyền</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody id='suanv1'>
";
            foreach ($StaffData as $value) {
                $status = $value["status"] ==1 ? "Đang Làm":"Nghỉ Làm";
               echo "
               <tr>
               <td>".$value["nv_user_id"]."</td>
               <td>".$value["user"]."</td>
               <td>".$value["full_name"]."</td>
               <td>".$value["phone"]."</td>
               <td>".$value["mail"]."</td>
               <td>".$value["address"]."</td>
               <td>".$value["sex"]."</td>
               <td>".$value["dateborn"]."</td>
               <td>".$value["permission_id"]."</td>
                <td>$status</td>
               <td>";
               if($permissionList[$checkpoint]['valueedit']!='0')
                echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditNV(".$value["user_id"].")'><i class='pe-7s-config'></i></button>";
                if($permissionList[$checkpoint]['valuedelete']!='0'){
                    echo "
                    <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='";
                    echo $value["status"] == 1? " RemoveNV(".$value["user_id"].")":"BackNV(".$value["user_id"].")";
                echo "'><i class='";
                    echo $value["status"] == 1? "pe-7s-lock":"pe-7s-unlock";
                echo"'></i></button>";
                }
                   echo "
               </td>
           </tr>
               ";
            }
        echo "

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        ";
    }
    if($typeview==7){
        echo "
        <div class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='kh_user_id'>Tìm theo Mã Khách Hàng tài khoản</option>
                                        <option value='user'>Tìm theo tên tài khoản</option>
                                        <option value='full_name'>Tìm theo họ tên</option>
                                        <option value='phone'>Tìm theo số điện thoại</option>
                                        <option value='mail'>Tìm theo thư điện tử</option>
                                        <option value='address'>Tìm theo địa chỉ</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>
                                    ";
                                    if($permissionList[$checkpoint]['valueadd']!='0')
                                        echo "<input type='button' value='Thêm Tài Khoản' style='float: right;' onclick='AddKH()'/>";
                                    echo "
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
                                <thead>
                                <th>ID</th>
                                <th>Tài khoản</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Thư điện tử</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody id='suakh1'>
";
            foreach ($KHData as $value) {
                $status = $value["status"] == 1 ? "Hoạt Động": "Tạm Khóa";
                echo "
                <tr>
                <td>".$value["kh_user_id"]."</td>
                <td>".$value["user"]."</td>
                <td>".$value["full_name"]."</td>
                <td>".$value["phone"]."</td>
                <td>".$value["mail"]."</td>
                <td>".$value["address"]."</td>
                <td>".$value["sex"]."</td>
                <td>".$value["dateborn"]."</td>
                    <td>$status</td>
                <td>
        
                    ";
                    if($permissionList[$checkpoint]['valueedit']!='0')
                        echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditKH(".$value["user_id"].")'><i class='pe-7s-config'></i></button>";
                    if($permissionList[$checkpoint]['valueedit']!='0'){
                        echo"
                        <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='";
                        echo $value["status"] == 1? " RemoveKH(".$value["user_id"].")":"BackKH(".$value["user_id"].")";
                    echo "'><i class='";
                        echo $value["status"] == 1? "pe-7s-lock":"pe-7s-unlock";
                        echo "'></i></button>";
                    }
                    
                    echo"
                </td>
            </tr>
                ";
            }
            echo "
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
        }

    if($typeview==8){
        echo "
        <div class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='ncc_id'>Tìm theo mã nhà cung cấp</option>
                                        <option value='name'>Tìm theo tên nhà cung cấp</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>";
                                    if($permissionList[$checkpoint]['valueadd']!='0')
                                        echo "<input type='button' value='Thêm nhà cung cấp' style='float: right;' onclick='ThemNCC()'/>";
                                    echo "
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
                                <thead>
                                <th>Mã NCC</th>
                                <th>Tên NCC</th>
                                <th>Địa Chỉ</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody id='suancc1'>
";
            foreach ($NCCData as $value) {
                $status = $value["status"] == 1 ? "Còn Hợp Tác":"Tạm Không Hợp Tác";
                echo "
                <tr>
                <td>".$value["ncc_id"]."</td>
                <td>".$value["name"]."</td>
                <td>".$value["address"]."</td>
                    <td>$status</td>
                <td>";
                if($permissionList[$checkpoint]['valueedit']!='0')
                    echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditNCC(".$value["ncc_id"].")'><i class='pe-7s-config'></i></button>";
                if($permissionList[$checkpoint]['valuedelete']!='0'){
                    echo"
                    <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='";
                    echo $value["status"] == 1? "RemoveNCC(".$value["ncc_id"].")":"BackNCC(".$value["ncc_id"].")";
                echo "'><i class='";
                    echo $value["status"] == 1? "pe-7s-lock":"pe-7s-unlock";
                echo"'></i></button>";
                }
                echo "
                </td>
            </tr>
                ";
            }
            echo "
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        ";
        }
    if($typeview==9){
        echo "
        <div class='content'>
            <div class='card-tools flex'>
                <span>Ngày Bắt Đầu</span>
                <input type='date' class='form-control' id='datezoneMin' placeholder='Ngày Bắt Đầu' data-val='true' data-val-required='Ng&#xE0;y sinh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='product.timemin' value=''>
                <span>Ngày Kết Thúc</span>
                <input type='date' class='form-control' id='datezoneMax' placeholder='Ngày Bắt Kết Thúc' name='product.timemax' value=''>
                <input type='button' class='btn btn-tool btn-sm' value='Lọc Hóa Đơn' onclick='filterbill()'>
            </div>
        <div class='container-fluid'>

            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='bill_id'>Tìm theo mã hóa đơn</option>
                                        <option value='user_kh'>Tìm theo mã khách hàng</option>
                                        <option value='user_nv'>Tìm theo mã nhân viên</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>
                                    <select style='height: 30px; float: right' id='select_trangthai' onchange='TimKiem()'>
                                        <option value='0'>Tất cả</option>
                                        <option value='1'>Đang xử lý</option>
                                        <option value='2'>Đang giao hàng</option>
                                        <option value='3'>Đã giao hàng</option>
                                        <option value='4'>Đã hủy đơn hàng</option>
                                    </select>
                                    <span style='float: right; margin-right: 2%;'>Trạng thái: </span>
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
";
        if($BillData!=false){
            foreach ($BillData as $value) {
                if($value["status"] == 1){
                    $status = "Chờ Xử Lý";
                }
                if($value["status"] == 2){
                    $status = "Đã Xử Lý Hàng, Chờ Giao Hàng";
                }
                if($value["status"] == 3){
                    $status = "Đã Giao Hàng";
                }
                if($value["status"] == 4){
                    $status = "Đã Hủy Hàng, Trả Hàng cho Nhà Cung Cấp";
                }
                $viewedit="";
                if($value["status"]>=3)
                    $viewedit="<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditHD(".$value["bill_id"].")'><i class='pe-7s-config'></i></button>";
                $view = "
                <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='ViewCTHD(".$value["bill_id"].")'><i class='pe-7s-look'></i></button>
                ";
                echo "
                <thead>
                <th>Mã hóa đơn</th>
                <th>Mã khách hàng</th>
                <th>Mã nhân viên</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>                                
                <th>Ngày đặt</th>
                <th>Ngày nhận</th>
                <th>Thành tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
                </thead>
                <tbody id='suahd1'> 
                <tr>
                <td>".$value["bill_id"]."</td>
                <td>".$value["user_kh"]."</td>
                <td>".$value["user_nv"]."</td>
                <td>".$value["phone"]."</td>
                <td>".$value["address"]."</td>
                <td>".$value["date_order"]."</td>
                <td>".$value["date_receice"]."</td>
                <td>".number_format($value["total"], 0, ",", ".") . " đ"."</td>
                <td>$status</td>
                
                <td>
                    ";
                    if($permissionList[$checkpoint]['valueedit']!='0'&&$value["status"]<3)
                        echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditHD(".$value["bill_id"].")'><i class='pe-7s-config'></i></button>";
                    echo "
                        <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='ViewCTHD(".$value["bill_id"].")'><i class='pe-7s-look'></i></button>
                </td>
            </tr>
                ";
            }
        }
        else
            echo "Không có Hóa Đơn";
            echo "
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


                <div class='col-md-12'>
                    <div class='card card-plain'>
                        <div class='header'>
                            <h4 class='title' id='id_cthd'>Chi tiết hóa đơn</h4>
                            <p class='title' id='id_thanhtien'>Thành tiền: </p>
                        </div>
                        <div class='content table-responsive table-full-width'>
                            <table class='table table-hover'>
                                <thead>
                                    <th>Mã sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Thương Hiệu</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </thead>
                                <tbody id='suacthd1'>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
        let today = new Date();
        let year = today.getFullYear();
        let month = today.getMonth() + 1;
        let day = today.getDate();

        if (month < 10) {
            month = '0' + month;
        }
        
        if (day < 10) {
            day = '0' + day;
        }
        
        let todayes = year + '-' + month + '-' + day;
        document.querySelector('#datezoneMax').value = todayes;
        document.querySelector('#datezoneMin').value = year+'-01-01';
        function filterbill() {
            $.ajax({
                type: 'POST',
                url: './index.php',
                data:{
                    action: 'getAllBill',
                },
                success: function(responseText) {
                    let data = JSON.parse(responseText);
                    data = data.filter(order => {
                        const daymax = document.querySelector('#datezoneMax').value;
                        const daymin = document.querySelector('#datezoneMin').value;
                        const date = new Date(order.date_order.split('-').reverse().join('-'));
                            return date > new Date(daymin) && date <= new Date(daymax); // So sánh các giá trị ngày
                    });
                    document.getElementById('suahd1').innerHTML='';
                    if (data.length>0)
                        data.forEach(element => {
                            var status;
                            const total = parseInt(element.total).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                            if(element.user_nv==null) element.user_nv='';
                            switch (element.status) {
                                case '1':
                                    status='Chờ Xử Lý'
                                    break;
                                case '2':
                                    status = 'Đã Xử Lý Hàng, Chờ Giao Hàng';
                                    break;
                                case '3':
                                    status = 'Đã Giao Hàng';
                                    break;
                                case '4':
                                    status = 'Đã Hủy Hàng, Trả Hàng cho Nhà Cung Cấp';
                                    break;
                                default:
                                    break;
                            }
                            document.getElementById('suahd1').innerHTML+=`
                            <tr>
                                <td>`+element.bill_id+`</td>
                                <td>`+element.user_kh+`</td>
                                <td>`+element.user_nv+`</td>
                                <td>`+element.phone+`</td>
                                <td>`+element.address+`</td>
                                <td>`+element.date_order+`</td>
                                <td>`+element.date_receice+`</td>
                                <td>`+total+`</td>
                                <td>`+status+`</td>
                                
                                <td>
                                    <button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Edit' data-target='#myModal' onclick='EditHD(3)'><i class='pe-7s-config'></i></button>
                                        <button data-toggle='tooltip' title=' class='pd-setting-ed' data-original-title='Trash' onclick='ViewCTHD(3)'><i class='pe-7s-look'></i></button>
                                </td>
                            </tr>
                            `
                        });
                }
            })
        }
    </script>   
    ";
    }
    if($typeview==10){
        echo "
        <div class='content'>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <form class='title' onsubmit='return false;'>
                                <p>
                                    <select style='height: 30px;' id='select'>
                                        <option value='all'>Tất cả</option>
                                        <option value='bill_id'>Tìm theo mã Phiếu</option>
                                        <option value='user_nv'>Tìm theo mã nhân viên</option>
                                    </select>
                                    <input type='text' style='height: 30px;' id='input_search'/>
                                    <input type='button' value='Tìm kiếm' style='height: 30px;' onclick='TimKiem()'/>
                                    <select style='height: 30px; float: right' id='select_trangthai' onchange='TimKiem()'>
                                        <option value='0'>Tất cả</option>
                                        <option value='1'>Đang xử lý</option>
                                        <option value='2'>Đang giao hàng</option>
                                        <option value='3'>Đã giao hàng</option>
                                        <option value='4'>Đã hủy đơn hàng</option>
                                    </select>
                                    <span style='float: right; margin-right: 2%;'>Trạng thái: </span>
                                </p>
                            </form>
                        </div>
                        <div class='content table-responsive table-full-width' id='id1'>
                            <table class='table table-hover table-striped'>
                                <thead>
                                <th>Mã Phiếu    </th>
                                <th>Mã Nhà Cung Cấp</th>
                                <th>Mã Sản Phẩm</th>
                                <th>Số Lượng</th>                           
                                <th>Ngày Lập Phiếu</th>
                                <th>Ngày Nhập Hàng</th>
                                <th>Thành tiền</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody id='suahd1'> ";
                                //danh sách phiếu nhập
                                
                                echo "
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


                <div class='col-md-12'>
                    <div class='card card-plain'>
                        <div class='header'>
                            <h4 class='title' id='id_cthd'>Chi tiết Phiếu Nhập</h4>
                            <p class='title' id='id_thanhtien'>Thành tiền: </p>
                        </div>
                        <div class='content table-responsive table-full-width'>
                            <table class='table table-hover'>
                                <thead>
                                    <th>Mã sản phẩm</th>
                                    <th>Mã NCC</th>
                                    <th>Mã Nhân Viên Trực Kí</th>
                                    <th>Đơn Giá</th>
                                    <th>Số lượng</th>
                                    <th>Số tiền</th>
                                </thead>
                                <tbody id='suacthd1'>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>";
    }
    if ($typeview == 11) {
        echo "
            <div class='content'>
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='card'>
                            <div class='header'>
                                <form class='title' onsubmit='return false;'>
                                    <p>
                                            <input type='button' value='Thêm Heros' style='float: right;' onclick='ThemHero()'/>
                                    </p>
                                </form>
                            </div>
                            <div class='content table-responsive table-full-width' id='id1'>
                                <table class='table table-hover table-striped'>
                                    <thead>
                                    <th>Mã Heros</th>
                                    <th>Sologent Heros</th>
                                    <th>Hình ảnh</th>
                                    <th>Đường Dẫn Hình Ảnh</th>
                                    <th>Hành Động</th>
                                    </thead>
                                    <tbody id='suahd1'> ";
        //danh sách Heros
        foreach ($herosData as $value) {
            echo "
                                        <tr>
                                        <td>" . $value["id_hero"] . "</td>
                                        <td>" . $value["slogent"] . "</td>
                                        <td><img src='" . $value["img"] . "' style='width: 55px; height: 55px;;oject-fit: conver;object-fit: cover;background-position: center;'></td>
                                        <td>" . $value["img"] . "</td>
                                        <td>
                                        ";
            if ($permissionList[$checkpoint]['valueedit'] != '0')
                echo "<button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Edit' data-toggle='modal' data-target='#myModal' onclick='EditHero(" . $value["id_hero"] . ")'><i class='pe-7s-config'></i></button>";
            if ($permissionList[$checkpoint]['valuedelete'] != '0')
                echo "
                                            <button data-toggle='tooltip' title='' class='pd-setting-ed' data-original-title='Trash' onclick='removeHero(" . $value["id_hero"] . ")'><i class='pe-7s-lock'></i></button>";
            echo "
                                        </td>
                                    </tr>
                                        ";
        }
        echo "
                                    </tbody>
                                </table>
    
                            </div>
                        </div>
                    </div>
    
    
                </div>
            </div>
        </div>";
    }
    if ($typeview == 12)
        echo 'trang Hỗ trợ khách hàng';
    if ($typeview == 13)
        include './page/test.php';
?>

