<?php
class UserModel
{
  private function getAccounts() {
    Application::model('DatabaseModel');
    $database = new Database();
    $database->databaseConnection();
  }
}