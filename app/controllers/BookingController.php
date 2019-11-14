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

  // list all bookings
  public function list($id = null)
  {
    if (!$_SESSION['login']) $this->redirect('login', 'index');

    $this->view('admin/layouts/master', [
      'page' => '/booking/index',
      'bookings' => $this->bookings->getBookings($id),
      'slots' => $this->model('Slot')
    ]);
  }

  // update status 
  public function status($id)
  {
    if ($this->bookings->updateStatus($id, $_POST['status'])) {
      echo json_encode([
        'status'  => 'success',
        'message' =>  'Status updating successfully!',
      ]);
    } else {
      echo json_encode([
        'status'  => 'fails',
        'message' =>  'Error updating status!'
      ]);
    }
  }

  public function reloadData()
  {
    $this->view('admin/booking/_tbody', [
      'bookings' => $this->bookings->getBookings()
    ]);
  }

  public function edit($id)
  {
    if (!$_SESSION['login']) $this->redirect('login', 'index');
    $slots = $this->model('Slot');
    $rooms = $this->model('Room');
    $this->view('admin/layouts/master', [
      'page' => 'booking/edit',
      'slots'   => $slots->getSlots(),
      'booking' => $this->bookings->getBookingById($id)->fetch_assoc(),
      'rooms' => $rooms->getRooms()
    ]);
  }

  public function update($id)
  {
    if (!$_SESSION['login']) $this->redirect('login', 'index');

    $input = $this->getInput($_POST);
    if (isset($_POST['update'])) {
      if ($this->bookings->updateBooking($id, $input)) {
        $_SESSION['status'] = 'success';
        $this->redirect('booking', 'list');
      } else {
        $_SESSION['status'] = 'error';
        $this->redirect('booking', 'list');
      }
    }
  }

  public function delete($id)
  {
    if ($this->bookings->deleteBooking($id)) {
      echo json_encode([
        'status'  => 'success',
        'message' =>  'Record deleted successfully!',
      ]);
    } else {
      echo json_encode([
        'status'  => 'fails',
        'message' =>  'Error deleting record!'
      ]);
    }
  }
}
