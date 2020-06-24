<script type="text/javascript"></script>
<script type="text/javascript" src="./../vendor/sweetalert.min.js"></script>
<?php

$connect = new mysqli("localhost","root","","d_base_espara"); 

$id_jadwal = $_POST['id_jadwal'];
$id_tugas = $_POST['id_tugas'];
$id_hari = $_POST['id_hari'];
$id_mapel = $_POST['id_mapel'];
$id_kelas = $_POST['id_kelas'];
$id_guru = $_POST['id_guru'];
$tapel = $_POST['tapel'];
$smt = $_POST['smt'];
$jam1 = $_POST['jam1'];
$jam2 = $_POST['jam2'];
$jam3 = $_POST['jam3'];
// echo $id_hari."<br>";
// echo $id_jadwal." | ".$id_tugas." | ".$id_hari." | ".$id_mapel." | ".$id_kelas." | ".$id_guru." | ".$tapel." | ".$smt." | ".$jam1." | ".$jam2." | ".$jam3."<br>";


$cek1 = mysqli_query($connect, "SELECT * FROM tb_jadwal where kd_hari='$id_hari' and kd_jam='$jam1' and kd_kelas='$id_kelas' and semester='$smt'");
$cek2 = mysqli_query($connect, "SELECT * FROM tb_jadwal where kd_hari='$id_hari' and kd_jam='$jam2' and kd_kelas='$id_kelas' and semester='$smt'");
$cek3 = mysqli_query($connect, "SELECT * FROM tb_jadwal where kd_hari='$id_hari' and kd_jam='$jam3' and kd_kelas='$id_kelas' and semester='$smt'");

$cek4_1 = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE kd_jam='$_POST[jam1]' and kd_hari='$_POST[id_hari]' and kd_guru='$_POST[id_guru]' and semester='$smt'");
$cek4_2 = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE kd_jam='$_POST[jam2]' and kd_hari='$_POST[id_hari]' and kd_guru='$_POST[id_guru]' and semester='$smt'");
$cek4_3 = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE kd_jam='$_POST[jam3]' and kd_hari='$_POST[id_hari]' and kd_guru='$_POST[id_guru]' and semester='$smt'");

$cek5_1 = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE kd_jam='$_POST[jam1]' and kd_hari='$_POST[id_hari]' and kd_kelas='$_POST[id_kelas]' and semester='$smt'");
$cek5_2 = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE kd_jam='$_POST[jam2]' and kd_hari='$_POST[id_hari]' and kd_kelas='$_POST[id_kelas]' and semester='$smt'");
$cek5_3 = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE kd_jam='$_POST[jam3]' and kd_hari='$_POST[id_hari]' and kd_kelas='$_POST[id_kelas]' and semester='$smt'");

$quer = mysqli_query($connect, "SELECT jml_jam from tb_penugasan where kd_penugasan = '$_POST[id_tugas]' AND status_penugasan = 1");
$view = mysqli_fetch_array($quer);

$sql = "SELECT count(*) AS jumlahpen FROM tb_jadwal where kd_penugasan = '$id_tugas'";
$query = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($query);

$sql1 = "SELECT count(*) AS jml FROM tb_jadwal where kd_penugasan = '$id_tugas' AND kd_hari = '$id_hari' and semester='$smt'";
$query1 = mysqli_query($connect, $sql1);
$result1 = mysqli_fetch_array($query1);

if ($jam2==NULL AND $jam3==NULL) {
  $jumlah = 1;
}elseif ($jam2==NULL) {
  $jumlah = 2;
}elseif($jam3==NULL){
  $jumlah = 2;
}else{
  $jumlah = 3;
}

$total = $result['jumlahpen'] + $jumlah;
$ttl = $result1['jml'] + $jumlah;

// echo $ttl."<br>";
// echo $total;
// $total>$view['jml_jam'];

// $jum_at = $id_hari=5 && $jam1>5;
// $jum_att = $id_hari=5 && $jam2>5;
// $jum_attt = $id_hari=5 && $jam3>5;
#echo "Jumlah data dengan fungsi MySQL count(): {$result['jumlah']} <br/>";

$cek6 = mysqli_query($connect, "SELECT * FROM tb_mapel where kd_mapel='$_POST[id_mapel]'");
$resul=mysqli_fetch_array($cek6);

if (@mysqli_num_rows($cek1)>0 || @mysqli_num_rows($cek2)>0 || @mysqli_num_rows($cek3)>0) {
  echo "<script type='text/javascript'>alert('Maaf, Sudah Ada Jam Mengajar Pada Jam Tersebut'); window.location = '../kakur/?modul=genOto';</script>";
}elseif(mysqli_num_rows($cek4_1)>0){
  echo "<script type='text/javascript'>alert('Maaf, Guru Tersebut Sudah Ada Jam Mengajar di Kelas Sebelah'); window.location = '../kakur/?modul=genOto';</script>";
}elseif(mysqli_num_rows($cek4_2)>0){
  echo "<script type='text/javascript'>alert('Maaf, Guru Tersebut Sudah Ada Jam Mengajar di Kelas Sebelah'); window.location = '../kakur/?modul=genOto';</script>";
}elseif(mysqli_num_rows($cek4_3)>0){
  echo "<script type='text/javascript'>alert('Maaf, Guru Tersebut Sudah Ada Jam Mengajar di Kelas Sebelah'); window.location = '../kakur/?modul=genOto';</script>";
}elseif(mysqli_num_rows($cek5_1)>0){
    echo "<script type='text/javascript'>alert('Maaf, Sudah Ada Jam Mengajar di Waktu dan Hari Tersebut'); window.location = '../kakur/?modul=genOto';</script>";
}elseif(mysqli_num_rows($cek5_2)>0){
    echo "<script type='text/javascript'>alert('Maaf, Sudah Ada Jam Mengajar di Waktu dan Hari Tersebut'); window.location = '../kakur/?modul=genOto';</script>";
}elseif(mysqli_num_rows($cek5_3)>0){
    echo "<script type='text/javascript'>alert('Maaf, Sudah Ada Jam Mengajar di Waktu dan Hari Tersebut'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($total>$view['jml_jam']){
    echo "<script type='text/javascript'>alert('Maaf, Guru Tersebut Sudah Melebihi Alokasi Waktu Penugasan'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($ttl>4){
    echo "<script type='text/javascript'>alert('Maaf, Maksimal Alokasi Waktu Untuk Satu Guru Sudah Lebih Dari 4 Jam Dalam Satu Hari'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($resul['kd_hari']==$_POST['id_hari'] && $jumlah>3){
    echo "<script type='text/javascript'>alert('Maaf Hari Tersebut Merupakan Hari MGMP Dari Mapel Yang Dipilih'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($_POST['id_hari']==5 && $jam1>5){
  //   echo "<script type='text/javascript'>swal('MAAF', 'Hari Tersebut Merupakan Hari Jum'at, Pembelajaran Hanya Sampai Jam Ke 5 !.','warning')</script>";
  // echo "Jum'at Mas Bro 1";
  echo "<script type='text/javascript'>alert('Pembelajaran Hanya Sampai Pada Jam Ke 5'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($_POST['id_hari']==5 && $jam2>5){
    // echo "<script type='text/javascript'>swal('MAAF', 'Hari Tersebut Merupakan Hari Jum'at, Pembelajaran Hanya Sampai Jam Ke 5 !.','warning')</script>";
  // echo "Jum'at Mas Bro 2";
  echo "<script type='text/javascript'>
    alert('Pembelajaran Hanya Sampai Pada Jam Ke 5'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($_POST['id_hari']==5 && $jam3>5){
    // echo "<script type='text/javascript'>swal('MAAF', 'Hari Tersebut Merupakan Hari Jum'at, Pembelajaran Hanya Sampai Jam Ke 5 !.','warning')</script>";
  // echo "Jum'at Mas Bro 3";
  echo "<script type='text/javascript'>alert('Pembelajaran Hanya Sampai Pada Jam Ke 5'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($jam2==NULL && $jam3==NULL){
  // echo "Jalankan Query 1 <br>";
  // echo $jam1;
  mysqli_query($connect, "INSERT INTO tb_jadwal VALUES ('','$id_mapel', '$id_kelas', '$id_guru', '$jam1', '$id_hari', '$id_tugas', '$tapel', '$smt')");
  mysqli_query($connect, "DELETE FROM tmp_jadwal where kd_jad=$id_jadwal");
  echo "<script type='text/javascript'>alert('Data Berhasil Ditambah'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($jam1==NULL && $jam2==NULL){
  // echo "Jalankan Query 1 <br>";
  // echo $jam3;
  mysqli_query($connect, "INSERT INTO tb_jadwal VALUES ('','$id_mapel', '$id_kelas', '$id_guru', '$jam3', '$id_hari', '$id_tugas', '$tapel', '$smt')");
  mysqli_query($connect, "DELETE FROM tmp_jadwal where kd_jad=$id_jadwal");
  echo "<script type='text/javascript'>alert('Data Berhasil Ditambah'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($jam1==NULL && $jam3==NULL){
  // echo "Jalankan Query 1 <br>";
  // echo $jam2;
  mysqli_query($connect, "INSERT INTO tb_jadwal VALUES ('','$id_mapel', '$id_kelas', '$id_guru', '$jam3', '$id_hari', '$id_tugas', '$tapel', '$smt')");
  mysqli_query($connect, "DELETE FROM tmp_jadwal where kd_jad=$id_jadwal");
  echo "<script type='text/javascript'>alert('Data Berhasil Ditambah'); window.location = '../kakur/?modul=genOto';</script>";

}elseif($jam2==NULL && $jam3!=$jam1){
  // echo "Jalankan Query 2 <br>";
  // echo $jam1.", ".$jam3;
  mysqli_query($connect, "INSERT INTO tb_jadwal VALUES ('','$id_mapel', '$id_kelas', '$id_guru', '$jam1', '$id_hari', '$id_tugas', '$tapel', '$smt'),('','$id_mapel', '$id_kelas', '$id_guru', '$jam3', '$id_hari', '$id_tugas', '$tapel', '$smt')");
  mysqli_query($connect, "DELETE FROM tmp_jadwal where kd_jad=$id_jadwal");
  echo "<script type='text/javascript'>alert('Data Berhasil Ditambah'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($jam2==NULL && $jam3==$jam1){
  // echo "Jam Tidak Boleh Sama <br>";
  // echo $jam1.", ".$jam3;
  echo "<script type='text/javascript'>alert('Pemilihan Jam Tidak Boleh Sama !.'); window.location = '../kakur/?modul=genOto';</script>";

}elseif($jam3==NULL && $jam2!=$jam1){
  // echo "Jalankan Query 2 <br>";
  // echo $jam1.", ".$jam2;
  // echo "<a href='ok.php'>Kembali</a>";
  mysqli_query($connect, "INSERT INTO tb_jadwal VALUES ('','$id_mapel', '$id_kelas', '$id_guru', '$jam1', '$id_hari', '$id_tugas', '$tapel', '$smt'),('','$id_mapel', '$id_kelas', '$id_guru', '$jam2', '$id_hari', '$id_tugas', '$tapel', '$smt')");
  mysqli_query($connect, "DELETE FROM tmp_jadwal where kd_jad=$id_jadwal");
  echo "<script type='text/javascript'>
    alert('Data Berhasil Ditambah'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($jam3==NULL && $jam2==$jam1){
  // echo "Jam Tidak Boleh Sama <br>";
  // echo $jam1.", ".$jam2;
  echo "<script type='text/javascript'>alert('Pemilihan Jam Tidak Boleh Sama !.'); window.location = '../kakur/?modul=genOto';</script>";

}elseif($jam1==NULL && $jam2!=$jam3){
  // echo "Jalankan Query 2 <br>";
  // echo $jam2.", ".$jam3;
  mysqli_query($connect, "INSERT INTO tb_jadwal VALUES ('','$id_mapel', '$id_kelas', '$id_guru', '$jam2', '$id_hari', '$id_tugas', '$tapel', '$smt'),('','$id_mapel', '$id_kelas', '$id_guru', '$jam3', '$id_hari', '$id_tugas', '$tapel', '$smt')");
  mysqli_query($connect, "DELETE FROM tmp_jadwal where kd_jad=$id_jadwal");
  echo "<script type='text/javascript'>alert('Data Berhasil Ditambah'); window.location = '../kakur/?modul=genOto';</script>";
}elseif($jam1==NULL && $jam2==$jam3){
  // echo "Jam Tidak Boleh Sama <br>";
  // echo $jam2.", ".$jam3;
  echo "<script type='text/javascript'>alert('Pemilihan Jam Tidak Boleh Sama !.'); window.location = '../kakur/?modul=genOto';</script>";

}elseif($jam3 && $jam2 && $jam1){
  // echo "Jalankan Query 3 <br>";
  // echo $jam1.", ".$jam2.", ".$jam3;
  // echo "<a href='ok.php'>Kembali</a>";
  mysqli_query($connect, "INSERT INTO tb_jadwal VALUES ('','$id_mapel', '$id_kelas', '$id_guru', '$jam1', '$id_hari', '$id_tugas', '$tapel', '$smt'),('','$id_mapel', '$id_kelas', '$id_guru', '$jam2', '$id_hari', '$id_tugas', '$tapel', '$smt'),('','$id_mapel', '$id_kelas', '$id_guru', '$jam3', '$id_hari', '$id_tugas', '$tapel', '$smt')");
  mysqli_query($connect, "DELETE FROM tmp_jadwal where kd_jad=$id_jadwal");
  echo "<script type='text/javascript'>
    alert('Data Berhasil Ditambah'); window.location = '../kakur/?modul=genOto';</script>";
}
elseif($jam1==$jam2 || $jam2==$jam3 || $jam3==$jam1){
  // echo "Jam Tidak Boleh Sama";
  echo "<script type='text/javascript'>alert('Pemilihan Jam Tidak Boleh Sama !.'); window.location = '../kakur/?modul=genOto';</script>";
 }
?>