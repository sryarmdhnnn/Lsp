<?php
session_start();
$_SESSION['namauser'] = $namauser;
$conn = mysqli_connect('localhost', 'root', '', 'lsp');

$username = stripslashes($_POST['username']);
$password = md5($_POST['password']);
$query = "SELECT * FROM user where username='$username' and password = '$password'";
$row = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($row);
$cek = mysqli_num_rows($row);


if ($cek > 0) {
    if ($data['role'] == 'admin') {
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $data['username'];
        $_SESSION['iduser'] = $data['iduser'];
        header('location:admin/index.php');
    } else if ($data['role'] == 'kasir') {
        $_SESSION['role'] = 'kasir';
        $_SESSION['username'] = $data['username'];
        $_SESSION['iduser'] = $data['iduser'];
        header('location:kasir/transaksi.php');
    } else if ($data['role'] == 'owner') {
        $_SESSION['role'] = 'owner';
        $_SESSION['username'] = $data['username'];
        $_SESSION['iduser'] = $data['iduser'];
        header('location:owner/laporan.php');
    } else if ($data['role'] == 'waiter') {
        $_SESSION['role'] = 'waiter';
        $_SESSION['username'] = $data['username'];
        $_SESSION['iduser'] = $data['iduser'];
        header('location:waiter/order.php');
    }
} else {
    $msg = 'Username Atau Password Salah';
    header('location:index.php?msg=' . $msg);
}
