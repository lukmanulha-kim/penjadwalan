<?php
    // include "../config/koneksi.php";
    if($_POST['idx']) {
        $id = $_POST['idx'];
        $connect = new mysqli("localhost","root","","d_base_espara");      
        $sql = mysqli_query($connect, "SELECT * FROM tb_guru WHERE kd_guru = $id");
        $result = mysqli_fetch_array($sql)
		?>
        <form action="detail/edpro.php" method="post" name="edguru">
            <input name="idx" type="hidden" value="<?php echo $result['kd_guru']; ?>">
            <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $result['nama_guru']; ?>">
            </div>
            <div class="form-group">
                <label>NIP</label>
                <input type="number" class="form-control" name="nip" value="<?php echo $result['nip']; ?>">
            </div>
            <div class="form-group">
                <label>Gol/Ruang</label>
                <input type="text" class="form-control" name="gol" value="<?php echo $result['golruang']; ?>">
            </div>
            <div class="form-group">
                <label>Pangkat</label>
                <input type="text" class="form-control" name="pangka" value="<?php echo $result['pangkat']; ?>">
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" class="form-control" name="jaba" value="<?php echo $result['jabatan']; ?>">
            </div>
            <div class="form-group">
                <label>Status</label>
                <label class="radio-inline">
                <input type="radio" name="status" value="1" <?php $stat=$result['status_guru']; if($stat==1){ echo "checked=\"checked\"";};?> />Aktif</label>
                <label class="radio-inline">
                <input type="radio" name="status" value="0" <?php $stat=$result['status_guru']; if($stat==0){ echo "checked=\"checked\"";};?> />Tidak Aktif</label>
            </div>
              <button class="btn btn-primary" type="submit" name="update" onClick="validasi()">Update</button>
        </form>    
        <?php } 
?>