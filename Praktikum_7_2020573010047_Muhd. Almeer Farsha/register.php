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
        <legend>Input Data Mahasiswa</legend>
        <table border="0">
               
            <tr>
                <td>
                    <label for="">Username </label>
                </td>
                <td>
                    :<input type="text" name="username" size="30" placeholder="Masukkan Username">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password </label>
                </td>
                <td>
                    :<input type="password" name="password" placeholder="Password">
                </td>
            </tr>
                <td>
                    <label for="">Ulangi Password </label>
                </td>
                <td>
                    :<input type="password" name="upassword" placeholder="Password">
                </td>
            </tr>    
            <tr>
                <td>
                    <label for="">Nama </label>
                </td>
                <td>
                    :<input type="text" name="nama" placeholder="Nama">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Tempat Lahir </label>
                </td>
                <td>
                    :<input type="text" name="tempat_lahir" placeholder="Tempat Lahir">
                </td>
            </tr>   
            <tr>
                <td>
                    <label for="">Tanggal Lahir </label>
                </td>
                <td>
                    :<input type="date" name="tgl_lahir">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Alamat </label>
                </td>
                <td>
                    :<input type="text" name="alamat" placeholder="Alamat">
                </td>
            </tr>
        </table>
        <input type="submit" name="submit">
        <input type="reset" name="reset">
    </fieldset>    
    </form>
</body>
</html>