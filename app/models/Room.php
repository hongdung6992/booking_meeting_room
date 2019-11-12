<?php 

class Room extends Database {

  public $table = 'rooms';

  function getRooms(){
    $sql = "SELECT * FROM " . $this->table;
    return $this->connection->query($sql);
  }

}