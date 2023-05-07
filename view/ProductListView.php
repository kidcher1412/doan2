<?php 
    class ProductListView{
        public function __construct(){
            //lấy dữ liệu khi được khởi tạo
        }
        public function indexfull(){
            // hàm hiển thi viewer cho web
            include "../view/ShopView.php";
        }
        public function indexFill(){
            // hàm hiển thi product dua tren fill
            
        }

    }

?>