<?php

include '../koneksi.php';

$id = $_GET['id_siswa'];
mysqli_query($db, "DELETE FROM tb_siswa WHERE id_siswa='$id'");
header("location:../data_siswa.php");

?>