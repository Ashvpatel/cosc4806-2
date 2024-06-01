<?php

require_once ('database.php');

Class User {

  public function get_all_users () {
    
    $db = db_connect();
    $statement = $db->prepare("select * from users;");
    $statement->execute();
    $rows = $statement->fetchALL(PDO::FETCH_ASSOC);
    return $rows;
    
  }


  public function create_user($username, $password) {
  
      $db = db_connect();
      $statement = $db->prepare("SELECT id FROM users WHERE username = ?");
      $statement->execute([$username]);
  
      if ($statement->fetch()) {
          return ['error' => 'username already exists'];
      }
  
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $statement = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
      $statement->execute([$username, $hashed_password]);
      return ['success' => 'Created an account successfully'];
  
  }

  public function validate_user($username, $password) {
    
      $db = db_connect();
      $statement = $db->prepare("SELECT * FROM users WHERE username = ?");
      $statement->execute([$username]);
      $user = $statement->fetch();
    
      if ($user && password_verify($password, $user['password'])) {
          return $user;
      }
      return false; 
    
  }
}