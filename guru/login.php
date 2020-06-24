<?php
session_start();
if($_SESSION){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Apel ESPARA v1.0</title>
    <link href="../picture/espara.png" rel=icon>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style type="text/css">
    body{
        background-image: url("../picture/profil.jpg");
        background-size: 100%;
    }
    #login{
        padding-top: 100px;
    }
</style>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="login">
                    <div>
                        <center>
                            <img src="../picture/espara.png" style="width: 150px;">
                            <h3>Selamat Datang</h3>
                        </center>
                    </div>
                    <div class="panel-body">
                    <?php
                        if(isset($_POST['login'])){
                        include "../config/koneksi.php";

                        $username = $_POST['nip'];
                        $pass     = md5($_POST['password']);

                        $connect = new mysqli("localhost","root","","d_base_espara");
                        $login = mysqli_query($connect, "SELECT * FROM tb_guru WHERE uname = '$username'");
                        $row=mysqli_fetch_array($login);
                        if ($row['uname'] == $username && $row['pass'] == $pass && $row['jabatan'] == "Kaur. Kurikulum" && $row['status_guru'] == 1) {
                          session_start();
                          $_SESSION['userdata'] = $row['kd_guru'];
                          $_SESSION['username'] = $row['nama_guru'];
                          $_SESSION['jabatan'] = $row['jabatan'];
                          header('location:http://localhost/apel_espara/kakur/');
                        }
                        elseif ($row['uname'] == $username && $row['pass'] == $pass && $row['status_guru'] == 1) {
                            session_start();
                          $_SESSION['userdata'] = $row['kd_guru'];
                          $_SESSION['username'] = $row['nama_guru'];
                          $_SESSION['jabatan'] = $row['jabatan'];
                          header('location:http://localhost/apel_espara/guru/');
                        }
                        elseif ($row['uname'] == $username && $row['pass'] == $pass && $row['status_guru'] == 0) {
                            echo "<div class='alert alert-danger'>Anda Sudah<a href='#' class='alert-link'> Tidak Aktif</a></div>";
                        }
                        else
                        {
                          echo "<div class='alert alert-danger'>Username Atau Password Anda <a href='#' class='alert-link'>Salah !</a></div>";
                        }
                    }
                    ?>
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="nip" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" class="btn btn-primary btn-block" value="Masuk" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <footer style="text-align: center;">
        <p style="color: #ffffff;"><a href="#" target="_blank" style="font-weight: bold;">Lukmanul</a> Hakim | PKL  <a href="http://www.amiki.ac.id" target="_blank" style="font-weight: bold;">AMIKI</a> | 2017</p>
    </footer>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
