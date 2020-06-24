<?php
    // include "../config/koneksi.php";
if($_POST['idx']) {
    $id = $_POST['idx'];
    $connect = new mysqli("localhost","root","","d_base_espara");      
    $sql = mysqli_query($connect, "SELECT * FROM tb_hari WHERE kd_hari = $id");
    $result = mysqli_fetch_assoc($sql)
	?>
    <form action="detail/edhari.php" method="post" name="edkelas">
        <input name="idx" type="hidden" value="<?php echo $result['kd_hari']; ?>">
        <div class="form-group">
            <label>Nama Hari</label>
            <input type="text" class="form-control" name="hari" value="<?php echo $result['hari']; ?>">
        </div>
        <div class="form-group">
            <label>Status</label>
            <label class="radio-inline">
            <input type="radio" name="status" value="1" <?php $stat=$result['status_hari']; if($stat==1){ echo "checked=\"checked\"";};?> />Aktif</label>
            <label class="radio-inline">
            <input type="radio" name="status" value="0" <?php $stat=$result['status_hari']; if($stat==0){ echo "checked=\"checked\"";};?> />Tidak Aktif</label>
        </div>
          <button class="btn btn-primary" type="submit" name="update" onClick="validasi()">Update</button>
    </form>
<?php } ?>