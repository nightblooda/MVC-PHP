<?php

  class MainController{
    public $isUserLoged= false;
    public $isUserSignup= false;

    public function modal($model){
      if(file_exists('../app/models/'.$model.'.php')){
        require_once '../app/models/'.$model.'.php';
        return new $model();
      }else{
        die('Something went wrong, try again');
      }
    }

    public function view($view, $data= []){
      if(file_exists('../app/views/'.$view.'.php')){
        require_once('../app/views/'.$view.'.php');
      }else{
        die('View does not exists');
      }
    }

    public function checkUserLogin(){

      // $isUserLoged = false;
      $loged_id= "";
      $loged_username="";
      
      if(isset($_SESSION["loginid"])){
        $this->isUserLoged= $this->modal('User')->isUserLogedIn();
      }else if(isset($_COOKIE['loginid'])){
        $_SESSION['loginid']= trim($_COOKIE['loginid']);
        $this->isUserLoged= $this->modal('User')->isUserLogedIn();
        if($this->isUserLoged){
          $this->modal('User')->lastSeen();
        }
    
      }else{
        $this->isUserLoged= false;
      }
    }

    public function checkUserSignup(){
      $userUpId= "";
      if(isset($_SESSION['userUpId'])){
        $this->isUserSignup= $this->modal('Intermediate')->isUserSignupPassed();
      }else if(isset($_COOKIE['userUpId'])){
        $_SESSION['userUpId']= $_COOKIE['userUpId'];
        $this->isUserSignup= $this->modal('Intermediate')->isUserSignupPassed();
      }
    }
  }

?>