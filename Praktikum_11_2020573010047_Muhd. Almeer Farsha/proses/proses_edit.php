<?php

//include koneksi database
require "koneksi.php";

//get data dari form
$id = $_POST['id'];
$nama_barang = $_POST['nama_barang'];
$keterangan = $_POST['keterangan'];
$gambar = $_POST['gambar'];

//query insert data ke dalam database
$query = "UPDATE `tb_barang` SET `nama_barang` = '$nama_barang', `keterangan` = '$keterangan', `gambar` = '$gambar' WHERE `tb_barang`.`id` = $id";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: ../barang.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>