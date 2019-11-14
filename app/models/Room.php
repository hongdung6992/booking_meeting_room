<?php

class Room extends Database
{
  public $table = 'rooms';

  function getRooms()
  {
    $sql = "SELECT * FROM " . $this->table;
    return $this->connection->query($sql);
  }

  function getRoomById($id)
  {
    if ($id !== null) {
      $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
      return $this->connection->query($sql);
    }
  }

  function countRoomByStatus($status = null)
  {
    if ($status !== null) {
      $sql = "SELECT count(*) as amount FROM " . $this->table . " WHERE status = $status";
    } else {
      $sql = "SELECT count(*) as amount FROM " . $this->table;
    }
    return $this->connection->query($sql)->fetch_assoc();
  }
}
