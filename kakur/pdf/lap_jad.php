<?php
// include 'config.php';
$connect = new mysqli("localhost","root","","d_base_espara");
require('../../vendor/pdf/fpdf.php');

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',9);
$pdf->Image('../../picture/espara.png',0.7,0.3,2,2);
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
$pdf->SetX(1.4);
$pdf->SetFont('Arial','B',14);
$quer = mysqli_query($connect, "SELECT * FROM tb_kelas WHERE kd_kelas=$_POST[kelas]");
while ($tampil=mysqli_fetch_array($quer)) {
$pdf->Cell(2,0.5,"KELAS : $tampil[nama_kelas]",0,10,'C');
}
$pdf->ln(0.2);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'SENIN', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(6, 0.7, 'Mata Pelajaran', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Guru Pengajar', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',7);
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
						tb_jadwal.kd_kelas =  '$_POST[kelas]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.4, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.4, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.4, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(6, 0.4, $lihat['mapel'], 1, 0,'L');
	$pdf->Cell(7, 0.4, $lihat['nama_guru'],1, 1, 'L');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'SELASA', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(6, 0.7, 'Mata Pelajaran', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Guru Pengajar', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',7);
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
						tb_jadwal.kd_kelas =  '$_POST[kelas]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.4, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.4, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.4, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(6, 0.4, $lihat['mapel'], 1, 0,'L');
	$pdf->Cell(7, 0.4, $lihat['nama_guru'],1, 1, 'L');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'RABU', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(6, 0.7, 'Mata Pelajaran', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Guru Pengajar', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',7);
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
						tb_jadwal.kd_kelas =  '$_POST[kelas]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.44, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.44, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.44, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(6, 0.44, $lihat['mapel'], 1, 0,'L');
	$pdf->Cell(7, 0.44, $lihat['nama_guru'],1, 1, 'L');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'KAMIS', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(6, 0.7, 'Mata Pelajaran', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Guru Pengajar', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',7);
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
						tb_jadwal.kd_kelas =  '$_POST[kelas]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.444, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.444, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.444, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(6, 0.444, $lihat['mapel'], 1, 0,'L');
	$pdf->Cell(7, 0.444, $lihat['nama_guru'],1, 1, 'L');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'JUM\'AT', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(6, 0.7, 'Mata Pelajaran', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Guru Pengajar', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',7);
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
						tb_jadwal.kd_kelas =  '$_POST[kelas]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.4444, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.4444, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.4444, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(6, 0.4444, $lihat['mapel'], 1, 0,'L');
	$pdf->Cell(7, 0.4444, $lihat['nama_guru'],1, 1, 'L');

	$no++;
}
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(19, 0.7, 'SABTU', 1, 1, 'C');
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.7, 'Pukul', 1, 0, 'C');
$pdf->Cell(2, 0.7, 'Jam Ke-', 1, 0, 'C');
$pdf->Cell(6, 0.7, 'Mata Pelajaran', 1, 0, 'C');
$pdf->Cell(7, 0.7, 'Guru Pengajar', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$pdf->SetFont('Arial','',7);
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
						tb_jadwal.kd_kelas =  '$_POST[kelas]'
						ORDER BY
						tb_jadwal.kd_jam ASC");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.44444, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.44444, $lihat['pukul'], 1, 0,'C');
	$pdf->Cell(2, 0.44444, $lihat['jam_ke'],1, 0, 'C');
	$pdf->Cell(6, 0.44444, $lihat['mapel'], 1, 0,'L');
	$pdf->Cell(7, 0.44444, $lihat['nama_guru'],1, 1, 'L');

	$no++;
}
$quer = mysqli_query($connect, "SELECT * FROM tb_kelas WHERE kd_kelas=$_POST[kelas]");
while($view=mysqli_fetch_array($quer)){
$pdf->Output("JADWAL$_POST[semester]$_POST[tapel]$view[nama_kelas].pdf","I");
}
?>

