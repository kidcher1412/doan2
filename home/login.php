<?php 
        include "../page/libindex.php";
        // include necessary files
        require_once('../controller/login.php');
        if(!isset($_POST["action"])){
                $shop = new Login();
                $shop->index();
        }
        if(isset($_POST["action"]) && $_POST["action"] == "loginaccount"){
                $user = new Login();
                $username = $_POST['user'];
                $password = $_POST['pass'];
                if($username==""||$username==" "){
                        echo "exter space";
                        exit();
                }
                $username = strtolower($username);
                $login_check = $user->checkUserLogin($username,$password);
        }
?>