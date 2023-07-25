<?php

include '../functions/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$sekarang = date('YYYY-MM-DD');

$sql = mysqli_query($koneksi, "SELECT SUM(kas_masuk) as 'total_kas_masuk' from transaksi");
$row = mysqli_fetch_array($sql);
$kas_masuk = $row['total_kas_masuk'];

$sql = mysqli_query($koneksi, "SELECT SUM(kas_keluar) as 'total_kas_keluar' from transaksi");
$row = mysqli_fetch_array($sql);
$kas_keluar = $row['total_kas_keluar'];

$total_saldo = $kas_masuk - $kas_keluar;
?>

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>Rp. <?= $kas_masuk; ?></h3>

                <p>KAS MASUK</p>
            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="?page=kas masuk" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>Rp. <?= $kas_keluar; ?></h3>

                <p>KAS KELUAR</p>
            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Rp. <?= $total_saldo; ?></h3>

                <p>TOTAL SALDO</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=laporan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>