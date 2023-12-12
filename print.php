<?php 
$title = "Hasil Perhitungan | SPB-MABA";
$page = "hitung";
?>

<?php 
require_once "data/siswa.php";
require_once "data/hasil.php";
require_once "data/kriteria.php";

$limit = 10;
$hasil = getAllResultByDescAndLimit($limit);
?>
<?php include "templates/header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid mt-5">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Daftar Siswa Penerima Beasiswa</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered dataTable">
              <thead>
                <tr role="row">
                  <th>Rangking</th>
                  <th>Nama Siswa</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($hasil as $key => $value): ?>
                <tr>
                  <td><?= ++$key; ?></td>
                  <td><?= $value['nama_siswa']; ?></td>
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
<script>
  setTimeout(() => {
    window.close()
  }, 2000);
</script>
<?php include "templates/footer.php" ?>