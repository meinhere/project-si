<?php 
$title = "Hasil Perhitungan | SPB-MABA";
$page = "hitung";
?>

<?php 
require_once "data/siswa.php";
require_once "data/hasil.php";
require_once "data/kriteria.php";

$hasil = getAllResultByDesc();
$kriteria = getAllCriteria();
?>

<?php include "templates/header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Hasil Perhitungan</h1>
  <p>
    Berikut adalah hasil perhitungan dari data tiap siswa sesuai
    dengan bobot yang ada.
  </p>
  <button class="btn btn-primary mb-2 btn-print" onclick="window.print()">
    <i class="fa fa-print"></i>
    Cetak
  </button>

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
                  <th>Rangking</th>
                  <th>Nama Siswa</th>
                  <?php foreach ($kriteria as $k): ?>
                  <th><?= $k['kode_kriteria']; ?></th>
                  <?php endforeach; ?>
                  <th>Skor (Vektor Si)</th>
                  <th>Hasil Akhir (Vektor Vi)</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($hasil as $key => $value): ?>
                <?php $skors = countScore($value['id_siswa']); ?>
                <tr>
                  <td><?= ++$key; ?></td>
                  <td><?= $value['nama_siswa']; ?></td>
                  <?php foreach ($skors['kode'] as $s): ?>
                  <td><?= $s; ?></td>
                  <?php endforeach; ?>
                  <td><?= $value['skor']; ?></td>
                  <td><?= $value['hasil_akhir']; ?></td>
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
        