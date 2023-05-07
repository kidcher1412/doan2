<?php 
class User {
        private $user;
        private $UserProfile;

        private $admin;
    public function __construct() {

        $db = new Database();
        $query = "SELECT custommer.kh_user_id,accounts.*, custommer.money from accounts,custommer WHERE custommer.user_id = accounts.user_id";
        $result = $db->select($query);
        while($value = $result->fetch_assoc()) {
            $user[] = $value; // Thêm mảng kết quả vào mảng
        }
        $this->user= $user;

        $query = "SELECT * FROM staff,accounts,quyens WHERE staff.permission_id = quyens.permission_id and staff.user_id = accounts.user_id";
        $result = $db->select($query);
        while($value = $result->fetch_assoc()) {
            $admin[] = $value; // Thêm mảng kết quả vào mảng
        }
        $this->admin= $admin;
    }
    public function getAdmin(){
        return $this->admin;
    }
    public function getUser(){
        return $this->user;
    }
    public function updatePasswordAccount($user_id,$oldpass,$newpass){
        $db = new Database();
        $query = "SELECT accounts.pass FROM accounts WHERE accounts.user_id='$user_id'";
        $result = $db->select($query);
        $value = $result->fetch_assoc();
        if(password_verify($oldpass, $value["pass"])){
            $hashed_password = password_hash($newpass, PASSWORD_DEFAULT); // Hash the password
            $query = "UPDATE `accounts` SET `pass`='$hashed_password' WHERE accounts.user_id='$user_id'";
            if($result = $db->update($query)){
                echo json_encode(array('textRely' => 'success'));
            }
            else{
                echo json_encode(array('textRely' => 'fail-ex'));
            }
        }
        else
            echo json_encode(array('textRely' => 'fail-pass'));

    }
    public function getUser_ByID($userid){
        foreach ($this->user as $value) {
            if($value["user_id"]==$userid)
                return $value;
        }
        return false;
    }
    public function getUser_ByUserName($user){
        foreach ($this->user as $value) {
            if($value["user"]==$user)
                return $value;
        }
        foreach ($this->admin as $value) {
            if($value["user"]==$user)
                return $value;
        }
        return false;
    }
    public function getAdmin_ByID($ID){
        foreach ($this->admin as $value) {
            if($value["user_id"]==$ID)
                return $value;
        }
        return false;
    }

    public function checkUserLogin($user_name, $user_pass){
        $db = new Database();
        $query = "SELECT user_id, accounts.status, accounts.admin, accounts.pass FROM accounts WHERE user = '$user_name'";
        $result = $db->select($query);
    
        if (!$result) {
            echo "fail";
        } else {
            $value = $result->fetch_assoc();
            if ($value["status"] != 1) {
                echo "block";
                exit();
            }
    
            // Verify password
            $hashed_password = $value["pass"];
            if (password_verify($user_pass, $hashed_password)) {
                if ($value["admin"] == 1) {
                    Session::init();
                    Session::set('ADMINlogin', true);
                    Session::set('ID_ADMIN_login', $value["user_id"]);
                    Session::set('ADMIN', $user_name);
                    echo "admin";
                    // header('Location:../admin/index.php');
                    exit();
                }
    
                Session::init();
                Session::set('login', true);
                Session::set('ID_User_login', $value["user_id"]);
                Session::set('user', $user_name);
                // header('Location:../home/');
                echo "success";
                exit();
            } else {
                echo "fail";
                exit();
            }
        }
    }
    public function checkAdminLogin($user_name,$user_pass){
        $db = new Database();
        $query = "SELECT accounts.user_id,accounts.status,accounts.admin,accounts.pass FROM accounts where accounts.admin='1' and  user = '$user_name'";
        $result = $db->select($query);
        if(!$result)
            echo "
                <script>
                    alert('Tài Khoản Không Tồn Tại');
                </script>
            ";
        else{
            $value = $result->fetch_assoc();
            $hashed_password = $value["pass"];
            if (password_verify($user_pass, $hashed_password)) {
                if($value["status"]!=1){
                    echo "
                    <script>
                        alert('Nhập Không Thành Công, Tài Khoản $user_name Đã Bị Khóa, Vui Lòng Liên Hệ ADMIN để Được Hỗ Trợ');
                    </script>
                    ";
                    exit();
                }
                Session::init();
                Session::set('ADMINlogin', true);
                Session::set('ID_ADMIN_login', $value["user_id"]);
                Session::set('ADMIN', $user_name);
                header('Location:../admin/index.php');
                echo "
                <script>
                    alert('đăng Nhập Thành Công, Tận Hưởng Niềm Vui Quản Lý');
                </script>
                ";
            }
            else{
                echo "
                <script>
                    alert('đăng Nhập Không Thành Công, Không đúng Mật Khẩu');
                </script>
                ";
            }
        }
    }
    public function getProfileKH(){
        $db = new Database();
        Session::init();
            $UserID=Session::get("ID_User_login");
            if($UserID!=""){
                $query = "SELECT accounts.*, custommer.money, custommer.kh_user_id from accounts,custommer WHERE custommer.user_id = accounts.user_id AND accounts.user_id = $UserID";
                $result = $db->select($query);
                if($value = $result->fetch_assoc()){
                    $output = $value;
                }
                // $this->UserProfile = $output;
                return $output;
            }
            else
                // header("Location:../home/home.php");
                return false;
    }
    public function registerUser($user, $pass, $fullName, $phone, $mail, $address, $sex, $dateborn){
        $db = new Database();
        $query = "select user from accounts where user=$user";
        if($this->getUser_ByUserName($user)){
            echo json_encode(array('textRely' => 'fail_username'));
            exit();
        }
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT); // Hash the password
        
        $query = "INSERT INTO accounts VALUES ('', '$user', '$hashed_password', '$fullName', '$address', '$mail', '$phone', '$sex', '$dateborn', '0', '1')";
    
        try {
            if ($result = $db->insert($query)) {
                $query = "SELECT * FROM accounts ORDER BY user_id DESC LIMIT 1";
                $result = $db->select($query);
                $value = $result->fetch_assoc();
                $khID = $value["user_id"];
                $query = "INSERT INTO custommer VALUES ('', '0', '$khID')";
                if ($result = $db->insert($query)) {
                    echo json_encode(array('textRely' => 'success'));
                }
            } else {
                echo json_encode(array('textRely' => 'fail'));
            }
        } catch(mysqli_sql_exception $ex) {
            if ($ex->getCode() == 1062) { // Error code 1062 = Duplicate entry error
                echo json_encode(array('textRely' => 'fail'));
            } else {
                throw $ex;
            }
        }
    }
    public function registerAdmin($user,$pass,$fullName,$phone,$mail,$address,$sex,$dateborn,$permission_id){
        $db = new Database();
        $query = "INSERT INTO accounts VALUES ('','$user', '" . password_hash($pass, PASSWORD_DEFAULT) . "', '$fullName', '$address', '$mail', '$phone', '$sex', '$dateborn','1','1')";
           try {
               if($result = $db->insert($query)){
                    $query = "SELECT * FROM accounts ORDER BY user_id DESC LIMIT 1";
                    $result = $db->select($query);
                    $value = $result->fetch_assoc();
                    $khID =  $value["user_id"];
                    $query = "INSERT INTO staff  VALUES ('','2023-1-11 00:00:00','20000000','$khID','$permission_id')";
                    if($result = $db->insert($query)){
                        echo json_encode(array('textRely' => 'success'));
                    }
               } else {
                   echo json_encode(array('textRely' => 'fail'));
               }
           } catch(mysqli_sql_exception $ex) {
               if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                   echo json_encode(array('textRely' => 'fail'));
               } else {
                   throw $ex;
               }
           }
    }
    public function editCustommer($userID,$user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn){
        $db = new Database();
    
        // Hash mật khẩu
        if($pass!=''){
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        
            $query = "UPDATE accounts SET accounts.user='$user',accounts.pass='$hashed_pass',accounts.user='$user',accounts.full_name='$full_name',accounts.phone='$phone',accounts.mail='$mail',accounts.address='$address',accounts.sex='$sex',accounts.dateborn='$dateborn' WHERE accounts.user_id = '$userID'";
            try {
                if($result = $db->update($query)){
                    $query = "SELECT * FROM accounts ORDER BY user_id DESC LIMIT 1";
                    $result = $db->select($query);
                    $value = $result->fetch_assoc();
                    $khID =  $value["user_id"];
                    $query = "UPDATE custommer SET custommer.money ='10' WHERE custommer.user_id = '$userID'";
                    if($result = $db->update($query)){
                        echo json_encode(array('textRely' => 'success'));
                    }
                } else {
                    echo json_encode(array('textRely' => 'fail'));
                }
            } catch(mysqli_sql_exception $ex) {
                if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                    echo json_encode(array('textRely' => 'fail'));
                } else {
                    throw $ex;
                }
            }
        } else{
            $query = "UPDATE accounts SET accounts.user='$user',accounts.user='$user',accounts.full_name='$full_name',accounts.phone='$phone',accounts.mail='$mail',accounts.address='$address',accounts.sex='$sex',accounts.dateborn='$dateborn' WHERE accounts.user_id = '$userID'";
            try {
                if($result = $db->update($query)){
                    $query = "SELECT * FROM accounts ORDER BY user_id DESC LIMIT 1";
                    $result = $db->select($query);
                    $value = $result->fetch_assoc();
                    $khID =  $value["user_id"];
                    $query = "UPDATE custommer SET custommer.money ='10' WHERE custommer.user_id = '$userID'";
                    if($result = $db->insert($query)){
                        echo json_encode(array('textRely' => 'success'));
                    }
                } else {
                    echo json_encode(array('textRely' => 'fail'));
                }
            } catch(mysqli_sql_exception $ex) {
                if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                    echo json_encode(array('textRely' => 'fail'));
                } else {
                    throw $ex;
                }
            }
        }
    }
    public function removeCustommer($userid){
        $db = new Database();
        $query = "UPDATE accounts SET accounts.status = '0' WHERE accounts.user_id = '$userid'";
        try {
            if($result = $db->update($query)){
                echo json_encode(array('textRely' => 'success'));
            } else {
                echo json_encode(array('textRely' => 'fail'));
            }
        } catch(mysqli_sql_exception $ex) {
            if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                echo json_encode(array('textRely' => 'fail'));
            } else {
                throw $ex;
            }
        }
    }
    public function backupCustommer($userid){
        $db = new Database();
        $query = "UPDATE accounts SET accounts.status = '1' WHERE accounts.user_id = '$userid'";
        try {
            if($result = $db->update($query)){
                echo json_encode(array('textRely' => 'success'));
            } else {
                echo json_encode(array('textRely' => 'fail'));
            }
        } catch(mysqli_sql_exception $ex) {
            if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                echo json_encode(array('textRely' => 'fail'));
            } else {
                throw $ex;
            }
        }
    }
    public function registerStaff($user,$pass,$fullName,$phone,$mail,$address,$sex,$dateborn,$accede,$salary,$permissionID){
        $db = new Database();
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO accounts  VALUES ('','$user','$hashed_pass','$fullName','$address','$mail','$phone','$sex','$dateborn','1')";
            try {
                if($result = $db->insert($query)){
                        $query = "SELECT * FROM accounts ORDER BY user_id DESC LIMIT 1";
                        $result = $db->select($query);
                        $value = $result->fetch_assoc();
                        $nvID =  $value["user_id"];
                        $query = "INSERT INTO staff  VALUES ('','$accede','$salary','$nvID','$permissionID')";
                        if($result = $db->insert($query)){
                            echo json_encode(array('textRely' => 'success'));
                        }
                } else {
                    echo json_encode(array('textRely' => 'fail'));
                }
            } catch(mysqli_sql_exception $ex) {
                if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                    echo json_encode(array('textRely' => 'fail'));
                } else {
                    throw $ex;
                }
            }
    }
    public function editStaff($userID,$user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$permission_id){
        $db = new Database();
        if($pass!=''){
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
            $query = "UPDATE accounts,staff SET accounts.user='$user',accounts.pass='$hashed_pass',accounts.user='$user',accounts.full_name='$full_name',accounts.phone='$phone',accounts.mail='$mail',accounts.address='$address',accounts.sex='$sex',accounts.dateborn='$dateborn',staff.permission_id = '$permission_id' WHERE accounts.user_id = '$userID' and staff.user_id = '$userID'";
            try {
                    if($result = $db->update($query))
                        echo json_encode(array('textRely' => 'success'));
                    else
                        echo json_encode(array('textRely' => 'fail'));
                } 
            catch(mysqli_sql_exception $ex) {
                if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                    echo json_encode(array('textRely' => 'fail'));
                } else {
                    throw $ex;
                }
            }
        } else{
            $query = "UPDATE accounts,staff SET accounts.user='$user',accounts.user='$user',accounts.full_name='$full_name',accounts.phone='$phone',accounts.mail='$mail',accounts.address='$address',accounts.sex='$sex',accounts.dateborn='$dateborn',staff.permission_id = '$permission_id' WHERE accounts.user_id = '$userID' and staff.user_id = '$userID'";
            try {
                    if($result = $db->update($query))
                        echo json_encode(array('textRely' => 'success'));
                    else
                        echo json_encode(array('textRely' => 'fail'));
                } 
            catch(mysqli_sql_exception $ex) {
                if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                    echo json_encode(array('textRely' => 'fail'));
                } else {
                    throw $ex;
                }
            }
        }

    }
    public function getCart_ByUser(){
        $db = new Database();
        Session::init();
        $User=Session::get("user");
        if(empty($User)){
                echo "Không có sản Phẩm trong giỏ hàng";
        }
        else{
            $query = "SELECT carts.cart_id, sanphams.img, sanphams.name,sanphams.amount,sanphams.price,carts.amonut as 'cartAmount' FROM carts,khachhangs,sanphams WHERE carts.product_id = sanphams.product_id and carts.user_id = khachhangs.user_id and khachhangs.user = '$User'";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $carts[] = $value; // Thêm mảng kết quả vào mảng output
            }
            return $carts;
        }
    }
    public function getPermision_ByUser($user_id){
        $db = new Database();
        $query = "SELECT accountrefchucnang.*,accounts.user,chucnang.name,chucnang.icon FROM accountrefchucnang,accounts,staff,quyens,chucnang WHERE staff.user_id=accounts.user_id AND quyens.permission_id=staff.permission_id AND quyens.permission_id=accountrefchucnang.permission_id AND accountrefchucnang.chucnang_id = chucnang.chucnang_id AND accounts.user_id='$user_id'";
        // $query = "SELECT accountrefchucnang.*,chucnang.name,chucnang.icon FROM accountrefchucnang,quyens,chucnang WHERE quyens.permission_id=accountrefchucnang.permission_id AND accountrefchucnang.chucnang_id = chucnang.chucnang_id AND quyens.permission_id = '$user_id'";
        $result = $db->select($query);
        while($value = $result->fetch_assoc()) {
            $permisions[] = $value; // Thêm mảng kết quả vào mảng output
        }
        return $permisions;
    }
    public function getPermision_ByPermission($permission_id){
        $db = new Database();
        $query = "SELECT accountrefchucnang.*,chucnang.name,chucnang.icon FROM accountrefchucnang,quyens,chucnang WHERE quyens.permission_id=accountrefchucnang.permission_id AND accountrefchucnang.chucnang_id = chucnang.chucnang_id AND quyens.permission_id = '$permission_id'";
        // $query = "SELECT accountrefchucnang.*,chucnang.name,chucnang.icon FROM accountrefchucnang,quyens,chucnang WHERE quyens.permission_id=accountrefchucnang.permission_id AND accountrefchucnang.chucnang_id = chucnang.chucnang_id AND quyens.permission_id = '$user_id'";
        $result = $db->select($query);
        while($value = $result->fetch_assoc()) {
            $permisions[] = $value; // Thêm mảng kết quả vào mảng output
        }
        return $permisions;
    }
    public function getPermisionREADONLY_ByUser_ByFuture($user_id,$future_id){
        $values=$this->getPermision_ByUser($user_id);
        foreach ($values as $value) {
            if($value['chucnang_id']==$future_id)
                return $value;
        }
        return false;
    }
    public function addPermision_ByUser_ByFuture($user_id,$future_id,$permisions_code){
        $arrcode = explode("-", $permisions_code);
        $db = new Database();
        if($permisions_code=="null-null-null")
            $query = "INSERT INTO accountrefchucnang VALUES ('$user_id','$future_id','0','0','0','0')";
        else
            $query = "INSERT INTO accountrefchucnang VALUES ('$user_id','$future_id','".$arrcode[0]."','".$arrcode[1]."','".$arrcode[2]."','1')";
        try {
                if($result = $db->update($query))
                    echo json_encode(array('textRely' => 'success'));
                else
                    echo json_encode(array('textRely' => 'fail'));
            } 
        catch(mysqli_sql_exception $ex) {
            if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                echo json_encode(array('textRely' => 'fail'));
            } else {
                throw $ex;
            }
        }
    }
    public function updatePermision_ByUser_ByFuture($user_id,$future_id,$permisions_code){
        $arrcode = explode("-", $permisions_code);
        $db = new Database();
        if($permisions_code=="null-null-null")
            $query = "UPDATE `accountrefchucnang` SET `valueadd`='0',`valueedit`='0',`valuedelete`='0',`valueread`='0' WHERE user_id ='$user_id'   AND chucnang_id='$future_id'";
        else
            $query = "UPDATE `accountrefchucnang` SET `valueadd`='".$arrcode[0]."',`valueedit`='".$arrcode[1]."',`valuedelete`='".$arrcode[2]."',`valueread`='1' WHERE user_id ='$user_id'   AND chucnang_id='$future_id'";
        try {
                if($result = $db->update($query))
                    echo json_encode(array('textRely' => 'success'));
                else
                    echo json_encode(array('textRely' => 'fail'));
            } 
        catch(mysqli_sql_exception $ex) {
            if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                echo json_encode(array('textRely' => 'fail'));
            } else {
                throw $ex;
            }
        }
    }
}
?>