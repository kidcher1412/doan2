<?php 
    class AdminController{
        public function index(){
            $typeview = empty($_GET["typeview"])? 1: $_GET["typeview"];
            $admin = Session::get("ID_ADMIN_login");
            $user = new Admin();

            // $StaffLogin = $user->getStaff_ByID($admin);
            // // echo json_encode($StaffLogin['details']);
            // $permissionString =  $StaffLogin['details'];
            // // Tạo mảng chứa danh sách các chuỗi cần kiểm tra
            // $permissionList = array('NhapHang','NhanVien','SanPham','HoaDon','KhachHang','PhieuNhap','NCC','TaiKhoan','Quyen','ThongKe','LoaiSanPham','ThuongHieu');

            // // Chuyển chuỗi $permissionString thành mảng
            // $permissions = explode("-", $permissionString);
            // // Tạo mảng chứa kết quả
            // $acceptPermission = array();

            // // Lặp qua từng phần tử trong danh sách các chuỗi cần kiểm tra
            // foreach ($permissionList as $key => $value) {
            //     // Nếu chuỗi $value có trong mảng $permissions thì gán giá trị 1 vào mảng $acceptPermission
            //     foreach ($permissions as $value1) {
            //         if(strpos($value1, $value)){
            //             $acceptPermission[$key] = 1;
            //             break;
            //         }
            //         else
            //             $acceptPermission[$key] = 0;
            //     }
            // }
            // echo json_encode($acceptPermission);
            // các định danh quyền để xet : $acceptPermission[key] với:
            //     1 = NhapHang
            //     2 = NhanVien
            //     3 = SanPham
            //     4 = HoaDon
            //     5 = KhachHang
            //     6 = PhieuNhap
            //     7 = NCC
            //     8 = TaiKhoan
            //     9 = Quyen
            //     10 = ThongKe
            //     11 = LoaiSanPham
            //     12 = ThuongHieu
            $AdminData = $user->getAdminLogin($admin);
            $ProductData = $user->getProduct();
            $TypeData = $user->getType();
            $BrainData = $user->getBrand();
            $PermissionData = $user->getPermission();
            $KHData = $user->getKH();
            $NCCData = $user->getNCC();
            $StaffData = $user->getStaff();
            $BillData = $user->getBill();
            $permissionList = $user->getPermissionManager_ByIDUser();
            $herosData = $user->getHeros();

            // echo json_encode($AdminData);
            include "./page/header.php";
            Session::checkLogin_BlockADMIN($AdminData);
            include "./page/nav.php";
            include "./view.php";
            include "./page/footer.php";
        }
        public function login(){
            include "./login.php";
        }
        public function renderView($typeView){
            $user = new Admin();
            $admin = Session::get("ID_ADMIN_login");
            $ProductData = $user->getProduct();
            $AdminData = $user->getAdminLogin($admin);
            $ProductData = $user->getProduct();
            $TypeData = $user->getType();
            $BrainData = $user->getBrand();
            $PermissionData = $user->getPermission();
            $KHData = $user->getKH();
            $NCCData = $user->getNCC();
            $StaffData = $user->getStaff();
            $BillData = $user->getBill();
            $typeview = $typeView;
            include "./page/nav.php";
            include "./view.php";
        }
        public function getProduct($product_id){
            $user = new Admin();
            echo json_encode($user->getProduct_ByID($product_id));
        }
        public function getAllProduct(){
            $user = new Admin();
            echo json_encode($user->getProduct());
        }
        public function addProduct($product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img){
            $user = new Admin();
            $ProductgetData = $user->addProduct($product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img);
        }
        public function editProduct($product_id,$product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img){
            $user = new Admin();
            $ProductgetData = $user->editProduct($product_id,$product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img);
        }
        public function removeProduct($product_id){
            $user = new Admin();
            $ProductgetData = $user->removeProduct($product_id);
        }
        public function backProduct($product_id){
            $user = new Admin();
            $ProductgetData = $user->backProduct($product_id);
        }
        public function getType_ByID($type_id){
            $user = new Admin();
            echo json_encode($user->getType_ByID($type_id));
        }
        public function getAllType(){
            $user = new Admin();
            echo json_encode($user->getType());
        }
        public function addType($name,$description){
            $user = new Admin();
            $ProductgetData = $user->addType($name,$description);

        }
        public function editType($type_id, $name,$description){
            $user = new Admin();
            $ProductgetData = $user->editType($type_id,$name,$description);

        }
        public function removeType($type_id){
            $user = new Admin();
            $ProductgetData = $user->removeType($type_id);

        }
        public function getBrand_ByID($brand_id){
            $user = new Admin();
            echo json_encode($user->getBrand_ByID($brand_id));

        }
        public function getAllBrand(){
            $user = new Admin();
            echo json_encode($user->getBrand());

        }
        public function addBrand($name){
            $user = new Admin();
            echo json_encode($user->addBrand($name));

        }
        public function editBrand($brand_id, $name){
            $user = new Admin();
            echo json_encode($user->editBrand($brand_id, $name));

        }
        public function removeBrand($brand_id){
            $user = new Admin();
            echo json_encode($user->removeBrand($brand_id));

        }


        public function uploadImage($file){
            $user = new Admin();
            $ProductgetData = $user->uploadImage($file);
            // echo json_encode($ProductgetData);
        }
        // permission - stack
        public function getPermission_ByID($permission_id){
            $user = new Admin;
            $permissiongetData = $user->getPermission_ByID($permission_id);
            echo json_encode($permissiongetData);
        }
        public function getAllPermission(){
            $user = new Admin;
            $permissiongetData = $user->getPermission();
            echo json_encode($permissiongetData);
        }
        public function getPermissionFuture_ByID($permission_id){
            $user = new Admin;
            $permissiongetData = $user->getPermissionFutrure_ByIDUser($permission_id);;
            echo json_encode($permissiongetData);
        }
        public function addPermission($name,$details,$admincode){
            $user = new Admin;
            $ProductgetData = $user->addPermission($name,$details,$admincode);
            // echo json_encode($ProductgetData);
        }
        public function editPermission($permission_id,$name,$details,$admincode){
            $user = new Admin;
            $ProductgetData = $user->editPermission($permission_id,$name,$details,$admincode);
            // echo json_encode($ProductgetData);
        }
        public function addPermission_Future($admincode){
            $user = new Admin;
            $ProductgetData = $user->addPermission_Future($admincode);
            // echo json_encode($ProductgetData);
        }
        public function editPermission_Future($admincode){
            $user = new Admin;
            $ProductgetData = $user->editPermission_Future($admincode);
            // echo json_encode($ProductgetData);
        }
        // Staff - stack
        public function getStaff_ByID($user_id){
            $user = new Admin;
            $userout = $user->getStaff_ByID($user_id);
            echo json_encode($userout);
        }
        public function getAllStaff(){
            $user = new Admin;
            $userout = $user->getStaff();
            echo json_encode($userout);
        }
        // Custommer - stack
        public function getCustommer_ByID($userid){
            $user = new Admin;
            $userget = $user->getCustommer($userid);
            echo json_encode($userget);
        }
        public function getAllCustomme(){
            $user = new Admin;
            $userget = $user->getCustommerAll();
            echo json_encode($userget);
        }
        public function addCustommer($userlist,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn){
            $user = new Admin;
            $Custommer = $user->addCustommer($userlist,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn);
        }
        public function editCustommer($userid,$username,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn){
            $user = new Admin;
            $Custommer = $user->editCustommer($userid,$username,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn);
        }
        public function removeCustommer($userid){
            $user = new Admin;
            $Custommer = $user->removeCustommer($userid);
        }
        public function backupCustommer($userid){
            $user = new Admin;
            $Custommer = $user->backupCustommer($userid);
        }
        public function editStaff($userid,$username,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id){
            $user = new Admin;
            $Staff = $user->editStaff($userid,$username,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id);
        }
        public function addStaff($userlist,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id){
            $user = new Admin;
            $Staff = $user->addStaff($userlist,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id);
        }
        // NCC - Stack 
        public function getNCC_ByID($id){
            $user = new Admin;
            $ncc = $user->getNCC_ByID($id);
            echo json_encode($ncc);
        }
        public function editNCC($ncc_id,$name,$address){
            $user = new Admin;
            $ncc = $user->editNCC($ncc_id,$name,$address);
            // echo json_encode($ncc);
        }
        public function addNCC($name,$address){
            $user = new Admin;
            $ncc = $user->addNCC($name,$address);
            // echo json_encode($ncc);
        }
        public function removeNCC($ncc_id){
            $user = new Admin;
            $ncc = $user->removeNCC($ncc_id);
            // echo json_encode($ncc);
        }
        public function backupNCC($ncc_id){
            $user = new Admin;
            $ncc = $user->backupNCC($ncc_id);
            // echo json_encode($ncc);
        }
        public function getBill_ByID($bill_id){
            $user = new Admin;
            $bill = $user->getBill_ByID($bill_id);
            echo json_encode($bill);
        }
        public function getAllBill(){
            $user = new Admin;
            $bill = $user->getBill();
            echo json_encode($bill);
        }
        public function editBill($bill_id,$status,$date_receice){
            $user = new Admin;
            $bill = $user->editBill($bill_id,$status,$date_receice);
        }

        //Hero - stack
        public function getHero_ByID($hero_id){
            $user = new Admin;
            $output= $user->getHero_ByID($hero_id);
            echo json_encode($output);
        }
        public function editHero($hero_id,$slogent,$img){
            $user = new Admin;
            $output= $user->editHero($hero_id,$slogent,$img);
        }
        public function addHero($slogent,$img){
            $user = new Admin;
            $output= $user->addHero($slogent,$img);
        }
        public function removeHero($hero_id){
            $user = new Admin;
            $output= $user->removeHero($hero_id);
        }
        public function getValueThongKe(){
            $user = new Admin;
            $output= $user->getValueThongKe();
            echo json_encode($output);
        }
    }
?>