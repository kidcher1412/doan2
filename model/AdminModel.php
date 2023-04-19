<?php 
    require_once('../model/ProductModel.php');
    require_once('../model/PermissionModel.php');
    require_once('../model/UserModel.php');
    require_once('../model/NCCModel.php');
    require_once('../model/BillModel.php');
    require_once('../model/HeroModel.php');
    class Admin{
        private $AdminLogin;
        private $ProductManager;
        private $TypeManager;
        private $BrandManager;
        private $PermissionManager;
        private $PermissionManager_ByIDUser;
        private $StaffManager;
        private $KHManager;
        private $NCCManager;
        private $BillManager;
        public function __construct(){
            $db = new Database();
            $query = "SELECT * FROM accounts,quyens,staff WHERE staff.permission_id = quyens.permission_id and staff.user_id = accounts.user_id";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $admin[] = $value; // Thêm mảng kết quả vào mảng
            }
            $this->AdminLogin= $admin;

            $classProduct = new ProductModel();
            $this->ProductManager= $classProduct->getProduct();

            $this->TypeManager= $classProduct->getType();

            $this->BrandManager= $classProduct->getBrand();

            $classPermission = new PermissionModel();
            $this->PermissionManager= $classPermission->getPermission();

            $classUser = new User();
            $this->StaffManager= $classUser->getAdmin();
            $this->KHManager= $classUser->getUser();
            $this->PermissionManager_ByIDUser = $classUser->getPermision_ByUser(Session::get("ID_ADMIN_login"));

            $classNCC = new NCCModel();
            $this->NCCManager= $classNCC->getNCC();
            $classBill = new BillModel();
            $this->BillManager= $classBill->getBill();
        }
        public function getAdminLogin($ID){
            foreach ($this->AdminLogin as $value) {
                if($value["user_id"]==$ID){
                    return $value;
                }
            }
            return false;
        }
        public function getProduct(){
            return $this->ProductManager;
        }
        public function getType(){
            return $this->TypeManager;
        }
        public function getBrand(){
            return $this->BrandManager;
        }
        public function getPermission(){
            return $this->PermissionManager;
        }
        public function getPermissionManager_ByIDUser(){
            return $this->PermissionManager_ByIDUser;
        }
        public function getPermissionFutrure_ByIDUser($id){
            $classper = new User;
            return $classper->getPermision_ByPermission($id);
        }

        public function getStaff(){
            return $this->StaffManager;
        }
        public function getKH(){
            return $this->KHManager;
        }
        public function getNCC(){
            return $this->NCCManager;
        }
        public function getBill(){
            return $this->BillManager;
        }
        // Product - stack
        public function getProduct_ByID($ID){
            $classProduct = new ProductModel();
            return $classProduct->getProduct_byID($ID);
        }
        public function addProduct($product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img) {
            $classProduct = new ProductModel();
            return $classProduct->addProduct($product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img);
        }
        public function editProduct($product_id,$product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img) {
            $classProduct = new ProductModel();
            return $classProduct->editProduct($product_id,$product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img);
        }
        public function removeProduct($product_id){
            $classProduct = new ProductModel();
            return $classProduct->removeProduct($product_id);
        }
        public function backProduct($product_id){
            $classProduct = new ProductModel();
            return $classProduct->backProduct($product_id);
        }

        public function uploadImage($file) {
            $targetDirectory = "../uploads/"; // Thư mục để lưu trữ các tệp tin
            $targetFile = $targetDirectory . basename($file["name"]); // Lấy tên tệp tin gốc
            
            // Kiểm tra xem tệp tin đã tồn tại chưa
            if (file_exists($targetFile)) {
                echo $targetFile;
                exit();
            }
            
            // Kiểm tra dung lượng tệp tin (giới hạn 1MB)
            // if ($_FILES["fileToUpload"]["size"] > 1000000) {
            //     echo "File is too large.";
            //     exit();
            // }
            
            // Kiểm tra định dạng tệp tin cho phép (trong ví dụ này chỉ cho phép các tệp tin ảnh)
            // $allowedTypes = array("jpg", "jpeg", "png", "gif");
            // $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            // if(!in_array($fileType, $allowedTypes)) {
            //     echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
            //     exit();
            // }
            
            // Tiến hành tải tệp tin lên server
            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                echo $targetFile;
            } else {
                echo "";
            }
        }
        // Type - stack 
        public function getType_ByID($type_id){
            $classProduct = new ProductModel();
            return $classProduct->getType_ByID($type_id);
        }
        public function addType($name,$description) {
            $classProduct = new ProductModel();
            return $classProduct->addType($name,$description);
        }
        public function editType($type_id, $name,$description) {
            $classProduct = new ProductModel();
            return $classProduct->editType($type_id,$name,$description);
        }
        public function removeType($type_id) {
            $classProduct = new ProductModel();
            return $classProduct->removeType($type_id);
        }
        // Brand - stack 
        public function getBrand_ByID($brand_id) {
            $classProduct = new ProductModel();
            return $classProduct->getBrand_ByID($brand_id);
        }
        public function addBrand($name) {
            $classProduct = new ProductModel();
            return $classProduct->addBrand($name);
        }
        public function editBrand($brand_id, $name) {
            $classProduct = new ProductModel();
            return $classProduct->editBrand($brand_id, $name);
        }
        public function removeBrand($brand_id) {
            $classProduct = new ProductModel();
            return $classProduct->removeBrand($brand_id);
        }
        // permission - stack
        public function getPermission_ByID($permission_id) {
            $classProduct = new PermissionModel;
            return $classProduct->getPermission_ByID($permission_id);
        }
        public function addPermission($name,$details,$admincode) {
            $classProduct = new PermissionModel;
            return $classProduct->addPermission($name,$details,$admincode);
        }
        public function editPermission($permission_id,$name,$details,$admincode){
            $classProduct = new PermissionModel;
            return $classProduct->editPermission($permission_id,$name,$details,$admincode);
        }
    // Staff - stack
    public function getStaff_ByID($user_id) {
        $classProduct = new User();
        return $classProduct->getAdmin_ByID($user_id);
    }
    public function getCustommer($userid) {
        $classProduct = new User();
        return $classProduct->getUser_ByID($userid);
    }
    public function getCustommerAll() {
        return $this->KHManager;
    }
    public function addCustommer($user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn) {
        $classProduct = new User();
        return $classProduct->registerUser($user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn);
    }
    public function editCustommer($userID,$user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn) {
        $classProduct = new User();
        return $classProduct->editCustommer($userID,$user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn);
    }
    public function removeCustommer($userid) {
        $classProduct = new User();
        return $classProduct->removeCustommer($userid);
    }
    public function backupCustommer($userid) {
        $classProduct = new User();
        return $classProduct->backupCustommer($userid);
    }
    public function editStaff($userID,$user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id) {
        $classProduct = new User();
        return $classProduct->editStaff($userID,$user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id);
    }
    public function addStaff($userlist,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id) {
        $classProduct = new User();
        return $classProduct->registerAdmin($userlist,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id);
    }
    public function getPermisionStaff_ByID($permission_id) {
        $classProduct = new PermissionModel();
        return $classProduct->getPermission_ByID($permission_id);
    }
    // ncc - stack 
    public function getNCC_ByID($id){
        $classNCC = new NCCModel();
        return $classNCC->getNCC_ByID($id);
    }
    public function editNCC($ncc_id,$name,$address){
        $classNCC = new NCCModel();
        return $classNCC->editNCC($ncc_id,$name,$address);
    }
    public function addNCC($name,$address){
        $classNCC = new NCCModel();
        return $classNCC->addNCC($name,$address);
    }
    public function removeNCC($ncc_id){
        $classNCC = new NCCModel();
        return $classNCC->blockNCC($ncc_id);
    }
    public function backupNCC($ncc_id){
        $classNCC = new NCCModel();
        return $classNCC->backupNCC($ncc_id);
    }
    public function getBill_ByID($bill_id){
        $classNCC = new BillModel();
        return $classNCC->getBill_ByID($bill_id);
    }
    public function editBill($bill_id,$status,$date_receice){
        $classNCC = new BillModel();
        return $classNCC->editBill($bill_id,$status,$date_receice);
    }


    public function getHeros(){
        $classNCC = new HeroModel();
        return $classNCC->getHero();
    }
    public function getHero_ByID($hero_id){
        $classNCC = new HeroModel();
        return $classNCC->getHero_ByID($hero_id);
    }
    public function editHero($hero_id,$slogent,$img){
        $classNCC = new HeroModel();
        return $classNCC->editHero($hero_id,$slogent,$img);
    }
    public function addHero($slogent,$img){
        $classNCC = new HeroModel();
        return $classNCC->addHero($slogent,$img);
    }
    public function removeHero($hero_id){
        $classNCC = new HeroModel();
        return $classNCC->removeHero($hero_id);
    }
    public function getValueThongKe(){
        $classNCC = new BillModel;
        return $classNCC->getValueThongKe();
    }

}

    
?>