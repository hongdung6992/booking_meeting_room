<?php

class RoomController extends Controller {

  protected $rooms;

  public function __construct()
  {
    $this->rooms = $this->model('Room');
  }

  public function index(){

    $this->model('Booking');

    if (!$_SESSION['login']) $this->redirect('login', 'index');

    // count rooms
    $count['total']   = $this->rooms->countRoomByStatus();
    $count['empty']   = $this->rooms->countRoomByStatus(0);
    $count['booked']  = $this->rooms->countRoomByStatus(1);
    
    $this->view('admin/layouts/master', [
      'page' => 'room/index',
      'rooms' => $this->rooms->getRooms(),
      'count' => $count
    ]);
    
    $this->destroySession();
  }

}