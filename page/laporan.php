<?php
date_default_timezone_set('Asia/Jakarta');

$sekarang   = date('Y-m-d');
?>

<div class="card">
    <div class="card-header">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3>Laporan</h3>
        </div>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center bg-info">
                <tr>
                    <th class="text-center">No</th>
                    <th>Tanggal</th>
                    <th>No Bukti</th>
                    <th>No Akun</th>
                    <th>Tujuan</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                </tr>
            </thead>

            <tbody>
                <?php

                include '../functions/koneksi.php';

                $no = 1;

                $sql_kas_masuk = mysqli_query($koneksi, "SELECT * from transaksi");

                while ($kas_masuk = mysqli_fetch_array($sql_kas_masuk)) :

                ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $kas_masuk['tanggal']; ?></td>
                        <td><?= $kas_masuk['no_bukti']; ?></td>
                        <td><?= $kas_masuk['no_akun']; ?></td>
                        <td><?= $kas_masuk['tujuan']; ?></td>
                        <td><sup>RP</sup> <?= $kas_masuk['kas_keluar']; ?></td>
                        <td><sup>RP</sup> <?= $kas_masuk['kas_masuk']; ?></td>
                        <td><sup>RP</sup> <?= $kas_masuk['saldo']; ?></td>
                    </tr>
    </div>
<?php endwhile ?>
</tbody>
<tfoot class="text-center">
    <tr>
        <th class="text-center">No</th>
        <th>Tanggal</th>
        <th>No Bukti</th>
        <th>No Akun</th>
        <th>Tujuan</th>
        <th>Debet</th>
        <th>Kredit</th>
        <th>Saldo</th>
    </tr>
</tfoot>
</table>
</div>
<!-- /.card-body -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modaltambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kas Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../functions/kredit.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= $sekarang; ?>" readonly required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_bukti">No Bukti</label>
                                <input type="number" name="no_bukti" id="no_bukti" class="form-control" value="<?= $sesi_no; ?>" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="no_akun">No Akun</label>
                        <input type="number" name="no_akun" id="no_akun" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <textarea name="tujuan" class="form-control" placeholder="Opsional" id="tujuan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" placeholder="Rp." class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" name="btn_kas_masuk" class="btn btn-primary">Tambah Kas Masuk</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>