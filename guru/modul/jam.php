<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Jam</h1>
            </div>
                    <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kelola Data Jam
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#lihat" data-toggle="tab">Data Jam</a>
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
                                                    <th>Jam Ke-</th>
                                                    <th>Pukul</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              // $connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_jam");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {@$no++;
                                            ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td><?php echo $row['jam_ke']?></td>
                                                    <td><?php echo $row['pukul']?></td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tambah">
                                    <br>
                                    <form action="" method="post" name="addjam">
                                        <label>Jam Ke-</label>
                                        <div class="form-group">
                                            <input type="text" name="jam" class="form-control" required>
                                        </div>
                                        <label>Pukul</label>
                                        <div class="form-group">
                                            <input type="text" name="pukul" class="form-control" required> <br>
                                            <div class="well">
                                                <h4>Contoh Penulisan Pukul Pelajaran | 06.30-07.10</h4>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                            <input type="reset" name="" class="btn btn-danger" value="Reset">
                                        </div>
                                    </form>
                                    <?php
                                        @$jam = addslashes($_POST['jam']);
                                        @$pukul = addslashes($_POST['pukul']);

                                        @$simpan = $_POST['simpan'];

                                        if ($simpan) {
                                            $connect = new mysqli("localhost","root","","d_base_espara");
                                            $query = mysqli_query($connect, "INSERT INTO tb_jam VALUES('',
                                                '".$jam."',
                                                '".$pukul."')") or die (mysql_error());
                                    ?>
                                    <script type="text/javascript">
                                      alert("Data Berhasil Ditambah")
                                      window.location.href="?modul=jam";
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
                    <h4 class="modal-title">Detail Jam</h4>
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
                url : 'detjam.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>