<?php 
$title = "Data Siswa | SPB-MABA";
$page = "siswa";
?>

<?php 
require_once "data/siswa.php";

$siswa = getAllStudent();
$no = 1;

if (isset($_GET['hapus'])) {
  $success = deleteStudentById($_GET['hapus']);
}
?>

<?php include "templates/header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
  <p>Berikut adalah data seluruh siswa yang mendaftar beasiswa.</p>
  <a href="kelola_siswa.php" class="btn btn-success mb-3">
    <i class="fa fa-plus"></i>
    Tambah Siswa
  </a>

  <?php if (isset($success)) : ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
      <i class="fa fa-check-circle mr-3"></i>
      <div>
        Data siswa berhasil dihapus
      </div>
    </div>
  <?php header("Refresh: 1; url=siswa.php") ?>
  <?php endif; ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <div class="row">
          <div class="col-sm-12">
            <table
              class="table table-bordered dataTable"
              id="dataTable"
            >
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($siswa as $s): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $s['nama_siswa']; ?></td>
                  <td><?= $s['email']; ?></td>
                  <td><?= $s['no_telp']; ?></td>
                  <td><?= $s['alamat']; ?></td>
                  <td>
                    <a href="kelola_siswa.php?edit=<?= $s['id_siswa']; ?>" class="btn btn-sm btn-warning"
                      ><i class="fa fa-edit"></i
                    ></a>
                    <a href="?hapus=<?= $s['id_siswa']; ?>" class="btn btn-sm btn-danger"
                      ><i class="fa fa-trash"></i
                    ></a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php include "templates/footer.php" ?>