<?php
session_start();
$title = 'Ganti Password | E-BTQ HMJ TI';
include_once 'sidenav.php';
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
}
?>

<div class="container">
    <div class="card mt-5" style="width: 70%;">
        <div class="card-header">
            <strong> GANTI PASSWORD </strong>
        </div>
        <form action="act.php" method="POST" class="p-3">
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <br>
            <div class="position-relative mt-3">
                <button type="submit" name="changepwd" class="btn btn-primary position-absolute bottom-0 end-0">
                    Ganti Password
                </button>
            </div>
        </form>
    </div>
</div>

<?php
include_once 'footer.php';
?>