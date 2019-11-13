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
}
