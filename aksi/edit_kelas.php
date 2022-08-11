<?php

include '../koneksi.php';

$id = $_POST['id_kelas'];
$nama_kelas = $_POST['nama_kelas'];

mysqli_query($db,"UPDATE tb_kelas SET nama_kelas='$nama_kelas' WHERE id_kelas='$id'");

header("location:../data_kelas.php");

?>