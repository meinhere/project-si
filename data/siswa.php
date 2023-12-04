<?php 
require_once "connection.php";

function getAllStudent() {
  try {
      $statement = DB->query("SELECT * FROM siswa");
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}

function getStudentById($id_siswa) {
  try {
      $statement = DB->prepare("SELECT * FROM siswa WHERE id_siswa = :id_siswa");
      $statement->bindValue(':id_siswa', $id_siswa);
      $statement->execute();
      return $statement->fetch(PDO::FETCH_ASSOC);
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}


function insertStudent($data) {
  $nama_siswa = htmlspecialchars($data['nama_siswa']);
  $no_telp = htmlspecialchars($data['no_telp']);
  $email = htmlspecialchars($data['email']);
  $alamat = htmlspecialchars($data['alamat']);
  $nilai = htmlspecialchars($data['nilai']);
  $status = htmlspecialchars($data['status']);
  $tanggungan = htmlspecialchars($data['tanggungan']);
  $penghasilan = htmlspecialchars($data['penghasilan']);
  $pekerjaan = htmlspecialchars($data['pekerjaan']);

  $ktp = htmlspecialchars($data['ktp']);
  $pas_foto = htmlspecialchars($data['pas_foto']);
  $sktm = htmlspecialchars($data['sktm']);

  try {
    $statement = DB->prepare("INSERT INTO siswa VALUES (NULL, :nama_siswa, :no_telp, :email, :ktp, :pas_foto, :alamat, :nilai, :sktm, :status, :tanggungan, :penghasilan, :pekerjaan)");
    $statement->bindValue(':nama_siswa', $nama_siswa);
    $statement->bindValue(':no_telp', $no_telp);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':alamat', $alamat);
    $statement->bindValue(':nilai', $nilai);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':tanggungan', $tanggungan);
    $statement->bindValue(':penghasilan', $penghasilan);
    $statement->bindValue(':pekerjaan', $pekerjaan);
    $statement->bindValue(':ktp', $ktp);
    $statement->bindValue(':pas_foto', $pas_foto);
    $statement->bindValue(':sktm', $sktm);
    $statement->execute();
    return true;
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}

function deleteStudentById($id_siswa) {
  try {
    $statement = DB->prepare("DELETE FROM siswa WHERE id_siswa = :id_siswa");
    $statement->bindValue(':id_siswa', $id_siswa);
    $statement->execute();
    return true;
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}

function updateStudent($id_siswa, $data) {
  $nama_siswa = htmlspecialchars($data['nama_siswa']);
  $no_telp = htmlspecialchars($data['no_telp']);
  $email = htmlspecialchars($data['email']);
  $alamat = htmlspecialchars($data['alamat']);
  $nilai = htmlspecialchars($data['nilai']);
  $status = htmlspecialchars($data['status']);
  $tanggungan = htmlspecialchars($data['tanggungan']);
  $penghasilan = htmlspecialchars($data['penghasilan']);
  $pekerjaan = htmlspecialchars($data['pekerjaan']);

  $ktp = htmlspecialchars($data['ktp']);
  $pas_foto = htmlspecialchars($data['pas_foto']);
  $sktm = htmlspecialchars($data['sktm']);

  try {
    $statement = DB->prepare("UPDATE siswa SET 
                              nama_siswa  = :nama_siswa, 
                              no_telp     = :no_telp, 
                              email       = :email, 
                              ktp         = :ktp, 
                              pas_foto    = :pas_foto, 
                              alamat      = :alamat, 
                              nilai       = :nilai, 
                              sktm        = :sktm, 
                              status      = :status, 
                              tanggungan_ortu   = :tanggungan, 
                              penghasilan_ortu  = :penghasilan, 
                              pekerjaan_ortu    = :pekerjaan
                              WHERE id_siswa = :id_siswa");
    $statement->bindValue(':nama_siswa', $nama_siswa);
    $statement->bindValue(':no_telp', $no_telp);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':alamat', $alamat);
    $statement->bindValue(':nilai', $nilai);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':tanggungan', $tanggungan);
    $statement->bindValue(':penghasilan', $penghasilan);
    $statement->bindValue(':pekerjaan', $pekerjaan);
    $statement->bindValue(':ktp', $ktp);
    $statement->bindValue(':pas_foto', $pas_foto);
    $statement->bindValue(':sktm', $sktm);
    $statement->bindValue(':id_siswa', $id_siswa);
    $statement->execute();
    return true;
  }
  catch(PDOException $err){
      echo $err->getMessage();
  }
}