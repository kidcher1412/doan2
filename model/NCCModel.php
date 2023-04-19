<?php 
    class NCCModel{
        private $ncc;
        public function __construct(){
            $db = new Database();
            $query = "SELECT * from nccs";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $ncc[] = $value; // Thêm mảng kết quả vào mảng
            }
            $this->ncc= $ncc;
        }
        public function getNCC(){
            return $this->ncc;
        }
        public function getNCC_ByID($ID){
            foreach ($this->ncc as $value) {
                if($value["ncc_id"]==$ID)
                    return $value;
            }
            return false;
        }
        public function editNCC($ncc_id,$name,$address){
            $db = new Database();

            $query = "UPDATE `nccs` SET `name`='$name',`address`='$address' WHERE ncc_id='$ncc_id'";
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
        public function addNCC($name,$address){
            $db = new Database();

            $query = "INSERT INTO nccs  VALUES ('','$name','1','$address')";
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
        public function blockNCC($ncc_id){
            $db = new Database();

            $query = "UPDATE `nccs` SET `status`='0' WHERE ncc_id='$ncc_id'";
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
        public function backupNCC($ncc_id){
            $db = new Database();

            $query = "UPDATE `nccs` SET `status`='1' WHERE ncc_id='$ncc_id'";
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
    }
    
?>