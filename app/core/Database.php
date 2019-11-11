<?php
class Database
{
  public $connection;
  protected $servername = DB_HOST;
  protected $username   = DB_USER;
  protected $password   = DB_PASS;
  protected $dbname     = DB_NAME;

  public function __construct()
  {
    $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    mysqli_query($this->connection, 'SET NAMES "utf8"');
    
  }
}
