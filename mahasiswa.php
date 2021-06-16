<?php
session_start();
if ($_SESSION['level'] == "") {
  header("Location: login.php");
}
$title = 'Mahasiswa | E-BTQ HMJ TI';
include_once 'sidenav.php';

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select*from users where level = 'mahasiswa'";
$result = mysqli_query($conn, $query);

if (!$result) {
  echo mysqli_error($conn);
}

// Pesan Tambah
if (isset($_GET['pesan_tambah'])) {
  if ($_GET['pesan_tambah'] == "berhasil") {
    $berhasil_tambah = true;
  } else if ($_GET['pesan_tambah'] == "gagal") {
    $gagal_tambah = true;
  }
}

// Pesan Hapus
if (isset($_GET['pesan_hapus'])) {
  if ($_GET['pesan_hapus'] == "berhasil") {
    $berhasil_hapus = true;
  } else if ($_GET['pesan_hapus'] == "gagal") {
    $gagal_hapus = true;
  }
}
?>

<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Mahasiswa</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="mahasiswa.php">Mahasiswa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-7 text-right">
          <a href="add-mahasiswa.php" class="btn btn-sm btn-neutral">Tambah Mahasiswa</a>
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
          <h3 class="mb-0">DATA MAHASISWA</h3>
        </div>

        <!-- Pesan -->
        <div class="row mb-2">
          <div>
            <?php if (isset($gagal_hapus)) : ?>
              <div class="alert alert-danger text-white mt-4" role="alert">
                Data mahasiswa gagal dihapus
              </div>
            <?php endif ?>
            <?php if (isset($berhasil_hapus)) : ?>
              <div class="alert alert-success text-white mt-4" role="alert">
                Data mahasiswa berhasil dihapus
              </div>
            <?php endif ?>
            <?php if (isset($gagal_tambah)) : ?>
              <div class="alert alert-danger text-white mt-4" role="alert">
                Data mahasiswa gagal ditambah
              </div>
            <?php endif ?>
            <?php if (isset($berhasil_tambah)) : ?>
              <div class="alert alert-success text-white mt-4" role="alert">
                Data mahasiswa berhasil ditambah
              </div>
            <?php endif ?>
            <?php if (isset($gagal_edit)) : ?>
              <div class="alert alert-danger text-white mt-4" role="alert">
                Data mahasiswa gagal diedit
              </div>
            <?php endif ?>
            <?php if (isset($berhasil_edit)) : ?>
              <div class="alert alert-success text-white mt-4" role="alert">
                Data mahasiswa berhasil diedit
              </div>
            <?php endif ?>
          </div>
        </div>
        <!-- End Pesan -->

        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort">No</th>
                <th scope="col" class="sort">Username</th>
                <th scope="col" class="sort">NIM</th>
                <th scope="col" class="sort">Aksi</th>
              </tr>
            </thead>

            <tbody class="list">
              <?php $angka = 1; ?>
              <?php foreach ($result as $data) : ?>
                <tr>
                  <th scope="row"><?= $angka ?></th>
                  <td><?= $data['username'] ?></td>
                  <td><?= $data['nim'] ?></td>
                  <td>
                    <a href="act-mahasiswa.php?del&id=<?= $data['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">Delete</a>
                  </td>
                </tr>
                <?php $angka++ ?>
              <?php endforeach ?>
          </table>
          <!-- end-container -->
        </div>


        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Optional JS -->
        <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- Argon JS -->
        <script src="assets/js/argon.js?v=1.2.0"></script>
        </body>

        </html>