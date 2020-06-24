<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Setting Profil</h1>
            </div>
                    <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Setting Profil
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php
                                    $connect = new mysqli("localhost","root","","d_base_espara");
                                    $kd = mysqli_escape_string($connect, $_GET['id']);
                                    $query = mysqli_query($connect, "SELECT * FROM tb_guru WHERE kd_guru='".$kd."'");
                                    $row = mysqli_fetch_assoc($query); {
                                ?>
                                    <form action="" method="post">
                                        <input type="text" name="kd" value="<?php echo $row['kd_guru'] ?>" hidden>
                                        <label>Nama Pengguna</label>
                                        <div class="form-group">
                                            <input type="text" name="user" value="<?php echo $row['uname'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group pull-right">
                                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                            <input type="reset" name="" class="btn btn-danger" value="Reset">
                                        </div>
                                    </form>
                                <?php } ?>
                                </div>
                                <div class="col-lg-6">
                                    <form action="" method="post">
                                        <input type="text" name="kd" value="" hidden>
                                        <label>Kata Sandi Lama</label>
                                        <div class="form-group">
                                            <input type="text" name="paslama" value="" class="form-control" placeholder="Sandi Lama" required="">
                                        </div>
                                        <label>Kata Sandi Baru</label>
                                        <div class="form-group">
                                            <input type="text" name="pasbar" value="" class="form-control" placeholder="Sandi Baru" required="">
                                        </div>
                                        <label>Ulangi Sandi Baru</label>
                                        <div class="form-group">
                                            <input type="text" name="pasbaru" value="" class="form-control" placeholder="Ulangi Sandi Baru" required="">
                                        </div>
                                        <div class="form-group pull-right">
                                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                            <input type="reset" name="" class="btn btn-danger" value="Reset">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
    </div>
  </div>
</div>