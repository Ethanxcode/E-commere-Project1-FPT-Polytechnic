<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../config/config.php');
class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  private $dbh;
  public function __construct()
  {
    try {
      // Connect to database
      $this->dbh = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      // Handle errors
      die("Connection failed: " . $e->getMessage());
    }
  }
  // Select or Read data
  // Select or Read data
  public function select($query, $params = array())
  {
    $stmt = $this->dbConnection->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }


  // Insert data
  function insert($query)
  {
    $stmt = $this->dbh->prepare($query);
    return $stmt->execute() ? $this->dbh->lastInsertId() : false;
  }

  // Update data
  function update($query)
  {
    $stmt = $this->dbh->prepare($query);
    return $stmt->execute();
  }

  // Delete data
  function delete($query)
  {
    $stmt = $this->dbh->prepare($query);
    return $stmt->execute();
  }
  public function getLastInsertedId()
  {
    return $this->dbh->lastInsertId();
  }
}