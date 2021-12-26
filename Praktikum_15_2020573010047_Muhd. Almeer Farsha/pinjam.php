<?php
require "proses/session.php";
// Querry untuk tabel hasil tambah peminjaman
$select = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem
LEFT JOIN tb_barang brg ON pem.barang=brg.kode_barang
LEFT JOIN tb_matakuliah mk ON pem.matakuliah=mk.kode_matakuliah
LEFT JOIN tb_dosen dos ON mk.dosen = dos.nip
LEFT JOIN tb_user usr ON pem.user = usr.id
WHERE username='$_SESSION[username]'");

$query = mysqli_fetch_array($select);
// Akhir Querry tabel hasil tambah peminajaman

// Querry Untuk list peminjaman
$sql = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem
RIGHT JOIN tb_barang brg ON pem.barang=brg.kode_barang
LEFT JOIN tb_mahasiswa mhs ON pem.user=mhs.id_user
LEFT JOIN tb_matakuliah mk ON pem.matakuliah=mk.kode_matakuliah
LEFT JOIN tb_dosen dos ON mk.dosen = dos.nip");

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
                        Peminjaman Barang
                    </h4>
                </div>
                <hr>
                <!-- Button Pinjam barang -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#examplepeminjam" class="btn btn-outline-primary">Pinjam
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-minecart-loaded" viewBox="0 0 16 16">
                        <path d="M4 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm8-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM.115 3.18A.5.5 0 0 1
                        .5 3h15a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 14 12H2a.5.5 0 0 1-.491-.408l-1.5-8a.5.5 0 0 1 .106-.411zm.987.82 1.313 7h11.17l1.313-7H1.102z" />
                        <path fill-rule="evenodd" d="M6 1a2.498 2.498 0 0 1 4 0c.818 0 1.545.394 2 1 .67 0 1.552.57 2 1h-2c-.314 0-.611-.15-.8-.4-.274-.365-.71-.6-1.2-.6-.314 0-.611-.15-.
                        8-.4a1.497 1.497 0 0 0-2.4 0c-.189.25-.486.4-.8.4-.507 0-.955.251-1.228.638-.09.13-.194.25-.308.362H3c.13-.147.401-.432.562-.545a1.63 1.63 0 0 0 .393-.393A2.498 2.498 0 0 1 6 1z" />
                    </svg>
                </button>
                <!-- Akhir Button tambah barang -->

                <!-- Button list Peminjam -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#examplelist" class="btn btn-outline-success">List Peminjaman</button>
                <!-- Button Akhir List Peminjam -->

                <!-- Table Content -->
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Waktu Peminjaman</th>
                            <th scope="col">Waktu pengembalian</th>
                            <th scope="col">MataKuliah</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($select as $sl) : ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $sl['kode_barang']; ?></td>
                                <td><?= $sl['gambar']; ?></td>
                                <td><?= $sl['nama_barang']; ?></td>
                                <td><?= $sl['keterangan']; ?></td>
                                <td><?= date("d-m-Y H:i:s", strtotime($sl['waktu_peminjaman'])); ?></td>
                                <td><?= date("d-m-Y H:i:s", strtotime($sl['waktu_pengembalian'])); ?></td>
                                <td><?= $sl['matakuliah'] . "-" . $sl['nm_dosen']; ?></td>
                                <td>
                                    <?php
                                    if ($sl['status'] == 1) echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                    elseif ($sl['status'] == 2) echo "<span class='badge bg-success'>Disetujui</span>";
                                    elseif ($sl['status'] == 3) echo "<span class='badge bg-danger'>Tidak Disetujui</span>";
                                    elseif ($sl['status'] == 4) echo "<span class='badge bg-primary'>Dikembalikan</span>";
                                    elseif ($sl['status'] == 5) echo "<span class='badge bg-primary'>Proses Dikembalikan</span>";

                                    ?>
                                </td>
                                <!-- Tombol edit -->
                                <td>
                                    <!-- tombol kembalikan -->
                                    <?php
                                    if ($sl['status'] == 2) { ?>
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#kembalikan<?= $sl["kode_barang"]; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z" />
                                                <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                            </svg>
                                        </button>
                                        <!-- akhir tombol kembalikan -->
                                    <?php
                                    }
                                    ?>
                                    <!-- Tombol edit -->
                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $sl["kode_barang"]; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>

                                    <!-- Tombol Akhir Edit -->
                                </td>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                            <!-- Tombol Akhir Edit -->

                            <!-- Modal Edit -->
                            <?php foreach ($select as $sl) : ?>
                                <div class="modal fade" id="edit<?= $sl["kode_barang"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_pinjam.php" method="POST">
                                                    <div class="mb-1">
                                                        <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                                                        <select name="brg" class="form-select" aria-label="Default select example">
                                                            <?php
                                                            $query3 = mysqli_query($conn, "SELECT * FROM tb_barang");
                                                            while ($hasil1 = mysqli_fetch_array($query3)) { ?>
                                                                <option value='<?= $hasil1['kode_barang'] ?>'>
                                                                    <?= $hasil1['nama_barang'] . "-" . $hasil1['kode_barang'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-1">
                                                        <label for="nama_barang" class="col-form-label">Mata Kuliah:</label>
                                                        <select name="mk" class="form-select" aria-label="Default select example">
                                                            <?php
                                                            $query1 = mysqli_query($conn, "SELECT * FROM tb_matakuliah mk LEFT JOIN tb_dosen dos ON mk.dosen = dos.nip");
                                                            while ($hasil2 = mysqli_fetch_array($query1)) { ?>
                                                                <option value='<?= $hasil2['kode_matakuliah'] ?>'>
                                                                    <?= $hasil2['nm_matakuliah'] . "-" . $hasil2['kode_matakuliah'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form label">Waktu Pengembalian</label>
                                                        <input name="wkt_kembali" type="datetime-local" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Pinjam</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Modal Kembalikan -->
                            <?php foreach ($select as $sl) : ?>
                                <div class="modal fade" id="kembalikan<?= $sl["kode_barang"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Kembalikan barang</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_kembalikan.php" method="POST">
                                                    <input name="id_peminjaman" type="hidden" value="<?= $sl['id_peminjaman'] ?>">
                                                    <div class="mb-1">
                                                        <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                                                        <input type="text" class="form-control" value="<?php echo $sl['kode_barang'] . " - " . $sl['nama_barang'] . " " . $sl['keterangan'] ?>" disabled>

                                                    </div>

                                                    <div class="mb-1">
                                                        <label for="nama_barang" class="col-form-label">Mata Kuliah:</label>
                                                        <label class="form-label">Matakuliah</label>
                                                        <input type="text" class="form-control" value="<?php echo $sl['nm_matakuliah'] . " - " . $sl['nm_dosen'] ?>" disabled>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Waktu Peminjaman s/d Waktu Pengembalian</label>
                                                        <input type="text" class="form-control" value="<?php echo date("d-m-Y H:i:s", strtotime($sl['waktu_peminjaman'])) . " s/d " . date("d-m-Y H:i:s", strtotime($sl['waktu_pengembalian'])) ?>" disabled>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- Akhir Modal Kembalikan -->

                            <!-- Modal Persetujuan -->

                            <!-- Modal tutup setuju  -->

                            </tr>
                    </tbody>
                </table>
                <!-- akhir isi tabel content -->
            </div>
        </div>
    </div>
    <!--Modal Edit -->

    <!-- Modal Pinjam Barang -->
    <div class="modal fade" id="examplepeminjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pinjam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="proses/proses_pinjam.php" method="POST">
                        <div class="mb-1">
                            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                            <select name="brg" class="form-select" aria-label="Default select example">
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM tb_barang");
                                while ($hasil1 = mysqli_fetch_array($query)) { ?>
                                    <option value='<?= $hasil1['kode_barang'] ?>'>
                                        <?= $hasil1['nama_barang'] . "-" . $hasil1['kode_barang'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-1">
                            <label for="nama_barang" class="col-form-label">Mata Kuliah:</label>
                            <select name="mk" class="form-select" aria-label="Default select example">
                                <?php
                                $query1 = mysqli_query($conn, "SELECT * FROM tb_matakuliah mk LEFT JOIN tb_dosen dos ON mk.dosen = dos.nip");
                                while ($hasil2 = mysqli_fetch_array($query1)) { ?>
                                    <option value='<?= $hasil2['kode_matakuliah'] ?>'>
                                        <?= $hasil2['nm_matakuliah'] . "-" . $hasil2['kode_matakuliah'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form label">Waktu Pengembalian</label>
                            <input name="wkt_kembali" type="datetime-local" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Pinjam</button>
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
                                <th scope="col">nama</th>
                                <th scope="col">status</th>
                                <th scope="col">Waktu Peminjaman</th>
                                <th scope="col">Waktu Pengembalian</th>
                                <th scope="col">Mata Kuliah </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php while ($sl = mysqli_fetch_array($sql)) { ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $sl['barang']; ?></td>
                                    <td><?= $sl['nama']; ?></td>
                                    <td>
                                        <?php
                                        $status = "";
                                        if ($sl['status'] == 1) {
                                            $status = 'Tersedia';
                                        } else if ($sl['status'] == 2) {
                                            $status = 'Dipinjam';
                                        }
                                        echo $status;
                                        ?>
                                    </td>
                                    <td><?= $sl['waktu_peminjaman']; ?></td>
                                    <td><?= $sl['waktu_pengembalian']; ?></td>
                                    <td><?= $sl['nm_matakuliah']; ?></td>
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


        <!-- Optional JavaScript -->
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/sidebars.js"></script>
</body>

</html>