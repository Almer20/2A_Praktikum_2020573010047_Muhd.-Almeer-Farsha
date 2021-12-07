<?php
//include koneksi database
require "koneksi.php";
//get data dari form
$id = $_POST['id'];
$nama_barang = $_POST['nama_barang'];
$keterangan = $_POST['keterangan'];
$gambar = $_POST['gambar'];
//query insert data ke dalam database
$query = "INSERT INTO `tb_barang` (`id`, `nama_barang`, `keterangan`, `gambar`) VALUES (NULL, '$nama_barang', '$keterangan', '$gambar')";
//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {
    //redirect ke halaman index.php 
    header("location: ../barang.php");
} else {
    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
}
?>