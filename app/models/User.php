<?php

  class User{
    
    private $db;
    
    public function __construct(){
      $this->db= new DB();
    }

    public function isUserLogedIn(){
      $this->db->query('SELECT * FROM id_loginid WHERE loginid=:logedid LIMIT 1');
            $this->db->bind(':logedid', $_SESSION['loginid']);
            $row = $this->db->single();
            $row_count= $this->db->rowCount();
            if ($row_count> 0){
              return true;
            }else{
              return false;
            }
    }

    public function lastSeen(){
      $this->db->query('UPDATE users INNER JOIN id_loginid ON users.id=id_loginid.userfid SET users.lastseen=now() WHERE id_loginid.loginid=:logid');
      $this->db->bind(':logid', $_SESSION['loginid']);
      $this->db->execute();
    }

    public function login($data){
      $this->db->query('SELECT * FROM users WHERE email=:email AND activate= "1" LIMIT 1');
      $this->db->bind(':email', $data['email']);
      $row_detail= $this->db->single();
      if($this->db->rowCount()> 0){
      $hashed_pass = $row_detail['password'];
      if(password_verify($data['password'], $hashed_pass)){
        
        return $row_detail;
      }else {
        $data['error']= "error";//ERROR: this array value is not passing to defaultpage
        return false;
      }
      }else{
        $data['error']= 'error';//ERROR: this array value is not passing to defaultpage
        return false;
      }
    }

    public function loginToken($row_detail, $loginid){
      $id= $row_detail['id'];
      $fname= $row_detail['firstname'];
      $lname= $row_detail['lastname'];
      $this->db->query('UPDATE users SET lastseen=now(), how_many_login=how_many_login+1 WHERE email=:email AND id=:id AND firstname=:firstname AND lastname=:lastname AND activate="1" LIMIT 1');
      $this->db->bind(':email', $row_detail['email']);
      $this->db->bind(':id', $id);
      $this->db->bind(':firstname', $fname);
      $this->db->bind(':lastname', $lname);
      if($this->db->execute()){
        $this->db->query('INSERT INTO id_loginid(userfid, loginid) values(:id, :loginid)');
        $this->db->bind(':loginid', $loginid);
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
    }

    public function getBasicDetail($email){
      $this->db->query('SELECT * FROM users WHERE email=:email LIMIT 1');
      $this->db->bind(':email', $email);
      $row_detail= $this->db->single();
      return $row_detail;
    }

    public function signup($data){

      $this->db->query('SELECT * FROM users WHERE email=:email AND activate= "1" LIMIT 1');
      $this->db->bind(':email', $data['email']);
      $this->db->single();
      if($this->db->rowCount()> 0){
        $data['email_error']= 'User with this email is already registered';
        return false;
      }else{
      $hashed_pass= password_hash($data['password'], PASSWORD_DEFAULT);
      $this->db->query('INSERT INTO users(firstname, lastname, email, password, username) values(:firstname, :lastname, :email, :password, :username)');
      $this->db->bind(':firstname', $data['firstname']);
      $this->db->bind(':lastname', $data['lastname']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $hashed_pass);
      $this->db->bind(':username', $data['username']);

      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
      }
    }

    public function getUnactiveId($data){
      $this->db->query('SELECT id FROM users  WHERE firstname=:firstName AND lastname=:lastName AND email=:Email AND activate="0"');
      $this->db->bind(':firstName', $data['firstname']);
      $this->db->bind(':lastName', $data['lastname']);
      $this->db->bind(':Email', $data['email']);
      $detail= $this->db->resultSet();
      $i= $this->db->rowCount();
      $j= 0;
      while($j< $i){
        $id = $detail[$j]->id;
        $this->db->query('SELECT password FROM users WHERE id=:id LIMIT 1');
        $this->db->bind(':id', $id);
        $row_detail= $this->db->single();
        $hashed_pass = $row_detail["password"];
        if(password_verify($data['password'], $hashed_pass)){
          return $id;
        }
        $j= $j+1;
      }
      return false;
    }

    public function isUserSignupPassed($userSignId){
      $this->db->query('SELECT id FROM users WHERE userid=:userSignId LIMIT 1');
      $this->db->bind(':userSignId', $userSignId);
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    

    public function insert_userUpId($userUpId, $id){
      $this->db->query('INSERT INTO id_userid(userfid, userid) values(:id,:userId)');
      $this->db->bind(':userId', $userUpId);
      $this->db->bind(':id', $id);
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
    }

    
  


  }

?>