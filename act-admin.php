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
        $message = "<p class='alert alert-success'> Berhasil menambahkan admin </p>";
        header("Location: admin.php?msg=$message");
    } else {
        echo "Terjadi kesalahan saat menambahkan admin!";
    }
} else if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $query = "delete from users where id=$id";
    if (mysqli_query($conn, $query) == 'true') {
        $message = "<p class='alert alert-success'> Data berhasil didelete </p>";
        header("Location: admin.php?msg=$message");
    } else {
        $message = "<p class='alert alert-success'> Data gagal didelete </p>" . mysqli_error($conn);
    }
}
