<?php
include 'config.php';
$connect = new mysqli("localhost","root","","d_base_espara");
require('../vendor/pdf/fpdf.php');

$pdf = new FPDF("P","cm","LEGAL");

$pdf->SetMargins(0.5,0.5,0.5,0.5);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',9);
$pdf->Image('../picture/espara.png',1,0.3,2,2);
$pdf->SetX(3.2);            
$pdf->Cell(9,0.5,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0,0,'L');
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(8.9,0.5,'JADWAL PELAJARAN',0,'R');   
$pdf->SetFont('Arial','B',14);
$pdf->SetX(3.2);
$pdf->Cell(9,0.4,'SMP NEGERI 2 TENGGARANG',0,0,'L');
$pdf->MultiCell(8.9,0.4,"SEMESTER $_POST[semester]",0,'R');
$pdf->SetFont('Arial','B',7);
$pdf->SetX(3.2);
$pdf->Cell(9,0.4,'Jl. Raya Situbondo No. 96A Tenggarang Telp. (0332) 432520',0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(8.9,0.4,"TAHUN PELAJARAN $_POST[tapel]",0,'R');
$pdf->SetX(3.2);
$pdf->SetFont('Arial','B',7);
$pdf->MultiCell(19.5,0.2,'Website : www.smpn2tenggarang.sch.id Email : smpnn2tenggarang@gmail.com',0,'L');
$pdf->Line(0.5,2.5,21,2.5);
$pdf->SetLineWidth(0.1);      
$pdf->Line(0.5,2.6,21,2.6);   
$pdf->SetLineWidth(0);


$pdf->ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20.6, 0.4, 'SENIN', 1, 1, 'C');
$pdf->Cell(3, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2.6, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(15, 0.35, 'Kelas', 1, 1, 'C');
$pdf->Cell(5.6, 0.35, '', 0, 0, 'C');
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
$pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(2.6, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '1' AND
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
$pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(2.6, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '1' AND
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
$pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(2.6, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '1' AND
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
$pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(2.6, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '1' AND
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
$pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(2.6, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '1' AND
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
$pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(2.6, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '1' AND
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
$pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(2.6, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '1' AND
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
$pdf->Cell(3, 0.4, $tampil['pukul'] , 1, 0 , 'C');
$pdf->Cell(2.6, 0.4, $tampil['jam_ke'] , 1, 0 , 'C');

$query = mysqli_query($connect, "SELECT * FROM
      tb_penugasan
      Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
      Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
      Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
      Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
      Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
      Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
      WHERE tb_jadwal.semester =  '$_POST[semester]' AND
            tb_jadwal.kd_hari =  '1' AND
            tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND 
            tb_jadwal.kd_jam = '8' order by tb_jadwal.kd_kelas ASC");
while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
$pdf->Cell(0.714, 0.4, $tampil['kode_mapel']."".$tampil['kd_guru'] , 1, 0, 'C');
}
$pdf->Cell(0.714, 0.4, '' , 0, 1, 'C');

include 'lapp.php';
// include 'lapp.php';
// include 'lapp.php';
// include 'lapp.php';
// include 'lapp.php';
// Tanda Tangan
$tanggal = date("d-m-Y");
$pdf->ln(1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(14.3, 0.4, '', 0, 0, 'C');
$pdf->Cell(6.3, 0.4, "Tenggarang, ". $tanggal, 0, 1, 'C');
$jabatan = "Kepala Sekolah";
$query = mysqli_query($connect, "SELECT * FROM tb_guru where jabatan = '$jabatan'");
$tampil=mysqli_fetch_array($query, MYSQLI_ASSOC);
$pdf->Cell(14.3, 0.4, '', 0, 0, 'C');
$pdf->Cell(6.3, 0.4, "Kepala Sekolah,", 0, 1, 'C');
$pdf->Cell(14.3, 2, '', 0, 0, 'C');
$pdf->Cell(6.3, 2, "", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(14.3, 0.4, '', 0, 0, 'C');
$pdf->Cell(6.3, 0.4, $tampil['nama_guru'], 0, 1, 'C');
$pdf->Cell(14.3, 0.4, '', 0, 0, 'C');
$pdf->Cell(6.3, 0.4, "NIP. ".$tampil['nip'], 0, 1, 'C');

include 'dagu.php';

$pdf->Output("JADWAL$_POST[semester]$_POST[tapel].pdf","I");

?>

