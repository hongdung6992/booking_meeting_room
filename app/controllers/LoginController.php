<?php

class LoginController extends Controller {

  protected $users;

  public function __construct()
  {
    $this->users = $this->model('User');
  }

  public function index(){
    return $this->view('layouts/master', [
      'page' => 'login/index'
    ]);
    echo $this->users->getUser();
  }
}