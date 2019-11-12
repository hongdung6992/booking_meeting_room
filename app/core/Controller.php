<?php
class Controller
{
  public function model($model)
  {
    require_once './app/models/' . $model . '.php';
    return new $model;
  }

  public function view($view, $data = [])
  {
    require_once './app/views/' . $view . '.php';
  }

  public function redirect($controller = 'home', $action = 'index'){
    header("location: /$controller/$action");
    exit();
  }

  public function destroySession()
  {
    if (isset($_SESSION['errors']) || isset($_SESSION['status'])) {
      unset($_SESSION['errors'], $_SESSION['status']);
    }
  }
  
}
