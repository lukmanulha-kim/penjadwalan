<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Guru</h1>
            </div>
                    <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kelola Data Guru
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#lihat" data-toggle="tab">Data Guru</a>
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
				                                    <th>NIP</th>
				                                    <th>Nama</th>
				                                    <th>Gol/Ruang</th>
				                                    <th>Pangkat</th>
                                                    <th>Status</th>
				                                    <th>Aksi</th>
				                                </tr>
                            				</thead>
				                            <tbody>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_guru");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {@$no++;
                                            ?>
				                                <tr>
				                                    <td style="text-align: center; width: 35px;"><?php echo $no;?></td>
				                                    <td><?php echo $row['nip'];?></td>
				                                    <td><?php echo $row['nama_guru'];?></td>
				                                    <td><?php echo $row['golruang'];?></td>
				                                    <td><?php echo $row['pangkat'];?></td>
                                                    <td>
                                                        <?php 
                                                        if ($row['status_guru']== 1) {
                                                            echo "Aktif";
                                                        }else{echo "Tidak Aktif";}?>
                                                    </td>
				                                    <td><a href='#edit_modal' class='btn btn-warning btn-xs' data-toggle='modal' data-id="<?php echo $row['kd_guru'] ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
				                                </tr>
                                            <?php } ?>
				                            </tbody>
                        				</table>
            						</div>
                                </div>
                                <div class="tab-pane fade" id="tambah">
                                	<br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <form action="" method="post" name="addguru">
                                        	<label>Nama Lengkap</label>
                                        	<div class="form-group">
                                        		<input type="text" name="namaguru" class="form-control" required>
                                        	</div>
                                        	<label>NIP</label>
                                        	<div class="form-group">
                                        		<input type="text" name="nip" class="form-control" required>
                                        	</div>
                                        	<label>Gol/Ruang</label>
                                        	<div class="form-group">
                                        		<input type="text" name="gol" class="form-control" required>
                                        	</div>
                                        	<label>Pangkat</label>
                                        	<div class="form-group">
                                        		<input type="text" name="pangkat" class="form-control" required>
                                        	</div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Jabatan</label>
                                            <div class="form-group">
                                                <input type="text" name="jabatan" class="form-control" required>
                                            </div>
                                            <?php 
                                            $nm = "esp"; 
                                            $query = mysqli_query($connect, "SELECT count(*) AS jumlah FROM tb_guru");
                                            $row=mysqli_fetch_array($query);
                                            $user = $row['jumlah']+1;
                                            ?>
                                            <label>Nama Pengguna</label>
                                            <div class="form-group">
                                                <input type="text" name="user" class="form-control" value="<?php echo $nm.$user; ?>" required>
                                            </div>
                                             <label>Kata Sandi</label>
                                            <div class="form-group">
                                                <input type="password" name="pass" class="form-control" value="<?php echo $nm.$user; ?>" required>
                                            </div>
                                        	<div class="form-group pull-right">
                                        		<input type="submit" name="simpan" class="btn btn-primary" value="Simpan" onClick="validasi()">
                                        		<input type="reset" name="" class="btn btn-danger" value="Reset">
                                        	</div>
                                        </form>
                                        </div>
                                    </div>
                                    <?php
                                    	@$nama = addslashes($_POST['namaguru']);
                                        @$nip = addslashes($_POST['nip']);
                                        @$gol = addslashes($_POST['gol']);
                                        @$pangka = addslashes($_POST['pangkat']);
                                        @$jaba = addslashes($_POST['jabatan']);
                                        @$pengguna = addslashes($_POST['user']);
                                        @$sandi = md5($_POST['pass']);

                                        @$simpan = $_POST['simpan'];

                                        if ($simpan) {
                                            #$connect = new mysqli("localhost","root","","d_base_espara");
                                            $query=mysqli_query($connect, "INSERT into tb_guru values ('',
                                            '".$nama."',
                                            '".$nip."',
                                            '".$gol."',
                                            '".$jaba."',
                                            '".$pangka."',
                                            '".$pengguna."',
                                            '".$sandi."',
                                            1)") or die (mysql_error());
                                    ?>
                                    <script type="text/javascript">
                                      swal('Siip', 'Data Berhasil Ditambah !.','success')
                                      window.location.href="?modul=guru";
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
                    <h4 class="modal-title">Detail Guru</h4>
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
                url : 'detail/detgur.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
    