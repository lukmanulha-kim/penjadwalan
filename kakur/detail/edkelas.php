<?php
$id=$_POST['idx'];
$nama = addslashes($_POST['nama']);
$wali = addslashes($_POST['walikelas']);
$stat = addslashes($_POST['status']);



$connect = new mysqli("localhost","root","","d_base_espara");
$query=mysqli_query($connect, "UPDATE tb_kelas SET nama_kelas='$nama', kd_guru='$wali', status_kelas='$stat' WHERE kd_kelas=$id") or die (mysql_error());

if ($query) {
        //jika  berhasil tampil ini
        echo "<script type='text/javascript'>
    			alert('Data Berhasil Dirubah')
   				window.location.href='../?modul=kelas';
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
