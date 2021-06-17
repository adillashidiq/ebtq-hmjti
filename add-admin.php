<?php
session_start();
if ($_SESSION['level'] == "") {
	header("Location: login.php");
}

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "select * from users where level= 'admin'";
$result = mysqli_query($conn, $query);
$menu = mysqli_fetch_assoc($result);

$title = 'Tambah Admin | E-BTQ HMJ TI';
include_once 'sidenav.php';
?>

<!-- Main content -->
<div class="main-content" id="panel">
	<!-- Header -->
	<div class="header bg-primary pb-6">
		<div class="container-fluid">
			<div class="header-body">
				<div class="row align-items-center py-4">
					<div class="col-lg-6 col-7">
						<h6 class="h2 text-white d-inline-block mb-0">Admin</h6>
						<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
							<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
								<li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
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
						<h3 class="mb-0">TAMBAH ADMIN</h3>
					</div>
					<!-- Light table -->
					<tr>
						<div class="card-body">
							<form action="act-admin.php" method="post">
								<div class="row mb-3">
									<label for="username" class="col-sm-2 col-form-label">Username</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="username" name="username" required="required">
									</div>
								</div>
								<div class="row mb-3">
									<label for="nim" class="col-sm-2 col-form-label">NIM</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nim" name="nim" required="required">
									</div>
								</div>
								<div class="row mb-3">
									<label for="password" class="col-sm-2 col-form-label">Password</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" name="password" required="required">
									</div>
								</div>
								<!-- Radio -->
								<fieldset class="row mb-3">
									<legend class="col-form-label col-sm-2 pt-0">Level</legend>
									<div class="col-sm-10">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="level" id="level" value="admin" checked>
											<label class="form-check-label" for="level">
												Admin
											</label>
										</div>
								</fieldset>
								<button type="submit" class="btn btn-primary" name="submit-admin">Tambah Admin</button>
							</form>
					</tr>
				</div>
			</div>
		</div>
	</div>
	<?php
	include_once 'footer.php';
	?>