<?php  
$pdf->SetFont('Arial','B',8);
$pdf->Cell(16.2, 0.4, 'SELASA', 1, 1, 'C');
// $pdf->Cell(3, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(1.2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(15, 0.35, 'Kelas', 1, 1, 'C');
$pdf->Cell(1.2, 0.35, '', 0, 0, 'C');
$pdf->SetFont('Arial','',8);
$query=mysqli_query($connect,"SELECT * FROM tb_kelas order by kd_kelas ASC");
while($lihat=mysqli_fetch_array($query)){
$pdf->Cell(0.714, 0.35, $lihat['nama_kelas'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.35,'' , 0, 1 , 'C');
// jam pertama senin
$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.kd_jam=1");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
// $pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(1.2, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '2' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '1' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');
// jam kedua senin
$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.kd_jam=2");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
// $pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(1.2, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '2' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '2' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');
// jam ketiga senin
$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.kd_jam=3");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
// $pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(1.2, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '2' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '3' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');
// jam keempat senin
$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.kd_jam=4");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
// $pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(1.2, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '2' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '4' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');
// jam kelima senin
$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.kd_jam=5");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
// $pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(1.2, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '2' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '5' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');
// jam keenam senin
$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.kd_jam=6");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
// $pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(1.2, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '2' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '6' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');
// jam ketuju senin
$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.kd_jam=7");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
// $pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(1.2, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '2' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '7' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');
// jam kedelapan senin
$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.kd_jam=8");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
// $pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(1.2, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '2' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '8' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');
?>