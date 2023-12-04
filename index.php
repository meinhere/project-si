<?php 
$title = "Halaman Beranda | SPB-MABA";
$page = "home";
?>

<?php 
require_once "data/siswa.php";
require_once "data/kriteria.php";

$siswa = getAllStudent();
$kriteria = getAllCriteria();
?>

<?php include "templates/header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row justify-content-center">
    <!-- Data Siswa Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-xs font-weight-bold text-primary text-uppercase mb-1"
              >
                Jumlah Siswa
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= count($siswa); ?> Orang
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah Kriteria Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-xs font-weight-bold text-success text-uppercase mb-1"
              >
                Jumlah Kriteria
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?= count($kriteria); ?> Kriteria
              </div>
            </div>
            <div class="col-auto">
              <i
                class="fas fa-clipboard-list fa-2x text-gray-300"
              ></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- End Page Conter -->
<?php include "templates/footer.php" ?>