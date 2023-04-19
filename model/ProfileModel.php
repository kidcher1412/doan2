<?php 
    class ProfileModel{
        private $UserProfile;
        public function __construct(){
            $db = new Database();
            Session::init();
            $UserID=Session::get("ID_User_login");
            if($UserID!=""){
                $query = "SELECT * FROM khachhangs WHERE user_id = $UserID";
                $result = $db->select($query);
                if($value = $result->fetch_assoc()){
                    $output = $value;
                }
                $this->UserProfile = $output;
                echo json_encode($output);
            }
            else
                // header("Location:../home/home.php");
                echo "vui long dang nhap";

        }
        public function getProfile(){
            return $this->UserProfile;
        }
    }
?>