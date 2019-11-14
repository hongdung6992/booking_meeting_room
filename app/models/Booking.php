<?php

class Booking extends Database
{

  public $table = 'bookings';

  public function insertBooking($input)
  {
    $sql = "INSERT INTO " . $this->table . " (room_id, name, phone, email, date, slot_ids, attendees, status) 
            VALUE (
              '" . $input['room_id'] . "',
              '" . $input['name'] . "', 
              '" . $input['phone'] . "',
              '" . $input['email'] . "',
              " . $input['date'] . ",
              '" . $input['slot_ids'] . "',
              '" . $input['attendees'] . "',
              '" . $input['status'] . "'
            )";
    return $this->connection->query($sql);
  }

  public function countBookingByRoom($roomId)
  {
    $sql = "SELECT id FROM " . $this->table . " WHERE room_id = $roomId";
    return $this->connection->query($sql);
  }

  public function getBookings($id = null)
  {
    if ($id !== null) {
      $sql = "SELECT b.id, b.name AS name, r.name AS room, b.phone,b.email, b.date,b.slot_ids,b.status
      FROM bookings AS b INNER JOIN rooms AS r ON b.room_id = r.id WHERE r.id = $id.";
    } else {
      $sql = "SELECT b.id, b.name AS name, r.name AS room, b.phone,b.email, b.date,b.slot_ids,b.status
              FROM bookings AS b INNER JOIN rooms AS r ON b.room_id = r.id";
    }

    return $this->connection->query($sql);
  }


  public function updateStatus($id, $status)
  {
    $sql = "UPDATE " . $this->table . " SET status = $status WHERE id = $id";
    return $this->connection->query($sql);
  }

  public function getBookingById($id)
  {
    $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
    return $this->connection->query($sql);
  }

  public function updateBooking($id, $input)
  {
    $sql = "UPDATE " . $this->table . " SET 
            room_id   = '" . $input['room_id'] . "', 
            name      = '" . $input['name'] . "', 
            phone     = '" . $input['phone'] . "', 
            email     = '" . $input['email'] . "', 
            date      = " . $input['date'] . ",
            slot_ids  = '" . $input['slot_ids'] . "', 
            attendees = '" . $input['attendees'] . "', 
            status    = '" . $input['status'] . "'
            WHERE id  = " . $id;
    return $this->connection->query($sql);
  }

  public function deleteBooking($id)
  {
    $sql = "DELETE FROM " . $this->table . " WHERE id = " . $id;
    return $this->connection->query($sql);
  }

  public function getRoomBooked($date)
  {
    if (isset($date)) {
      $sql = "SELECT room_id FROM bookings WHERE date = $date GROUP BY room_id";
    }
    return $this->connection->query($sql);
  }
}
