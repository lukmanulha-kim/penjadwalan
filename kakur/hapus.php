<?php 
$id = $_GET['id'];
$connect = new mysqli("localhost","root","","d_base_espara");
mysqli_query($connect, "DELETE FROM tb_jadwal where kd_jadwal='$id'");
header("Location:http://localhost/apel_espara/kakur/?modul=genOto");
 ?>