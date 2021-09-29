<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $skr = date ("d/m/Y");
    echo "Sekarang adalah $skr <br>";
    $waktu = date("h:i:s A");   //A Menunjukkan AM atau PM 
    echo "Jam menunjukkan pukul : $waktu";
    ?>
    
</body>
</html>