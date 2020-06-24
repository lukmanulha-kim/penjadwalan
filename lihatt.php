<?php include 'config/koneksi.php'; ?>
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
            background-color: #fff;
            padding:20px;
            margin-top:20px;
        }
    </style>
	<!-- <link rel="stylesheet" type="text/css" href="./vendor/tabel.css"> -->
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
					<li class="current"><a href="lihat.php">Jadwal</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
		</div>
	</header>

		
			<h2 style="text-align: center;">Jadwal Mata Pelajaran</h2>
			<?php include 'jadwal.php'; ?>
		

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
		<p><a href="#" target="_blank" style="font-weight: bold;">Lukmanul</a> Hakim | PKL  <a href="http://www.amiki.ac.id" target="_blank" style="font-weight: bold;">AMIKI</a> Copyright &copy; 2017</p>
	</footer>
</body>
</html>