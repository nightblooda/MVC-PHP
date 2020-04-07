<?php

class Users extends MainController{
  public function __construct(){
    $this->profileModal= $this->modal('Profile');
    $this->checkUserLogin();
  }   

  public function index($params){
    if($this->isUserLoged){
      if($this->profileModal->isFirstLogin()){
        
        $data= $this->profileModal->getEmailAndNameByUserupid();
        
        $this->profileModal->useroptionEntry($data['id']);
        
        if(empty($params)){
          $params= $this->profileModal->usernameByLoginid();
          redirect("users/index/$params");
        }
        if (!file_exists("user/".$data['id'])) {
          mkdir("user/".$data['id'], 0755);
        }
        $this->view('profiles/feed', $data);
      }else{
          if(empty($params)){
            $params= $this->profileModal->usernameByLoginid();
            redirect("users/index/$params");
          }else{
          if($this->profileModal->isLogedOwner($params)){
            $data= $this->profileModal->getProfileDetails();
            $data['owner']="logowner";
            $data['follow']="";
            $data['joined']= $this->convertToAgoType($data['joined']);
            $_SESSION['onThePage']=$params;
            
            $this->view('profiles/index', $data);
          }else{
            // $data= $this->profileModal->getProfileDetails();
            // $this->view('profiles/index', $data);
            if($this->profileModal->usernameCheck($params)){
              $data= $this->profileModal->getProfileDbyUsername($params);
              $data['owner']="nologowner";
              if($this->profileModal->getBlockReportByUsername($params)){
                $data['block']="noblocked";
                $followReport= $this->profileModal->getFollowReportByUsername($params);
                if($followReport=="follower"){
                  $_SESSION['onThePage']=$params;
                  
                  $data['follow']="following";
                }else{
                  $data['follow']="";
                }
              }else{
                $data['block']="blocked";
                $data['follow']="";
              }
              $data['joined']= $this->convertToAgoType($data['joined']);
              $this->view('profiles/index', $data);
            }
            // }else{
            //    $data= $this->profileModal->getProfileDetails();
            //    $data['owner']="logowner";
            //    $this->view('profiles/index', $data);
            // }
          
        
          // $data= $this->profileModal->getProfileDetails();
          // $this->view('profiles/index', $data);
        
        }
      }
      }
      
    }else{
      redirect('defaultpage/index');
    }
  }

  public function convertToAgoType($dateTime){
    $diff= time()-$dateTime;
    if( $diff < 1 ) { return 'less than 1 second'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $diff / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) ;
        }
    }
  }

  public function editProfileDetail(){
    if($this->isUserLoged){
      $data=$this->profileModal->getProfileDetails();
      $this->view('profiles/editprofile', $data);
    }
  }

  public function insertProfileDetail(){
    if($this->isUserLoged){
      if($_SERVER['REQUEST_METHOD']== 'POST'){
        // if (isset($_FILES['pic'])) {
        //   $errors = [];
        //   $path = '../users/155/';
        //   $extensions = ['jpg', 'jpeg', 'png', 'gif'];
  
  
        //       $file_name = $_FILES['pic']['name'];
        //       $file_tmp = $_FILES['pic']['tmp_name'];
        //       $file_type = $_FILES['pic']['type'];
        //       $file_size = $_FILES['pic']['size'];
        //       $file_ext = strtolower(end(explode('.', $_FILES['pic']['name'])));
  
        //       $file = $path . $file_name;
  
        //       if (!in_array($file_ext, $extensions)) {
        //           $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        //       }
  
        //       if ($file_size > 2097152) {
        //           $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
        //       }
  
        //       if (empty($errors)) {
        //           move_uploaded_file($file_tmp, $file);
        //       }

        //       if ($errors) echo($errors);

        //   }else{
        //     echo "pic file not set";
        //   }
  
      
  
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $firstname= trim($_POST['firstname']);
        $lastname= trim($_POST['lastname']);
        $course= trim($_POST['course']);
        $institution= trim($_POST['institution']);
        $strem= trim($_POST['strem']);
        $gender= trim($_POST['gender']);
        $proimg= trim($_POST['proimg']);
      
      if(empty($firstname) || empty($lastname) || empty($course) || empty($strem) || empty($institution)){
        echo 'empty';
        exit();
      }else{
        
        $data=[
          'firstname'=>$firstname,
          'lastname'=>$lastname,
          'course'=>$course,
          'institution'=>$institution,
          'strem'=>$strem,
          'gender'=>$gender,
          'proimg'=>$proimg
        ];

        if($this->profileModal->insertProfileD($data)){
          echo "suc";
          exit();
        }else{
          echo "error";
          exit();
        }
      }
    }
  }
}

public function insertProPass(){
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $oldpassword= trim($_POST['oldpass']);
    $newpassword= trim($_POST['newpass']);
    if(strlen($oldpassword)< 7 || strlen($newpassword)< 7){
      echo "small";
    }else{
      if($this->profileModal->insertProPassVarify($oldpassword, $newpassword)){
        echo "matchandchanged";
      }else{
        echo "incorrect"; 
      }
    }
  }
}

  public function logout($params){
    if($this->isUserLoged){
      if($_SERVER['REQUEST_METHOD']== 'POST'){
        if($this->profileModal->logOut()){
          echo "successful_logout";
          exit();
          // return "successful_logout";
        }else{
          echo "error";
          exit();
        }
      }
    }
    echo $params;
    exit();
  }



  public function firstLoginDetail(){
    if($_SERVER['REQUEST_METHOD']== 'POST'){
      $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $institute= trim($_POST['institute']);
      $course= trim($_POST['course']);
      $strem= trim($_POST['strem']);
      if(empty($institute) && empty($course) && empty($strem)){
        echo "error";
        exit();
      }else{
        if($this->profileModal->enterFirstLoginD($institute, $course, $strem)){
          redirect('users/index');
        }else{
          echo "error";
          exit();
        }
      }
  }
}


  //profile details by ajax request

  public function getProfileDetails(){
    if($_SERVER['REQUEST_METHOD']== 'POST'){
      $data= $this->profileModal->getProfileDetails();
      echo json_encode($data);
    }
  }

  public function getPeople(){
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $userid= $this->profileModal->useridByLoginid();
        $data= $this->profileModal->getAllPeople();
        echo json_encode($data);
    }
  }

  public function getFollowRequest(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $data= $this->profileModal->getAllFollowRequest();
      echo json_encode($data);
    }
  }

  public function followFvigo($username){
    $this->profileModal->followFollow($username);
  }

  public function getProfileStatus($params){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($this->profileModal->isLogedOwner($params)){
        $data= $this->profileModal->getProfileDetails();
        $data['owner']="logowner";
        echo json_encode($data);
      }else{
        if($this->profileModal->usernameCheck($params)){
          $data= $this->profileModal->getProfileDbyUsername($params);
          $data['owner']="nologowner";
          if($this->profileModal->getBlockReportByUsername($params)){
            $data['block']="noblocked";
            $followReport= $this->profileModal->getFollowReportByUsername($params);
            if($followReport=="follower"){
              $data['follow']="following";
            }else if($followReport=="requested"){
              $data['follow']="requested";
            }else if($followReport=="notfollowing"){
              $data['follow']="notfollowing";
            }
          }else{
            $data['block']="blocked";
          }
          if($this->profileModal->getBlockByReportByUsername($params)){
            $data['blockby']="blockedme";
          }else{
            $data['blockby']="notblockedme";
          }
          echo json_encode($data);
    }
    
  }
}
  }

  public function blockUser($username){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($this->profileModal->blockUser($username)){
        echo "blocked";
      }else{
        echo "error";
      }
    }
  }

  public function unblockUser($username){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($this->profileModal->unblockUser($username)){
        echo "unblocked";
      }else{
        echo "error";
      }
    }
  }

  public function followUser($username){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($this->profileModal->followUserRequest($username)){
      echo "followed";
      }
    }
  }

  public function followRequestCancel($username){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($this->profileModal->doFollowRequestCancel($username)){
        echo "requestcancelled";
      }
    }
  }

  public function cancelfollowReq($username){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($this->profileModal->icancelFollowReq($username)){
        echo "icancelledfreq";
      }
    }
  }

  public function acceptfollowReq($username){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($this->profileModal->iacceptFollowReq($username)){
        echo "iacceptfollowreq";
      }
    }
  }

  public function unfollowUser($username){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($this->profileModal->unfollowTheUser($username)){
        echo "unfollowdone";
      }
    }
  }

  public function imguploadOnImg(){
    if($_SERVER['REQUEST_METHOD']=='POST'){

if (isset($_FILES["file"]["name"]) && $_FILES["file"]["tmp_name"] != ""){
	$fileName = $_FILES["file"]["name"];
    $fileTmpLoc = $_FILES["file"]["tmp_name"];
	$fileType = $_FILES["file"]["type"];
	$fileSize = $_FILES["file"]["size"];
	$fileErrorMsg = $_FILES["file"]["error"];
	$kaboom = explode(".", $fileName);
	$fileExt = end($kaboom);
	list($width, $height) = getimagesize($fileTmpLoc);
	
  $db_file_name = rand(1000,9999).".".$fileExt;
  
	if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName) ) {
    $rtndata['error']="Enter a valid image.";
    echo json_encode($rtndata);
		exit();
	} else if ($fileErrorMsg == 1) {
    $rtndata['error']= "There is error in uploading this image.";
    echo json_encode($rtndata);
		exit();
	}
  $idfolder= $this->profileModal->useridByLoginid();
	$moveResult = move_uploaded_file($fileTmpLoc, "user/$idfolder/$db_file_name");
	if ($moveResult != true) {
    $rtndata['error']="There is error in uploading your image, try again.";
    echo json_encode($rtndata);
		exit();
  }
  if($this->profileModal->imageUploadDB($db_file_name)){
    $rtndata['error']="No error";
    $rtndata['imagename']=$db_file_name;
    $rtndata['foldername']=$idfolder;
    echo json_encode($rtndata);
  }else{
    $rtndata['error']= "Error in uploading image, try again.";
      echo json_encode($rtndata);
  }
  }
}
}

public function delUploadImg(){
  if($_SERVER['REQUEST_METHOD']=='POST'){
    if($this->profileModal->delUploadDB()){
      echo "deletedimg";
    }else{
      echo 'Error in deleting image, try again.';
    }
  }
}





// YOU CAN SPLIT FROM HERE (CLICK ON EXPLORE LINK)
public function lookInFuture(){
  if($this->isUserLoged){
    $this->view('publicpages/future');
  }
}

public function profileElement($params){
  if($this->isUserLoged){
    $params= trim($params);
    $data['params']="";
    if($params=="collection"){
      $data['params']="clbisvmdcsz";
    }else if($params=="communities"){
      $data['params']="cbkaihsljisa";
    }else if($params=="followers"){
      $data['params']="vbiuzkussuhcj";
    }else if($params=="following"){
      $data['params']="libsftsmcskac";
    }
    $this->view('profiles/profileelement',$data);
  }
}

public function fillThefccf(){
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $token= trim($_POST['token']);
    $params= $this->profileModal->usernameByLoginid();
    if($params==$_SESSION['onThePage']){
      $id= $this->profileModal->useridByLoginid();
      if($token=='cro_ca_xxx'){
        $result=$this->profileModal->getAllFollowers($id);
        $result= json_encode($result);
        echo $result;
      }else if($token=='cro_ca_xxxx'){
        $result= $this->profileModal->getAllFollowee($id);
        $result= json_encode($result);
        echo $result;
      }
    }else{
    $followReport= $this->profileModal->getFollowReportByUsername($_SESSION['onThePage']);
    $id= $this->profileModal->getIdByUsername($_SESSION['onThePage']);
    if($followReport=="follower"){ 
      if($token=='cro_ca_x'){
        echo "helloone1";
      }else if($token=='cro_ca_xx'){
        echo "hellotwo2";
      }else if($token=='cro_ca_xxx'){
        $result=$this->profileModal->getAllFollowers($id);
        $result= json_encode($result);
        echo $result;
      }else if($token=='cro_ca_xxxx'){
        $result= $this->profileModal->getAllFollowee($id);
        $result= json_encode($result);
        echo $result;
      }
     }
    }
}
}

public function profilePercep(){
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $username= trim($_POST['username']);
      $content= trim($_POST['content']);
      if(!empty($username)){
        $proimage= $this->profileModal->getprofilePercep($username,$content);
          $data['username']=$proimage['username'];
          $data['proimage']=$proimage['proimage'];
          $data['id']=$proimage['id'];
          echo json_encode($data);
        
      }
  }
}

public function putprofilePercep(){
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $username= trim($_POST['username']);
      if(!empty($username)){
        $data= $this->profileModal->getputPercep($username);
        echo json_encode($data);
      }
  }
}
}
?>