<?php
class HomeController extends Controller
{

  public function index()
  {
    $rooms = $this->model('Room');
    $slots = $this->model('Slot');
    $this->view('client/layouts/master', [
      'page'  => '/home/index',
      'rooms' => $rooms->getRooms(1),
      'slots' => $slots->getSlots()
    ]);

    $this->destroySession();
  }
}
