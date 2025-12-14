<?php
$conn = mysqli_connect("localhost", "root", "", "blogku");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
