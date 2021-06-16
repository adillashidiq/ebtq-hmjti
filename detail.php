<?php
session_start();
if ($_SESSION['level'] == "") {
  header("Location: login.php");
}

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select * from users";
$result = mysqli_query($conn, $query);
$menu = mysqli_fetch_assoc($result);

$title = 'Detail Tugas | E-BTQ HMJ TI';
include_once 'sidenav.php';

$id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select*from tugas where id = '$id'";
$result = mysqli_query($conn, $query);

if (!$result) {
  echo mysqli_error($conn);
}

$data = mysqli_fetch_assoc($result);
?>

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
        <div class="card text-center">
          <div class="card-header">
            DETAIL TUGAS
          </div>
          <div class="card-body">
            <h1 class="card-title">Surah <?= $data['nama_surah']; ?></h1>
            <p class="card-text"><b><?= $data['tugas']; ?></b></p>

            <!-- Button -->
            <div class="my-5">
              <a href="" class="btn btn-outline-warning btn-sm">edit</a>
              <a href="act.php?del&id=<?= $data['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">Delete</a>
              <a href="#" class="btn btn-outline-primary btn-sm">validasi</a>
              <a href="#" class="btn btn-outline-success btn-sm">ambil tugas</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once 'footer.php'; ?>