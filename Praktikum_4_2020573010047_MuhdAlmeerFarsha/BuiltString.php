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
        $str = "Belajar PHP ternyata Menyenangkan";
        echo strtolower($str); //Ubah huruf ke kecil semua
        echo "<br>";
        echo strtoupper($str); //Ubah huruf ke besar semua
        echo "<br>";
        echo str_replace("Menyenangkan","mudah lho",$str); //Mengganti string 

    ?>
    
</body>
</html>