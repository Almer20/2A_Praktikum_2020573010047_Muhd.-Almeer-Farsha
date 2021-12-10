<?php
    require "koneksi.php";
    $kode_barang = $_GET['kode_barang'];
    $query = "DELETE FROM tb_barang WHERE kode_barang = '$kode_barang'";
    if($conn->query($query)) {
        header("location: ../barang.php");
    } else {
        echo "DATA GAGAL DIHAPUS!";
    }
