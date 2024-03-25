<?php
require 'functions.php';
require 'header.php';
$query = 'SELECT * FROM pelanggan';
$data = ambildata($conn, $query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Data Pelanggan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="col-md-6">
                <a href="transaksicarimenu.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
            </div>
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $barang) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $barang['namapelanggan'] ?></td>
                            <td><?= $barang['jeniskelamin'] ?></td>
                            <td><?= $barang['nohp'] ?></td>
                            <td><?= $barang['alamat'] ?></td>
                            <td align="center">
                                <a href="ordertambah.php?id=<?= $barang['idpelanggan']; ?>" data-toggle="tooltip" data-placement="bottom" title="Pilih" class="btn btn-primary btn-block"> Pilih</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>