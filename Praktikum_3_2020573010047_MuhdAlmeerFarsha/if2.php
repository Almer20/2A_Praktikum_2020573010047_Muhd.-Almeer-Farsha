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
         $d=date("D"); if ($d=="sat")
         echo "Selamat berakhir pekan!";
         elseif ($d=="Fri")
         echo "Selamat menunaikan sholat Jum'at bagi yang muslim!";else
         echo "Selamat belajar!";
    ?>

</body>
</html>