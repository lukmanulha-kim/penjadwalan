<?php
    // include "../config/koneksi.php";
    if($_POST['idx']) {
        $id = $_POST['idx'];
        $connect = new mysqli("localhost","root","","d_base_espara");      
        $sql = mysqli_query($connect, "SELECT * FROM tb_guru INNER JOIN tb_kelas ON tb_guru.kd_guru = tb_kelas.kd_guru WHERE kd_kelas=$id;");
        $result = mysqli_fetch_array($sql)
		?>
        <form action="detail/edkelas.php" method="post" name="edkelas">
            <input name="idx" type="hidden" value="<?php echo $result['kd_kelas']; ?>">
            <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $result['nama_kelas']; ?>">
            </div>
            <div class="form-group">
                <label>Wali Kelas</label>
                <select name="walikelas" class="form-control" required>
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
                <label>Status</label>
                <label class="radio-inline">
                <input type="radio" name="status" value="1" <?php $stat=$result['status_kelas']; if($stat==1){ echo "checked=\"checked\"";};?> />Aktif</label>
                <label class="radio-inline">
                <input type="radio" name="status" value="0" <?php $stat=$result['status_kelas']; if($stat==0){ echo "checked=\"checked\"";};?> />Tidak Aktif</label>
            </div>
              <button class="btn btn-primary" type="submit" name="update" onClick="validasi()">Update</button>
        </form>    
        <?php }
?>