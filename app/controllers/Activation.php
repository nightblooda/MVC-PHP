<?php

class Activation extends mainController{
  public function index(){

  }

  public function activate(){
    if(isset($_GET['id']) && isset($_GET['e'])){
      $id = trim($_GET['id']);
      $email = trim($_GET['e']);
      if($id!= "" || $e != ""){
        $this->profileModal->activateOn($id, $email);
      }
    }
  }
}

?>