<?php 
require_once('../model/HeroModel.php');

class Home {
    private $db;
    public function __construct(){
      $this->db = new Database();
   }
    public function index() {
      $heroclass = new HeroModel();
      $heroData = $heroclass->getHero(); // Thêm mảng kết quả vào mảng output
      // retrieve user data from model
      // load view and pass user data to it
      // include('../view/UserView.php');
      include('../page/header.php');
      include('../view/HeroView.php');
      // include('../view/topictimelineView.php');
      include('../view/BannerView.php');
      // echo json_encode($heroData);
      include('../page/footer.php');
    }
  }
?>