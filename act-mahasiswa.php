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
        $message = "<p class='alert alert-success'> Berhasil menambahkan mahasiswa </p>";
        header("Location: mahasiswa.php?msg=$message");
    } else {
        echo "Terjadi kesalahan saat menambahkan admin!";
    }
} else if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $query = "delete from users where id=$id";
    if (mysqli_query($conn, $query) == 'true') {
        $message = "<p class='alert alert-success'> Data mahasiswa berhasil didelete </p>";
        header("Location: mahasiswa.php?msg=$message");
    } else {
        $message = "<p class='alert alert-success'> Data mahasiswa gagal didelete </p>" . mysqli_error($conn);
    }
}
