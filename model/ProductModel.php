<?php 
    class ProductModel{
        private $product;
        private $type;
        private $brand;

        public function __construct(){
            $db = new Database();
            $query = "select sanphams.product_id,sanphams.product_type_id,sanphams.name as 'name',sanphams.price as 'price',sanphams.product_type_id,loaisanphams.name as 'type',sanphams.img as 'img',sanphams.use ,sanphams.description,sanphams.amount,sanphams.price,sanphams.status,thuonghieus.brand_id,thuonghieus.name as 'namethuonghieu' from sanphams,loaisanphams,thuonghieus WHERE sanphams.brand_id = thuonghieus.brand_id and sanphams.product_type_id = loaisanphams.product_type_id";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $product[] = $value; // Thêm mảng kết quả vào mảng output
            }
            $this->product=$product;
            usort($this->product, function ($a, $b) {
                return $a['product_id'] > $b['product_id'];
            });
            $query = "select * from loaisanphams";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $type[] = $value; // Thêm mảng kết quả vào mảng
            }
            $this->type =  $type;
            $query = "select * from thuonghieus";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $brand[] = $value; // Thêm mảng kết quả vào mảng
            }
            $this->brand =  $brand;

        }

        public function getProduct(){
            return $this->product;
        }
        public function getType(){
            return $this->type;
        }
        public function getType_ByID($ID){
            foreach ($this->type as $value) {
                if($value["product_type_id"]==$ID)
                    return $value;
            }
            return false;
        }
        public function getBrand(){
            return $this->brand;
        }
        public function getBrand_ByID($ID){
            foreach ($this->brand as $value) {
                if($value["brand_id"]==$ID)
                    return $value;
            }
            return false;
        }
        // Product -stack
        public function getProduct_byID($ID){
            foreach ($this->product as $value) {
                if($value["product_id"]==$ID)
                    return $value;
            }
            return false;
        }
        public function getProduct_byTYPE($TYPE){
            $db = new Database();
            $query = "select sanphams.product_id,sanphams.name as 'name',sanphams.price as 'price',loaisanphams.name as 'type',sanphams.img as 'img',sanphams.use ,sanphams.description,sanphams.amount,sanphams.price,sanphams.status,thuonghieus.brand_id,thuonghieus.name as 'namethuonghieu' from sanphams,loaisanphams,thuonghieus WHERE sanphams.brand_id = thuonghieus.brand_id and sanphams.product_type_id = loaisanphams.product_type_id and sanphams.product_type_id = $TYPE";
            $result = $db->select($query);
            if(!$result){
                return false;

            }
            while($value = $result->fetch_assoc()) {
                $product[] = $value; // Thêm mảng kết quả vào mảng output
            }
            return $product;
        }
        public function getProduct_byBrand($BRAND){
            $db = new Database();
            $query = "select sanphams.product_id,sanphams.name as 'name',sanphams.price as 'price',loaisanphams.name as 'type',sanphams.img as 'img',sanphams.use ,sanphams.description,sanphams.amount,sanphams.price,sanphams.status,thuonghieus.brand_id,thuonghieus.name as 'namethuonghieu' from sanphams,loaisanphams,thuonghieus WHERE sanphams.brand_id = thuonghieus.brand_id and sanphams.product_type_id = loaisanphams.product_type_id and sanphams.brand_id = $BRAND";
            $result = $db->select($query);
            if(!$result){
                return false;
            }
            while($value = $result->fetch_assoc()) {
                $product[] = $value; // Thêm mảng kết quả vào mảng output
            }
            return $product;
        }
        public function updateAmountadd($product_id,$new_amount){
            $db = new Database();
            $query="UPDATE `sanphams` SET amount=amount+$new_amount WHERE sanphams.product_id='$product_id'";
            $result = $db->update($query);
            if($result)
                return $result;
            return false;
        }
        public function updateAmountpre($product_id,$new_amount){
            $db = new Database();
            $query="UPDATE `sanphams` SET amount=amount-$new_amount WHERE sanphams.product_id='$product_id'";
            $result = $db->update($query);
            if($result)
                return $result;
            return false;
        }
        public function fillProduct_byBrand($DATA, $BrandID){
            $product = array();
            foreach ($DATA as $value) {
                if($value["brand_id"] == $BrandID){
                    array_push($product, $value);
                }
            }
            return $product;
        }
        public function searchProduct($valueSearch){
            $db = new Database();
            $query = "SELECT sanphams.*,thuonghieus.name as `tenthuonghieu`,loaisanphams.name as `type` FROM sanphams,thuonghieus,loaisanphams WHERE sanphams.name LIKE '%$valueSearch%'
            AND sanphams.brand_id = thuonghieus.brand_id
            AND sanphams.product_type_id = loaisanphams.product_type_id";
            $result = $db->select($query);
            if(!$result) {
                echo 0;
                exit();
            }
            while($value = $result->fetch_assoc()) {
                $product[] = $value; // Thêm mảng kết quả vào mảng output
            }
            if(count($product)>0)
                echo json_encode($product);
            else
                echo 0;
        }
        public function addProduct($product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img) {
            $db = new Database();
            $query = "INSERT INTO sanphams  VALUES ('','$product_type_id','$brand_id', '$name', '$amount', '$price','$description' , '$use','$img','1')";
            try {
                if($result = $db->insert($query)){
                    echo json_encode(array('textRely' => 'success','result' => $result));
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
        public function editProduct($product_id,$product_type_id,$brand_id, $name, $amount, $price,$description , $use,$img) {
            $db = new Database();
            $queryupdateimg = ' ';
            if($img!='')
                $queryupdateimg = " ,img='".$img."' ";
            $query = "UPDATE sanphams SET product_type_id='$product_type_id',brand_id='$brand_id',name='$name',amount='$amount',price='$price',sanphams.use='$use',sanphams.description='$description' ".$queryupdateimg." WHERE product_id = '$product_id'";

            try {
                if($result = $db->update($query)){
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
        public function removeProduct($product_id){
            $db = new Database();
            $query = "UPDATE sanphams SET sanphams.status = '0'  WHERE product_id = '$product_id'";

            try {
                if($result = $db->update($query)){
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
        public function backProduct($product_id){
            $db = new Database();
            $query = "UPDATE sanphams SET sanphams.status = '1'  WHERE product_id = '$product_id'";

            try {
                if($result = $db->update($query)){
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
        // Type - stack 
        public function addType($name,$description) {
            $db = new Database();
            $query = "INSERT INTO loaisanphams  VALUES ('', '$name','$description')";
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
        public function editType($type_id, $name,$description) {
            $db = new Database();
            $query = "UPDATE loaisanphams SET loaisanphams.name='$name',loaisanphams.description='$description'  WHERE product_type_id = '$type_id'";

            try {
                if($result = $db->update($query)){
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
        public function removeType($type_id) {
            $db = new Database();
            $query = "DELETE FROM loaisanphams WHERE product_type_id='$type_id'";

            try {
                if($result = $db->delete($query)){
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
        // Brand - stack
        public function addBrand($name) {
            $db = new Database();
            $query = "INSERT INTO thuonghieus  VALUES ('', '$name')";
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
        public function editBrand($brand_id, $name) {
            $db = new Database();
            $query = "UPDATE thuonghieus SET thuonghieus.name='$name' WHERE brand_id = '$brand_id'";

            try {
                if($result = $db->update($query)){
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
        public function removeBrand($brand_id) {
            $db = new Database();
            $query = "DELETE FROM thuonghieus WHERE brand_id='$brand_id'";

            try {
                if($result = $db->delete($query)){
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
        public function getProductbystock($type,$name,$brand,$page,$sort,$coster){
            $querysort =' ';
            switch ($sort) {
                case 'name-asc':
                    $querysort =' ORDER BY sanphams.name ASC ';
                    break;
                case 'name-desc':
                    $querysort =' ORDER BY sanphams.name DESC ';
                    break;
                case 'price-asc':
                    $querysort =' ORDER BY sanphams.price ASC ';
                    break;
                case 'price-desc':
                    $querysort =' ORDER BY sanphams.price DESC ';
                    break;
                
                default:
                    # code...
                    break;
            }
            $queryfillcost='';
            if($coster!=''){
                $getMinMax = explode(",", $coster);
                $queryfillcost .= " and (sanphams.price>='".$getMinMax[0]."' and sanphams.price<='".$getMinMax[1]."')";
            }
            $queryname = $name==''?'':"AND sanphams.name LIKE '%$name%' ";
            $querybrand = '';
            if($brand!=''){
                $getallBrand = explode(",", $brand);
                foreach ($getallBrand as $value) {
                    $querybrand .= "OR sanphams.brand_id = '$value' ";
                }
                $querybrand = "AND (".preg_replace('/\bOR\b/', '', $querybrand, 1).")";
            }
            $querytype = '';
            if($type!=''){
                $getallType = explode(",", $type);
                foreach ($getallType as $value) {
                    $querytype .= "OR sanphams.product_type_id = '$value' ";
                }
                $querytype = "AND (".preg_replace('/\bOR\b/', '', $querytype, 1).")";
            }
            $getallquerry=$querytype.$queryname.$querybrand;
            // $finalquerry=$getallquerry==""?"":substr(strstr($getallquerry, 'AND '), 4);
            $finalquerry=$getallquerry==""?"":$getallquerry;
            $query = "SELECT COUNT(*) as `amount` FROM sanphams WHERE sanphams.status=1 AND sanphams.amount>0 $finalquerry ".$queryfillcost.$querysort;
            //lấy số lượng dữ liệu nếu có dữ liệu
            $db = new Database();
            if($result = $db->select($query))
                $amount = ($result->fetch_assoc())["amount"];
            else
                return false;
            //phân trang
            $itemperpage=12;
            $indexbrowser=$page*$itemperpage;
            $curentbrowser=" LIMIT 12 OFFSET $indexbrowser";
            $query = "SELECT sanphams.product_id, sanphams.product_type_id, sanphams.name AS 'name', 
            sanphams.price AS 'price', sanphams.product_type_id, loaisanphams.name AS 'type', 
            sanphams.img AS 'img', sanphams.use, sanphams.description, sanphams.amount, 
            sanphams.price, sanphams.status, thuonghieus.brand_id, thuonghieus.name AS 'namethuonghieu' 
            FROM sanphams 
            JOIN loaisanphams ON sanphams.product_type_id = loaisanphams.product_type_id 
            JOIN thuonghieus ON sanphams.brand_id = thuonghieus.brand_id WHERE sanphams.status=1 AND sanphams.amount>0 ".$finalquerry.$queryfillcost.$querysort.$curentbrowser;
            if($result = $db->select($query)){
                // thực thi trạng thái có dữ liệu
                while($value = $result->fetch_assoc()) {
                    $product[] = $value; // Thêm mảng kết quả vào mảng output
                }
                return array('amount' => $amount,'result' => $product);
            }
            return false;
        }
    }
?>