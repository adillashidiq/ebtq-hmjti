<?php
include_once 'header.php';
if (!isset($_SESSION['user'])) {
  header("Location: index.php");
}
$conn = mysqli_connect("localhost", "root", "", "db_surahjuz30");
$query = "select*from db_surah";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$result) {
  echo mysqli_error($conn);
}
?>

<!-- Main content -->
<div class="main-content" id="panel">
  <!-- Topnav -->
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->
        <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
          <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </form>
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
          <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </div>
          </li>
          <li class="nav-item d-sm-none">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
              <i class="ni ni-zoom-split-in"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-bell-55"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="assets/img/theme/Tasya.jpg">
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Admin2</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Halo!</h6>
              </div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="changepwd.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header -->
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="inputtugas.php">Input Tugas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tugas</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-7 text-right">
            <a href="add-tugas.php" class="btn btn-sm btn-neutral">Tambah Tugas</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">INPUT TUGAS E-BTQ</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="no">No</th>
                  <th scope="col" class="sort" data-sort="nama surah">Nama Surah</th>
                  <th scope="col" class="sort" data-sort="tugas">Tugas </th>
                  <th scope="col" class="sort" data-sort="upload">Ambil Tugas</th>
                  <th scope="col" class="sort" data-sort="validasi">Validasi</th>
                  <th scope="col" class="sort" data-sort="completion">Kelengkapan</th>
                  <th scope="col" class="sort" data-sort="aksi">Aksi</th>
                </tr>
              </thead>
              <tbody class="list">
                <!-- Perulangan baris -->
                <?php $angka = 1; ?>
                <?php foreach ($result as $data) : ?>
                  <tr>
                    <th scope="row"><?= $angka ?></th>
                    <td><?= $data['nama_surah'] ?></td>
                    <td><?= $data['tugas'] ?></td>
                    <td><input class="btn btn-sm btn-neutral" type="button" value="Ambil Tugas"></td>
                    <td><input class="btn btn-sm btn-neutral" type="button" value="Validasi"></td>
                  </tr>
                  <?php $angka++ ?>
                <?php endforeach ?>
                <!-- akhir perulangan -->
              </tbody>
              <div class="row mt-3">
                <?php
                if (isset($_GET['msg'])) {
                  echo $_GET['msg'];
                }
                ?>
              </div>

          </div>

          <?php
          include_once 'footer.php';
          ?>