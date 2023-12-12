<?php 
$title = "Kriteria dan Bobot | SPB-MABA";
$page = "kriteria";
?>

<?php 
require_once "data/kriteria.php";
$kriteria = getAllCriteria();
$no = 1;

if (isset($_POST['bobot'])) {
  foreach ($_POST['bobot'] as $key => $bobot) {
    if (!preg_match("/^[0-9.]+$/", htmlspecialchars($bobot))) $errors['bobot' . $key] = "Inputan harus berupa angka";
  }

  if(!isset($errors)) $success = editCriteria($_POST);
}
?>

<?php include "templates/header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Kriteria dan Bobot</h1>
  <p>Berikut adalah detail kriteria dan bobot yang ada.</p>

  <?php if (isset($success)) : ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
      <i class="fa fa-check-circle mr-3"></i>
      <div>
        Bobot berhasil diubah
      </div>
    </div>
  <?php header("Refresh: 1") ?>
  <?php endif; ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="row">
          <div class="col-sm-12">
            <table class="table table-bordered">
              <thead>
                <tr role="row">
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama Kriteria</th>
                  <th>Bobot</th>
                  <th>Bobot setelah Normalisasi</th>
                  <th>Atribut</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($kriteria as $key => $k): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $k['kode_kriteria']; ?></td>
                  <td><?= $k['nama_kriteria']; ?></td>
                  <td>
                    <input type="text" class="form-control <?= isset($errors['bobot' . $key]) ? "is-invalid" : ""; ?>" name="bobot[]" value="<?= isset($_POST['bobot']) ? $_POST['bobot'][$key] :  $k['bobot']; ?>" />
                    <input type="hidden" name="kode[]" value="<?= $k['kode_kriteria']; ?>" />
                    <span class="invalid-feedback"><?= $errors['bobot' . $key]; ?></span>
                  </td>
                  <td><?= number_format(countNormalization($k['bobot']), 2); ?></td>
                  <td>
                    <select name="atribut[]" id="atribut" class="form-control">
                      <option value="Benefit" <?= $k['atribut'] == "Benefit" ? "selected" : ""; ?>>Benefit</option>
                      <option value="Cost" <?= $k['atribut'] == "Cost" ? "selected" : ""; ?>> Cost</option>
                    </select>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <button class="btn btn-primary mb-3" type="submit">
              <i class="fa fa-save"></i>
              Edit Kriteria
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<?php include "templates/footer.php" ?>