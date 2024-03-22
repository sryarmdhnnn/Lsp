<?php
require 'functions.php';
$sql = "DELETE FROM pesanan WHERE idpesanan = " . $_GET['id'];
$exe = mysqli_query($conn, $sql);

if ($exe) {
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: order.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
}
