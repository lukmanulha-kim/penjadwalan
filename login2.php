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
    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">
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
        <p><a href="developer/" target="_blank" style="font-weight: bold;">Lukmanul</a> Hakim | PKL  <a href="http://www.amiki.ac.id" target="_blank" style="font-weight: bold;">AMIKI</a> Copyright &copy; 2017</p>
    </footer>
</body>
</html>