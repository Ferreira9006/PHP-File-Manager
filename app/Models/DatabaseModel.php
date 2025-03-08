<?php
class Database {
  private $username;
  private $password;
  private $host;
  private $database;
  private $port;
  private $log;

  public function __construct()
  {
    $this->username = getenv('DB_USERNAME');
    $this->password = getenv('DB_PASSWORD');
    $this->host     = getenv('DB_HOST');
    $this->database = getenv('DB_DATABASE');
    $this->port     = getenv('DB_PORT');
  }

  public function databaseConnection() {
    try {
      $pdo = new PDO("mysql:host={$this->host};dbname={$this->database};port={$this->port}", $this->username, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      $this->log->error("Database connection error: " . $e->getMessage());
      throw new Exception("Database connection error.");
    }
  }
}
?>