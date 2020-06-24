<?php
$id=$_POST['idx'];
$kode = addslashes($_POST['kode']);
$mapel = addslashes($_POST['mapel']);
$mgmp = addslashes($_POST['mgmp']);
#$stat = addslashes($_POST['status']);



$connect = new mysqli("localhost","root","","d_base_espara");
$query=mysqli_query($connect, "UPDATE tb_mapel SET kode_mapel='$kode', mapel='$mapel', kd_hari='$mgmp' WHERE kd_mapel=$id") or die (mysql_error());

if ($query) {
        //jika  berhasil tampil ini
        echo "<script type='text/javascript'>
    			alert('Data Berhasil Dirubah')
   				window.location.href='../?modul=mapel';
			 </script>";
        
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
        echo mysqli_error();
    }
?>
<script type="text/javascript">
    alert("Data Berhasil Ditambah")
    window.location.href="?modul=kelas";
</script>
