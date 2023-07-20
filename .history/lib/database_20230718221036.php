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
  function select($query, $params = array())
  {
    $stmt = $this->dbh->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result ? $result : false;
  }

  // Insert data
  function insert($query, $params = array())
  {
    $stmt = $this->dbh->prepare($query);
    return $stmt->execute($params) ? $this->dbh->lastInsertId() : false;
  }

  // Update data
  function update($query, $params = array())
  {
    $stmt = $this->dbh->prepare($query);
    return $stmt->execute($params);
  }

  // Delete data
  function delete($query, $params = array())
  {
    $stmt = $this->dbh->prepare($query);
    return $stmt->execute($params);
  }

  public function getLastInsertedId()
  {
    return $this->dbh->lastInsertId();
  }
}