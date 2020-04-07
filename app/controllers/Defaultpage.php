<?php
  class Defaultpage extends MainController{
    public function __construct(){
      $this->userModal= $this->modal('User');
      $this->checkUserLogin();
      if(!$this->isUserLoged){
        $this->checkUserSignup();
      }
      // $this->checkUserSignup();
    }  
    public function index(){
      if($this->isUserLoged){
          //send to porfile controller
          redirect("users/index");
          // $this->view('defaults/emailverify');
          
          
      }else if($this->isUserSignup){
          // $data= ['title'=>'Fuck you everything is allright'];
          // return $this->view('defaults/sign', $data);
          redirect('userup/index');
          
        }else{
          redirect('defaultpage/login');
        }
      }

    
    

    public function login(){
      if($this->isUserLoged){
        redirect("users/index");
        // echo("lobi");
        // $this->view('defaults/emailverify');
      }else if($this->isUserSignup){
        redirect("userup/index");
      }else{
      if($_SERVER['REQUEST_METHOD']== 'POST'){
        $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $_POST['email']= preg_replace("/[' ']/i", "", $_POST['email']);
        $_POST['password']= preg_replace("/[' ']/i", "", $_POST['password']);
        $_POST['email']= trim($_POST['email']);
        $_POST['password']= trim($_POST['password']);
        
        if(empty($_POST['email']) || empty($_POST['password']) || strlen($_POST['password'])< 7 || strlen($_POST['email'])< 4){
          echo 'error';
          exit();
        }else{
          $data= [
            'email'=> $_POST['email'],
            'password'=> $_POST['password'],
            'error'=>""
          ];
          if($row_detail= $this->userModal->login($data)){
            // echo json_encode($row_detail);
            // exit();
            $details= json_decode(json_encode($row_detail), true);
            $loginid= $this->generateRandomString().$details['id'].$this->generateRandomString().time().$this->generateRandomString();
            if($this->userModal->loginToken($details, $loginid)){
              $this->createLoginStore($loginid);
            }

            // $user_detail_by_email= $this->userModal->getBasicDetail($data['email']);
            // $this->createCookie(json_decode(json_encode($user_detail_by_email), true));
          }else{
            $data['error']= 'error';
            echo "error";
            exit();
          }
        }
      }else{
        $data = [
          'email'=> "",
          'password'=> ""
        ];
        $this->view('defaults/sign', $data);
      }
    }
    }

    
    public function assignUsername($email){
      $email= trim($email);
      $stringPart= explode("@", $email);
      $username= $stringPart[0];
      return $username;
    }

    public function signup(){
      if($this->isUserLoged){
        redirect("users/index");
      }else if($this->isUserSignup){
        redirect("userup/index");
      }else{
        if($_SERVER['REQUEST_METHOD']=='POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $_POST['email']= preg_replace("/[' ']/i", "", $_POST['email']);
          $_POST['password']= preg_replace("/[' ']/i", "", $_POST['password']);
          $_POST['email']= trim($_POST['email']);
          $_POST['password']= trim($_POST['password']);
          $_POST['firstname']= trim($_POST['firstname']);
          $_POST['lastname']= trim($_POST['lastname']);
        
        if(empty($_POST['email']) || empty($_POST['password']) || strlen($_POST['password'])< 7 || strlen($_POST['email'])< 4 || empty($_POST['firstname']) || empty($_POST['lastname']) || strlen($_POST['firstname'])< 3 || strlen($_POST['lastname'])< 3){
          echo 'empty';
          exit();
        }else{
          
          $username= $this->assignUsername($_POST['email']);
          $data=[
            'firstname'=>$_POST['firstname'],
            'lastname'=>$_POST['lastname'],
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'username'=>$username,
            'firstname_error'=>"",
            'lastname_error'=>"",
            'email_error'=>"",
            'password_error'=>""
          ];
          $returnTrue= $this->userModal->signup($data);

          if($returnTrue){
            // echo'sucess message';
            // exit();
            // $this->view('defaults/emailverify', $data);
            // echo "this is reached";

            if($this->generateInsertCreate($data)== false){
              echo "user_already_exists";
              exit();
            }
            
            
          }else{
            echo "user_already_exists";
            exit();
          }
        }
        }else{
          $data= [
            'firstname'=>'',
            'lastname'=>'',
            'email'=>'',
            'password'=>''
          ];

          $this->view('defaults/signup', $data);
        }
        }
      }

    
      public function createLoginStore($loginid){
      setcookie("loginid", $loginid, strtotime(' + 30 days'), "/", "", "", true);
      $_SESSION['loginid']= $loginid;
      redirect('defaultpage/index');
    }

    public function generateInsertCreate($data){//passing data I am having option to use session variables directly
      $id= $this->userModal->getUnactiveId($data);
      if($id== false){
        return false;
      }
      $userUpId= $this->generateRandomString().$id.$this->generateRandomString().time().$this->generateRandomString();
      if($this->userModal->insert_userUpId($userUpId, $id)){
          
        $this->createSignupStore($userUpId);
          
      }else{
        return false;
      }
    }

    public function createSignupStore($userUpId){
      setcookie("userUpId", $userUpId, strtotime(' + 30days '), "/", "", "", true);
      $_SESSION['userUpId']= $userUpId;
      redirect('defaultpage/index');
    }

    public function destroySignupStore(){
      setcookie("userUpId", $userUpId, strtotime(' + 30days '), "/", "", "", true);
      setcookie("lastname", $userUpId, strtotime(' + 30days '), "/", "", "", true);

    }

    public function generateRandomString($length = 47) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }
    
    
    
    
    
    
    
    }



   
  


?>