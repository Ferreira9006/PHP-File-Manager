<?php
class Database
{
  private $username;
  private $password;
  private $host;
  private $database;
  private $port;

  public function __construct()
  {
    $this->username = $_ENV['DB_USERNAME'];
    $this->password = $_ENV['DB_PASSWORD'];
    $this->host     = $_ENV['DB_HOST'];
    $this->database = $_ENV['DB_DATABASE'];
    $this->port     = $_ENV['DB_PORT'];
  }

  public function databaseConnection()
  {
    try {
      $pdo = new PDO("mysql:host={$this->host};dbname={$this->database};port={$this->port}", $this->username, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      throw new Exception("Database connection error.");
    }
  }
}
