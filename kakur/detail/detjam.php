<?php
    // include "../config/koneksi.php";
    if($_POST['idx']) {
        $id = $_POST['idx'];
        $connect = new mysqli("localhost","root","","d_base_espara");      
        $sql = mysqli_query($connect, "SELECT * FROM tb_jam WHERE kd_jam = $id");
        $result = mysqli_fetch_array($sql)
		?>
        <form action="detail/edjam.php" method="post" name="edkelas">
            <input name="idx" type="hidden" value="<?php echo $result['kd_jam']; ?>">
            <div class="form-group">
                <label>Jam Ke-</label>
                <input type="text" class="form-control" name="jam" value="<?php echo $result['jam_ke']; ?>">
            </div>
            <div class="form-group">
                <label>Pukul</label>
                <input type="text" class="form-control" name="pukul" value="<?php echo $result['pukul']; ?>">
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
        <?php } 
?>