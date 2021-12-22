<?php
$con = mysqli_connect("localhost", "root", "", "beasiswakuv2");

if (mysqli_connect_errno()) {
    echo "Tidak dapat terhubung: " . mysqli_connect_errno();
}
