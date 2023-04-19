<?php
    include "../page/libindex.php";
// include necessary files
require_once('../controller/home.php');

// instantiate controller and call appropriate method
    $Home = new Home();
    $Home->index();
?>