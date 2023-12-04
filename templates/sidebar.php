<ul
  class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
  id="accordionSidebar"
>
  <!-- Sidebar - Brand -->
  <a
    class="sidebar-brand d-flex align-items-center justify-content-center"
    href="index.php"
  >
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SPB-Maba</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" />

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= $page == "home" ? "active" : ""; ?>">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a
    >
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider" />

  <!-- Heading -->
  <div class="sidebar-heading">Menu</div>

  <!-- Nav Item - Data Mahasiswa -->
  <li class="nav-item <?= $page == "siswa" ? "active" : ""; ?>">
    <a class="nav-link" href="siswa.php">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Siswa</span></a
    >
  </li>

  <!-- Nav Item - Kriteria dan Bobot -->
  <li class="nav-item <?= $page == "kriteria" ? "active" : ""; ?>">
    <a class="nav-link" href="kriteria.php">
      <i class="fas fa-fw fa fa-weight"></i>
      <span>Kriteria dan Bobot</span></a
    >
  </li>

  <!-- Nav Item - Kriteria dan Bobot -->
  <li class="nav-item <?= $page == "hitung" ? "active" : ""; ?>">
    <a class="nav-link" href="hitung.php">
      <i class="fas fa-fw fa-calculator"></i>
      <span>Hasil Perhitungan</span></a
    >
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" />

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>