<?php
    // include "../config/koneksi.php";
    if($_POST['idx']) {
        $id = $_POST['idx'];
        $connect = new mysqli("localhost","root","","d_base_espara");      
        $sql = mysqli_query($connect, "SELECT * FROM tb_hari INNER JOIN tb_mapel ON tb_hari.kd_hari = tb_mapel.kd_hari WHERE kd_mapel=$id;");
        $result = mysqli_fetch_array($sql)
		?>
        <form action="detail/edmap.php" method="post" name="edkelas">
            <input name="idx" type="hidden" value="<?php echo $result['kd_mapel']; ?>">
            <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" class="form-control" name="kode" value="<?php echo $result['kode_mapel']; ?>">
            </div>
            <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" class="form-control" name="mapel" value="<?php echo $result['mapel']; ?>">
            </div>
            <div class="form-group">
            <label>Hari MGMP</label>
                <select name="mgmp" class="form-control" required>
                    <option value="<?php echo $result['kd_hari']; ?>"><?php echo $result['hari'];  ?></option>
                        <?php
                            $connect = new mysqli("localhost","root","","d_base_espara");
                            $query = mysqli_query($connect, "SELECT * FROM tb_hari");
                            while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                        ?>
                    <option value="<?php echo $row['kd_hari'] ?>"><?php echo $row['hari'] ?></option>
                        <?php } ?>
                </select>
            </div>
            <!--<div class="form-group">
                <label>Status</label>
                <label class="radio-inline">
                <input type="radio" name="status" value="1" <?php $stat=$result['status_kelas']; if($stat==1){ echo "checked=\"checked\"";};?> />Aktif</label>
                <label class="radio-inline">
                <input type="radio" name="status" value="0" <?php $stat=$result['status_kelas']; if($stat==0){ echo "checked=\"checked\"";};?> />Tidak Aktif</label>
            </div>-->
              <button class="btn btn-primary" type="submit" name="update" onClick="validasi()">Update</button>
        </form>    
        <?php #} 
    }
?>