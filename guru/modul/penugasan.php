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
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              // $connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT tb_guru.nama_guru, tb_kelas.nama_kelas, tb_mapel.mapel, tb_penugasan.jml_jam
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
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
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