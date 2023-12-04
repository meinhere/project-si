<?php 
$title = isset($_GET['edit']) ? "Ubah Data Siswa | SPB-MABA" : "Tambah Data Siswa | SPB-MABA";
$page = "siswa";
?>

<?php 
require_once "data/siswa.php";
require_once "data/hasil.php";
require_once "functions.php";

if (isset($_GET['edit'])) {
  $siswa = getStudentById(htmlspecialchars($_GET['edit']));
} else {
  $siswa = [
    "nama_siswa"  => "",
    "no_telp"     => "",
    "email"       => "",
    "ktp"         => "",
    "pas_foto"    => "",
    "alamat"      => "",
    "nilai"       => "",
    "sktm"        => "",
    "status"      => "",
    "tanggungan_ortu"   => "",
    "penghasilan_ortu"  => "",
    "pekerjaan_ortu"    => ""
  ];
}

$errors = [];
if (isset($_POST['tambah'])) {
  validateDataStudent($errors, $_POST);

  if (empty($errors)) {
    $success = insertStudent($_POST);
    insertResult();
  }
} else if (isset($_POST['edit'])) {
  validateDataStudent($errors, $_POST);

  if (empty($errors)) { 
    $success = updateStudent($_GET['edit'], $_POST);
    updateResult($_GET['edit']);
  }
}

?>

<?php include "templates/header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= isset($_GET['edit']) ? "Ubah Data Siswa" : "Tambah Data Siswa"; ?></h1>

<?php if (isset($success)) : ?>
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <i class="fa fa-check-circle mr-3"></i>
    <div>
      <?= isset($_GET['edit']) ? "Data siswa berhasil diubah" : "Data siswa berhasil ditambah"; ?>
    </div>
  </div>
<?php header("Refresh: 1; url=siswa.php") ?>
<?php endif; ?>

<!-- Form Input -->
<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post" class="row mt-3">
<div class="col-lg-6">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Data Pribadi
      </h6>
    </div>
    <div class="card-body">
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="nama_siswa" class="col-form-label"
            >Nama Siswa</label
          >
        </div>
        <div class="col">
          <input
            type="text"
            name="nama_siswa"
            id="nama_siswa"
            class="form-control <?= isset($errors['nama_siswa']) ? 'is-invalid' : ''; ?>"
            value="<?= $_POST['nama_siswa'] ?? $siswa['nama_siswa']; ?>"
          />
          <span class="invalid-feedback"
            ><?= $errors['nama_siswa'] ?? ""; ?></span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="no_telp" class="col-form-label"
            >No Handphone</label
          >
        </div>
        <div class="col">
          <input
            type="text"
            name="no_telp"
            id="no_telp"
            class="form-control <?= isset($errors['no_telp']) ? 'is-invalid' : ''; ?>"
            value="<?= $_POST['no_telp'] ?? $siswa['no_telp']; ?>"
          />
          <span class="invalid-feedback"
            ><?= $errors['no_telp'] ?? ""; ?></span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="email" class="col-form-label">Email</label>
        </div>
        <div class="col">
          <input
            type="text"
            name="email"
            id="email"
            class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''; ?>"
            value="<?= $_POST['email'] ?? $siswa['email']; ?>"
          />
          <span class="invalid-feedback"
            ><?= $errors['email'] ?? ""; ?></span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="alamat" class="col-form-label"
            >Alamat</label
          >
        </div>
        <div class="col">
          <input
            type="text"
            name="alamat"
            id="alamat"
            class="form-control <?= isset($errors['alamat']) ? 'is-invalid' : ''; ?>"
            value="<?= $_POST['alamat'] ?? $siswa['alamat']; ?>"
          />
          <span class="invalid-feedback"
            ><?= $errors['alamat'] ?? ""; ?></span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="nilai" class="col-form-label"
            >Rata-Rata Nilai</label
          >
        </div>
        <div class="col">
          <input
            type="text"
            name="nilai"
            id="nilai"
            class="form-control <?= isset($errors['nilai']) ? 'is-invalid' : ''; ?>"
            value="<?= $_POST['nilai'] ?? $siswa['nilai']; ?>"
          />
          <span class="invalid-feedback"
            ><?= $errors['nilai'] ?? ""; ?></span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="ktp" class="col-form-label">KTP</label>
        </div>
        <div class="col">
          <input
            class="form-control-file"
            type="file"
            name="ktp"
            id="ktp"
          />
          <span class="invalid-feedback"
            >Must be more 8 character</span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="pas_foto" class="col-form-label"
            >Pas Foto</label
          >
        </div>
        <div class="col">
          <input
            class="form-control-file"
            type="file"
            name="pas_foto"
            id="pas_foto"
          />
          <span class="invalid-feedback"
            >Must be more 8 character</span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="sktm" class="col-form-label"
            >Surat Keterangan Tidak Mampu</label
          >
        </div>
        <div class="col">
          <input
            class="form-control-file"
            type="file"
            name="sktm"
            id="sktm"
          />
          <span class="invalid-feedback"
            >Must be more 8 character</span
          >
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-6">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Orang Tua</h6>
    </div>
    <div class="card-body">
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="status" class="col-form-label"
            >Status Orang Tua</label
          >
        </div>
        <div class="col">
          <select id="status" name="status" class="form-control">
            <option value="Lengkap" <?= ($_POST['status'] ?? $siswa['status']) == "Lengkap" ? "selected" : ""; ?>>Lengkap</option>
            <option value="Yatim" <?= ($_POST['status'] ?? $siswa['status']) == "Yatim" ? "selected" : ""; ?>>Yatim</option>
            <option value="Piatu" <?= ($_POST['status'] ?? $siswa['status']) == "Piatu" ? "selected" : ""; ?>>Piatu</option>
            <option value="Yatim Piatu" <?= ($_POST['status'] ?? $siswa['status']) == "Yatim Piatu" ? "selected" : ""; ?>>Yatim Piatu</option>
          </select>
          <span class="invalid-feedback"
            >Must be more 8 character</span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="tanggungan" class="col-form-label"
            >Jumlah Tanggungan</label
          >
        </div>
        <div class="col">
          <select
            name="tanggungan"
            id="tanggungan"
            class="form-control"
          >
            <option value="1" <?= ($_POST['tanggungan'] ?? $siswa['tanggungan_ortu']) == "1" ? "selected" : ""; ?>>1 Anak</option>
            <option value="2" <?= ($_POST['tanggungan'] ?? $siswa['tanggungan_ortu']) == "2" ? "selected" : ""; ?>>2 Anak</option>
            <option value="3" <?= ($_POST['tanggungan'] ?? $siswa['tanggungan_ortu']) == "3" ? "selected" : ""; ?>>3 Anak</option>
            <option value="4" <?= ($_POST['tanggungan'] ?? $siswa['tanggungan_ortu']) == "4" ? "selected" : ""; ?>>4 Anak</option>
            <option value="5" <?= ($_POST['tanggungan'] ?? $siswa['tanggungan_ortu']) == "5" ? "selected" : ""; ?>>&ge; 5 Anak</option>
          </select>
          <span class="invalid-feedback"
            >Must be more 8 character</span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="pekerjaan" class="col-form-label"
            >Pekerjaan Orang Tua</label
          >
        </div>
        <div class="col">
          <select
            name="pekerjaan"
            id="pekerjaan"
            class="form-control"
          >
            <option value="Wiraswasta" <?= ($_POST['pekerjaan'] ?? $siswa['pekerjaan_ortu']) == "Wiraswasta" ? "selected" : ""; ?>>
              Wiraswasta
            </option>
            <option value="Karyawan Swasta" <?= ($_POST['pekerjaan'] ?? $siswa['pekerjaan_ortu']) == "Karyawan Swasta" ? "selected" : ""; ?>>
              Karyawan Swasta
            </option>
            <option value="PNS/TNI/Polri" <?= ($_POST['pekerjaan'] ?? $siswa['pekerjaan_ortu']) == "PNS/TNI/Polri" ? "selected" : ""; ?>>PNS/TNI/Polri</option>
            <option value="Buruh/Pegawai Honor" <?= ($_POST['pekerjaan'] ?? $siswa['pekerjaan_ortu']) == "Buruh/Pegawai Honor" ? "selected" : ""; ?>>
              Buruh/Pegawai Honor
            </option>
            <option value="Tidak Memiliki Pekerjaan Tetap" <?= ($_POST['pekerjaan'] ?? $siswa['pekerjaan_ortu']) == "Tidak Memiliki Pekerjaan Tetap" ? "selected" : ""; ?>>
              Tidak Memiliki Pekerjaan Tetap
            </option>
          </select>
          <span class="invalid-feedback"
            >Must be more 8 character</span
          >
        </div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col">
          <label for="penghasilan" class="col-form-label"
            >Penghasilan Orang Tua</label
          >
        </div>
        <div class="col">
        <input
            type="text"
            name="penghasilan"
            id="penghasilan"
            class="form-control <?= isset($errors['penghasilan']) ? 'is-invalid' : ''; ?>"
            value="<?= $_POST['penghasilan'] ?? $siswa['penghasilan_ortu']; ?>"
          />
          <span class="invalid-feedback"
            ><?= $errors['penghasilan'] ?? ""; ?></span
          >
        </div>
      </div>
    </div>

    <?php if (isset($_GET['edit'])): ?>
      <button class="btn btn-info" type="submit" name="edit">
        <i class="fa fa-save"></i>
        Edit Data
      </button>
    <?php else: ?>
      <button class="btn btn-success" type="submit" name="tambah">
        <i class="fa fa-plus"></i>
        Tambah Data
      </button>
    <?php endif; ?>
  </div>
</div>
</form>
</div>
<!-- /.container-fluid -->
<?php include "templates/footer.php" ?>