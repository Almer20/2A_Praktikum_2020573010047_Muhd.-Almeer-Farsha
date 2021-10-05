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
            for ($b=2; $b<10; $b++)
            {
                include ("contoh_include.php");
                // Include bisa dipanggil lebih dari 1x
            }
        ?>
</body>
</html>