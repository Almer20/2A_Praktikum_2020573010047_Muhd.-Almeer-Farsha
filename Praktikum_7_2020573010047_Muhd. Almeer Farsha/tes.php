<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
</head>
<body>
    <h1>Input Data</h1>
    <hr>
    
    <form action="proses_register.php" method="post">
            <fieldset>
                <table>
                <legend>Input Data Mahasiswa</legend>
                <tr>
                <td>
                <p>
                    <label for="">Username </label>
                    :<input type="text" name="username">
                </p>
                </td>
                </tr>
                <p>
                    <label for="">Password </label>
                    :<input type="password" name="password">
                </p>
                <p>
                    <label for="">Ulangi Password </label>
                    :<input type="password" name="upassword">
                </p>
                <p>
                    <label for="">Nama </label>
                    :<input type="text" name="nama">
                </p>
                <p>
                    <label for="">Tempat Lahir </label>
                    :<input type="text" name="tempat_lahir">
                </p>
                <p>
                    <label for="">Tanggal Lahir </label>
                    :<input type="date" name="tgl_lahir">
                </p>
                <p>
                    <label for="">Alamat </label>
                    :<input type="text" name="alamat">
                </p>
                <p>
                    <input type="submit" value="submit">
                    <input type="reset" value="reset">
                </p>
                    </table>
            </fieldset>
    </form>
</body>
</html>