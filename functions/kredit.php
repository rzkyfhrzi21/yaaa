<?php

include 'koneksi.php';

$no_akun = $_POST['no_akun'];

$sql = mysqli_query($koneksi, "SELECT SUM(kas_masuk) as 'total_kas_masuk' from transaksi where no_akun = '$no_akun'");
$row = mysqli_fetch_array($sql);
$kas_masuk = $row['total_kas_masuk'];

$sql = mysqli_query($koneksi, "SELECT SUM(kas_keluar) as 'total_kas_keluar' from transaksi where no_akun = '$no_akun'");
$row = mysqli_fetch_array($sql);
$kas_keluar = $row['total_kas_keluar'];

$saldo = $kas_masuk - $kas_keluar;

if (isset($_POST['btn_kas_masuk'])) {
    $tanggal     = htmlspecialchars($_POST['tanggal']);
    $no_bukti    = htmlspecialchars($_POST['no_bukti']);
    $no_akun     = htmlspecialchars($_POST['no_akun']);
    $tujuan      = htmlspecialchars($_POST['tujuan']);
    $jumlah      = htmlspecialchars($_POST['jumlah']);

    $total_saldo = $saldo + $jumlah;

    $sql_akun   = mysqli_query($koneksi, "SELECT * from akun where no_akun = '$no_akun'");
    $rows       = mysqli_num_rows($sql_akun);

    if ($rows > 0) {
        $query  = "INSERT into transaksi set tanggal = '$tanggal', no_bukti = '$no_bukti', no_akun = '$no_akun', tujuan = '$tujuan', kas_masuk = '$jumlah', saldo = '$total_saldo'";
        $tambah = mysqli_query($koneksi, $query);

        if ($tambah) {
            echo "<script>
                    location.replace('../user/bendahara.php?page=kas masuk');
                </script>";
        } else {
            echo "<script>
                    alert('Kas gagal ditambahkan!');
                    location.replace('../user/bendahara.php?page=kas masuk');
                </script>";
        }
    } else {
        echo "<script>
        alert('Akun tidak terdaftar!');
        location.replace('../user/bendahara.php?page=kas masuk');
    </script>";
    }
}
