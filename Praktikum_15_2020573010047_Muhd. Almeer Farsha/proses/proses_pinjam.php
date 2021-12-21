<?php
session_start();

require "koneksi.php";
$brg = $_POST['brg'];
$mk = $_POST['mk'];
$wkt = $_POST['wkt_kembali'];
if (empty($_POST['wkt_kembali'])) {
    echo "<script>alert('Waktu pengembalian harus diisi')</script>";
    echo "<script>window.location = '../pinjam'</script>";
} else {
    $wkt_kembali = $_POST['wkt_kembali'];
}

$select_id = mysqli_query($conn, "SELECT id FROM tb_user WHERE username='$_SESSION[username]'");
$hasil_id = mysqli_fetch_array($select_id);
$id = $hasil_id['id'];

if ($select_id) {
    $select_barang = mysqli_query($conn, "SELECT barang FROM tb_peminjaman WHERE barang='$brg' && (status=1 || status=2)");
    $hasil_barang = mysqli_fetch_array($select_barang);
}
if ($hasil_barang['barang'] == $brg) {
    echo "<script>alert('peminjaman barang sudah ada, tolong pilih yang lain')</script>";
    echo "<script>window.location = '../pinjam'</script>";
} else {
    $input = mysqli_query($conn, "INSERT INTO tb_peminjaman (barang,user,status,matakuliah,waktu_pengembalian) VALUES ($brg, $id, 1, '$mk', '$wkt')");

    if ($input) {
        echo "<script>alert('Peminjaman berhasil ditambahkan')</script>";
        echo "<script>window.location = '../pinjam'</script>";
    } else {
        echo "<script>alert('Peminjaman gagal ditambahkan')</script>";
        echo "<script>window.location = '../pinjam'</script>";
    }
}
