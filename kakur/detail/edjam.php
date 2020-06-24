<?php
$id=$_POST['idx'];
$jam = addslashes($_POST['jam']);
$pukul = addslashes($_POST['pukul']);
#$stat = addslashes($_POST['status']);



$connect = new mysqli("localhost","root","","d_base_espara");
$query=mysqli_query($connect, "UPDATE tb_jam SET jam_ke='$jam', pukul='$pukul' WHERE kd_jam=$id") or die (mysql_error());

if ($query) {
        //jika  berhasil tampil ini
        echo "<script type='text/javascript'>
    			alert('Data Berhasil Dirubah')
   				window.location.href='../?modul=jam';
			 </script>";
        
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
        echo mysqli_error();
    }
?>