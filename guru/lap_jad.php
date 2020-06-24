<?php
include 'config.php';
$connect = new mysqli("localhost","root","","d_base_espara");
require('../vendor/pdf/fpdf.php');
if (!isset($_SESSION)) {
    session_start();
}

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',9);
$pdf->Image('../picture/espara.png',1,0.7,2,2);
$pdf->SetX(3.2);            
$pdf->MultiCell(19.5,0.5,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0,'L');   
$pdf->SetFont('Arial','B',15);
$pdf->SetX(3.2);
$pdf->MultiCell(19.5,0.4,'SMP NEGERI 2 TENGGARANG',0,'L');
$pdf->SetFont('Arial','B',7);
$pdf->SetX(3.2);
$pdf->MultiCell(19.5,0.4,'Jl. Raya Situbondo No. 96A Tenggarang Telp. (0332) 432520',0,'L');
$pdf->SetX(3.2);
$pdf->MultiCell(19.5,0.2,'Website : www.smpn2tenggarang.sch.id Email : smpnn2tenggarang@gmail.com',0,'L');
$pdf->Line(1,3.1,20,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,20,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(19,0.7,"JADWAL MATA PELAJARAN",0,10,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(19,0.2,"SEMESTER $_POST[semester]",0,10,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(19,0.5,"TAHUN $_POST[tapel]",0,10,'C');
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(19,0.2,"NAMA GURU : $_SESSION[username]",0,10,'L');
$pdf->ln(0.2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'SENIN', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.7, 'Kelas', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Mata Pelajaran', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($connect,"SELECT
						tb_kelas.nama_kelas,
						tb_mapel.mapel,
						tb_guru.nama_guru,
						tb_penugasan.jml_jam,
						tb_jadwal.tahun_pelajaran,
						tb_jadwal.semester,
						tb_hari.hari,
						tb_jam.jam_ke,
						tb_jam.pukul
						FROM
						tb_penugasan
						Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
						Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
						Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
						Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
						Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
						Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
						WHERE
						tb_jadwal.semester =  '$_POST[semester]' AND
						tb_jadwal.kd_hari =  '1' AND
						tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND
						tb_jadwal.kd_guru =  '$_SESSION[userdata]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.6, $lihat['nama_kelas'] , 1, 0, 'C');
	$pdf->Cell(5, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.6, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(7, 0.6, $lihat['mapel'], 1, 1,'C');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'SELASA', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.7, 'Kelas', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Mata Pelajaran', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($connect,"SELECT
						tb_kelas.nama_kelas,
						tb_mapel.mapel,
						tb_guru.nama_guru,
						tb_penugasan.jml_jam,
						tb_jadwal.tahun_pelajaran,
						tb_jadwal.semester,
						tb_hari.hari,
						tb_jam.jam_ke,
						tb_jam.pukul
						FROM
						tb_penugasan
						Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
						Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
						Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
						Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
						Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
						Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
						WHERE
						tb_jadwal.semester =  '$_POST[semester]' AND
						tb_jadwal.kd_hari =  '2' AND
						tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND
						tb_jadwal.kd_guru =  '$_SESSION[userdata]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.6, $lihat['nama_kelas'] , 1, 0, 'C');
	$pdf->Cell(5, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.6, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(7, 0.6, $lihat['mapel'], 1, 1,'C');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'RABU', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.7, 'Kelas', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Mata Pelajaran', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($connect,"SELECT
						tb_kelas.nama_kelas,
						tb_mapel.mapel,
						tb_guru.nama_guru,
						tb_penugasan.jml_jam,
						tb_jadwal.tahun_pelajaran,
						tb_jadwal.semester,
						tb_hari.hari,
						tb_jam.jam_ke,
						tb_jam.pukul
						FROM
						tb_penugasan
						Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
						Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
						Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
						Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
						Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
						Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
						WHERE
						tb_jadwal.semester =  '$_POST[semester]' AND
						tb_jadwal.kd_hari =  '3' AND
						tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND
						tb_jadwal.kd_guru =  '$_SESSION[userdata]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.6, $lihat['nama_kelas'] , 1, 0, 'C');
	$pdf->Cell(5, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.6, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(7, 0.6, $lihat['mapel'], 1, 1,'C');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'KAMIS', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.7, 'Kelas', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Mata Pelajaran', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($connect,"SELECT
						tb_kelas.nama_kelas,
						tb_mapel.mapel,
						tb_guru.nama_guru,
						tb_penugasan.jml_jam,
						tb_jadwal.tahun_pelajaran,
						tb_jadwal.semester,
						tb_hari.hari,
						tb_jam.jam_ke,
						tb_jam.pukul
						FROM
						tb_penugasan
						Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
						Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
						Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
						Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
						Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
						Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
						WHERE
						tb_jadwal.semester =  '$_POST[semester]' AND
						tb_jadwal.kd_hari =  '4' AND
						tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND
						tb_jadwal.kd_guru =  '$_SESSION[userdata]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.6, $lihat['nama_kelas'] , 1, 0, 'C');
	$pdf->Cell(5, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.6, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(7, 0.6, $lihat['mapel'], 1, 1,'C');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'JUM\'AT', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.7, 'Kelas', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Mata Pelajaran', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($connect,"SELECT
						tb_kelas.nama_kelas,
						tb_mapel.mapel,
						tb_guru.nama_guru,
						tb_penugasan.jml_jam,
						tb_jadwal.tahun_pelajaran,
						tb_jadwal.semester,
						tb_hari.hari,
						tb_jam.jam_ke,
						tb_jam.pukul
						FROM
						tb_penugasan
						Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
						Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
						Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
						Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
						Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
						Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
						WHERE
						tb_jadwal.semester =  '$_POST[semester]' AND
						tb_jadwal.kd_hari =  '5' AND
						tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND
						tb_jadwal.kd_guru =  '$_SESSION[userdata]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.6, $lihat['nama_kelas'] , 1, 0, 'C');
	$pdf->Cell(5, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.6, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(7, 0.6, $lihat['mapel'], 1, 1,'C');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'SABTU', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(4, 0.7, 'Kelas', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Mata Pelajaran', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($connect,"SELECT
						tb_kelas.nama_kelas,
						tb_mapel.mapel,
						tb_guru.nama_guru,
						tb_penugasan.jml_jam,
						tb_jadwal.tahun_pelajaran,
						tb_jadwal.semester,
						tb_hari.hari,
						tb_jam.jam_ke,
						tb_jam.pukul
						FROM
						tb_penugasan
						Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
						Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
						Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
						Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
						Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
						Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
						WHERE
						tb_jadwal.semester =  '$_POST[semester]' AND
						tb_jadwal.kd_hari =  '6' AND
						tb_jadwal.tahun_pelajaran =  '$_POST[tapel]' AND
						tb_jadwal.kd_guru =  '$_SESSION[userdata]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(4, 0.6, $lihat['nama_kelas'] , 1, 0, 'C');
	$pdf->Cell(5, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.6, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(7, 0.6, $lihat['mapel'], 1, 1,'C');

	$no++;
}
$quer = mysqli_query($connect, "SELECT * FROM tb_guru WHERE kd_guru=$_SESSION[userdata]");
while($view=mysqli_fetch_array($quer)){
$pdf->Output("JADWAL$_POST[semester]$_POST[tapel]$view[nama_guru].pdf","I");
}
?>

