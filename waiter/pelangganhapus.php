<?php
require 'functions.php';
$sql = "DELETE FROM pelanggan WHERE idpelanggan = " . $_GET['id'];
$exe = mysqli_query($conn, $sql);

if ($exe) {
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: pelanggan.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
}
