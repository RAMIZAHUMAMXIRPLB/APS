<?php

include '../koneksi.php';

$id = $_POST['id_siswa'];
$nama_siswa = $_POST['nama_siswa'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$jenis_kelamin = $_POST['jenis_kelamin'];

mysqli_query($db,"UPDATE tb_siswa SET nama_siswa='$nama_siswa', kelas='$kelas', jurusan='$jurusan', jenis_kelamin='$jenis_kelamin' WHERE id_siswa='$id'");

header("location:../data_siswa.php");

?>