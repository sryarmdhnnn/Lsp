<?php
require 'functions.php';
$sql = "DELETE FROM meja WHERE idmeja = " . $_GET['id'];
$exe = mysqli_query($conn, $sql);

if ($exe) {
    $success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: meja.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
}
