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

	<section id="showcase">
		<div class="contain">
			<br>
			<br>
			<br>
			<fieldset id="pilih">
				<legend><label> Download Jadwal</label></legend>
				<form action="kakur/pdf/lap_jad.php" method="post">
				<div class="form-group">
					<select name="tapel" class="form-control">
						<option value="">Pilih Tapel</option>
						<?php  
							$connect = new mysqli("localhost", "root", "", "d_base_espara");
							$queri = mysqli_query($connect, "SELECT DISTINCT tahun_pelajaran from tb_jadwal");
							while($row = mysqli_fetch_array($queri)) {
						?>
						<option value="<?php echo $row['tahun_pelajaran']; ?>"><?php echo $row['tahun_pelajaran']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<select name="kelas" class="form-control">
						<option value="">Pilih Kelas</option>
						<?php  
							$connect = new mysqli("localhost", "root", "", "d_base_espara");
							$queri = mysqli_query($connect, "SELECT nama_kelas, kd_kelas from tb_kelas");
							while($row = mysqli_fetch_array($queri)) {
						?>
						<option value="<?php echo $row['kd_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<select name="semester" class="form-control">
						<option value="">Pilih Semester</option>
						<option value="GANJIL">Ganjil</option>
						<option value="GENAP">Genap</option>
					</select>
				</div>
				<div class="form-group">
					<a href="" target="_blank"><input type="submit" name="down" value="Download"></a>
				</div>
				</form>
			</fieldset>
			<!-- <h3 style="text-align: center;">Jadwal Pelajaran</h3><hr><br>
			<center>
			<?php include 'jadwal.php'; ?>
			<br>
			</center>
			<br><br> -->
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