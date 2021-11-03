<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>
<body>
    <div class="container-fluid">
        <!-- Navbar Header -->
        <?php
        require "header.php";
        ?>
        <!-- akhir login -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <?php
                require "sidebar.php";
                ?>
            </div>
            <!-- isi konten -->
            <div class="col-9 ">
                <br>
                <div class="card ms-1 mt-4">
                    <div class="card-body">
                        Mahasiswa dapat meminjam barang yang ada dibawah ini 
                    </div>
                </div>
                <div class="row">
                    <div class="card ms-1 mt-4" style="width: 18rem;">
                        <img src="https://dealharga.com/wp-content/uploads/2018/03/BenQ-MX611-a.jpg" class="card-img-top" alt="center">
                        <div class="card-body">
                            <h5 class="card-title">Proyektor<h5>
                                    <p class="card-text"></p>
                                    <a href="#" class="btn btn-primary">Pinjam</a>
                        </div>
                    </div>

                    <div class="card ms-1 mt-4" style="width: 18rem;">
                        <img src="https://images.tokopedia.net/img/cache/500-square/product-1/2019/2/22/484880/484880_1b39c91d-b18a-4e1c-b9dd-61123124ca45_700_700.jpg" class="card-img-top" alt="rigth">
                        <div class="card-body">
                            <h5 class="card-title">Stop Kontak</h5>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-primary">Pinjam</a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>