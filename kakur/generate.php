<?php
$dbhost = 'localhost'; 
$dbuser = 'root';
$dbpass = '';
$dbname = 'd_base_espara';
mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('$dbname');
function cek2($kelas,$hari,$kode,$jampel){ 
$jampel1=$jampel+1; 
$kecepitdpn=$jampel-2; 
$kecepitblkg=$jampel1+2; 
$kecepitdpn1=$jampel-1; 
$kecepitblkg1=$jampel1+1; 
$substr=substr($kelas,0,1); 
$select=mysqli_fetch_array(mysql_query("SELECT hari from t_hari where id='$hari'"));
$cekjmljam=mysql_fetch_array(mysql_query("SELECT jml_jam from waktu where kelas='$substr' AND hari='$select[hari]'"));  
$sisa1jam=$cekjmljam['jml_jam']-$jampel1; 
$ngecekkode=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kelas='$kelas' AND hari='$hari' AND kode_jdw='$kode'")); 
$ngecekjam1=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kode_jdw='$kode' AND hari='$hari' AND jam>='$jampel' AND jam<='$jampel1'")); 
$ngecekjam=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kelas='$kelas' AND hari='$hari' AND jam>='$jampel' AND jam<='$jampel1'")); 
$cekdpn=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kelas='$kelas' AND hari='$hari' AND jam='$kecepitdpn'")); 
$cekblkg=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kelas='$kelas' AND hari='$hari' AND jam='$kecepitblkg'")); 
$cekdpn1=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kelas='$kelas' AND hari='$hari' AND jam='$kecepitdpn1'")); 
$cekblkg1=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kelas='$kelas' AND hari='$hari' AND jam='$kecepitblkg1'")); 
$kecepitdpn3=$jampel-3; 
$cekdpn3=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kelas='$kelas' AND hari='$hari' AND jam='$kecepitdpn3'")); 
if($jampel1>$cekjmljam['jml_jam'] || $sisa1jam==1){ 
$true="0";  
} 
elseif($ngecekkode==0 && $ngecekjam==0 && $ngecekjam1==0){ 
$true="1";  
if($cekdpn>0 && $cekdpn1==0){ 
$true="0"; 
} 
if($cekblkg>0 && $cekblkg1==0){ 
$true="0"; 
} 
if($jampel==""){ 
$true="0"; 
} 
if($cekdpn==0 && $cekdpn1==0 && $jampel==4){ 
$true="0"; 
} 
if($kecepitdpn1==1 && $cekdpn1==0){ 
$true="0"; 
} 
} 
else{ 
$true="0";  
} 
return $true;  
} 
function query2($kelas,$hari,$jampel,$kode,$guru,$mapel,$id,$durasi){ 
for($j=1;$j<=2;$j++){ 
mysql_query("INSERT INTO jadwal (id_jadwal,kelas,hari,jam,kode_jdw,mapel,ket,kbm) values('','$kelas','$hari','$jampel','$kode','$mapel','$id','kbm')")or die("Duhh ana error (0): " .mysql_error());; 
mysql_query("UPDATE t_taboo SET kode='$kode',ket='kbm',id_tugas='$id',durasi='$durasi',mapel='$mapel' where kelas='$kelas' AND hari='$hari' AND jam='$jampel'"); 
mysql_query("UPDATE t_tugas SET ket='1' where ID='$id'"); 
$jampel++; 
}  
} 
function cekmutasi2($kelas,$hari,$kode,$jampel,$mapel){ 
$jampel1=$jampel+1; 
$substr=substr($kelas,0,1); 
$select=mysql_fetch_array(mysql_query("SELECT hari from t_hari where id='$hari'")); 
$cekjmljam=mysql_fetch_array(mysql_query("SELECT jml_jam from waktu where kelas='$substr' AND hari='$select[hari]'"));  
$sisa1jam=$cekjmljam['jml_jam']-$jampel1; 
$ngecekkode=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kelas='$kelas' AND hari='$hari' AND kode_jdw='$kode'")); 
$ngecekjam1=mysql_num_rows(mysql_query("SELECT kode_jdw from jadwal where kode_jdw='$kode' AND hari='$hari' AND jam>='$jampel' AND jam<='$jampel1'")); 
if($jampel1>$cekjmljam['jml_jam'] || $sisa1jam==1){ 
$true="0";  
} 
elseif($ngecekkode==0 && $ngecekjam1==0){ 
$true="1";  
if($mapel=="Penjaskes"){ 
$true="0";  
} 
} 
else{ 
$true="0";  
} 
return $true;  
} 
function mutasi2($kelas,$hari_a,$hari_b,$jam_a,$jam_b,$kode_a,$kode_b,$nama_a,$nama_b,$mapel_a,$mapel_b,$id_a,$id_b,$durasi){ 
for($j=1;$j<=2;$j++){ 
mysql_query("UPDATE jadwal SET mapel='$mapel_a',kode_jdw='$kode_a',ket='$id_a',kbm='kbm' where kelas='$kelas' AND hari='$hari_b' AND jam='$jam_b' AND kode_jdw='$kode_b'"); 
mysql_query("INSERT INTO jadwal (id_jadwal,kelas,hari,jam,kode_jdw,mapel,ket,kbm) values('','$kelas','$hari_a','$jam_a','$kode_b','$mapel_b','$id_b','kb m')"); 
mysql_query("UPDATE t_taboo SET kode='$kode_a',id_tugas='$id_a',durasi='$durasi',mapel='$mapel_a' where kelas='$kelas' AND hari='$hari_b' AND jam='$jam_b' AND id_tugas='$id_b'"); 
mysql_query("UPDATE t_taboo SET kode='$kode_b',id_tugas='$id_b',ket='kbm',durasi='$durasi',mapel='$map el_b' where kelas='$kelas' AND hari='$hari_a' AND jam='$jam_a'"); 
$jam_a++; 
$jam_b++; 
}  
mysql_query("UPDATE t_tugas SET ket='1' where ID='$id_a'"); 
mysql_query("UPDATE t_tugas SET ket='1' where ID='$id_b'"); 
}
function generate($kelas){
$data=mysql_query("SELECT hari,kelas,jam, COUNT(hari) jumlah FROM t_taboo where kode='' GROUP BY hari order by jumlah,hari desc"); 
while($data1=mysql_fetch_array($data)){ 
$data2=mysql_query("SELECT * from t_taboo where kelas='$kelas' AND hari='$data1[hari]' AND kode='' order by jam asc");  
while($data3=mysql_fetch_array($data2)){ 
$tugas=mysql_query("SELECT * from t_tugas where kelas='$data3[kelas]' AND hari like '%$data3[hari]%' AND jam like '%$data3[jam]%' AND ket='0' order by jam,rand() asc");  
while($tugas1=mysql_fetch_array($tugas)){ 
if($tugas1['durasi']==2){ 
$cekk2=cek2($tugas1['kelas'],$data3['hari'],$tugas1['kode'],$data3['ja m']); 
if($cekk2==1){ 
query2($tugas1['kelas'],$data3['hari'],$data3['jam'],$tugas1['kode'],$tugas1['nama'],$tugas1['mapel'],$tugas1['ID'],$tugas1['durasi']); 
break; 
}  
elseif($cekk2==0){ 
$ceklain=mysql_query("SELECT kelas,hari,kode,ket,id_tugas,durasi, MIN(jam) as jam FROM t_taboo where kelas='$tugas1[kelas]' AND durasi='2' AND mapel not in('Penjaskes') GROUP BY id_tugas"); 
$cekada=mysql_num_rows($ceklain); 
$n=0; 
if($cekada>0){ 
while($araylain=mysql_fetch_array($ceklain)){ 
$cekmutasi=cekmutasi2($tugas1['kelas'],$araylain['hari'],$tugas1['kode '],$araylain['jam'],$tugas1['mapel']);  
if($cekmutasi==1){ 
$dicek=cek2($tugas1['kelas'],$data3['hari'],$araylain['kode'],$data3[' jam']); 
if($dicek==1){ 
$mutasi=mysql_fetch_array(mysql_query("SELECT * from t_tugas where ID='$araylain[id_tugas]'")); 
mutasi2($tugas1['kelas'],$data3['hari'],$araylain['hari'],$data3['jam' ],$araylain['jam'],$tugas1['kode'],$araylain['kode'],$tugas1['nama'],$mutasi['nama'],$tugas1['mapel'],$mutasi['mapel'],$tugas1['ID'],$mutasi ['ID'],$tugas1['durasi']); 
} 
} 
} 
} 
elseif($cekada==0){ 
$yglain=mysql_query("SELECT * from t_tugas where hari like '%$data3[hari]%' AND jam like '%$data3[jam]%' AND durasi='2' AND kelas='$tugas1[kelas]' AND ID not in($tugas1[ID]) AND ket='0'"); 
$cekjml=mysql_num_rows($yglain); 
if($cekjml>0){ 
while($yglain1=mysql_fetch_array($yglain)){ 
$cekyglain=cek2($tugas1['kelas'],$data3['hari'],$yglain1['kode'],$data3['jam']); 
if($cekyglain==1){ 
query2($tugas1['kelas'],$data3['hari'],$data3['jam'],$yglain1['kode'], $yglain1['nama'],$yglain1['mapel'],$yglain1['ID'],$yglain1['durasi']); 
break; }}}}}}}}}}
?>