<?php  
$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20.6, 0.4, 'KODE GURU', 1, 1, 'C');
$pdf->Cell(1, 0.4, 'NO', 1, 0, 'C');
$pdf->Cell(5, 0.4, 'NAMA GURU', 1, 1, 'C');
$pdf->SetFont('Arial','',8);
$query=mysqli_query($connect,"SELECT * FROM tb_guru order by kd_guru ASC");
while($lihat=mysqli_fetch_array($query)){
$pdf->Cell(1, 0.35, $lihat['kd_guru'] , 1, 0, 'C');
$pdf->Cell(5, 0.35, $lihat['nama_guru'] , 1, 1, 'L');
}
?>