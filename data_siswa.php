<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pendataan Sekolah</title>

    <link rel="stylesheet" href="assets/pure-min.css">
    <link rel="stylesheet" href="assets/baby-blue.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script type='text/javascript' src='assets/ui.js'></script>
</head>

<body>
    <div id="layout">
        <a href="#menu" id="menuLink" class="menu-link"><span></span></a>

        <div id="menu">
            <div class="pure-menu pure-menu-open">
                <a class="pure-menu-heading" href="">APS</a>

                <ul>
                    <li class="">
                        <a href="home.php">Home</a>
                    </li>
                    <li class="">
                        <a href="data_siswa.php">Data Siswa</a>
                    </li>
                    <li class="">
                        <a href="data_kelas.php">Data Kelas</a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="main">
            <div class="header">
                <h2>Aplikasi Pendataan Sekolah</h2>

                <h3>SMK NEGERI 4 KENDARI</h3>
            </div>

            <div class="content">
                <button class="btn btn-primary" data-toggle="modal" data-target="#insert_siswa">TAMBAH DATA</button>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include 'koneksi.php';
                        $no = 1;
                        $data = mysqli_query($db, "select * from tb_siswa");
                        while ($tampil = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <th><?php echo $no++ ?></th>
                                <th><?php echo $tampil['nama_siswa']; ?></th>
                                <th><?php echo $tampil['jenis_kelamin']; ?></th>
                                <th><?php echo $tampil['kelas']; ?></th>
                                <th><?php echo $tampil['jurusan']; ?></th>
                                <th>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#update_siswa<?php echo $tampil['id_siswa']; ?>">Edit</button>
                                    <a href="aksi/hapus_siswa.php?id_siswa=<?php echo $tampil['id_siswa']?>" class="btn btn-danger">hapus</a>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="footer">
                <div class="legal pure-g">

                    <div class="pure-u-1 pure-u-sm-1-2">
                        <p class="legal-copyright">
                            &copy; 2022 SMK 4 KENDARI - RPL B
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- the modal -->

    <!-- modal tambah data -->
    <div class="modal" id="insert_siswa">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Siswa</h4>
                </div>

                <form action="aksi/tambah_siswa.php" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usr">Nama Siswa:</label>
                            <input type="text" name="nama_siswa" class="form-control" id="usr">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Jenis Kelamin:</label>
                            <select class="form-control" name="jenis_kelamin" id="sel1">
                                <option>laki-laki</option>
                                <option>perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Kelas:</label>
                            <input type="text" name="kelas" class="form-control" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Jurusan:</label>
                            <input type="text" name="jurusan" class="form-control" id="pwd">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal update data -->
    <?php
    include 'koneksi.php';
    $data = mysqli_query($db, "select * from tb_siswa");
    while ($tampil = mysqli_fetch_array($data)) {
    ?>
        <div class="modal" id="update_siswa<?php echo $tampil['id_siswa']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Siswa</h4>
                    </div>

                    <form action="aksi/edit_siswa.php" method="POST">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="usr">Nama Siswa:</label>
                                <input type="hidden" name="id_siswa" value="<?php echo $tampil['id_siswa'] ?>">
                                <input type="text" name="nama_siswa" value="<?php echo $tampil['nama_siswa'] ?>" class="form-control" id="usr">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Jenis Kelamin:</label>
                                <select class="form-control" name="jenis_kelamin" id="sel1">
                                    <option>laki-laki</option>
                                    <option>perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Kelas:</label>
                                <input type="text" name="kelas" value="<?php echo $tampil['kelas']?>" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Jurusan:</label>
                                <input type="text" name="jurusan" value="<?php echo $tampil['jurusan']?>" class="form-control" id="pwd">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>

</body>

</html>