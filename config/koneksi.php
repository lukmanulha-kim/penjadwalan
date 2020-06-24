<?php

$dbhost = 'localhost'; 
$dbuser = 'root';
$dbpass = '';
$dbname = 'd_base_espara';

$connect = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if ($connect->connect_error) {

   die('Maaf koneksi gagal: '. $connect->connect_error);
}else{
mysqli_close($connect);
}
?>