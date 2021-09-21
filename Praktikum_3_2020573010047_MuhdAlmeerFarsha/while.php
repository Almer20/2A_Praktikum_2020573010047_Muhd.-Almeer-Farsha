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
        echo "<H3> Cara 1 </H3>";
        $i = 1;
        while ($i <= 10)
        {
            print $i++;
        }
        echo "<BR>";

        echo "<H3> Cara 2 </H3>";
        $i = 1;
        while ($i <= 10):
            print $i;
            $i++;
            endwhile
    ?>
</body>
</html>