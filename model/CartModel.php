<?php 
    // include("../lib/database.php");
    // include("../lib/database.php");
    class Cart{
        private $cart;
        public function getCart(){
            return $this->cart;
        }
        public function __construct() {
            // $db = new Database();
            // $query = "select * from carts";
            // $result = $db->select($query);
            // if(!$result) $this->cart = false;
            // while($value = $result->fetch_assoc()) {
            //     $cart[] = $value; // Thêm mảng kết quả vào mảng
            // }
            // $this->cart= $cart;
        }
        public function getCart_ByUser(){
            $db = new Database();
            Session::init();
            $User=Session::get("user");
            if(empty($User)){
                return false;
            }
            else{
                $query = "SELECT carts.cart_id, sanphams.img, sanphams.name,sanphams.amount,sanphams.price,carts.amonut as 'cartAmount' FROM carts,accounts,sanphams WHERE carts.product_id = sanphams.product_id and carts.user_id = accounts.user_id and accounts.user = '$User'";
                $result = $db->insert($query);
                while($value = $result->fetch_assoc()) {
                    $carts[] = $value; // Thêm mảng kết quả vào mảng output
                }
                if(!empty($carts))
                    return $carts;
                else
                    return false;
            }
        }
        public function addnewCart($user_id,$product_id){
            $db = new Database;
            $query = "SELECT amount FROM sanphams WHERE product_id = $product_id";
            $result = $db->select($query);
            $value = $result->fetch_assoc();
            if($value["amount"]<1){
                echo "false-slg";
                exit();
            }
            $query = "SELECT * FROM carts WHERE product_id = $product_id and user_id = $user_id ";
            $result = $db->select($query);
            if($result){
                $query = "UPDATE carts SET carts.amonut  = carts.amonut+1 WHERE product_id = $product_id and user_id = $user_id ";
                $db->update($query);
                $modal = new Modal();
                echo 'Update Thành Công Số Lượng Sản Phẩm trong giỏ hàng!';
            }
            else{
                $query = "INSERT INTO carts VALUES ('', $product_id,$user_id,1)";
                $db->insert($query);
                $modal = new Modal();
                echo 'Thêm Thành Công Số Lượng Sản Phẩm trong giỏ hàng!';
            }
        }
        public function addnewCart_Amount($user_id,$product_id,$amount){
            $db = new Database;
            $query = "SELECT amount FROM sanphams WHERE product_id = $product_id";
            $result = $db->select($query);
            $value = $result->fetch_assoc();
            if($value["amount"]<$amount){
                echo "false-slg";
                exit();
            }
            $query = "SELECT * FROM carts WHERE product_id = $product_id and user_id = $user_id ";
            $result = $db->select($query);
            if($result){
                $query = "UPDATE carts SET carts.amonut  = carts.amonut+$amount WHERE product_id = $product_id and user_id = $user_id ";
                $db->update($query);
                $modal = new Modal();
                echo 'Update Thành Công Số Lượng Sản Phẩm trong giỏ hàng!';
            }
            else{
                $query = "INSERT INTO carts VALUES ('', $product_id,$user_id,$amount)";
                $db->insert($query);
                $modal = new Modal();
                echo 'Thêm Thành Công Số Lượng Sản Phẩm trong giỏ hàng!';
            }
        }
        public function updateCart($cartID,$amount){
                $dbs = new Database();
                $query = "UPDATE carts SET carts.amonut  = $amount WHERE cart_id='$cartID'";
                $result = $dbs->update($query);
                echo "Sussces!!!";
        }
        public function removeCart($CartID){
                $db = new Database();
                $query = "DELETE FROM carts WHERE cart_id = '$CartID'";
                $result = $db->delete($query);
                echo "Sussces!!!";
        }
        public function checkoutCart($user_id){
            $db = new Database();
            $query = "SELECT carts.*,custommer.kh_user_id,sanphams.name,sanphams.img,sanphams.price,sanphams.amount as `exist`,sanphams.status,(sanphams.price*carts.amonut) AS `total`,accounts.phone,accounts.address
            FROM carts,accounts,sanphams,custommer
            WHERE carts.user_id=accounts.user_id 
            AND carts.product_id=sanphams.product_id 
            AND accounts.user_id='$user_id'
            AND custommer.user_id=accounts.user_id
            ";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $carts[] = $value; // Thêm mảng kết quả vào mảng output
            }
            if($carts==false) exit;
            foreach ($carts as $value) {
                if($value['amonut']>$value['exist']){
                    echo "false";
                    exit();
                }
                if($value['status']!="1"){
                    echo "false";
                    exit();
                }
            }
                $totalPayment = 0;
            // cập nhật lại kho tăng giá trị tổng
            foreach ($carts as $value) {
                $totalPayment += $value["total"];
                $classProduct= new ProductModel();
                $classProduct->updateAmountpre($value['product_id'],$value['amonut']);
                // $query="UPDATE `sanphams` SET amount=amount-".$value['amonut']." WHERE sanphams.product_id='".$value['product_id']."'";
                // $result = $db->update($query);
                // if(!$result){
                //     echo "Không Thành Lập Kho, Kết Nối Kho Thất Bại.";
                //     exit;
                // }
            }
                // thành lập hóa đơn
                $date = date('d-m-Y');
                $query ="INSERT INTO `hoadons`(`bill_id`, `user_kh`, `phone`, `address`, `date_receice`, `date_order`, `total`, `status`) VALUES ('','".$carts[0]["kh_user_id"]."','".$carts[0]["phone"]."','".$carts[0]["address"]."','','$date','$totalPayment','1')";
                $result = $db->insert($query);
                if($result){
                    $query ="SELECT bill_id FROM hoadons ORDER BY bill_id DESC LIMIT 1";
                    $result = $db->select($query);
                    $getBill_ID= $result->fetch_assoc();

                    foreach ($carts as $value) {
                        $query ="INSERT INTO `chitiethoadons`(`bill_id`, `product_id`, `amount`, `bill_key`) VALUES ('".$getBill_ID["bill_id"]."','".$value["product_id"]."','".$value["amonut"]."','')";
                        $result = $db->insert($query);

                    }
                    if($result){
                        // xóa cart của người dùng:
                        $query ="DELETE FROM `carts` WHERE carts.user_id =$user_id";
                        $result = $db->delete($query);
                    }
                }
                echo "Đã Thanh Toán Thành Công, Đơn Hàng của quý Khách Sẽ được Xử Lý trong thời gian sớm nhất";
            
        }
        public function checkoutCart_getAddress($user_id,$address){
            $db = new Database();
            $query = "SELECT carts.*,custommer.kh_user_id,sanphams.name,sanphams.img,sanphams.price,sanphams.amount as `exist`,sanphams.status,(sanphams.price*carts.amonut) AS `total`,accounts.phone
            FROM carts,accounts,sanphams,custommer
            WHERE carts.user_id=accounts.user_id 
            AND carts.product_id=sanphams.product_id 
            AND accounts.user_id='$user_id'
            AND custommer.user_id=accounts.user_id
            ";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $carts[] = $value; // Thêm mảng kết quả vào mảng output
            }
            if($carts==false) exit;
            foreach ($carts as $value) {
                if($value['amonut']>$value['exist']){
                    echo "false";
                    exit();
                }
                if($value['status']!="1"){
                    echo "false";
                    exit();
                }
            }
                $totalPayment = 0;
                foreach ($carts as $value) {
                    $totalPayment += $value["total"];
                }
                // thành lập hóa đơn
                $date = date('d-m-Y');
                $query ="INSERT INTO `hoadons`(`bill_id`, `user_kh`, `phone`, `address`, `date_receice`, `date_order`, `total`, `status`) VALUES ('','".$carts[0]["kh_user_id"]."','".$carts[0]["phone"]."','$address','','$date','$totalPayment','1')";
                $result = $db->insert($query);
                if($result){
                    $query ="SELECT bill_id FROM hoadons ORDER BY bill_id DESC LIMIT 1";
                    $result = $db->select($query);
                    $getBill_ID= $result->fetch_assoc();

                    foreach ($carts as $value) {
                        $query ="INSERT INTO `chitiethoadons`(`bill_id`, `product_id`, `amount`, `bill_key`) VALUES ('".$getBill_ID["bill_id"]."','".$value["product_id"]."','".$value["amonut"]."','')";
                        $result = $db->insert($query);

                    }
                    if($result){
                        // xóa cart của người dùng:
                        $query ="DELETE FROM `carts` WHERE carts.user_id =$user_id";
                        $result = $db->delete($query);
                    }
                }
                echo "Đã Thanh Toán Thành Công, Đơn Hàng của quý Khách sẽ được Giao tới địa chỉ quý khách nhập và Xử Lý trong thời gian sớm nhất";
            
        }
    }
    if (isset($_POST['action']) && $_POST['action'] == 'addCart') {
        // Tạo một đối tượng MyClass
        $myClass = new Cart();
      
        // Gọi hàm getData() trong MyClass
        $myClass->updateCart(1,1);
      }
    
?>