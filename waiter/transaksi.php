<?php
require 'functions.php';
require 'header.php';
$query = 'SELECT transaksi.*, pesanan.idpesanan FROM transaksi INNER JOIN pesanan ON pesanan.idpesanan = transaksi.idpesanan ';
$data = ambildata($conn, $query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Id Pesanan</th>
                        <th>Nomer Meja</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $menu) : ?>
                        <tr>
                            <td><?= $menu['idtransaksi'] ?></td>
                            <td><?= $menu['idpesanan'] ?></td>
                            <td><?= $menu['nomermeja'] ?></td>
                            <td><?= $menu['total'] ?></td>
                            <td><?= $menu['bayar'] ?></td>
                            <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="pelanggan_edit.php?id=<?= $menu['idtransaksi']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="pelanggan_hapus.php?id=<?= $menu['idtransaksi']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </div>
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