<?php 
require_once "data/kriteria.php";
require_once "data/admin.php";

function countNormalization($bobot) {
  $kriteria = getAllCriteria();
  $total_bobot = 0;

  foreach ($kriteria as $k) {
    $total_bobot += $k['bobot'];
  }
  
  return $bobot / $total_bobot;
}

function countScore($id) {
  $siswa = getStudentById($id);
  $kriteria = getAllCriteria();

  // status_siswa
  if ($siswa['status'] == "Lengkap") $kode[0] = 1;
  else if ($siswa['status'] == "Yatim" || $siswa['status'] == "Piatu") $kode[0] = 3;
  else $kode[0] = 5;

  // penghasilan_ortu
  if ($siswa['penghasilan_ortu'] > 8000000) $kode[1] = 1;
  else if ($siswa['penghasilan_ortu'] > 6000000) $kode[1] = 2;
  else if ($siswa['penghasilan_ortu'] > 4000000) $kode[1] = 3;
  else if ($siswa['penghasilan_ortu'] > 2000000) $kode[1] = 4;
  else if ($siswa['penghasilan_ortu'] > 0) $kode[1] = 5;
  
  // pekerjaan_ortu
  if ($siswa['pekerjaan_ortu'] == "Wiraswasta") $kode[2] = 1;
  else if ($siswa['pekerjaan_ortu'] == "Karyawan Swasta") $kode[2] = 2;
  else if ($siswa['pekerjaan_ortu'] == "PNS/TNI/Polri") $kode[2] = 3;
  else if ($siswa['pekerjaan_ortu'] == "Buruh/Pegawai Honor") $kode[2] = 4;
  else $kode[2] = 5;

  // tanggungan_ortu
  if ($siswa['tanggungan_ortu'] == 1) $kode[3] = 1;
  else if ($siswa['tanggungan_ortu'] == 2) $kode[3] = 2;
  else if ($siswa['tanggungan_ortu'] == 3) $kode[3] = 3;
  else if ($siswa['tanggungan_ortu'] == 4) $kode[3] = 4;
  else $kode[3] = 5;

  // nilai
  if ($siswa['nilai'] > 95) $kode[4] = 5;
  else if ($siswa['nilai'] > 85) $kode[4] = 4;
  else if ($siswa['nilai'] > 75) $kode[4] = 3;
  else if ($siswa['nilai'] > 64) $kode[4] = 2;
  else $kode[4] = 1;

  $skor = 1;
  for ($i = 0; $i < count($kriteria); $i++) {
    $bobot = $kriteria[$i]['atribut'] == "Benefit" ? countNormalization($kriteria[$i]['bobot']) : -1 * countNormalization($kriteria[$i]['bobot']);

    $skor *= pow($kode[$i], $bobot);
  } 

  $hasil = [
    "kode" => $kode,
    'skor' => round($skor, 4)
  ];

  return $hasil;
}

function countResult($id_siswa) {
  $siswa = getAllStudent();
  $total_score = 0;
  
  foreach ($siswa as $s) {
    $skor = countScore($s['id_siswa']);
    $total_score += $skor['skor'];
  }
  $skor = countScore($id_siswa);

  return round($skor['skor'] / $total_score, 4);
}


// Validasi
function validateDataStudent(&$errors, $data) {
  $nama_siswa = htmlspecialchars($data['nama_siswa']);
  $no_telp = htmlspecialchars($data['no_telp']);
  $email = htmlspecialchars($data['email']);
  $alamat = htmlspecialchars($data['alamat']);
  $nilai = htmlspecialchars($data['nilai']);
  $penghasilan = htmlspecialchars($data['penghasilan']);

  foreach ($data as $key => $value) {
    // Validate not null
    if ($key != 'ktp' && $key != 'pas_foto' && $key != 'sktm' && (isset($data['tambah']) && $key != 'tambah') && (isset($data['edit']) && $key != 'edit')  ) {
      if (!$value) $errors[$key] = "Field tidak boleh kosong";
    }
    
    // validate number
    if ($key == 'no_telp' || $key == "penghasilan") {
      if (!preg_match("/^\d+$/", $value)) $errors[$key] = "Field harus berisi angka bulat";
    }
    if ($key == "nilai") {
      if (!preg_match("/^[0-9.]+$/", $value)) $errors[$key] = "Field harus berisi angka";
    }
  }

  return $errors;
}

function validateLogin(&$errors, $data) {

  $admin = getAdminByUsername($data['username']);

  if (!empty($admin)) {
    if ($admin['password'] != hash('sha256', $data['password'])) {
      $errors['password'] = "Password salah";
    }
  } else {
    $errors['username'] = "Username belum ada";
  }

  foreach ($data as $key => $value) {
    // Validate not null
    if (!$value) $errors[$key] = "Field tidak boleh kosong";
  }

  if (empty($errors)) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $admin['username'];
    header("Location: index.php");
    exit();
  }

  return $errors;
}