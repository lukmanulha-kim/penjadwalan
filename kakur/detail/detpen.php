<?php
    // include "../config/koneksi.php";
    if($_POST['idx']) {
        $id = $_POST['idx'];
        $connect = new mysqli("localhost","root","","d_base_espara");      
        $sql = mysqli_query($connect, "SELECT * FROM tb_kelas INNER JOIN (tb_mapel INNER JOIN (tb_guru INNER JOIN tb_penugasan ON tb_guru.kd_guru = tb_penugasan.kd_guru) ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel) ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas WHERE kd_penugasan=$id;");
        $result = mysqli_fetch_array($sql)
		?>
        <form action="detail/edpen.php" method="post" name="edkelas">
            <input name="idx" type="hidden" value="<?php echo $result['kd_penugasan']; ?>">
            <div class="form-group">
                <label>Guru</label>
                <select name="guru" class="form-control" required>
                    <option value="<?php echo $result['kd_guru'] ?>"><?php echo $result['nama_guru'] ?></option>
                    <?php
                     $connect = new mysqli("localhost","root","","d_base_espara");
                     $query = mysqli_query($connect, "SELECT * FROM tb_guru WHERE status_guru=1");
                     while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                    ?>
                    
                    <option value="<?php echo $row['kd_guru'] ?>"><?php echo $row['nama_guru'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Mata Pelajaran</label>
                <select name="mapel" class="form-control" required>
                    <option value="<?php echo $result['kd_mapel'] ?>"><?php echo $result['mapel'] ?></option>
                    <?php
                     $connect = new mysqli("localhost","root","","d_base_espara");
                     $query = mysqli_query($connect, "SELECT * FROM tb_mapel");
                     while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                    ?>
                    
                    <option value="<?php echo $row['kd_mapel'] ?>"><?php echo $row['mapel'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class="form-control" required>
                    <option value="<?php echo $result['kd_kelas'] ?>"><?php echo $result['nama_kelas'] ?></option>
                    <?php
                     $connect = new mysqli("localhost","root","","d_base_espara");
                     $query = mysqli_query($connect, "SELECT * FROM tb_kelas WHERE status_kelas=1");
                     while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                    ?>
                    
                    <option value="<?php echo $row['kd_kelas'] ?>"><?php echo $row['nama_kelas'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah Jam</label>
                <input type="text" class="form-control" name="jam" value="<?php echo $result['jml_jam']; ?>">
            </div>
            <div class="form-group">
                <label>Status</label>
                <label class="radio-inline">
                <input type="radio" name="status" value="1" <?php $stat=$result['status_penugasan']; if($stat==1){ echo "checked=\"checked\"";};?> />Aktif</label>
                <label class="radio-inline">
                <input type="radio" name="status" value="0" <?php $stat=$result['status_penugasan']; if($stat==0){ echo "checked=\"checked\"";};?> />Tidak Aktif</label>
            </div>
              <button class="btn btn-primary" type="submit" name="update" onClick="validasi()">Update</button>
        </form>    
        <?php #} 
    }
?>