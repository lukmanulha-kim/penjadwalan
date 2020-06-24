<script type="text/javascript">
    function validasi(){
            var jumjam=document.forms["addpenugasan"]["jumjam"].value;
            var number=/^[0-9]+$/;

            if (jumjam==0){
              alert("Tidak boleh diisi 0 !");
              return false;
            };
              
            if (!jumjam.match(number)){
              alert("Jumlah Jam Mengajar Harus Angka !");
              return false;
            };
         }
</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Penugasan Guru</h1>
            </div>
                    <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kelola Data Penugasan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#lihat" data-toggle="tab">Data Penugasan</a>
                                </li>
                                <li><a href="#tambah" data-toggle="tab">Tambah Data</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="lihat">
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover table-paginate" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; width: 35px;">No</th>
                                                    <th>Nama Guru</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Kelas</th>
                                                    <th>Jumlah Jam</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT tb_guru.nama_guru, tb_kelas.nama_kelas, tb_mapel.mapel, tb_penugasan.jml_jam, tb_penugasan.kd_penugasan
                                                  FROM tb_kelas INNER JOIN (tb_mapel INNER JOIN (tb_guru INNER JOIN tb_penugasan ON tb_guru.kd_guru = tb_penugasan.kd_guru) ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel) ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas;");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {@$no++;
                                            ?>
                                                <tr>
                                                    <td style="text-align: center; width: 35px;"><?php echo $no; ?></td>
                                                    <td><?php echo $row['nama_guru']; ?></td>
                                                    <td><?php echo $row['mapel']; ?></td>
                                                    <td><?php echo $row['nama_kelas']; ?></td>
                                                    <td><?php echo $row['jml_jam']; ?></td>
                                                    <td><a href='#edit_modal' class='btn btn-warning btn-xs' data-toggle='modal' data-id="<?php echo $row['kd_penugasan']; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- ====================Tambah=================== -->

                                <div class="tab-pane fade" id="tambah">
                                    <br>
                                    <form action="" method="post" name="addpenugasan">
                                        <label>Nama Guru</label>
                                        <div class="form-group">
                                            <select name="guru" class="form-control" required>
                                                <option value="">Pilih Guru</option>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_guru WHERE status_guru=1");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {
                                            ?>
                                                <option value="<?php echo $row['kd_guru'] ?>"><?php echo $row['nama_guru'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <label>Mata Pelajaran</label>
                                        <div class="form-group">
                                            <select name="mapel" class="form-control" required>
                                                <option value="">Pilih Mata Pelajaran</option>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_mapel");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {
                                            ?>
                                                <option value="<?php echo $row['kd_mapel'] ?>"><?php echo $row['mapel'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <label>Kelas</label>
                                        <div class="form-group">
                                            <select name="kelas" class="form-control" required>
                                                <option value="">Pilih Kelas</option>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_kelas");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {
                                            ?>
                                                <option value="<?php echo $row['kd_kelas'] ?>"><?php echo $row['nama_kelas'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <label>Jumlah Jam</label>
                                        <div class="form-group">
                                            <input type="number" name="jam" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan" onClick="validasi()">
                                            <input type="reset" name="" class="btn btn-danger" value="Reset">
                                        </div>
                                    </form>
                                    <?php
                                        @$guru = addslashes($_POST['guru']);
                                        @$kelas = addslashes($_POST['kelas']);
                                        @$mapel = addslashes($_POST['mapel']);
                                        @$jam = addslashes($_POST['jam']);

                                        @$simpan = $_POST['simpan'];

                                        if ($simpan) {

                                            $cek = mysqli_query($connect,"SELECT * FROM tb_penugasan WHERE kd_kelas='$_POST[kelas]' and kd_mapel='$_POST[mapel]' and jml_jam='$_POST[jam]' and kd_guru='$_POST[guru]'");

                                            if (mysqli_num_rows($cek)>0) {
                                               echo "<script type='text/javascript'>swal('MAAF', 'Data Sudah Ada !.','warning')</script>";
                                               }else{
                                            $query=mysqli_query($connect, "INSERT into tb_penugasan values ('',
                                            '".$guru."',
                                            '".$mapel."',
                                            '".$kelas."',
                                            '".$jam."',
                                            1)") or die (mysql_error());
                                            echo "<script type='text/javascript'>
                                                  swal('Siip', 'Data Berhasil Ditambah !.','success')
                                                  window.location.href='?modul=penugasan';
                                                </script>";}
                                            }
                                    ?>
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
<div class="modal fade" id="edit_modal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Penugasan</h4>
                </div>
                <div class="modal-body">
                    <div class="hasil-data"></div>
                </div>
            </div>
        </div>
    </div>
  <script src="../vendor/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#edit_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail/detpen.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>