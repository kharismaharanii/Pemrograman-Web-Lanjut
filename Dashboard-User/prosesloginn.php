<?php
ob_start();
session_start();
include "koneksi.php";
$username        = mysqli_real_escape_string($koneksi, $_POST['username']);
$password        = mysqli_real_escape_string($koneksi, ($_POST['password']));
$op             = $_GET['op'];

if ($op == "in") {
    $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($sql) == 1) {
        $qry = mysqli_fetch_array($sql);
        $_SESSION['id']    = $qry['id'];
        $_SESSION['nama']    = $qry['nama'];
        $_SESSION['username']    = $qry['username'];
        $_SESSION['password']    = $qry['password'];
        $_SESSION['email']    = $qry['email'];
        $_SESSION['hakakses']    = $qry['hakakses'];

        if ($qry['hakakses'] == "user") {
            header("location:berandauser.php");
        }
    } else {
?>
        <script language="JavaScript">
            alert('Maaf, Username dan Password salah');
            document.location = '../loginuser.php';
        </script>
<?php
    }
} else if ($op == "out") {
    unset($_SESSION['id']);
    header("location:../index.php");
}
?>