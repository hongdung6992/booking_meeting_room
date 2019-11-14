<?php

class LoginController extends Controller
{

  protected $user;

  public function __construct()
  {
    $this->user = $this->model('User');
  }

  public function index()
  {
    $this->view('login/index');
    if (isset($_SESSION['login'])) $this->redirect('room', 'index');

    $this->destroySession();
  }

  public function checkLogin()
  {
    $_SESSION['errors'] = $this->user->validation($_POST);

    if (isset($_POST['sign_in'])) {
      if (count($_SESSION['errors']) <= 0) {
        if ($this->user->isLogin($_POST['email'], md5($_POST['password']))) {
          $_SESSION['status'] = 'success';
          $this->redirect('room', 'index');
        } else {
          $_SESSION['status'] = 'error';
          $this->redirect('login', 'index');
        }
      } else {
        $this->redirect('login', 'index');
      }
    }
  }

  public function logout()
  {
    if (isset($_SESSION['login']))  unset($_SESSION['login']);
    $this->redirect('login', 'index');
  }
}
