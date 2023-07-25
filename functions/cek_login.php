<?php

session_start();

include 'koneksi.php';

if (isset($_POST['btn_login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

    $sql_user    = mysqli_query($koneksi, "SELECT * from user where username = '$username' and password = '$password'");
    $row_user    = mysqli_num_rows($sql_user);
    $user        = mysqli_fetch_array($sql_user);

    if ($row_user > 0) {
        $_SESSION['nama']       = $user['nama_user'];
        $_SESSION['level']      = $user['level'];
        $_SESSION['no_akun']    = $user['id_user'];
        $_SESSION['username']   = $user['username'];

        if ($_SESSION['level'] == 'bendahara') {
            header('location: ../user/bendahara.php');
        } else {
            header('location: ../index.php? Maaf level user tidak diketahui!');
        }
    } else {
        header('location: ../index.php? Maaf akun tidak ditemukan!');
    }
}
