<?php
session_start();
if ($_SESSION['level'] == "") {
  header("Location: login.php");
}

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select * from users where level = 'admin'";
$result = mysqli_query($conn, $query);
$menu = mysqli_fetch_assoc($result);
$data = mysqli_fetch_assoc($result);

$title = 'Profil | E-BTQ HMJ TI';
include_once 'sidenav.php';
?>

<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center pt-3">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Profil</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="profil.php">Profil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Informasi Data Diri</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-7 text-right">
          <a href="edit-profil.php" class="btn btn-sm btn-neutral">Edit Profil</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Header -->
  <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Page content -->
    <div class="container-fluid mt-1">

      <div class="col-xl-12 order-xl-1">
        <div class="card mt-2">
          <div class="card-body">
            <form action="add-profil.php" method="POST">
              <h6 class="heading-small text-muted mb-4">Informasi Data Diri</h6>
              <div class="row">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-nim">NIM</label>
                        <input type="text" id="input-nim" class="form-control" readonly value="<?= $data['nim']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-kelas">Kelas TI</label>
                        <input type="text" id="input-kelas" class="form-control" required="required" placeholder="Contoh : TI-1A">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-semester">Semester</label>
                        <input type="text" id="input-semester" class="form-control" required="required" placeholder="Contoh : Semester 1">
                      </div>
                    </div>
                  </div>

                  <hr class="my-4" />
                  <!-- LAINNYA -->
                  <h6 class="heading-small text-muted mb-4">Informasi Lainnya</h6>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-full-name">Nama Lengkap</label>
                        <input type="text" id="input-full-name" class="form-control" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-ttl">Tempat Tanggal Lahir</label>
                        <input type="text" id="input-ttl" class="form-control" required="required" placeholder="Contoh : Bekasi, 14 February 1904">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" id="input-email" class="form-control" placeholder="Alamat Email">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-number">Nomor Handphone</label>
                        <input type="text" id="input-number" class="form-control" placeholder="Nomor Handphone Aktif">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Alamat Lengkap</label>
                        <input id="input-address" class="form-control" placeholder="Alamat Lengkap" type="text">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once 'footer.php';
?>