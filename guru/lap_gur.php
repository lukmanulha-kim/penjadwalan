<?php
// include 'config.php';
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
$pdf->Image('../picture/espara.png',0.7,0.3,2,2);
$pdf->SetY(0.5);            
$pdf->SetX(2.9);
$pdf->Cell(9,0.5,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0,0,'L');
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(8,0.5,'JADWAL PELAJARAN',0,'R');   
$pdf->SetFont('Arial','B',14);
$pdf->SetX(2.9);
$pdf->Cell(9,0.4,'SMP NEGERI 2 TENGGARANG',0,0,'L');
$pdf->MultiCell(8,0.4,"SEMESTER $_POST[semester]",0,'R');
$pdf->SetFont('Arial','B',7);
$pdf->SetX(2.9);
$pdf->Cell(9,0.4,'Jl. Raya Situbondo No. 96A Tenggarang Telp. (0332) 432520',0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->MultiCell(8,0.4,"TAHUN PELAJARAN $_POST[tapel]",0,'R');
$pdf->SetX(2.9);
$pdf->SetFont('Arial','B',7);
$pdf->MultiCell(19.5,0.2,'Website : www.smpn2tenggarang.sch.id Email : smpnn2tenggarang@gmail.com',0,'L');
$pdf->Line(1,2.5,20,2.5);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,2.6,20,2.6);   
$pdf->SetLineWidth(0);

$pdf->ln(1);
$pdf->SetY(2.9);
$pdf->SetX(0.9);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(2,0.5,"NAMA GURU : $_SESSION[username]",0,10,'L');

// JADWAL BAGIAN KIRI
$pdf->ln(0.2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6.5, 0.7, 'SENIN', 1, 1, 'C');
$pdf->Cell(0.8, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(2.7, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kode', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kelas', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',10);
$query=mysqli_query($connect,"SELECT * FROM
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
	$pdf->Cell(0.8, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(2.7, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(1.5, 0.6, $lihat['kode_mapel'],1, 0, 'C');
	$pdf->Cell(1.5, 0.6, $lihat['nama_kelas'],1, 1, 'C');

	$no++;
}

$pdf->ln(0.4);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6.5, 0.7, 'RABU', 1, 1, 'C');
$pdf->Cell(0.8, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(2.7, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kode', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kelas', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',10);
$query=mysqli_query($connect,"SELECT * FROM
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
	$pdf->Cell(0.8, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(2.7, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(1.5, 0.6, $lihat['kode_mapel'],1, 0, 'C');
	$pdf->Cell(1.5, 0.6, $lihat['nama_kelas'],1, 1, 'C');

	$no++;
}

$pdf->ln(0.4);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6.5, 0.7, 'JUM\'AT', 1, 1, 'C');
$pdf->Cell(0.8, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(2.7, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kode', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kelas', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',10);
$query=mysqli_query($connect,"SELECT * FROM
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
	$pdf->Cell(0.8, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(2.7, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(1.5, 0.6, $lihat['kode_mapel'],1, 0, 'C');
	$pdf->Cell(1.5, 0.6, $lihat['nama_kelas'],1, 1, 'C');

	$no++;
}

// JADWAL BAGIAN KANAN
// $pdf->ln(0.2);
$pdf->SetY(3.6);
$pdf->SetX(8);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6.5, 0.7, 'SELASA', 1, 1, 'C');
$pdf->SetX(8);
$pdf->Cell(0.8, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(2.7, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kode', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kelas', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',10);
$query=mysqli_query($connect,"SELECT * FROM
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
	$pdf->SetX(8);
	$pdf->Cell(0.8, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(2.7, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(1.5, 0.6, $lihat['kode_mapel'],1, 0, 'C');
	$pdf->Cell(1.5, 0.6, $lihat['nama_kelas'],1, 1, 'C');

	$no++;
}

$pdf->SetY(10.2);
$pdf->SetX(8);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6.5, 0.7, 'KAMIS', 1, 1, 'C');
$pdf->SetX(8);
$pdf->Cell(0.8, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(2.7, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kode', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kelas', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',10);
$query=mysqli_query($connect,"SELECT * FROM
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
	$pdf->SetX(8);
	$pdf->Cell(0.8, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(2.7, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(1.5, 0.6, $lihat['kode_mapel'],1, 0, 'C');
	$pdf->Cell(1.5, 0.6, $lihat['nama_kelas'],1, 1, 'C');

	$no++;
}

$pdf->SetY(16.8);
$pdf->SetX(8);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(6.5, 0.7, 'SABTU', 1, 1, 'C');
$pdf->SetX(8);
$pdf->Cell(0.8, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(2.7, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kode', 1, 0, 'C');
$pdf->Cell(1.5, 0.7, 'Kelas', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',10);
$query=mysqli_query($connect,"SELECT * FROM
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
	$pdf->SetX(8);
	$pdf->Cell(0.8, 0.6, $no , 1, 0, 'C');
	$pdf->Cell(2.7, 0.6, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(1.5, 0.6, $lihat['kode_mapel'],1, 0, 'C');
	$pdf->Cell(1.5, 0.6, $lihat['nama_kelas'],1, 1, 'C');

	$no++;
}

// Kode Guru
// $pdf->SetY(3.6);
// $pdf->SetX(15);
// $pdf->SetFont('Arial','B',7);
// $pdf->Cell(5, 0.5, 'KODE GURU', 1, 1, 'C');
// $pdf->SetFont('Arial','B',7);
// $pdf->SetY(4.1);
// $pdf->SetX(15);
// $pdf->Cell(0.7, 0.5, 'NO', 1, 0, 'C');
// $pdf->Cell(4.3, 0.5, 'NAMA GURU', 1, 1, 'C');
// $pdf->SetFont('Arial','',7);
// $query=mysqli_query($connect,"SELECT * FROM tb_guru order by kd_guru ASC");
// while($lihat=mysqli_fetch_array($query)){

// $pdf->SetX(15);
// $pdf->Cell(0.7, 0.4, $lihat['kd_guru'] , 1, 0, 'C');
// $pdf->Cell(4.3, 0.4, $lihat['nama_guru'] , 1, 1, 'L');
// }

// Kode Mapel
$pdf->ln(0.2);
$pdf->SetX(15);
$pdf->SetY(3.6);
$pdf->SetX(15);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(5, 0.5, 'KODE MATA PELAJARAN', 1, 1, 'C');
$pdf->SetFont('Arial','B',7);
// $pdf->SetY(20.5);
$pdf->SetX(15);
$pdf->Cell(1.2, 0.4, 'KODE', 1, 0, 'C');
$pdf->Cell(3.8, 0.4, 'MATA PELAJARAN', 1, 1, 'C');
$pdf->SetFont('Arial','',7);
$query=mysqli_query($connect,"SELECT * FROM tb_mapel order by kd_mapel ASC");
while($lihat=mysqli_fetch_array($query)){

$pdf->SetX(15);
$pdf->Cell(1.2, 0.4, $lihat['kode_mapel'] , 1, 0, 'C');
$pdf->Cell(3.8, 0.4, $lihat['mapel'] , 1, 1, 'L');
}


$quer = mysqli_query($connect, "SELECT * FROM tb_guru WHERE kd_guru=$_SESSION[userdata]");
while($view=mysqli_fetch_array($quer)){
$pdf->Output("JADWAL$_POST[semester]$_POST[tapel]$view[nama_guru].pdf","I");
}
?>