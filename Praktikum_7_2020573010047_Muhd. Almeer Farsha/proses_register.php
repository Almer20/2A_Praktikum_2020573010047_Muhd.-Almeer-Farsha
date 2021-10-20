<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Inputan Data Mahasiswa</title>
</head>
<body>
<h1>Inputan Data Mahasiswa</h1>
    <?php
    $username      = $_POST["username"];
    $password      = $_POST["password"];
    $upassword     = $_POST["upassword"];
    $nama          = $_POST["nama"];
    $tempat_lahir  = $_POST["tempat_lahir"];
    $tgl_lahir     = $_POST["tgl_lahir"];
    $alamat        = $_POST["alamat"];
    $conn          = mysqli_connect("localhost","root","","db_form")
    or die ("Koneksi gagal");
    if ($password != $upassword){
        echo "Password tidak sama";
    } else{     
    echo "Username          : $username <br>";
    echo "Password          : $password <br>";
    echo "Ulangi Password   : $upassword <br>";
    echo "Nama              : $nama <br>";
    echo "tempat lahir      : $tempat_lahir <br>";
    echo "tanggal lahir     : $tgl_lahir <br>";
    echo "Alamat            : $alamat <br>";
    }
    
    $sqlstr = "INSERT INTO user1(username, password, nama, tempat_lahir, tgl_lahir, alamat) 
    values ('$username', '$password', '$nama', '$tempat_lahir ','$tgl_lahir','$alamat' )";
    $hasil = mysqli_query($conn,$sqlstr);
    echo "<strong><br>Inputan data mahasiswa berhasil disimpan <strong>";
    ?>
</body>
</html>