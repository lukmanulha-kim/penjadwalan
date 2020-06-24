<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Kelas</h1>
            </div>
                    <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kelola Data Kelas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#lihat" data-toggle="tab">Data Kelas</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="lihat">
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover table-paginate" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kelas</th>
                                                    <th>Wali Kelas</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              // $connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_guru INNER JOIN tb_kelas ON tb_guru.kd_guru = tb_kelas.kd_guru;");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {@$no++;
                                            ?>
                                                <tr>
                                                    <td style="text-align: center; width: 55px;"><?php echo $no; ?></td>
                                                    <td><?php echo $row['nama_kelas']; ?></td>
                                                    <td><?php echo $row['nama_guru']; ?></td>
                                                    <td>
                                                    <?php 
                                                        if ($row['status_kelas']== 1) {
                                                            echo "Aktif";
                                                        }else{echo "Tidak Aktif";}?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tambah">
                                    <br>
                                    <form action="" method="post" name="addkelas">
                                        <label>Kelas</label>
                                        <div class="form-group">
                                            <input type="text" name="namakelas" class="form-control" required>
                                        </div>
                                        <label>Wali Kelas</label>
                                        <div class="form-group">
                                            <select name="walikelas" class="form-control" required>
                                            	<option value="">Pilih Wali Kelas</option>
                                            <?php
                                              $connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_guru WHERE status_guru=1");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {
                                            ?>
                                                <option value="<?php echo $row['kd_guru'] ?>"><?php echo $row['nama_guru'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                            <input type="reset" name="" class="btn btn-danger" value="Reset">
                                        </div>
                                    </form>
                                    <?php
                                        @$kelas = addslashes($_POST['namakelas']);
                                        @$walikelas = addslashes($_POST['walikelas']);

                                        @$simpan = $_POST['simpan'];

                                        if ($simpan) {
                                            $connect = new mysqli("localhost","root","","d_base_espara");
                                            $query=mysqli_query($connect, "INSERT into tb_kelas values ('',
                                            '".$kelas."',
                                            '".$walikelas."',
                                            1)") or die (mysql_error());
                                    ?>
                                    <script type="text/javascript">
                                      alert("Data Berhasil Ditambah")
                                      window.location.href="?modul=kelas";
                                    </script>
                                    <?php } ?>
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
                    <h4 class="modal-title">Detail Kelas</h4>
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
                url : 'detkel.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>