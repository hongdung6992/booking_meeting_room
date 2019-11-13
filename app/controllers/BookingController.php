<?php

class BookingController extends Controller
{

  protected $bookings;

  function __construct()
  {
    $this->bookings = $this->model('Booking');
  }

  public function index()
  {
    $slots = $this->model('Slot');
    $rooms = $this->model('Room');

    $slotIds = (isset($_POST['slot_ids'])) ? (implode(',', $_POST['slot_ids'])) : '';
    $room = isset($_POST['room_id']) ? $rooms->getRoomById($_POST['room_id']) : null;

    if (isset($_POST['submit'])) {
      $this->view('client/layouts/master', [
        'page'    => '/booking/index',
        'booking' => $_POST,
        'slots'   => $slots->getSlotByIds($slotIds),
        'room'    => $room
      ]);
    } else {
      $this->redirect('home', 'index');
    }
    $this->destroySession();
  }

  public function save()
  {
    $input = $this->getInput(unserialize($_POST['booking']));

    if (isset($_POST['confirm'])) {
      if ($this->bookings->insertBooking($input)) {
        $_SESSION['status'] = 'success';
        $this->redirect('home', 'index');
      } else {
        $_SESSION['status'] = 'error';
        $this->redirect('home', 'index');
      }
    } else {
      $this->redirect('home', 'index');
    }
  }

  private function getInput($input)
  {
    return [
      'room_id'   => $input['room_id'],
      'name'      => $input['name'],
      'phone'     => $input['phone'],
      'email'     => $input['email'],
      'date'      => formatToYMD($input['date']),
      'slot_ids'  => isset($input['slot_ids']) ? implode(',', $input['slot_ids']) : '',
      'attendees' => $input['attendees'],
      'status'    => $input['status'],
    ];
  }
}
