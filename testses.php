<?php
// include necessary files
require_once('model/UserModel.php');
require_once('controller/UserController.php');

// instantiate controller and call appropriate method
$controller = new UserController();
$controller->index();
?>