<?php
require 'functions.php';
$sql = "DELETE FROM menu WHERE idmenu = " . $_GET['id'];
$exe = mysqli_query($conn, $sql);

if ($exe) {
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: barang.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
}
