<?php
require 'functions.php';
require 'header.php';
$query = 'SELECT * FROM meja';
$data = ambildata($conn, $query);
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Meja</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="col-md-6">
                <a href="mejatambah.php" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nomer Meja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php foreach ($data as $meja) : ?>
                    <tr>
                        <td><?= $meja['idmeja'] ?></td>
                        <td><?= $meja['nomermeja'] ?></td>
                        <td align="center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="mejaedit.php?id=<?= $meja['idmeja']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="mejahapus.php?id=<?= $meja['idmeja']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>