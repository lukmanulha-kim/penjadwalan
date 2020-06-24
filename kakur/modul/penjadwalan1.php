    <script src="../vendor/jquery.min.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Generate Jadwal</h1>
            </div>
                    <!-- /.col-lg-12 -->
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Jadwal
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#lihat" data-toggle="tab">Jadwal</a>
                                </li>
                                <li><a href="#tambah" data-toggle="tab">Generate Jadwal</a>
                                </li>
                                <li><a href="#cetak" data-toggle="tab">Cetak Jadwal</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">

                            <!-- =======================LIHAT======================== -->
                            
                                <div class="tab-pane fade in active" id="lihat">
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover table-paginate" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; width: 35px;">No</th>
                                                    <th>Hari</th>
                                                    <th>Jam Ke-</th>
                                                    <th>Pukul</th>
                                                    <th>Kelas</th>
                                                    <th>Kode Mapel</th>
                                                    <th>Kode Guru</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT
                                                tb_kelas.nama_kelas,
                                                tb_mapel.mapel,
                                                tb_guru.nama_guru,
                                                tb_guru.kd_guru,
                                                tb_penugasan.jml_jam,
                                                tb_jadwal.tahun_pelajaran,
                                                tb_jadwal.semester,
                                                tb_hari.hari,
                                                tb_jam.jam_ke,
                                                tb_jam.pukul
                                                FROM
                                                tb_penugasan
                                                Inner Join tb_mapel ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel
                                                Inner Join tb_kelas ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas
                                                Inner Join tb_guru ON tb_guru.kd_guru = tb_penugasan.kd_guru
                                                Inner Join tb_jadwal ON tb_penugasan.kd_penugasan = tb_jadwal.kd_penugasan
                                                Inner Join tb_hari ON tb_hari.kd_hari = tb_jadwal.kd_hari
                                                Inner Join tb_jam ON tb_jam.kd_jam = tb_jadwal.kd_jam
                                                ");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {@$no++;
                                            ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                                    <td><?php echo $row['hari']; ?></td>
                                                    <td><?php echo $row['jam_ke']; ?></td>
                                                    <td><?php echo $row['pukul']; ?></td>
                                                    <td><?php echo $row['nama_kelas']; ?></td>
                                                    <td><?php echo $row['mapel']; ?></td>
                                                    <td><?php echo $row['nama_guru']; ?></td>
                                                    <td style="text-align: center;"><a href='#' class='btn btn-danger btn-xs' data-toggle='modal' data-id="<?php echo $row['kd_jadwal']; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- =======================CETAK======================== -->

                                <div class="tab-pane fade" id="cetak">
                                    <br>
                                    <form action="lap_jad.php" method="post">
                                        <label>Tahun Pelajaran</label>
                                        <div class="form-group">
                                            <select class="form-control" name="tapel">
                                                <option value="">Pilih Tahun Pelajaran</option>
                                                <option value="2017/2018">2017/2018</option>
                                            </select>
                                        </div>
                                        <label>Pilih Semester</label>
                                        <div class="form-group">
                                            <select class="form-control" name="semester">
                                                <option value="">Pilih Semester</option>
                                                <option value="GANJIL">Ganjil</option>
                                                <option value="GENAP">Genap</option>
                                            </select>
                                        </div>
                                        <label>Silahkan Pilih Kelas Terlebih Dahulu</label>
                                        <div class="form-group">
                                            <select class="form-control" name="kelas">
                                                <option value="">Pilih Kelas</option>
                                                <option value="1">7A</option>
                                                <option value="2">7B</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="cetak" value="Cetak" class="btn btn-success pull-right">
                                        </div>
                                    </form>
                                </div>

                                <!-- =======================TAMBAH======================== -->

                                <div class="tab-pane fade" id="tambah">
                                    <br>
                                    <div class="row">
                                    <div class="col-lg-6">
                                    <form action="" method="post" name="addmapel">
                                        <label>Tahun Pelajaran</label>
                                                <?php 
                                                $thun = date("Y");
                                                $tp = $thun + 1;
                                                ?>
                                                <div class="form-group">
                                                <input type="text" name="tapel" class="form-control" value="<?php echo $thun."/".$tp; ?>" required>
                                                </div>
                                        <label>Semester</label>
                                        <div class="form-group">
                                            <select name="semester" class="form-control">
                                                <option value="">Pilih Semester</option>
                                                <option value="GANJIL">Ganjil</option>
                                                <option value="GENAP">Genap</option>
                                            </select>
                                        </div>
                                        <label>Hari</label>
                                        <div class="form-group">
                                            <select name="hari" class="form-control" required>
                                                <option value="">Pilih Hari</option>
                                            <?php
                                              #$connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_hari WHERE status_hari=1");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {
                                            ?>
                                                <option value="<?php echo $row['kd_hari'] ?>"><?php echo $row['hari'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <label>Jam Ke-</label>
                                        <div class="form-group">
                                            <select name="jam" class="form-control" required>
                                                <option value="">Pilih Jam Ke-</option>
                                            <?php
                                              $connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_jam");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {
                                            ?>
                                                <option value="<?php echo $row['kd_jam'] ?>"><?php echo $row['jam_ke'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Pilih Penugasan</label>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-info btn-block" href="#myModal" data-toggle="modal" data-target="#myModal">Pilih</button>
                                        </div>

                                        <div class="form-group hidden">
                                            <input type="text" name="kd_penugasan" id="kd_penugasan" class="form-control" placeholder="Kode Penugasan">
                                        </div>

                                        <div class="form-group hidden">
                                            <input type="text" name="kd_guru" id="kd_guru" class="form-control" placeholder="Kode Guru">
                                        </div>

                                        <div class="form-group hidden">
                                            <input type="text" name="kd_kelas" id="kd_kelas" class="form-control" placeholder="Kode Kelas">
                                        </div>

                                        <div class="form-group hidden">
                                            <input type="text" name="kd_mapel" id="kd_mapel" class="form-control" placeholder="Kode Mapel">
                                        </div>

                                        <label>Nama Guru</label>
                                        <div class="form-group">
                                            <input type="text" name="nama_guru" id="nama_guru" class="form-control" placeholder="Nama Guru" disabled>
                                        </div>
                                        <label>Mata Pelajaran</label>
                                        <div class="form-group">
                                            <input type="text" name="nama_mapel" id="mapel" class="form-control" placeholder="Mata Pelajaran" disabled>
                                        </div>
                                        <label>Kelas</label>
                                        <div class="form-group">
                                            <input type="text" name="nama_kelas" id="kelas" class="form-control" placeholder="Kelas" disabled>
                                        </div>
                                        <div class="form-group pull-right">
                                            <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                            <input type="reset" name="" class="btn btn-danger" value="Reset">
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                    <?php
                                        @$kd_guru = addslashes($_POST['kd_guru']);
                                        @$kd_mapel = addslashes($_POST['kd_mapel']);
                                        @$kd_kelas = addslashes($_POST['kd_kelas']);
                                        @$kd_penugasan = addslashes($_POST['kd_penugasan']);
                                        @$kd_jam = addslashes($_POST['jam']);
                                        @$kd_hari = addslashes($_POST['hari']);
                                        @$tahun_pelajaran = addslashes($_POST['tapel']);
                                        @$semester = addslashes($_POST['semester']);

                                        @$simpan = $_POST['simpan'];
                                        
                                        if ($simpan) {

                                            $cek = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE kd_jam='$_POST[jam]' and kd_hari='$_POST[hari]' and kd_guru='$_POST[kd_guru]'");

                                            $cek1 = mysqli_query($connect,"SELECT * FROM tb_jadwal WHERE kd_jam='$_POST[jam]' and kd_hari='$_POST[hari]' and kd_kelas='$_POST[kd_kelas]'");

                                            $quer = mysqli_query($connect, "SELECT * from tb_penugasan where kd_penugasan = '$_POST[kd_penugasan]' AND status_penugasan = 1");
                                            $view = mysqli_fetch_array($quer);
                                            $sql = "SELECT count(*) AS jumlahpen FROM tb_jadwal where kd_penugasan = '$_POST[kd_penugasan]'";
                                            $query = mysqli_query($connect, $sql);
                                            $result = mysqli_fetch_array($query);

                                            $cek2 = mysqli_query($connect, "SELECT * FROM tb_mapel where kd_mapel='$_POST[kd_mapel]'");
                                            $resul=mysqli_fetch_array($cek2);


                                            if (mysqli_num_rows($cek)>0) {
                                               echo "<script type='text/javascript'>swal('MAAF', 'Guru Tersebut Sudah Ada Jam Mengajar di Kelas Sebelah !.','warning')</script>";
                                            }elseif(mysqli_num_rows($cek1)>0){
                                                echo "<script type='text/javascript'>swal('MAAF', 'Sudah Ada Waktu Mengajar di Waktu dan Hari Tersebut !.','warning')</script>";
                                            }elseif($result['jumlahpen']>$view['jml_jam']){
                                                echo "<script type='text/javascript'>swal('MAAF', 'Guru Tersebut Sudah Melebihi atau Sudah Mencapai Batas yang Telah Ditentukan !.','warning')</script>";
                                            }elseif($resul['kd_hari']==$_POST['hari']&&$_POST['jam']>=4){
                                                echo "<script type='text/javascript'>swal('MAAF', 'Hari Tersebut Merupakan Hari MGMP Dari Mapel Yang Dipilih !.','warning')</script>";
                                            }
                                            else{
                                            #$connect = new mysqli("localhost","root","","d_base_espara");
                                        $query=mysqli_query($connect, "INSERT into tb_jadwal values ('',
                                            '".$kd_mapel."',
                                            '".$kd_kelas."',
                                            '".$kd_guru."',
                                            '".$kd_jam."',
                                            '".$kd_hari."',
                                            '".$kd_penugasan."',
                                            '".$tahun_pelajaran."',
                                            '".$semester."')") or die (mysql_error());
                                    echo "<script type='text/javascript'>
                                            swal('Siip', 'Data Berhasil Ditambah !.','success')
                                            window.location.href='?modul=penjadwalan';
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <center><h4 class="modal-title" id="myModalLabel">Pilih Data Penugasan</h4></center>
                    </div>
                    <div class="modal-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Jumlah Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                              $connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_kelas INNER JOIN (tb_mapel INNER JOIN (tb_guru INNER JOIN tb_penugasan ON tb_guru.kd_guru = tb_penugasan.kd_guru) ON tb_mapel.kd_mapel = tb_penugasan.kd_mapel) ON tb_kelas.kd_kelas = tb_penugasan.kd_kelas;");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {@$no++;
                                            ?>
                        <tr style='cursor:pointer' class='pilih' data-id_penugasan='<?php echo $row['kd_penugasan'];?>' data-nama_guru='<?php echo htmlentities($row['nama_guru'],ENT_QUOTES);?>' data-kelas='<?php echo $row['nama_kelas'];?>' data-mapel='<?php echo $row['mapel'];?>' data-kd_guru='<?php echo $row['kd_guru'];?>' data-kd_mapel='<?php echo $row['kd_mapel'];?>' data-kd_kelas='<?php echo $row['kd_kelas'];?>'>
                                                    <td style="text-align: center; width: 35px;"><?php echo $row['kd_penugasan']; ?></td>
                                                    <td><?php echo $row['nama_guru']; ?></td>
                                                    <td><?php echo $row['mapel']; ?></td>
                                                    <td><?php echo $row['nama_kelas']; ?></td>
                                                    <td><?php echo $row['jml_jam']; ?></td>
                                                </tr>
                                            <?php } ?>   
         

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
        
        
        <script type="text/javascript">

//            jika dipilih, nim akan masuk ke input dan modal di tutup
            $(document).on('click', '.pilih', function (e) {
                document.getElementById("kd_penugasan").value = $(this).attr('data-id_penugasan');
                document.getElementById("nama_guru").value = $(this).attr('data-nama_guru');
                document.getElementById("kelas").value = $(this).attr('data-kelas');
                document.getElementById("mapel").value = $(this).attr('data-mapel');
                document.getElementById("kd_kelas").value = $(this).attr('data-kd_kelas');
                document.getElementById("kd_mapel").value = $(this).attr('data-kd_mapel');
                document.getElementById("kd_guru").value = $(this).attr('data-kd_guru');
                $('#myModal').modal('hide');
            });
            

//            tabel lookup mahasiswa
            $(function () {
                $("#lookup").dataTable();
            });
        </script> 