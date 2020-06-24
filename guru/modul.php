<?php 
$modul = @$_GET['modul'];  
if (!empty($modul)){
	include "modul/".$modul.".php";
} else { ?>
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Aplikasi Penjadwalan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="alert alert-success">
                    Selamat Datang <a href="#" class="alert-link"><?php echo $_SESSION['username']; ?></a>.
                </div>
                <hr>
<!--                 <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                          $connect = new mysqli("localhost","root","","d_base_espara");
                                          $query = mysqli_query($connect, "SELECT count(*) AS jumlah FROM tb_guru where status_guru = 1");
                                          $row=mysqli_fetch_array($query);
                                          echo $row['jumlah'];
                                        ?>
                                    </div>
                                    <div>Data Guru Aktif</div>
                                </div>
                            </div>
                        </div>
                        <a href="?modul=guru">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                          $connect = new mysqli("localhost","root","","d_base_espara");
                                          $query = mysqli_query($connect, "SELECT count(*) AS jumlah FROM tb_mapel");
                                          $row=mysqli_fetch_array($query);
                                          echo $row['jumlah'];
                                        ?>
                                    </div>
                                    <div>Data Mata Pelajaran</div>
                                </div>
                            </div>
                        </div>
                        <a href="?modul=mapel">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                          $connect = new mysqli("localhost","root","","d_base_espara");
                                          $query = mysqli_query($connect, "SELECT count(*) AS jumlah FROM tb_kelas where status_kelas = 1");
                                          $row=mysqli_fetch_array($query);
                                          echo $row['jumlah'];
                                        ?>
                                    </div>
                                    <div>Data Kelas</div>
                                </div>
                            </div>
                        </div>
                        <a href="?modul=kelas">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-clock-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php
                                          $connect = new mysqli("localhost","root","","d_base_espara");
                                          $query = mysqli_query($connect, "SELECT count(*) AS jumlah FROM tb_jam");
                                          $row=mysqli_fetch_array($query);
                                          echo $row['jumlah'];
                                        ?>
                                    </div>
                                    <div>Data Jam Pelajaran</div>
                                </div>
                            </div>
                        </div>
                        <a href="?modul=jam">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> -->
            </div>
            
		</div>
<?php } ?>