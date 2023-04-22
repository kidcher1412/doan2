<?php 
    require_once("../model/BillModel.php");
    require_once('../model/ProfileModel.php');
    require_once('../model/UserModel.php');
    class Profile{
        public function index() {
            $classBill = new BillModel();
            $ProfileData = $this->getdata_user_login();
            $BillData=$classBill->getBill_ByUser($ProfileData["kh_user_id"]);
            
            // echo json_encode($BillData);
            include('../page/header.php');
            include('../view/ProfileView.php');
            include('../page/footer.php');
        }
        public function getView() {
            include('../view/ProfileView.php');
        }
        public function getdata_user_login(){
            $class2 = new User();
            return $class2->getProfileKH();
        }
        public function updatePasswordAccount($user_id,$oldpass,$newpass){
            $class2 = new User();
            return $class2->updatePasswordAccount($user_id,$oldpass,$newpass);
        }

        public function Logout_User(){
            Session::init();
            Session::logout_User();
            header("Location:../home/");
        }
        public function editCustommer($userID, $user, $pass, $full_name, $phone, $mail, $address, $sex, $dateborn){
            $userclass=new User();
            $userclass->editCustommer($userID, $user, $pass, $full_name, $phone, $mail, $address, $sex, $dateborn);
        }
    }
?>