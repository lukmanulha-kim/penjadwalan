<?php
$id=$_POST['idx'];
$nama = addslashes($_POST['nama']);
$nip = addslashes($_POST['nip']);
$gol = addslashes($_POST['gol']);
$pangka = addslashes($_POST['pangka']);
$jaba = addslashes($_POST['jaba']);
$stat = addslashes($_POST['status']);



$connect = new mysqli("localhost","root","","d_base_espara");
$query=mysqli_query($connect, "UPDATE tb_guru SET nama_guru='$nama', nip='$nip', golruang='$gol', jabatan='$jaba', pangkat='$pangka', status_guru='$stat' WHERE kd_guru=$id") or die (mysql_error());

if ($query) {
        //jika  berhasil tampil ini
        echo "<script type='text/javascript'>
    			alert('Data Berhasil Dirubah') window.location.href='../?modul=guru';
			 </script>";
        
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
        echo mysqli_error();
    }
?>
