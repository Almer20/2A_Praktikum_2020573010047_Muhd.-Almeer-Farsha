<?php
if (isset($_POST['simpan'])) {
    require "koneksi.php";

    $username = $_POST['username'];
    $passwordbaru = $_POST['passwordbaru'];
    $passwordlama = $_POST['passwordlama'];

    $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    $hasil = mysqli_fetch_array($sql);

    if ($passwordlama == $hasil['password']) {
        if ($passwordbaru == $passwordlama) {
            echo '<script>alert("Password yang anda masukkan sama dengan password lama, mohon masukkan password yang berbeda");</script>';
            echo '<script>window.location="../setting.php";</script>';
        } else {
            if ($hasil['username'] == $username) {
                $update = mysqli_query($conn, "UPDATE tb_user SET password = '$passwordbaru' WHERE username = '$username'");
            }
            if ($update) {
                echo '<script>alert("Password berhasil diubah");</script>';
                echo '<script>window.location="../setting.php";</script>';
            } else {
                echo '<script>alert("Password gagal diubah, mohon kontak admin");</script>';
                echo '<script>window.location="../setting.php";</script>';
            }
        }
    } else {
        echo '<script>alert("Password lama yang anda masukkan salah");</script>';
        echo '<script>window.location="../setting.php";</script>';
    }
} else {
    header("location: ../setting.php");
}