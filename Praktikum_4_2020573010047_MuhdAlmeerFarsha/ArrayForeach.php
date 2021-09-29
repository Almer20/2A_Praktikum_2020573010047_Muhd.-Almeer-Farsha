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
        $anak[0] = "Faruq";
        $anak[1] = "Alya"; 
        $anak[2] = "Zahro";
        foreach ($anak as $value)
        {
            echo "Nama anak : $value";
            echo "<br>";
        }
    ?>
    
</body>
</html>