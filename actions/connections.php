<?php

class Connection
{
  private $username="root";
  private $hostname="localhost";
  private $password="";
  private $dbname="ecofriendlycars";
  protected $conn;

  public function __construct()
  {
    $this->conn = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname);
  }
}

?>