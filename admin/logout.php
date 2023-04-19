<?php
    include "../page/libindex.php";
    Session::logout_Admin();
    header("location:./index.php")
?>