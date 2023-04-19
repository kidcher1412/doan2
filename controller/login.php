<?php
    require_once('../model/UserModel.php');
    class Login{
        private $db;
        public function __construct(){
          $this->db = new Database();
       }
       public function index(){
        $user = new User();
        include('../page/header.php');
        include('../view/LoginView.php');
        include('../view/BannerView.php');
        include('../page/footer.php');
       }
       public function checkUserLogin($username,$password){
            $userclass = new User();
            $username = $_POST['user'];
            $password = $_POST['pass'];
            $username = strtolower($username);
            $login_check = $userclass->checkUserLogin($username,$password);
       }
    }
?>