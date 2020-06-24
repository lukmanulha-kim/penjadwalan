<?php
$id=$_POST['idx'];
$hari = addslashes($_POST['hari']);
$stat = addslashes($_POST['status']);



$connect = new mysqli("localhost","root","","d_base_espara");
$query=mysqli_query($connect, "UPDATE tb_hari SET hari='$hari', status_hari='$stat' WHERE kd_hari=$id") or die (mysql_error());

if ($query) {
        //jika  berhasil tampil ini
        echo "<script type='text/javascript'>
    			alert('Data Berhasil Dirubah')
   				window.location.href='../?modul=hari';
			 </script>";
        
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
        echo mysqli_error();
    }
?>