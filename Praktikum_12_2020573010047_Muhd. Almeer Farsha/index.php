<?php
    if (empty($_GET['x'])){
        echo "<script>window.location='project.php';</script>";
    }elseif ($_GET['x'] == 'home'){
        require "project.php";
    }elseif ($_GET['x'] == 'mahasiswa'){
        require "mahasiswa.php";
    }elseif ($_GET['x'] == 'peminjam'){
        require "datapeminjam.php"; 
    }elseif ($_GET['x'] == 'barang'){
        require "barang.php";  
    }elseif ($_GET['x'] == 'record'){
        require "record.php";
    }elseif ($_GET['x'] == 'profile'){
        require "profile.php";
    } else {
        echo "<script>window.location='project.php';</script>";
    }
?>