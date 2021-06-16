<?php

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select * from users";
$result = mysqli_query($conn, $query);
$menu = mysqli_fetch_assoc($result);

include 'sidenav.php';

if (isset($_POST['submit-profil'])) {
	//echo "tombol submit ditekan";
	$NIM = $_POST['NIM'];
	$kelasti = $_POST['kelasti'];
	$semester = $_POST['semester'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$ttl = $_POST['ttl'];
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];

	$query = "insert into identitas (NIM, kelasti, semester, nama, email, ttl, no_hp, alamat) values ('$NIM', '$kelati', '$semester', '$nama',
        '$email', '$ttl', '$no_hp', '$alamat', )";

	if (mysqli_query($conn, $query) == 'true') {
		$message = "Data berhasil di input";
		header("Location: profil.php?msg=$message");
	} else {
		$message = "Data gagal di input" . mysqli_error($conn);
	}
}

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
								<li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item"><a href="add-admin.php">Input Admin</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
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
						<h3 class="mb-0">INFORMASI</h3>
					</div>
					<!-- Light table -->
					<tr>
						<div class="card-body">
							<form action="add-profil.php" method="post">
								<div class="row mb-2">
									<label for="data" class="col-sm-6 col-form-label">Data Anda Berhasil di Kirim</label>
								</div>
								<div class="card-footer text-end">
									<a href="profil.php" class="badge bg-warning text-dark"> Kembali ke data diri </a>
								</div>
							</form>
						</div>
					</tr>
				</div>
			</div>
		</div>
	</div>