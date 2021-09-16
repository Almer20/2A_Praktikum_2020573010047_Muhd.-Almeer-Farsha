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
        $val1 = 0;
        $val2 = 0;
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 && $val2;
        echo "<br>";
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 || $val2;
        echo "<br>";
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 Xor $val2;
        echo "<br>";

        $val1 = 0;
        $val2 = 1;
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 && $val2;
        echo "<br>";
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 || $val2;
        echo "<br>";
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 Xor $val2;
        echo "<br>";

        $val1 = 1;
        $val2 = 0;
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 && $val2;
        echo "<br>";
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 || $val2;
        echo "<br>";
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 Xor $val2;
        echo "<br>";

        $val1 = 1;
        $val2 = 1;
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 && $val2;
        echo "<br>";
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 || $val2;
        echo "<br>";
        echo "Operasi $val1 dan $val2 adalah =";
        echo $val1 Xor $val2;
        echo "<br>";
    ?>
</body>
</html>