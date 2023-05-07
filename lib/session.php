<?php

class Session {
    public static function init() {
        if (session_id() == '') {
            session_start();
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }
    public static function checkSession(){
      self::init();
      if (self::get("login")== false) {
       header("Location:../home/login.php");
      }
   }
    public static function getSession(){
      self::init();
      return self::get("login");
   }
  
   public static function checkLogin_BlockADMIN($AdminData){
        
        if($AdminData["status"]!="1")
            self::logout_Admin();
   }
   public static function checkLoginADMIN(){
      self::init();
      if (self::get("ADMINlogin")) {
         header("Location:../admin/");
      }
   }
  
  
   public static function logout_User(){
    session_start();
    session_destroy();
    header("Location:../home/login.php");
   }
   public static function logout_Admin(){
    session_start();
    session_destroy();
   }
}

?>