<?php 


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

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 0.5, 'KODE GURU', 1, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.5, 'NO', 1, 0, 'C');
$pdf->Cell(9, 0.5, 'NAMA GURU', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$query=mysqli_query($connect,"SELECT * FROM tb_guru order by kd_guru ASC");
while($lihat=mysqli_fetch_array($query)){
$pdf->Cell(1, 0.5, $lihat['kd_guru'] , 1, 0, 'C');
$pdf->Cell(9, 0.5, $lihat['nama_guru'] , 1, 1, 'L');
}

// Tanda Tangan
$tanggal = date("d-m-Y");
$pdf->ln(1);
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

$pdf->SetY(3);
$pdf->SetX(11);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 0.5, 'KODE MATA PELAJARAN', 1, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetY(3.5);
$pdf->SetX(11);
$pdf->Cell(1.5, 0.5, 'KODE', 1, 0, 'C');
$pdf->Cell(8.5, 0.5, 'MATA PELAJARAN', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$query=mysqli_query($connect,"SELECT * FROM tb_mapel order by kd_mapel ASC");
while($lihat=mysqli_fetch_array($query)){

$pdf->SetX(11);
$pdf->Cell(1.5, 0.5, $lihat['kode_mapel'] , 1, 0, 'C');
$pdf->Cell(8.5, 0.5, $lihat['mapel'] , 1, 1, 'L');
}


?>