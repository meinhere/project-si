<?php 
require_once "connection.php";

function getAdminByUsername($username) {
  try {
    $statement = DB->prepare("SELECT * FROM admin WHERE username = :username");
    $statement->bindValue(':username', $username);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}