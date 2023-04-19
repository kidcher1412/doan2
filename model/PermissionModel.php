<?php 
    class PermissionModel{
        private $permission;
        public function __construct(){
            $db = new Database();
            $query = "select * from quyens";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $permission[] = $value; // Thêm mảng kết quả vào mảng
            }
            $this->permission= $permission;
        }
        public function getPermission(){
            return $this->permission;
        }
        public function getPermission_ByID($ID){
            foreach ($this->permission as $value) {
                if($value["permission_id"]==$ID)
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
        public function addPermission($name,$details,$admincode){
            $db = new Database();
            $arrcode = explode("-", $admincode);
            $query = "INSERT INTO quyens  VALUES ('','$name','$details')";
            try {
                if($result = $db->insert($query)){
                    $query = "SELECT permission_id FROM quyens ORDER BY permission_id DESC LIMIT 1";
                    $result = $db->select($query);
                    $value = $result->fetch_assoc();
                    $perID =  $value["permission_id"];      //id mới nhất
                    $query = "INSERT INTO accountrefchucnang  VALUES 
                    ('$perID','2','".$arrcode[0]."','".$arrcode[1]."','".$arrcode[2]."','".$arrcode[3]."'),
                    ('$perID','3','".$arrcode[0]."','".$arrcode[1]."','".$arrcode[2]."','".$arrcode[3]."'),
                    ('$perID','4','".$arrcode[0]."','".$arrcode[1]."','".$arrcode[2]."','".$arrcode[3]."'),
                    ('$perID','5','".$arrcode[4]."','".$arrcode[5]."','".$arrcode[6]."','".$arrcode[7]."'),
                    ('$perID','6','".$arrcode[8]."','".$arrcode[9]."','".$arrcode[10]."','".$arrcode[11]."'),
                    ('$perID','7','".$arrcode[12]."','".$arrcode[13]."','".$arrcode[14]."','".$arrcode[15]."'),
                    ('$perID','8','".$arrcode[16]."','".$arrcode[17]."','".$arrcode[18]."','".$arrcode[19]."'),
                    ('$perID','9','".$arrcode[20]."','".$arrcode[21]."','".$arrcode[22]."','".$arrcode[23]."'),
                    ('$perID','10','".$arrcode[24]."','".$arrcode[25]."','".$arrcode[26]."','".$arrcode[27]."'),
                    ('$perID','11','".$arrcode[28]."','".$arrcode[29]."','".$arrcode[30]."','".$arrcode[31]."'),
                    ('$perID','12','".$arrcode[32]."','".$arrcode[33]."','".$arrcode[34]."','".$arrcode[35]."'),
                    ('$perID','13','".$arrcode[36]."','".$arrcode[37]."','".$arrcode[38]."','".$arrcode[39]."')
                    ";
                    if($result = $db->insert($query)){
                        echo json_encode(array('textRely' => 'success'));
                        exit();
                    }
                    else {
                        echo json_encode(array('textRely' => 'fail'));
                        exit();
                    }
                } else {
                    echo json_encode(array('textRely' => 'fail to add Permission'));
                }
            } catch(mysqli_sql_exception $ex) {
                if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                    echo json_encode(array('textRely' => 'Dữ Liệu có sẵn'));
                } else {
                    throw $ex;
                }
            }
        }
        public function editPermission($permission_id,$name,$details,$admincode){
            $db = new Database();
            $arrcode = explode("-", $admincode);
            for ($i=5; $i < 14 ; $i++) { 
                $query = "UPDATE `accountrefchucnang` SET `valueadd`='".$arrcode[($i-5)*4+4]."',`valueedit`='".$arrcode[($i-5)*4+4+1]."',`valuedelete`='".$arrcode[($i-5)*4+4+2]."',`valueread`='".$arrcode[($i-5)*4+4+3]."' WHERE 
                accountrefchucnang.permission_id=$permission_id  AND accountrefchucnang.chucnang_id=$i";
                $result = $db->update($query);
            }
            for ($i=2; $i < 5 ; $i++) { 
                $query = "UPDATE `accountrefchucnang` SET `valueadd`='".$arrcode[0]."',`valueedit`='".$arrcode[1]."',`valuedelete`='".$arrcode[2]."',`valueread`='".$arrcode[3]."' WHERE 
                accountrefchucnang.permission_id=$permission_id  AND accountrefchucnang.chucnang_id=$i";
                $result = $db->update($query);
            }
            $query = "UPDATE quyens SET quyens.name='$name',details='$details' WHERE permission_id='$permission_id'";
            try {
                if($result = $db->insert($query)){
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
        public function removePermission($permission_id){
            $db = new Database();
            $query = "DELETE FROM quyens WHERE permission_id='$permission_id'";
            try {
                if($result = $db->insert($query)){
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
        // Staff - stack
        
        
    }
?>