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
        $x = 4;
        $a = ($x == 4);
        echo "\$a = $a <BR>";
        $b = ($x === "4");
        echo "\$b = $b <BR>";
        $c = ($x != 4);
        echo "\$c = $c <BR>";
        $d = ($x !== "4");
        echo "\$d = $d <BR>";
        $e = ($x < 5);
        echo "\$e = $e <BR>";
        $f = ($x > 5);
        echo "\$f = $f <BR>";
        $g = ($x <= 4);
        echo "\$g = $g <BR>";
        $h = ($x >= 5);
        echo "\$h = $h <BR>";
    ?>
</body>
</html>