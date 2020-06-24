<?php $connect = new mysqli("localhost","root","","d_base_espara"); ?>
<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Aplikasi Penjadwalan</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<link href="../picture/espara.png" rel=icon>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper-->
			<div id="wrapper">
				
				<!-- Nav -->
					<nav id="nav">
						<a href="#me" class="icon fa-home active"><span>Home</span></a>
						<a href="#contact" class="icon fa-sign-in"><span>Login</span></a>
						<a href="#jadwal" class="icon fa-download"><span>Download</span></a>
						<!-- <a href="#" class="icon fa-twitter"><span>Twitter</span></a> -->
					</nav>

				<!-- Main -->
					<div id="main">
						
						<!-- Me -->
							<article id="me" class="panel">
								<header>
									<h1>Selamat Datang</h1>
									<p>di Aplikasi Penjadwalan Pembelajaran</p>
								</header>
								<a href="#work" class="jumplink pic">
									<!-- <span class="arrow icon fa-chevron-right"><span>See my work</span></span> -->
									<img src="images/mee.jpg" alt="" />
								</a>
							</article>

						<!-- Contact -->
							<article id="contact" class="panel">
								<header>
									<h2>Login Aplikasi</h2>
								</header>
<?php  
    if(isset($_POST['login'])){

    
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
          header('location:../kakur/');
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
          header('location:../guru/');
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
								<form action="" method="post">
									<div>
										<div class="row">
											<div class="6u">
												<input type="text" name="username" placeholder="Username" required />
											</div>
											<div class="6u">
												<input type="password" name="pass" placeholder="Password" required />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<select name="level" required="">
													<option value="">Pilih Level</option>
													<option value="admin">Kurikulum</option>
													<option value="guru">Guru</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="submit" name="login" value="Masuk" />
											</div>
										</div>
									</div>
								</form>
							</article>

						<!-- Jadwal -->
							<article id="jadwal" class="panel">
								<header>
									<h2>Download Jadwal</h2>
								</header>
								<form action="../kakur/pdf/lap.php" method="post">
									<div class="row">
										<div class="12u">
											<select name="semester" required="">
												<option value="">Pilih Semester</option>
												<option value="GANJIL">Ganjil</option>
												<option value="GENAP">Genap</option>
											</select>
										</div>
										<div class="12u">
											<select name="tapel" required="">
												<option value="">Pilih Tahun Pelajaran</option>
												<?php  
													// $connect = new mysqli("localhost", "root", "", "d_base_espara");
													$queri = mysqli_query($connect, "SELECT DISTINCT tahun_pelajaran from tb_jadwal");
													while($row = mysqli_fetch_array($queri)) {
												?>
												<option value="<?php echo $row['tahun_pelajaran']; ?>"><?php echo $row['tahun_pelajaran']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="12u">
											<input type="submit" value="Download" />
										</div>
									</div>
								</form>
								<hr><h2>Download Jadwal Kelas</h2><br>
								<form action="../kakur/pdf/lap_kel.php" method="post">
									<div class="row">
										<div class="6u">
											<select name="kelas" required="">
												<option value="">Pilih Kelas</option>
												<?php  
													// $connect = new mysqli("localhost", "root", "", "d_base_espara");
													$queri = mysqli_query($connect, "SELECT nama_kelas, kd_kelas from tb_kelas");
													while($row = mysqli_fetch_array($queri)) {
												?>
												<option value="<?php echo $row['kd_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="6u">
											<select name="semester" required="">
												<option value="">Pilih Semester</option>
												<option value="GANJIL">Ganjil</option>
												<option value="GENAP">Genap</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="12u">
											<select name="tapel" required="">
												<option value="">Pilih Tahun Pelajaran</option>
												<?php  
													// $connect = new mysqli("localhost", "root", "", "d_base_espara");
													$queri = mysqli_query($connect, "SELECT DISTINCT tahun_pelajaran from tb_jadwal");
													while($row = mysqli_fetch_array($queri)) {
												?>
												<option value="<?php echo $row['tahun_pelajaran']; ?>"><?php echo $row['tahun_pelajaran']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="12u">
											<a href="" target="_blank"></a><input type="submit" value="Download" /></a>
										</div>
									</div>
								</form>
									<div>
										
										<hr>
										
										
									</div>
								</form>
							</article>

					</div>
		
				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li>&copy; LukmanulHakim.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
		
			</div>

	</body>
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/init.js"></script>
</html>