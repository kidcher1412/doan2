<?php 
    include "../page/libindex.php";
    require_once('./controler.php');
    require_once('../model/AdminModel.php');

    Session::init();
    $class = new AdminController();
    $keyActive = Session::get("ID_ADMIN_login");
    if (!isset($_POST['action'])){
        if($keyActive!=""){
            $class->index();
        }
        else{
            $class->login();
        }
    }
    if(isset($_POST["action"])&&$_POST["action"]=="rederType2"){
        $typeView = $_POST["typeView"];
        $class->renderView($typeView);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getProduct"){
        $class->getProduct($_POST["product_id"]);
        // echo "da toi ".$_POST["product_id"];
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getAllProduct"){
        $class->getAllProduct();
        // echo "da toi ".$_POST["product_id"];
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="AddProduct"){
        $product_type_id=$_POST["typeID"];
        $brand_id=$_POST["brandID"];
        $name=$_POST["name"];
        $amount=$_POST["amount"];
        $price=$_POST["price"];
        $description=$_POST["description"];
        $use=$_POST["use"];
        $img=$_POST["img"];

        $class->addProduct($product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img);
        // echo "tiến hành thêm sản phẩm";
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="EditProduct"){
        $product_id=$_POST["productID"];
        $product_type_id=$_POST["typeID"];
        $brand_id=$_POST["brandID"];
        $name=$_POST["name"];
        $amount=$_POST["amount"];
        $price=$_POST["price"];
        $description=$_POST["description"];
        $use=$_POST["use"];
        $img=$_POST["img"];

        $class->editProduct($product_id,$product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img);
        // echo "tiến hành thêm sản phẩm";
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="removeProduct"){
        $class->removeProduct($_POST["productID"]);
        // echo "da toi ".$_POST["productID"];
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="backProduct"){
        $class->backProduct($_POST["productID"]);
        // echo "da toi ".$_POST["productID"];
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="uploadImage"){
        $class->uploadImage($_FILES["photo"]);
        // echo "da toi ".$_FILES["photo"];
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getType"){
        $class->getType_ByID($_POST["typeID"]);
        // echo $_POST["name"]."   ".$_POST["description"];
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getAllType"){
        $class->getAllType();
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="addType"){
        $class->addType($_POST["name"],$_POST["description"]);
        // echo $_POST["name"]."   ".$_POST["description"];
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="editType"){
        $class->editType($_POST["typeID"],$_POST["name"],$_POST["description"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="removeType"){
        $class->removeType($_POST["typeID"]);
        exit();
    }
    // Brand - stack 
    if(isset($_POST["action"])&&$_POST["action"]=="getBrand"){
        $class->getBrand_ByID($_POST["brandID"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getAllBrand"){
        $class->getAllBrand();
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="addBrand"){
        $class->addBrand($_POST["brandName"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="editBrand"){
        $class->editBrand($_POST["brandID"], $_POST["brandName"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="removeBrand"){
        $class->removeBrand($_POST["brandID"]);
        exit();
    }
    // permission - stack
    if(isset($_POST["action"])&&$_POST["action"]=="getPermission"){
        $class->getPermission_ByID($_POST["permissionID"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getAllPermission"){
        $class->getAllPermission();
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getPermissionFuture"){
        $class->getPermissionFuture_ByID($_POST["permissionID"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="addPermission"){
        $class->addPermission($_POST["name"],$_POST["details"],$_POST["admincode"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="editPermission"){
        $class->editPermission($_POST["permissionID"],$_POST["name"],$_POST["details"],$_POST["admincode"]);
        exit();
    }
    // Staff - stack
    if(isset($_POST["action"])&&$_POST["action"]=="getStaff"){
        $class->getStaff_ByID($_POST["user_id"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getAllStaff"){
        $class->getAllStaff();
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="editStaff"){
        $username = $_POST['user'];
        $pass = $_POST['pass'];
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $sex = $_POST['sex'];
        $dateborn = $_POST['dateborn'];
        $address = $_POST['address'];
        $class->editStaff($_POST['userid'],$username,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$_POST['permissionid']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="addStaff"){
        $username = $_POST['user'];
        $pass = $_POST['pass'];
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $sex = $_POST['sex'];
        $dateborn = $_POST['dateborn'];
        $address = $_POST['address'];
        $class->addStaff($username,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn,$_POST['permission_id']);
        exit();
    }
    // Customer - stack
    if(isset($_POST["action"])&&$_POST["action"]=="getCustommer"){
        $class->getCustommer_ByID($_POST["userID"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getAllCustommer"){
        $class->getAllCustomme();
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="addCustommer"){
        $class->addCustommer($_POST["user"],$_POST["pass"],$_POST["full_name"],$_POST["phone"],$_POST["mail"],$_POST["address"],$_POST["sex"],$_POST["dateborn"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="editCustommer"){
        $username = $_POST['user'];
        $pass = $_POST['pass'];
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $sex = $_POST['sex'];
        $dateborn = $_POST['dateborn'];
        $address = $_POST['address'];
        $class->editCustommer($_POST['userid'],$username,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="removeCustommer"){
        $class->removeCustommer($_POST["user_id"]);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="backupCustommer"){
        $class->backupCustommer($_POST["user_id"]);
        exit();
    }
    // NCC - stack
    if(isset($_POST["action"])&&$_POST["action"]=="getNCC"){
        $class->getNCC_ByID($_POST['ncc_id']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="editNCC"){
        $class->editNCC($_POST['ncc_id'],$_POST['name'],$_POST['address']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="addNCC"){
        $class->addNCC($_POST['name'],$_POST['address']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="removeNCC"){
        $class->removeNCC($_POST['ncc_id']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="backupNCC"){
        $class->backupNCC($_POST['ncc_id']);
        exit();
    }
    // Bill - stack
    if(isset($_POST["action"])&&$_POST["action"]=="getbill"){
        $class->getBill_ByID($_POST['bill_id']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="getAllBill"){
        $class->getAllBill();
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="editBill"){
        $class->editBill($_POST['bill_id'],$_POST['status'],$_POST['date_receice']);
        exit();
    }

    //Hero - stack
    if(isset($_POST["action"])&&$_POST["action"]=="getHero"){
        $class->getHero_ByID($_POST['hero_id']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="editHero"){
        $class->editHero($_POST['hero_id'],$_POST['slogent'],$_POST['img']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="addHero"){
        $class->addHero($_POST['slogent'],$_POST['img']);
        exit();
    }
    if(isset($_POST["action"])&&$_POST["action"]=="removeHero"){
        $class->removeHero($_POST['hero_id']);
        exit();
    }
    // Thống Kê - stack 
    if(isset($_POST["action"])&&$_POST["action"]=="getThongKe"){
        $class->getValueThongKe();
        exit();
    }
?>