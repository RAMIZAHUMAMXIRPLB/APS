<?php

include '../koneksi.php';

$id = $_GET['id_kelas'];
mysqli_query($db, "DELETE FROM tb_kelas WHERE id_kelas='$id'");
header("location:../data_kelas.php");

?>