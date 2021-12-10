<?php
require "proses/session.php";
$select = mysqli_query($conn, "SELECT * FROM tb_barang");
$query = mysqli_fetch_array($select);
$sql = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem LEFT JOIN tb_barang brg ON pem.barang=brg.kode_barang
LEFT JOIN tb_mahasiswa mhs ON pem.user=mhs.id_user");

?>
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
        <!-- Header -->
        <?php
        require "header.php"
        ?>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <!-- sidebar -->
                <?php
                require "sidebar.php"
                ?>
            </div>

            <div class="col-9">
                <div class="card em-1 mt-4">
                    <h4 class="card-header"> <svg class="bi me-2" width="28" height="26">
                            <use xlink:href="#grid" />
                        </svg>
                        Data Barang
                    </h4>
                </div>
                <hr>
                <!-- Button Tambah barang -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleadd" class="btn btn-outline-dark">Pinjam Barang
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                    </svg>
                </button>
                <!-- Button list -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#examplelist" class="btn btn-outline-success">List Peminjaman</button>

                <!-- Akhir Button tambah barang -->
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">barang</th>
                            <th scope="col">user</th>
                            <th scope="col">status</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($select as $sl) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $sl['nama_barang']; ?></td>
                                <td><?= $sl['keterangan']; ?></td>
                                <td><?= $sl['gambar']; ?></td>
                                <td>

                                    <!-- Tombol edit -->
                                   
                                    <!-- Tombol Akhir Edit -->

                                    <!-- Tombol delete -->
                                    
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        <!-- Akhir Tombol Delete -->
                    </tbody>
                </table>
                <!-- akhir isi tabel -->
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Delete -->
    <?php foreach ($select as $sl) : ?>
        <div class="modal fade" id="exampledelete<?= $sl["kode_barang"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin menghapus
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="proses/proses_delete.php?kode_barang=<?= $sl["kode_barang"]; ?>" type="button" class="btn btn-primary">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Edit -->
    <?php foreach ($select as $sl) : ?>
        <div class="modal fade" id="exampleedit<?= $sl["kode_barang"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="proses/proses_edit.php" method="POST">
                            <div class="mb-1">
                                <label for="id" class="col-form-label">Kode Barang:</label>
                                <input type="text" name="id" value="<?= $sl["kode_barang"]; ?>" class="form-control" id="id">
                            </div>
                            <div class="mb-1">
                                <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                                <input type="text" name="nama_barang" value="<?= $sl["nama_barang"]; ?>" class="form-control" id="nama_barang">
                            </div>
                            <div class="mb-1">
                                <label for="keterangan" class="col-form-label">Keterangan Barang:</label>
                                <input type="text" name="keterangan" value="<?= $sl["keterangan"]; ?>" class="form-control" id="keterangan">
                            </div>
                            <div class="mb-1">
                                <label for="gambar" class="col-form-label">Gambar Barang:</label>
                                <input type="text" name="gambar" value="<?= $sl["gambar"]; ?>" class="form-control" id="gambar">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Tambah Barang -->

    <div class="modal fade" id="exampleadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="proses/proses_tambah.php" method="POST">
                        <div class="mb-1">
                            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                        </div>
                        <div class="mb-1">
                            <label for="keterangan" class="col-form-label">Keterangan Barang:</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                        </div>
                        <div class="mb-1">
                            <label for="gambar" class="col-form-label">Gambar Barang:</label>
                            <input type="text" name="gambar" class="form-control" id="gambar">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- List Peminjaman -->
        <div class="modal fade" id="examplelist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">List Peminjaman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">barang</th>
                            <th scope="col">user</th>
                            <th scope="col">status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php while ($sl = mysqli_fetch_array($sql)){ ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $sl['barang']; ?></td>
                                <td><?= $sl['nama']; ?></td>
                                <td>
                                <?php
                                $status = "";
                                    if ($sl['status'] == 1){
                                        $status = 'Disetujui';
                                    }else if ($sl['status'] == 2){
                                        $status = 'Pending';
                                    }else if ($sl['status'] == 3){
                                        $status = 'Tidak Disetujui';
                                    }
                                    echo $status;
                                    ?>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php } ?>
                        <!-- Akhir Tombol Delete -->
                    </tbody>
                </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>