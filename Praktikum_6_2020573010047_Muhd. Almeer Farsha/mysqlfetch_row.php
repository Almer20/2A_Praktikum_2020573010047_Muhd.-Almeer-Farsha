<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database MySQL</title>
</head>
<body>
    <h1>  Koneksi Database dengan mysql_fetch_row</h1>
    <?php
    $conn =mysqli_connect("localhost", "root","","db_baru")
    or die ("koneksi gagal");
    $hasil = mysqli_query($conn,"select * from liga",);
    while ($row= mysqli_fetch_row($hasil)){
        echo "Liga " .$row[1];
        echo "Mempunyai " .$row[2];
        echo "Wakil di liga champion <br>";
    }
    ?>
</body>
</html>