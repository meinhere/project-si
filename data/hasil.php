<?php 
require_once "connection.php";

function getAllResultByDesc() {
  try {
      $statement = DB->query("SELECT * FROM hasil INNER JOIN siswa ON siswa.id_siswa = hasil.id_siswa ORDER BY hasil_akhir DESC");
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}

function getAllResultByDescAndLimit($limit) {
  try {
      $statement = DB->prepare("SELECT * FROM hasil INNER JOIN siswa ON siswa.id_siswa = hasil.id_siswa ORDER BY hasil_akhir DESC LIMIT :limit");
      $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}

function insertResult() {
  $id_siswa = DB->lastInsertId();
  $skor = countScore($id_siswa);
  $hasil_akhir = countResult($id_siswa);

  try {
    $statement = DB->prepare("INSERT INTO hasil VALUES(NULL, :id_siswa, :skor, :hasil_akhir)");
    $statement->bindValue(':id_siswa', $id_siswa);
    $statement->bindValue(':skor', $skor['skor']);
    $statement->bindValue(':hasil_akhir', $hasil_akhir);
    $statement->execute();
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}

function updateResult($id_siswa) {
  $skor = countScore($id_siswa);
  $hasil_akhir = countResult($id_siswa);

  try {
    $statement = DB->prepare("UPDATE hasil SET 
                              id_siswa = :id_siswa, 
                              skor = :skor, 
                              hasil_akhir = :hasil_akhir 
                              WHERE id_siswa = :id_siswa");
    $statement->bindValue(':id_siswa', $id_siswa);
    $statement->bindValue(':skor', $skor['skor']);
    $statement->bindValue(':hasil_akhir', $hasil_akhir);
    $statement->execute();
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}