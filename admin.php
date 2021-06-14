<?php
session_start();
$title = 'Admin | E-BTQ HMJ TI';
include_once 'sidenav.php';
if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
}

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select*from admin";
$result = mysqli_query($conn, $query);

if (!$result) {
  echo mysqli_error($conn);
}
?>

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
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort">No</th>
                <th scope="col" class="sort">NIM</th>
                <th scope="col" class="sort">Password</th>
                <th scope="col" class="sort">Aksi</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php $angka = 1; ?>
              <?php foreach ($result as $data) : ?>
                <tr>
                  <th scope="row"><?= $angka ?></th>
                  <td><?= $data['username'] ?></td>
                  <td><?= $data['password'] ?></td>
                  <td>
                    <a href="act.php?del&id=<?= $data['id'] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                  </td>
                </tr>
                <?php $angka++ ?>
              <?php endforeach ?>
            </tbody>
            <div class="row mt-3">
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