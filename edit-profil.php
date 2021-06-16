<?php
session_start();
if ($_SESSION['level'] == "") {
    header("Location: login.php");
}

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select * from users";
$result = mysqli_query($conn, $query);
$menu = mysqli_fetch_assoc($result);

$title = 'Profil | E-BTQ HMJ TI';
include_once 'sidenav.php';
?>

<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Page content -->
    <div class="container-fluid mt-1">

        <div class="col-xl-10 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profil </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="add-profil.php" type="submit" class="btn btn-sm btn-primary" name="submit-profil">Kirim</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="add-profil.php" method="POST">
                        <h6 class="heading-small text-muted mb-4">Informasi Data Diri</h6>
                        <div class="row">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-nim">NIM</label>
                                            <input type="text" id="input-nim" class="form-control" required="required" placeholder="Masukkan NIM">
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
                                            <label class="form-control-label" for="input-email">Email</label>
                                            <input type="email" id="input-email" class="form-control" placeholder="Alamat Email">
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

<?php
include_once 'footer.php';
?>