<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "db_ebtq");
$query = "SELECT * from admin where username ='$username' && password='$password'";
$login = mysqli_query($conn, $query);
$isLogin = mysqli_num_rows($login);

if (isset($_POST['tblogin'])) {
    if ($isLogin == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    } else {
        $msg = "<p class= 'alert alert-danger'> Username atau Password Anda salah</p>";
        header("Location: index.php?msg=$msg");
    }
} else {
    echo "Tombol Submit Kosong";
}


if (isset($_POST['changepwd'])) {
    $password = $_POST['password'];

    $query = "update user set password='$password'";
    if (mysqli_query($conn, $query) == 'true') {
        $message = "<p class= 'alert alert-success'> Password berhasil diganti !</p>";
        header("Location: index.php?msg=$message");
    }
}


$conn = mysqli_connect("localhost", "root", "", "db_ebtq");

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
}
