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
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                              // $connect = new mysqli("localhost","root","","d_base_espara");
                                              $query = mysqli_query($connect, "SELECT * FROM tb_mapel");
                                              while ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                              {@$no++;
                                            ?>
                                                <tr>
                                                    <td style="text-align: center; width: 55px;"><?php echo $no; ?></td>
                                                    <td><?php echo $row['kode_mapel']; ?></td>
                                                    <td><?php echo $row['mapel']; ?></td>
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