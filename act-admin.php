<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_ebtq");

if (isset($_POST['submit-admin'])) {
  //echo "tombol submit ditekan";
  $username = $_POST['username'];
  $nim = $_POST['nim'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $query = "insert into users (username, nim, password, level) values ('$username', '$nim', '$password', '$level')";

  if (mysqli_query($conn, $query) == 'true') {
    header("Location: admin.php?pesan_tambah=berhasil");
  } else {
    header("Location: admin.php?pesan_tambah=gagal");
  }
} else if (isset($_GET['del'])) {
  $id = $_GET['id'];
  $query = "delete from users where id=$id";
  if (mysqli_query($conn, $query) == 'true') {
    header("Location: admin.php?pesan_hapus=berhasil");
  } else {
    header("Location: admin.php?pesan_hapus=gagal");
  }
} else if (isset($_POST['edit-admin'])) {
  $username = $_POST['username'];
  $nim = $_POST['nim'];
  $level = $_POST['level'];
  $query = "update users set username='$username', nim='$nim', level='$level'";

  if (mysqli_query($conn, $query) == 'true') {
    header("Location: admin.php?pesan_edit=berhasil");
  } else {
    header("Location: admin.php?pesan_edit=gagal");
  }
}
