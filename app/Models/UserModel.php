<?php
class UserModel
{
  public function getAccounts($email = "")
  {
    Application::model('DatabaseModel');
    $database = new Database();
    $connection = $database->databaseConnection();

    if (!isset($email)) {
      $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->bindParam(':email', $email);
    } else {
      $stmt = $connection->prepare("SELECT * FROM users");
    }

    $stmt->execute();

    return $stmt;
  }
}
