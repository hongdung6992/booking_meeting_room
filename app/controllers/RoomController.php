<?php

class RoomController extends Controller
{

  protected $rooms;

  public function __construct()
  {
    $this->rooms = $this->model('Room');
  }

  public function index()
  {

    $this->model('Booking');

    if (!$_SESSION['login']) $this->redirect('login', 'index');

    // count rooms
    $date = isset($_POST['date']) ? formatToYMD($_POST['date']) : "'" . date('Y-m-d') ."'";
    $count['total']   = $this->rooms->countRoom();
    $count['booked'] = $this->roomBooked($date);
    $count['empty'] = $count['total']['amount'] - $count['booked'];
    
    $this->view('admin/layouts/master', [
      'page' => 'room/index',
      'rooms' => $this->rooms->getRooms(),
      'count' => $count
    ]);

    $this->destroySession();
  }

  function roomBooked($date)
  {
    $bookings = $this->model('Booking');
    return $bookings->getRoomBooked($date)->num_rows;
  }
}
