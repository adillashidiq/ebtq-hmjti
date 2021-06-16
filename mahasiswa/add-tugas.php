<?php
session_start();
if ($_SESSION['level'] == "") {
  header("Location: login.php");
}

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select * from users";
$result = mysqli_query($conn, $query);
$menu = mysqli_fetch_assoc($result);

$title = 'Tambah Tugas | E-BTQ HMJ TI';
include_once 'sidenav.php';
?>

<!-- Main content -->
<div class="main-content" id="panel">
  <!-- Topnav -->
  <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Search form -->
  </nav>
  <!-- Header -->
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Tugas</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="inputtugas.php">Input Tugas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Tugas</li>
              </ol>
            </nav>
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
            <h3 class="mb-0">TAMBAH TUGAS E-BTQ</h3>
          </div>
          <!-- Light table -->
          <tr>
            <div class="card-body">
              <form action="act.php" method="post">
                <div class="row mb-3">
                  <label for="nama surah" class="col-sm-2 col-form-label">Nama Surah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama surah" name="nama surah" required="required">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tugas" class="col-sm-2 col-form-label">Tugas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tugas" name="tugas" required="required">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit-tugas">Tambah Tugas</button>
              </form>
          </tr>
        </div>
      </div>
    </div>
  </div>

  <?php
  include_once 'footer.php';
  ?>