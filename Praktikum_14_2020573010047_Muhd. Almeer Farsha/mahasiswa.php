<?php
require "proses/session.php";

$select = mysqli_query($conn, "SELECT * FROM tb_mahasiswa MHS LEFT JOIN tb_user USR ON MHS.id_user = USR.id");
$sql = mysqli_query($conn, "SELECT * FROM tb_mahasiswa MHS LEFT JOIN tb_user USR ON MHS.id_user = USR.id");

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebars.css" rel="stylesheet">

    <title>SIPBAR - Sistem Informasi Peminjaman Barang Jurusan TIK</title>
</head>

<body>
    <div class="container-fluid bg-light">

        <!-- Navbar header -->
        <?php require "header.php"; ?>
        <!-- akhir header -->
    </div>

    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-3">
                <!-- sidebar -->
                <?php require "sidebar.php"; ?>
                <!-- akhir sidebar -->
            </div>

            <!-- isi konten -->
            <div class="col-9">
                <div class="card ms-1 mt-4">
                    <h4 class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="26" fill="currentColor" class="bi bi-person-lines-fill me-2" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                        </svg>Data Mahasiswa</h4>
                </div>
                <hr>
                <!-- Button tambah data mahasiswa -->
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z" />
                    </svg></button>
                    <!-- akhir button tambah data mahasiswa -->
                <!-- modal tambah -->
                <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <form action="proses/proses_tambah_mahasiswa.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-2">
                                                <input type="text" class="form-control" name="nim" id="floatingInput" autofocus>
                                                <label for="floatingInput">NIM</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-2">
                                                <input type="text" class="form-control" name="nama" id="floatingInput" autofocus>
                                                <label for="floatingInput">Nama</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mb-2">
                                                <input type="text" class="form-control" name="kelas" id="floatingPassword" maxlength="2">
                                                <label for="floatingPassword">Kelas</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mb-2">
                                                <input type="text" class="form-control" name="prodi" id="floatingPassword">
                                                <label for="floatingPassword">Prodi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <select class="form-select mb-3" aria-label="Default select example" id="level" name="level" value="Level" required>
                                        <option>Level</option>
                                        <option value="admin">Admin</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                    </select>
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" name="alamat" id="floatingPassword">
                                        <label for="floatingPassword">Alamat</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="date" class="form-control" name="tanggal_lahir" id="floatingPassword">
                                        <label for="floatingPassword">Tanggal Lahir</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input type="text" class="form-control" name="tempat_lahir" id="floatingPassword">
                                        <label for="floatingPassword">Tempat Lahir</label>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="tambah" value="Tambah">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- akhir modal tambah -->

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        while ($query = mysqli_fetch_array($select)) {
                            $no++;
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $query['nim'] ?></td>
                                <td><?= $query['username'] ?></td>
                                <td><?= $query['nama'] ?></td>
                                <td><?= $query['kelas'] ?></td>
                                <td><?= $query['prodi'] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-primary" name="detail" data-bs-toggle="modal" data-bs-target="#ModalDetail<?= $query['nim']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-outline-warning ms-2" name="edit" data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $query['nim']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger ms-2" name="delete" data-bs-toggle="modal" data-bs-target="#ModalDelete<?= $query['nim']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                                                <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>

                                <!-- modal edit -->
                                <div class="modal fade" id="ModalEdit<?= $query['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_edit_mahasiswa.php" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="hidden" name="id_user" value="<?= $query['id_user'] ?>">
                                                            <input type="hidden" name="nimlama" value="<?= $query['nim'] ?>">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" class="form-control" name="nimbaru" id="floatingInput" value="<?= $query['nim'] ?>">
                                                                <label for="floatingInput">NIM</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" class="form-control" name="nama" id="floatingInput" value="<?= $query['nama'] ?>" autofocus>
                                                                <label for="floatingInput">Nama</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" class="form-control" name="kelas" id="floatingPassword" value="<?= $query['kelas'] ?>" maxlength="2">
                                                                <label for="floatingPassword">Kelas</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-floating mb-2">
                                                                <input type="text" class="form-control" name="prodi" id="floatingPassword" value="<?= $query['prodi'] ?>">
                                                                <label for="floatingPassword">Prodi</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <select class="form-select mb-2" name="level" aria-label="Default select example">
                                                        <option>Level</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="mahasiswa">Mahasiswa</option>
                                                    </select>
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" name="alamat" id="floatingPassword" value="<?= $query['alamat'] ?>">
                                                        <label for="floatingPassword">Alamat</label>
                                                    </div>
                                                    <div class="form-floating mb-2">
                                                        <input type="date" class="form-control" name="tanggal_lahir" id="floatingPassword" value="<?= $query['tgl_lahir'] ?>">
                                                        <label for="floatingPassword">Tanggal Lahir</label>
                                                    </div>
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" name="tempat_lahir" id="floatingPassword" value="<?= $query['tempat_lahir'] ?>">
                                                        <label for="floatingPassword">Tempat Lahir</label>
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal edit -->

                                <!-- modal hapus -->
                                <div class="modal fade" id="ModalDelete<?= $query['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="proses/proses_hapus_mahasiswa.php" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_user" value="<?= $query['id_user'] ?>">
                                                    <input type="hidden" name="gambar" value="<?= $query['gambar'] ?>">
                                                    <p style="color: red;">Apakah anda akan menghapus data
                                                        "<?= $query['nim']; ?>" ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-secondary" name="hapus" value="Delete">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal hapus -->

                                <!-- modal detail -->
                                <div class="modal fade" id="ModalDetail<?= $query['nim']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <img src="<?= "images/mahasiswa/" . $query['gambar']; ?>" width="100" height="250" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text">Nama: <?= $query['nama'] ?></p>
                                                        <p class="card-text">Alamat: <?= $query['alamat'] ?></p>
                                                        <p class="card-text">Tempat Lahir:
                                                            <?= $query['tempat_lahir'] ?></p>
                                                        <p class="card-text">Tanggal Lahir:
                                                            <?= $query['tgl_lahir'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal detail -->

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- div  -->

        </div>
        <!-- akhir isi konten -->
    </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>

</html>