<?php
$id=$_POST['idx'];
$guru = addslashes($_POST['guru']);
$mapel = addslashes($_POST['mapel']);
$kelas = addslashes($_POST['kelas']);
$jam = addslashes($_POST['jam']);
$stat = addslashes($_POST['status']);

$connect = new mysqli("localhost","root","","d_base_espara");
$query=mysqli_query($connect, "UPDATE tb_penugasan SET kd_guru='$guru', kd_mapel='$mapel', kd_kelas='$kelas', jml_jam='$jam', status_penugasan='$stat' WHERE kd_penugasan=$id") or die (mysql_error());

if ($query) {
        //jika  berhasil tampil ini
        echo "<script type='text/javascript'>
    			alert('Data Berhasil Dirubah')
   				window.location.href='../?modul=penugasan';
			 </script>";
        
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
        echo mysqli_error();
    }
?>
<script type="text/javascript">
    alert("Data Berhasil Ditambah")
    window.location.href="?modul=guru";
</script>
