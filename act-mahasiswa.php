<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_ebtq");

if (isset($_POST['submit-mhs'])) {
    //echo "tombol submit ditekan";
    $username = $_POST['username'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = "insert into users (username, nim, password, level) values ('$username', '$nim', '$password', '$level')";

    if (mysqli_query($conn, $query) == 'true') {
        header("Location: mahasiswa.php?pesan_tambah=berhasil");
    } else {
        header("Location: mahasiswa.php?pesan_tambah=gagal");
    }
} else if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $query = "delete from users where id=$id";
    if (mysqli_query($conn, $query) == 'true') {
        header("Location: mahasiswa.php?pesan_hapus=berhasil");
    } else {
        header("Location: mahasiswa.php?pesan_hapus=gagal");
    }
}
