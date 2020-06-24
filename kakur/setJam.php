<?php
include "../config/koneksi.php";
if($_POST['idx']) {
    $id = $_POST['idx'];
    $connect = new mysqli("localhost","root","","d_base_espara");      
    $sql = mysqli_query($connect, "SELECT
tb_hari.hari,
tb_penugasan.kd_guru,
tb_penugasan.kd_kelas,
tb_penugasan.kd_mapel,
tmp_jadwal.kd_penugasan,
tmp_jadwal.kd_hari,
tmp_jadwal.kd_jad
FROM
tmp_jadwal
Inner Join tb_hari ON tb_hari.kd_hari = tmp_jadwal.kd_hari
Inner Join tb_penugasan ON tb_penugasan.kd_penugasan = tmp_jadwal.kd_penugasan
WHERE
tmp_jadwal.kd_jad =  '$id'");

    while($result = mysqli_fetch_array($sql)){
?>
<?php  
    $query = mysqli_query($connect, "SELECT count(*) AS jumlah FROM tb_jadwal where kd_penugasan = $result[kd_penugasan]");
    $row=mysqli_fetch_array($query);
    $query1 = mysqli_query($connect, "SELECT jml_jam from tb_penugasan where kd_penugasan = $result[kd_penugasan]");
    $row1 = mysqli_fetch_array($query1);
    $sisa = $row1['jml_jam']-$row['jumlah'];
    // echo $row1['jml_jam']." - ".$row['jumlah']." = ".$sisa;
    if ($sisa>=3) {
        echo "<div class='alert alert-success'>
    Sisa Alokasi Waktu Mata Pelajaran Dipilih Adalah <b>$sisa</b> Jam.
</div>";
    }elseif($sisa==2 || $sisa==1){
        echo "<div class='alert alert-warning'>
    Sisa Alokasi Waktu Mata Pelajaran Dipilih Adalah <b>$sisa</b> Jam.
</div>";
    }else{
        echo "<div class='alert alert-danger'>
    Maaf <b>Mata Pelajaran</b> Yang Dipilih <b>Sudah Tidak</b> Memiliki <b>Sisa</b> Alokasi Waktu.
</div>";
    }
?>
<form action="saveJadwal.php" method="post" name="">
    <div class="form-group hidden">
        <label>KD JAD</label>
        <input type="text" class="form-control" name="id_jadwal" value="<?php echo $result['kd_jad']; ?>">
    </div>
    <div class="form-group hidden">
        <input type="text" name="id_hari" id="id_hari" class="form-control" value="<?php echo $result['kd_hari'] ?>">
    </div>
    <div class="form-group hidden">
        <label>KD PENUGASAN</label>
        <input type="text" class="form-control" name="id_tugas" value="<?php echo $result['kd_penugasan']; ?>">
    </div>
    <div class="form-group hidden">
        <label>KD MAPEL</label>
        <input type="text" class="form-control" name="id_mapel" value="<?php echo $result['kd_mapel']; ?>">
    </div>
    <div class="form-group hidden">
        <label>KD GURU</label>
        <input type="text" class="form-control" name="id_guru" value="<?php echo $result['kd_guru']; ?>">
    </div>
    <div class="form-group hidden">
        <label>KD KELAS</label>
        <input type="text" class="form-control" name="id_kelas" value="<?php echo $result['kd_kelas']; ?>">
    </div>
    <div class="form-group">
      <label>Jam Ke-</label>
      <select name="jam1" class="form-control" required>
        <option value="">--Pilih Jam--</option>
        <?php
        $tampil1 = mysqli_query($connect, "SELECT * from tb_jam");
        while ($view1 = mysqli_fetch_array($tampil1)) {
        ?>
        <option value="<?php echo $view1['kd_jam'] ?>"><?php echo $view1['jam_ke']." | ".$view1['pukul']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Jam Ke-</label>
      <select name="jam2" class="form-control">
        <option value="">--Pilih Jam--</option>
        <?php
        $tampil1 = mysqli_query($connect, "SELECT * from tb_jam");
        while ($view1 = mysqli_fetch_array($tampil1)) {
        ?>
        <option value="<?php echo $view1['kd_jam'] ?>"><?php echo $view1['jam_ke']." | ".$view1['pukul']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Jam Ke-</label>
      <select name="jam3" class="form-control">
        <option value="">--Pilih Jam--</option>
        <?php
        $tampil1 = mysqli_query($connect, "SELECT * from tb_jam");
        while ($view1 = mysqli_fetch_array($tampil1)) {
        ?>
        <option value="<?php echo $view1['kd_jam'] ?>"><?php echo $view1['jam_ke']." | ".$view1['pukul']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
        <?php $tahun = date("Y"); $tahunn = $tahun+1; ?>
        <label>Tahun Pelajaran</label>
        <input type="text" name="tapel" class="form-control" value="<?php echo $tahun."/".$tahunn; ?>">
    </div>
    <div class="form-group">
        <label>Semester</label>
        <select name="smt" class="form-control" required>
            <option value="">--Pilih Semester--</option>
            <option value="GANJIL">Ganjil</option>
            <option value="GENAP">Genap</option>
        </select>
    </div>
    <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
</form>    
<?php } }  ?>