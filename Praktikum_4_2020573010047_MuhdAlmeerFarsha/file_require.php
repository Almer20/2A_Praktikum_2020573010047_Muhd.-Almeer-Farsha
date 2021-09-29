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
            require("contoh_require.php");  //Akan dipanggil 1x saja
            // dakan file php ini 
            tulisantebal("Ini adalah tulisan tebal");
            echo "<br>";
            echo $a;   //Mengambil nilai dari require
        ?>
</body>
</html>