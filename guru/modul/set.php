<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profil</h1>
            </div>
        </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Profil
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <table width="100%" class="table table-striped table-hover table-paginate">
                                <thead>
                                <tr>
                                </tr>
                                </thead>
                            <tbody>
                                    <?php
                                        // $connect = new mysqli("localhost","root","","d_base_espara");
                                        $kd = mysqli_escape_string($connect, $_GET['id']);
                                        $query = mysqli_query($connect, "SELECT * FROM tb_guru WHERE kd_guru='".$kd."'");
                                        $row = mysqli_fetch_assoc($query); {
                                    ?>
                                <tr>
                                    <td style="width: 180px;">Nama Pengguna</td>
                                    <td><input type="text" name="hari" class="form-control" value="<?php echo $row['uname'];?>"></td>
                                </tr>
                                <tr>
                                    <td>Pass</td>
                                    <td><input type="text" name="hari" class="form-control" value="<?php echo $row['uname'];?>"></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                        </form>
                                <!-- <div class="form-group">
                                    <a href='#edit_modal' class='btn btn-warning right' data-toggle='modal' data-id="<?php echo $row['kd_guru'] ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                </div> -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                    <!-- /.panel -->
            </div>
        </div>
    </div>
</div>