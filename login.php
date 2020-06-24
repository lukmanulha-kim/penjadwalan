<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width">
    <meta name="description" content="Espara Coba">
    <meta name="keywords" content="Aplikasi Penjadwalan">
    <meta name="author" content="LukmanulHakim">
    <title>Aplikasi Penjadwalan</title>
    <link href="picture/espara.png" rel=icon>
    <link rel="stylesheet" type="text/css" href="./vendor/css.css">
    <style>
        body {
            background-color:#eee;
        }
        .row {
            margin:170px auto;
            width:300px;
            text-align:center;
        }
        .login {
            background-color:#fff;
            padding:20px;
            margin-top:20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="contain">
            <div id="brand">
                <h1>Aplikasi Penjadwalan <span class="highlight">ESPARA</span></h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="lihat.php">Jadwal</a></li>
                    <li class="current"><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

<section id="showcase">
    <div class="contain">
        <div id="login">
            <fieldset>
<?php
    if(isset($_POST['login'])){

    $connect = new mysqli("localhost","root","","d_base_espara");
    $username = $_POST['username'];
    $pass     = md5($_POST['pass']);
    $level = $_POST['level'];

    if ($level == 'admin') {
        $login = mysqli_query($connect, "SELECT * FROM tb_guru WHERE uname = '$username'");
        $row=mysqli_fetch_array($login);
        if ($row['uname'] == $username && $row['pass'] == $pass && $row['jabatan'] == "Kaur. Kurikulum" && $row['status_guru'] == 1)
        {
          session_start();
          $_SESSION['userdata'] = $row['kd_guru'];
          $_SESSION['username'] = $row['nama_guru'];
          header('location:http://localhost/apel_espara/kakur/');
        }
        elseif ($row['uname'] != $username || $row['pass'] != $pass) {
            echo "<div class='alert alert-danger'>Username Atau Password Anda <b>SALAH !</b></div>";
        }
        elseif ($row['jabatan'] != "Kaur. Kurikulum") {
          echo "<div class='alert alert-danger'>Anda Bukan <b>ADMIN !</b></div>";
        }
        else
        {
          echo "<div class='alert alert-danger'>Username Atau Password Anda <b>SALAH !</b></div>";
        }
        
    }else{
        $login = mysqli_query($connect, "SELECT * FROM tb_guru WHERE uname = '$username'");
        $row=mysqli_fetch_array($login);
        if($row['uname'] == $username && $row['pass'] == $pass && $row['status_guru'] == 1) {
            session_start();
          $_SESSION['userdata'] = $row['kd_guru'];
          $_SESSION['username'] = $row['nama_guru'];
          header('location:http://localhost/apel_espara/guru/');
        }
        elseif ($row['uname'] == $username && $row['pass'] == $pass && $row['status_guru'] == 0) {
            echo "<div class='alert alert-danger'>Anda Sudah <b>TIDAK AKTIF</b> di ESPARA</div>";
        }
        else
        {
          echo "<div class='alert alert-danger'>Username Atau Password Anda <b>SALAH !</b></div>";
        }
    }

}
?>
                    <form action="" method="post" role="form">
                        <input type="text" name="username" placeholder="Username">                            
                        <div class="form-group">
                            <input type="password" name="pass" placeholder="Password">    
                        </div>
                        <div class="form-group">
                            <select name="level" class="form-control">
                                <option value="" required>Level</option>
                                <option value="admin">Kurikulum</option>
                                <option value="user">Guru</option>
                            </select>
                        </div>
                        <input type="submit" name="login" value="Login">
                    </form>
                </fieldset>
            </div>
        </div>
    </section>

    <!--<section id="news">
        <div class="contain">
            <h1>Cari</h1>
            <form>
                <input type="text" name="cari" placeholder="Cari....">
                <button type="submit" class="button_1">Cari</button>
            </form>
        </div>
    </section>-->
    <footer>
        <p><a href="#" target="_blank" style="font-weight: bold;">Lukmanul</a> Hakim | PKL  <a href="http://www.amiki.ac.id" target="_blank" style="font-weight: bold;">AMIKI</a> | 2017</p>
    </footer>
</body>
</html>