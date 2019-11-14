<?php

class Slot extends Database
{

  protected $table = 'slots';

  public function getSlots()
  {
    $sql = "SELECT * FROM " . $this->table . " WHERE status = 1";
    return $this->connection->query($sql);
  }

  public function getSlotByIds($ids){
    if($ids !== null){
      $sql = "SELECT * FROM " . $this->table . " WHERE id IN ($ids)";
      return $this->connection->query($sql);
    }
  }
}
