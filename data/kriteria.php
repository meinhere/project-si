<?php 
require_once "connection.php";

function getAllCriteria() {
  try {
    $statement = DB->query("SELECT * FROM kriteria");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}

function editCriteria($data) {
  $bobot          = $data['bobot'];
  $atribut        = $data['atribut'];
  $kode_kriteria  = $data['kode'];

  try {
    for ($i = 0; $i < count($bobot); $i++) {
      $statement = DB->prepare("UPDATE kriteria SET bobot = :bobot, atribut = :atribut WHERE kode_kriteria = :kode_kriteria");
      $statement->bindValue(':bobot', $bobot[$i]);
      $statement->bindValue(':atribut', $atribut[$i]);
      $statement->bindValue(':kode_kriteria', $kode_kriteria[$i]);
      $statement->execute();
    }
    return true;
  }
  catch(PDOException $err) {
    echo $err->getMessage();
  }
}