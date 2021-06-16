<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_ebtq");

$nim = $_POST['nim'];
$password = $_POST['password'];

$query = "SELECT * from users where nim ='$nim' && password='$password'";
$login = mysqli_query($conn, $query);
$isLogin = mysqli_num_rows($login);

// Cek Login
if ($isLogin > 0) {
  $data = mysqli_fetch_assoc($login);

  if ($data['level'] == "admin") {

    $_SESSION['nim'] = $nim;
    $_SESSION['level'] = "admin";
    header("location:index.php");
  } else if ($data['level'] == "mahasiswa") {
    $_SESSION['nim'] = $nim;
    $_SESSION['level'] = "mahasiswa";
    header("location:mahasiswa");
  }
} else {
  $message = "<p class= 'alert alert-danger'> Login gagal : (NIM / Password) salah </p";
  header("location:login.php?msg=$message");
}

// Aksi Ganti Password
if (isset($_POST['changepwd'])) {
  $password = $_POST['password'];

  $query = "update users set password='$password'";
  if (mysqli_query($conn, $query) == 'true') {
    $message = "<p class= 'alert alert-success'> Password berhasil diganti</p>";
    header("Location: login.php?msg=$message");
  }
}

// Aksi Tugas
if (isset($_POST['submit-tugas'])) {
  $nama_surah = $_POST['nama_surah'];
  $tugas = $_POST['tugas'];

  $query = "insert into tugas (nama_surah, tugas) values ('$nama_surah','$tugas')";
  if (mysqli_query($conn, $query) == 'true') {
    $message = "<p class= 'alert alert-success'> Berhasil menambahkan tugas baru !</p>";
    header("Location: inputtugas.php?msg=$message");
  } else {
    echo "Terjadi kesalahan saat menambahkan tugas!";
  }
} else if (isset($_GET['del'])) {
  $id = $_GET['id'];
  $query = "delete from tugas where id=$id";
  if (mysqli_query($conn, $query) == 'true') {
    $message = "<p class= 'alert alert-success'> Data berhasil didelete </p>";
    header("Location: inputtugas.php?msg=$message");
  } else {
    $message = "<p class= 'alert alert-success'> Data gagal didelete </p>" . mysqli_error($conn);
  }
}
