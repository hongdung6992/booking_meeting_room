<?php

class User extends Database
{
  protected $table = 'users';

  // check login
  public function isLogin($email, $password){
    if ($this->getUserLogin($email, $password)->num_rows > 0){
      $_SESSION['login'] = true;
      return true;
    }else{
      unset($_SESSION['login']);
      return false;
    }
  }

  private function getUserLogin($email, $password){
    $sql = "SELECT id FROM users WHERE email = '$email' AND password = '$password' AND status = 1";
    return $this->connection->query($sql);
  }

  public function validation($input){
    $errors = [];
    if(empty($input['email'])){
      $errors['email'] = 'Email is required';
    }
    
    if (!filter_var($input['email'],  FILTER_VALIDATE_EMAIL) && !empty($input['email'])) {
      $errors['email'] = 'Email is invalid';
    }

    if(empty($input['password'])){
      $errors['password'] = 'Password is required';
    }

    return $errors;
  }
}
