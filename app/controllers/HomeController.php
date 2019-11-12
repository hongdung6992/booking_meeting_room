<?php
class HomeController extends Controller
{

  public function index()
  {
    $rooms = $this->model('Room');
    $this->view('client/layouts/master', [
      'page' => '/home/index',
      'rooms' => $rooms->getRooms()
    ]);
  }
}
