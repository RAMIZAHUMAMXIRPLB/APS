<?php

include '../koneksi.php';
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];

mysqli_query($db, "insert into tb_siswa values('','$nama_siswa','$kelas','$jurusan','$jenis_kelamin')");

header("location:../data_siswa.php");
?>