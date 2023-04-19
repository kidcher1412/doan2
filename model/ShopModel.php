<?php 
    class ShopModel{
        private $type;
        private $brand;
        private $product;

        public function __construct(){
            $db = new Database();
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
            $query = "select sanphams.product_id,sanphams.name as 'name',sanphams.price as 'price',loaisanphams.name as 'type',sanphams.img as 'img',sanphams.use ,sanphams.description,sanphams.amount,sanphams.price,sanphams.status,thuonghieus.brand_id,thuonghieus.name as 'namethuonghieu' from sanphams,loaisanphams,thuonghieus WHERE sanphams.brand_id = thuonghieus.brand_id and sanphams.product_type_id = loaisanphams.product_type_id";
            $result = $db->select($query);
            while($value = $result->fetch_assoc()) {
                $product[] = $value; // Thêm mảng kết quả vào mảng output
            }
            $this->product=$product;
            usort($this->product, function ($a, $b) {
                return $a['product_id'] > $b['product_id'];
            });

        }
        public function getType(){
            return $this->type;
        }
        public function getBrand(){
            return $this->brand;
        }
        public function getProduct(){
            return $this->product;
        }
        public function getType_byID($ID){
            foreach ($this->type as $value) {
                if($value["product_type_id"]==$ID)
                    return $value;
            }
            return false;
        }
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
            $query = "select sanphams.product_id,sanphams.product_type_id,sanphams.name as 'name',sanphams.price as 'price',loaisanphams.name as 'type',sanphams.img as 'img',sanphams.use ,sanphams.description,sanphams.amount,sanphams.price,sanphams.status,thuonghieus.brand_id,thuonghieus.name as 'namethuonghieu' from sanphams,loaisanphams,thuonghieus WHERE sanphams.brand_id = thuonghieus.brand_id and sanphams.product_type_id = loaisanphams.product_type_id and sanphams.brand_id = $BRAND";
            $result = $db->select($query);
            if(!$result){
                return false;
            }
            while($value = $result->fetch_assoc()) {
                $product[] = $value; // Thêm mảng kết quả vào mảng output
            }
            return $product;
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
    }
?>