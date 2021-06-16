<?php
session_start();
if ($_SESSION['level'] == "") {
  header("Location: login.php");
}
$title = 'Admin | E-BTQ HMJ TI';
include_once 'sidenav.php';

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select*from users  where level = 'admin'";
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
          <h6 class="h2 text-white d-inline-block mb-0">Home</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Admin</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-7 text-right">
          <a href="add-admin.php" class="btn btn-sm btn-neutral">Tambah Admin</a>
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
          <h3 class="mb-0">DATA ADMIN</h3>
        </div>

        <!-- Pesan -->
        <div class="row mb-2">
          <div>
            <?php if (isset($gagal_hapus)) : ?>
              <div class="alert alert-danger text-white mt-4" role="alert">
                Data admin gagal dihapus
              </div>
            <?php endif ?>
            <?php if (isset($berhasil_hapus)) : ?>
              <div class="alert alert-success text-white mt-4" role="alert">
                Data admin berhasil dihapus
              </div>
            <?php endif ?>
            <?php if (isset($gagal_tambah)) : ?>
              <div class="alert alert-danger text-white mt-4" role="alert">
                Data admin gagal ditambah
              </div>
            <?php endif ?>
            <?php if (isset($berhasil_tambah)) : ?>
              <div class="alert alert-success text-white mt-4" role="alert">
                Data admin berhasil ditambah
              </div>
            <?php endif ?>
            <?php if (isset($gagal_edit)) : ?>
              <div class="alert alert-danger text-white mt-4" role="alert">
                Data admin gagal diedit
              </div>
            <?php endif ?>
            <?php if (isset($berhasil_edit)) : ?>
              <div class="alert alert-success text-white mt-4" role="alert">
                Data admin berhasil diedit
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
                    <a href="act-admin.php?del&id=<?= $data['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">Delete</a>
                  </td>
                </tr>
                <?php $angka++ ?>
              <?php endforeach ?>
            </tbody>
            <div class=" row mt-3">
              <?php
              if (isset($_GET['msg'])) {
                echo $_GET['msg'];
              }
              ?>
            </div>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php include_once 'footer.php' ?>