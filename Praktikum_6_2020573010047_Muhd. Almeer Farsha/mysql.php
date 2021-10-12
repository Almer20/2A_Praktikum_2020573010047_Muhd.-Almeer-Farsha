<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database MySQL</title>
</head>
<body>
        <h1>Demo Koneksi database MySQL</h1>
        <?php
            $conn=mysqli_connect("localhost", "root", "");
            if ($conn){
                echo "Server Terkoneksi";
            } else{
                echo "Server tidak terkoneksi";
            }
        ?>
</body>
</html>