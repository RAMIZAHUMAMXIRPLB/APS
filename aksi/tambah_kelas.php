<?php 

include '../koneksi.php';

$nama_kelas = $_POST['nama_kelas'];

mysqli_query($db, "INSERT INTO tb_kelas VALUES('','$nama_kelas')");

header("location:../data_kelas.php");

?>