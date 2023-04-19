<?php 
    class HeroModel{
        private $heros;
        public function __construct(){
            $db = new Database();
            $query = "SELECT * from heros";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $hero[] = $value; // Thêm mảng kết quả vào mảng
            }
            $this->heros= $hero;
        }
        public function getHero(){
            return $this->heros;
        }
        public function getHero_ByID($hero_id){
            foreach ($this->heros as $value) {
                if($value['id_hero']==$hero_id)
                    return $value;
            }
            return false;
        }
        public function editHero($hero_id,$slogent,$img){
            $db = new Database();

            $query = "UPDATE `heros` SET `slogent`='$slogent',`img`='$img' WHERE id_hero='$hero_id'";
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
        public function addHero($slogent,$img){
            $db = new Database();

            $query = "INSERT INTO `heros`(`id_hero`, `slogent`, `img`) VALUES ('','$slogent','$img')";
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
        public function removeHero($hero_id){
            $db = new Database();

            $query = "DELETE FROM `heros` WHERE id_hero='$hero_id'";
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