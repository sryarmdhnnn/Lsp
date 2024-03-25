<?php
$title = 'transaksi';
require 'functions.php';
require 'header.php';
$query = "SELECT transaksi.*,meja.nomermeja, pelanggan.namapelanggan , pesanan.totalharga FROM transaksi INNER JOIN meja ON meja.idmeja = transaksi.mejaid INNER JOIN pelanggan ON pelanggan.idpelanggan = transaksi.pelangganid INNER JOIN pesanan ON pesanan.transaksiid = transaksi.idtransaksi ";
$data = ambildata($conn, $query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Data Transaksi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="col-md-6">
                <a href="transaksikonfirmasi.php" class="btn btn-success box-title"><i class="fa fa-check fa-fw"></i> Konfirmasi Pembayaran</a>
            </div>
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomer Meja</th>
                        <th>Kode Invoice</th>
                        <th>Nama Pelanggan</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $menu) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $menu['nomermeja'] ?></td>
                            <td><?= $menu['kodeinvoice'] ?></td>
                            <td><?= $menu['namapelanggan'] ?></td>
                            <td><?= $menu['status'] ?></td>
                            <td><?= $menu['statusbayar'] ?></td>
                            <td><?= $menu['totalharga'] ?></td>
                            <td align="center">
                                <a href="transaksiedit.php?id=<?= $menu['idtransaksi']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="transaksihapus.php?id=<?= $menu['idtransaksi']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>