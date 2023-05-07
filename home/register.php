<?php
include "../page/libindex.php";
// include necessary files
require_once('../controller/register.php');
$registerclass = new Register();
if (!isset($_POST["action"])) {
        $registerclass->index();
}
if (isset($_POST["action"]) && $_POST["action"] == "checkusername") {
        $registerclass->checkusername($_POST["username"]);
}
if (isset($_POST["action"]) && $_POST["action"] == "register") {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];
        if ($pass != $repass) {
                echo json_encode(array('textRely' => 'fail'));
                exit();
        }
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $sex = $_POST['sex'];
        $dateborn = $_POST['dateborn'];
        $address = $_POST['address'];
        if ($pass == "" || $user == "" || $full_name == "" || $phone == "" || $mail == "" || $address == "" || $sex == "" || $dateborn == "") {
                echo json_encode(array('textRely' => 'fail'));
                exit();
        }
        $pass_regex = '/^[a-zA-Z0-9]{6,24}$/';
        if (!preg_match($pass_regex, $pass)) {
                echo json_encode(array('textRely' => 'fail_pass'));
                exit();
        }
        $phone_regex = '/^0\d{7,10}$/';
        if (!preg_match($phone_regex, $phone)) {
                echo json_encode(array('textRely' => 'fail_phone'));
                exit();
        }
        $email_regex = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';
        if (!preg_match($email_regex, $mail)) {
                echo json_encode(array('textRely' => 'fail_email'));
                exit();
        }
        if (!preg_match('/^[\p{L}\s\']+$/u', $full_name)) {
                echo json_encode(array('textRely' => 'fail_name'));
                exit();
        }
        if (strtotime($dateborn) > time()) {
                echo json_encode(array('textRely' => 'fail_dateOfBirth'));
                exit();
        }
        $res = $registerclass->registerUser($user, $pass, $full_name, $phone, $mail, $address, $sex, $dateborn);
}
