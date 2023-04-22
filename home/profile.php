<?php 
    include "../page/libindex.php";
    require_once('../controller/profile.php');
    Session::checkSession();
    if (isset($_POST['action']) &&$_POST['action']=="editaccount") {
        $class = new Profile();
        $id_loged=$class->getdata_user_login();
        $class->editCustommer($id_loged["user_id"], $id_loged["user"],'', $_POST['full_name'], $_POST['phone'], $_POST['mail'], $_POST['address'], $_POST['sex'], $_POST['dateborn']);
        exit();
    }
    if (isset($_POST['action']) &&$_POST['action']=="updateAccount") {
        $class = new Profile();
        $class->updatePasswordAccount(Session::get("ID_User_login"),$_POST['oldpass'],$_POST['newpass']);
        exit();
    }
    if (isset($_GET['logout'])) {
        $class = new Profile();
        $class->Logout_User();
        exit();
    }
    if (!isset($_POST['typeview'])||!isset($_GET['logout'])||!isset($_POST['action'])) {
        $class = new Profile();
        $class->index();
    }
    if (isset($_POST['typeview'])) {
        $class = new Profile();
        $class->getView();
    }
?>