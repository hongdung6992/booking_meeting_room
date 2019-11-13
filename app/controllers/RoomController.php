<?php

class RoomController extends Controller {

  public function index(){

    if (!$_SESSION['login']) $this->redirect('login', 'index');

    $this->view('admin/layouts/master', [
      'page' => 'room/index'
    ]);

    $this->destroySession();
  }

}