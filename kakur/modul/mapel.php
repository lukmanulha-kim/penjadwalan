<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Mata Pelajaran</h1>
            </div>
                    <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kelola Data Mata Pelajaran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#lihat" data-toggle="tab">Data Mata Pelajaran</a>
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
                                                    <th>No</th>
                                                    <th>Kode MaPel</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Hari MGMP</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_hari INNER JOIN tb_mapel ON tb_hari.kd_hari = tb_mapel.kd_hari order by kd_mapel;");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {@$no++;
                                            ?>
                                                <tr>
                                                    <td style="text-align: center; width: 55px;"><?php echo $no; ?></td>
                                                    <td><?php echo $row['kode_mapel']; ?></td>
                                                    <td><?php echo $row['mapel']; ?></td>
                                                    <td><?php echo $row['hari']; ?></td>
                                                    <td><a href='#edit_modal' class='btn btn-warning btn-xs' data-toggle='modal' data-id="<?php echo $row['kd_mapel'] ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tambah">
                                    <br>
                                    <form action="" method="post" name="addmapel">
                                        <label>Kode Mata Pelajaran</label>
                                        <div class="form-group">
                                            <input type="text" name="kdmapel" class="form-control" required> <br>
                                            <div class="well">
                                                <h4>Penulisan Kode Mata Pelajaran Harap Menggunakan Huruf Kapital !.</h4>
                                            </div>
                                        </div>
                                        <label>Mata Pelajaran</label>
                                        <div class="form-group">
                                            <input type="text" name="mapel" class="form-control" required>
                                        </div>
                                        <label>Hari MGMP</label>
                                        <div class="form-group">
                                            <select name="mgmp" class="form-control" required>
                                                <option value="">Pilih Hari MGMP</option>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_hari");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {
                                            ?>
                                                <option value="<?php echo $row['kd_hari'] ?>"><?php echo $row['hari'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                            <input type="reset" name="" class="btn btn-danger" value="Reset">
                                        </div>
                                    </form>
                                    <?php
                                        @$kode = addslashes($_POST['kdmapel']);
                                        @$mapel = addslashes($_POST['mapel']);
                                        @$mgmp = addslashes($_POST['mgmp']);

                                        @$simpan = $_POST['simpan'];

                                        if ($simpan) {
                                            #$connect = new mysqli("localhost","root","","d_base_espara");
                                            $query=mysqli_query($connect, "INSERT into tb_mapel values ('',
                                                '".$kode."',
                                                '".$mapel."',
                                                '".$mgmp."')") or die (mysql_error());
                                    ?>
                                    <script type="text/javascript">
                                      swal('Siip', 'Data Berhasil Ditambah !.','success')
                                      window.location.href="?modul=mapel";
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
                    <h4 class="modal-title">Detail Mata Pelajaran</h4>
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
                url : 'detail/detmap.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>