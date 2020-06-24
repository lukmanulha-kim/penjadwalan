<tr>
  <td colspan="30" style="text-align: center;">Jum'at</td>
</tr>
<tr>
  <td rowspan="2" style="text-align: center;">Pukul</td>
  <td rowspan="2" style="text-align: center;">Jam Ke-</td>
  <td colspan="21" style="text-align: center;">Kelas</td>
</tr>
<tr>
<?php
  $query = mysqli_query($kon, "SELECT * FROM tb_kelas order by kd_kelas asc");
  while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
  <td style="text-align: center;"><?php echo $tampil['nama_kelas'] ?></td>
<?php } ?>
</tr>

<tr>
  <?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=1");
  $tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)
?>
  <td style="text-align: center;"><?php echo $tampil['pukul']; ?></td>
  <td style="text-align: center;"><?php echo $tampil['jam_ke']; ?></td>
<?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=1 and tb_jadwal.kd_hari=5");
  while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
  <td style="text-align: center;"><?php echo $tampil['kode_mapel']."".$tampil['kd_guru']; ?></td>
<?php } ?>
</tr>
<tr>
  <?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=2");
  $tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)
?>
  <td style="text-align: center;"><?php echo $tampil['pukul']; ?></td>
  <td style="text-align: center;"><?php echo $tampil['jam_ke']; ?></td>
<?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=2 and tb_jadwal.kd_hari=5");
  while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
  <td style="text-align: center;"><?php echo $tampil['kode_mapel']."".$tampil['kd_guru']; ?></td>
<?php } ?>
</tr>
<tr>
  <?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=3");
  $tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)
?>
  <td style="text-align: center;"><?php echo $tampil['pukul']; ?></td>
  <td style="text-align: center;"><?php echo $tampil['jam_ke']; ?></td>
<?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=3 and tb_jadwal.kd_hari=5");
  while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
  <td style="text-align: center;"><?php echo $tampil['kode_mapel']."".$tampil['kd_guru']; ?></td>
<?php } ?>
</tr>
<tr>
  <?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=4");
  $tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)
?>
  <td style="text-align: center;"><?php echo $tampil['pukul']; ?></td>
  <td style="text-align: center;"><?php echo $tampil['jam_ke']; ?></td>
<?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=4 and tb_jadwal.kd_hari=5");
  while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
  <td style="text-align: center;"><?php echo $tampil['kode_mapel']."".$tampil['kd_guru']; ?></td>
<?php } ?>
</tr>
<tr>
  <?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=5");
  $tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)
?>
  <td style="text-align: center;"><?php echo $tampil['pukul']; ?></td>
  <td style="text-align: center;"><?php echo $tampil['jam_ke']; ?></td>
<?php 
  $query = mysqli_query($kon, "SELECT * FROM
                                tb_penugasan
                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                WHERE tb_jadwal.kd_jam=5 and tb_jadwal.kd_hari=5");
  while ($tampil=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
?>
  <td style="text-align: center;"><?php echo $tampil['kode_mapel']."".$tampil['kd_guru']; ?></td>
<?php } ?>
</tr>