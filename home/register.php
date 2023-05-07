<?php 
        include "../page/libindex.php";
        // include necessary files
        require_once('../controller/register.php');
        $registerclass = new Register();
        if(!isset($_POST["action"])){
                $registerclass->index();
        }
        if(isset($_POST["action"]) && $_POST["action"]=="checkusername"){
                $registerclass->checkusername($_POST["username"]);
        }
        if(isset($_POST["action"]) && $_POST["action"]=="register"){
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $repass = $_POST['repass'];
                        if($pass!=$repass)
                            {
                                echo json_encode(array('textRely' => 'fail'));
                                exit();            
                            }
                        $full_name = $_POST['full_name'];
                        $phone = $_POST['phone'];
                        $mail = $_POST['mail'];
                        $sex = $_POST['sex'];
                        $dateborn = $_POST['dateborn'];
                        $address = $_POST['address'];
                        if($pass=="" ||$user==""||$full_name==""||$phone==""||$mail==""||$address==""||$sex==""||$dateborn=="" ){
                                echo json_encode(array('textRely' => 'fail'));
                                exit();
                        }
                        if(" làm trong này")
                        $res = $registerclass->registerUser($user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn);
                    
        }
