<?php
    // include "../lib/database.php";
    // include necessary files
    require_once('../controller/shop.php');
    require_once('../model/ShopModel.php');
    require_once('../model/UserModel.php');
    class PostData{
        public function Logout_User(){
            include "../lib/session.php";
            Session::init();
            Session::logout_User();
        }
        public function registerUser($user,$pass,$full_name,$phone,$mail,$address,$sex,$dateborn){
            $db = new Database();
            $query = "INSERT INTO khachhangs values
             ('','$user','$pass','$pass','$full_name','$phone','$mail','$address','$sex','$dateborn','1')";
            try {
                if($result = $db->insert($query)){
                    echo json_encode(array('textRely' => 'success'));
                } else {
                    echo json_encode(array('textRely' => 'fail'));
                }
            } catch(mysqli_sql_exception $ex) {
                if($ex->getCode() == 1062){ // Error code 1062 = Duplicate entry error
                    echo json_encode(array('textRely' => 'fail'));
                } else {
                    throw $ex;
                }
            }
        }

        public function getCart_ByUser(){
            include "../lib/database.php";
            $db = new Database();
            Session::init();
            $User=Session::get("user");
            if(empty($User)){
                    echo "Không có sản Phẩm trong giỏ hàng";
            }
            else{
                $query = "SELECT carts.cart_id, sanphams.img, sanphams.name,sanphams.amount,sanphams.price,carts.amonut as 'cartAmount' FROM carts,khachhangs,sanphams WHERE carts.product_id = sanphams.product_id and carts.user_id = khachhangs.user_id and khachhangs.user = '$User'";
                $result = $db->insert($query);
                while($value = $result->fetch_assoc()) {
                    $carts[] = $value; // Thêm mảng kết quả vào mảng output
                }
                return $carts;
            }
        }
        public function updateCart($cartID,$amount){
            $db = new Database();
                $query = "UPDATE carts SET carts.amonut  = $amount WHERE cart_id='$cartID'";
                $result = $db->update($query);
                echo "Sussces!!!";
        }
        public function removeCart($cartID){
            $db = new Database();
                $query = "DELETE FROM carts WHERE cart_id = '$cartID'";
                $result = $db->delete($query);
                echo "Sussces!!!";
        }
        
    }
    if(isset($_POST["action"]) && $_POST["action"]=="logout"){
        $class = new PostData();
        $class->Logout_User();
    }
    if (isset($_POST['action']) && $_POST['action'] == 'addUser') {
        // Tạo một đối tượng MyClass
        $myClass = new MyData();
      
        // Gọi hàm getData() trong MyClass
        $myClass->registerUser();
      }
      if (isset($_POST['action']) && $_POST['action'] == 'addCart') {
        // Tạo một đối tượng MyClass
        $myClass = new PostData();
        include "../lib/database.php";
        // Gọi hàm getData() trong MyClass
        $myClass->updateCart($_POST['cartID'],$_POST['amount']);
      }
      if (isset($_POST['action']) && $_POST['action'] == 'removeCart') {
        // Tạo một đối tượng MyClass
        $myClass = new PostData();
        include "../lib/database.php";
        // Gọi hàm getData() trong MyClass
        $myClass->removeCart($_POST['cartID']);
      }
?>