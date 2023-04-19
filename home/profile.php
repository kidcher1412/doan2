<?php 
    include "../page/libindex.php";
    require_once('../controller/profile.php');
    require_once('../model/ProfileModel.php');
    require_once('../model/UserModel.php');
    Session::checkSession();
    if (isset($_GET['logout'])) {
        $class = new Profile();
        $class->Logout_User();
        exit();
    }
    if (!isset($_POST['typeview'])||!isset($_GET['logout'])) {
        $class = new Profile();
        $class->index();
    }
    if (isset($_POST['typeview'])) {
        $class = new Profile();
        $class->getView();
    }
?>