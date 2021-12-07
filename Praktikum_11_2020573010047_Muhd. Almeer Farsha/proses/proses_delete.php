<?php
    require "koneksi.php";
    $sl = $_GET['id'];
    $query = "DELETE FROM tb_barang WHERE id = '$sl'";
    if($conn->query($query)) {
        header("location: ../barang.php");
    } else {
        echo "DATA GAGAL DIHAPUS!";
    }
