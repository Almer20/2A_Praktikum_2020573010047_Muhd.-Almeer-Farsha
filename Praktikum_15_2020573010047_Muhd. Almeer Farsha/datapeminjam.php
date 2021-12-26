<?php
require "proses/session.php";
// Querry untuk tabel hasil tambah peminjaman
$select = mysqli_query($conn, "SELECT * FROM tb_peminjaman pem
LEFT JOIN tb_barang brg ON pem.barang=brg.kode_barang
LEFT JOIN tb_matakuliah mk ON pem.matakuliah=mk.kode_matakuliah
LEFT JOIN tb_dosen dos ON mk.dosen = dos.nip
LEFT JOIN tb_user usr ON pem.user = usr.id
WHERE status=1 || status=2 || status=5");

$query = mysqli_fetch_array($select);
// Akhir Querry tabel hasil tambah peminajaman
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
                        Data Peminjaman
                    </h4>
                </div>
                <hr>

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
                                    elseif ($sl['status'] == 4) echo "<span class='badge bg-primary'>Telah Dikembalikan</span>";
                                    elseif ($sl['status'] == 5) echo "<span class='badge bg-primary'>Proses Dikembalikan</span>";
                                    ?>
                                </td>
                                <!-- Tombol edit -->
                                <td>
                                    <?php
                                    if ($sl['status'] == 1) { ?>
                                        <!-- Tombol edit -->
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $sl["kode_barang"]; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                        <!-- Tombol Akhir Edit -->
                                </td>

                                <td>
                                    <!-- Tombol Setuju -->
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#setujuu">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                        </svg>
                                    </button>
                                    <!-- Akhir Tombol Setuju  -->

                                    <!-- modal setuju kembali -->
                                <?php } elseif ($sl['status'] == 5) { ?>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#setujukembali">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                        </svg>
                                    </button>
                                    <!-- akhir modal setuju kembali -->
                                <?php }
                                ?>
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
                                                            $query = mysqli_query($conn, "SELECT * FROM tb_barang");
                                                            while ($hasil1 = mysqli_fetch_array($query)) {
                                                                echo "<option value='$hasil1[kode_barang]'>" . $hasil1['kode_barang'] . " " . $hasil1['nama_barang'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-1">
                                                        <label for="nama_barang" class="col-form-label">Mata Kuliah:</label>
                                                        <select name="mk" class="form-select" aria-label="Default select example">
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT * FROM tb_matakuliah mk LEFT JOIN tb_dosen dos ON mk.dosen=dos.nip");
                                                            while ($hasil1 = mysqli_fetch_array($query)) {
                                                                echo "<option value='$hasil1[kode_matakuliah]'>" . $hasil1['kode_matakuliah'] . " " . $hasil1['nm_matakuliah'] .
                                                                    " - " . $hasil1['nm_dosen'] . "</option>";
                                                            }
                                                            ?>
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


                            <!-- Modal Setuju -->
                            <?php foreach ($select as $sl) : ?>
                                <div class="modal fade" id="setujuu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Persetuju Peminjaman Barang</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_setuju.php" method="POST">
                                                    <input name="id_peminjaman" type="hidden" value="<?= $sl['id_peminjaman'] ?>">
                                                    <div class="mb-1">
                                                        <label for="nama_barang" class="col-form-label">Nama Barang:</label>
                                                        <input type="text" class="form-control" value="<?php echo $sl['kode_barang'] . " - " . $sl['nama_barang'] . " " .
                                                                                                            $sl['keterangan'] ?>" disabled>
                                                    </div>

                                                    <div class="mb-1">
                                                        <label for="nama_barang" class="col-form-label">Mata Kuliah:</label>
                                                        <label class="form-label">Matakuliah</label>
                                                        <input type="text" class="form-control" value="<?php echo $sl['nm_matakuliah'] . " - " . $sl['nm_dosen'] ?>" disabled>
                                                    </div>


                                                    <div class="mb-3">
                                                        <label class="form-label">Waktu Peminjaman s/d Waktu Pengembalian</label>
                                                        <input type="text" class="form-control" value="<?php echo date("d-m-Y H:i:s", strtotime($sl['waktu_peminjaman']))
                                                                                                            . " s/d " . date("d-m-Y H:i:s", strtotime($sl['waktu_pengembalian'])) ?>" disabled>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form label">Aksi</label>
                                                        <select name="aksi" class="form-select">
                                                            <option value="2">Disetujui</option>
                                                            <option value="3">Ditolak</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- Modal tutup setuju  -->

                            <!-- Modal Setuju kembali -->
                            <?php foreach ($select as $sl) : ?>
                                <div class="modal fade" id="setujukembali" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Setuju Kembalikan </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="proses/proses_setuju_kembalikan.php" method="POST">
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
                            <!-- akhir modal setuju kembali -->

                            </tr>
                    </tbody>
                </table>
                <!-- akhir isi tabel content -->
            </div>
        </div>
    </div>
    <!--Modal Edit -->

    <!-- Optional JavaScript -->
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebars.js"></script>
</body>

</html>