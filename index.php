<?php
session_start();
if ($_SESSION['level'] == "") {
  header("Location: login.php");
}
$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select*from users  where level = 'mahasiswa'";
$result = mysqli_query($conn, $query);
$hitung_mahasiswa = mysqli_num_rows($result);

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select*from tugas";
$result = mysqli_query($conn, $query);
$hitung_tugas = mysqli_num_rows($result);

$title = 'Home | E-BTQ HMJ TI';
include_once 'sidenav.php';
?>

chart-pie-35
money-coins
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Home</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="content-wrapper">
  <!-- Card stats -->
  <div class="container-fluid mt--6">
    <div class="row">
      <!-- Card -->
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Mahasiswa</h5>
                <span class="h2 font-weight-bold mb-0"><?= $hitung_mahasiswa; ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                  <i class="ni ni-active-40"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
          <!-- Card body -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Seluruh Tugas</h5>
                <span class="h2 font-weight-bold mb-0"><?= $hitung_tugas; ?></span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                  <i class="ni ni-chart-bar-32"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Card -->
      <!-- End Row -->
    </div>
    <!-- Footer
    <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; 2021 <a href="#" class="font-weight-bold ml-1">Fadillah Ahmad Ashshidiq & Tasya Nabila Arsy</a>
          </div>
        </div>
      </div>
    </footer> -->
  </div>
  <?php include_once 'footer.php' ?>
</div>