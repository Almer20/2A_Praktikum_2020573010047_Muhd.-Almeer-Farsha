<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Input</title>
</head>
<body>
    <?php
        $username=$_POST["username"];
        $password=$_POST["password"];
    ?>
    Username : <?php echo $username?>
    <br>
    Password : <?php echo $password?>
    
</body>
</html>