<?php 
    require_once("../model/BillModel.php");
    class Profile{
        public function index() {
            $classBill = new BillModel();
            $class2 = new User();
            $ProfileData = $class2->getProfileKH();
            $BillData=$classBill->getBill_ByUser($ProfileData["kh_user_id"]);
            
            // echo json_encode($BillData);
            include('../page/header.php');
            include('../view/ProfileView.php');
            include('../page/footer.php');
        }
        public function getView() {
            include('../view/ProfileView.php');
        }
        public function Logout_User(){
            Session::init();
            Session::logout_User();
            header("Location:../home/");
        }
    }
?>