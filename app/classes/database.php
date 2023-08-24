<?php

class Connection{
  private $_dbname = "dbMedication";
  private $_host = "localhost";
  private $_username = "root";
  private $_password = "@Root123";
  private $connection;

  protected function connect(){
    $this->connection = new PDO("mysql:host=$this->_host;dbname=$this->_dbname;", $this->_username, $this->_password);
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!$this->connection){
      echo "Connection failed. Try again!";
      exit;
    }
    return $this->connection;
  }
}

class Database extends Connection{
  
  public function insert($name, $hour, $date_start, $date_end, $status){
    $query = "INSERT INTO medication (id, name, hour, date_start, date_end, status) VALUES (null, :name, :hour, :date_start, :date_end, :status)";
    try {
      $stmt = $this->connect()->prepare($query);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':hour', $hour);
      $stmt->bindParam(':date_start', $date_start);
      $stmt->bindParam(':date_end', $date_end);
      $stmt->bindParam(':status', $status);

      $stmt->execute();
    } catch (\Throwable $th) {
      echo $th;
    }
  }

  public function select($where){
    if($where == "*"){
      $query = "SELECT * FROM medication";
      try {
        $stmt = $this->connect()->query($query);
        return $stmt;
      } catch (\Throwable $th) {
        echo $th;
      }
    }else{
      $query = "SELECT * FROM medication WHERE id=$where";
      try {
        $stmt = $this->connect()->query($query);
        return $stmt;
      } catch (\Throwable $th) {
        echo $th;
      }
    }
  }

  public function update($id, $name, $hour, $date_start, $date_end, $status){
    $query = "UPDATE medication SET name=:name, hour=:hour, date_start=:date_start, date_end=:date_end, status=:status";
    try {
      $stmt = $this->connect()->prepare($query);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':hour', $hour);
      $stmt->bindParam(':date_start', $date_start);
      $stmt->bindParam(':date_end', $date_end);
      $stmt->bindParam(':status', $status);

      $stmt->execute();
    } catch (\Throwable $th) {
      echo $th;
    }
  }

  public function delete($id){
    $query = "DELETE FROM medication where id=:id";
    try {
      $stmt = $this->connect()->prepare($query);
      $stmt->bindParam(':id', $id);

      $stmt->execute();
    } catch (\Throwable $th) {
      echo $th;
    }
  }
}