<?php

  require_once('config/var.php');
  require_once('config/session_control.php');
  require_once('config/url_direct.php');
  require_once('libraries/DB.php');
  require_once('libraries/Handle.php');
  require_once('libraries/MainController.php');

  // spl_autoloader_register('Autoloader::Config');
  // spl_autoloader_register('Autoloader::Libraries');
  // class Autoloader{

  //   public static function Config($className){
  //     require_once 'config/'.$className.'.php';
  //   }

  //   public static function Libraries($className){
  //     require_once 'libraries/'.$className.'.php';
  //   }
  // }

  // NEW FUNCTION
  // spl_autoloader_register(): PHP will call spl_autoload when you try and instantiate a new class.

?>