<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profil</h1>
            </div>
                    <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Profil
                        </div>
                        <div class="panel-body">
                            		<table width="100%" class="table table-striped table-hover table-paginate">
                                		<thead>
    				                        <tr>
    				                        </tr>
                                		</thead>
    				                    <tbody>
                                        <?php
                                            $connect = new mysqli("localhost","root","","d_base_espara");
                                            $kd = mysqli_escape_string($connect, $_GET['id']);
                                            $query = mysqli_query($connect, "SELECT * FROM tb_guru WHERE kd_guru='".$kd."'");
                                            $row = mysqli_fetch_assoc($query); {
                                        ?>
    				                        <tr>
    				                            <td style="width: 180px;">Nama</td>
    				                            <td><?php echo $row['nama_guru'];?></td>
    				                        </tr>
                                            <tr>
                                                <td>NIP</td>
                                                <td><?php echo $row['nip'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Gol/Ruang</td>
                                                <td><?php echo $row['golruang'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan</td>
                                                <td><?php echo $row['jabatan'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Pangkat</td>
                                                <td><?php echo $row['pangkat'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><?php $stat=$row['status_guru']; if ($stat=1) {echo "Aktif";}else{echo "Tidak Aktif";}?></td>
                                            </tr>
                                            <?php } ?>
    				                    </tbody>
                            		</table>
                                    <div class="form-group">
                                        <a href='#edit_modal' class='btn btn-warning right' data-toggle='modal' data-id="<?php echo $row['kd_guru'] ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
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
                    <h4 class="modal-title">Profil</h4>
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
                url : 'detpro.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>