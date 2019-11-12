<?php

class RoomController extends Controller {

  public function index(){

    if (!$_SESSION['login']) $this->redirect('login', 'index');

    $this->view('layouts/master', [
      'page' => 'admin/meeting_room/index'
    ]);

    $this->destroySession();
  }

}