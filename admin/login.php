<?php 
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $username = $_POST['user'];
                $password = $_POST['pass'];
                include "../page/libindex.php";
                require_once('../model/UserModel.php');
                $user = new User();
                $login_check = $user->checkAdminLogin($username,$password);
            }
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <title>Login Admin</title>
    <link href='./css/admin/login/style.css' rel='stylesheet' />
    <style>
        .field-validation-error {
            color: red
        }

        .validation-summary-errors {
            color: red
        }
    </style>
</head>
<body>
    <section class='container'>
        <div class='login'>
            <h1>Đăng nhập Admin</h1>
            <?php 
                include "./form/loginForm.html";
            ?>
        </div>
    </section>

    <script type='text/javascript'>
    function cc(){
        // onsubmit='return(cc());'
      var x = document.forms[0].login.value;
      var y = document.forms[0].password.value;
      alert(x + ' ' + y);
      return false;
    }
    </script>


</html>
