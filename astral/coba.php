<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Astral by HTML5 UP</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
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
									<img src="images/me.jpg" alt="" />
								</a>
							</article>

						<!-- Work --> 
							<!-- <article id="work" class="panel">
								<header>
									<h2>Work</h2>
								</header>
								<p>
									Phasellus enim sapien, blandit ullamcorper elementum eu, condimentum eu elit. 
									Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia 
									luctus elit eget interdum.
								</p>
								<section>
									<div class="row">
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic02.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic03.jpg" alt=""></a>
										</div>
									</div>
									<div class="row">
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic04.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic05.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic06.jpg" alt=""></a>
										</div>
									</div>
									<div class="row">
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic07.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic08.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic09.jpg" alt=""></a>
										</div>
									</div>
									<div class="row">
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic10.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic11.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic12.jpg" alt=""></a>
										</div>
									</div>
								</section>
							</article> -->

						<!-- Contact -->
							<article id="contact" class="panel">
								<header>
									<h2>Login Aplikasi</h2>
								</header>
								<form action="#" method="post">
									<div>
										<div class="row">
											<div class="6u">
												<input type="text" name="uname" placeholder="Username" required />
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
											<!-- <div class="12u">
												<input type="text" name="subject" placeholder="Subject" />
											</div> -->
										</div>
										<!-- <div class="row">
											<div class="12u">
												<textarea name="message" placeholder="Message" rows="8"></textarea>
											</div>
										</div>-->
										<div class="row">
											<div class="12u">
												<input type="submit" value="Masuk" />
											</div>
										</div>
									</div>
								</form>
							</article>

						<!-- Jadwal -->
							<article id="jadwal" class="panel">
								<header>
									<h2>Download Jadwal Kelas</h2>
								</header>
								<form action="#" method="post">
									<div>
										<div class="row">
											<div class="6u">
												<select name="kelas" required="">
													<option value="">Pilih Kelas</option>
													<option value="">--</option>
													<option value="">--</option>
												</select>
											</div>
											<div class="6u">
												<select name="smt" required="">
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
													<option value="--">--</option>
													<option value="--">--</option>
												</select>
											</div>
											<!-- <div class="12u">
												<input type="text" name="subject" placeholder="Subject" />
											</div> -->
										</div>
										<!-- <div class="row">
											<div class="12u">
												<textarea name="message" placeholder="Message" rows="8"></textarea>
											</div>
										</div>-->
										<div class="row">
											<div class="12u">
												<input type="submit" value="Download" />
											</div>
										</div>
										<hr>
										<h2>Download Jadwal</h2><br>
										<div class="row">
											<div class="12u">
												<select name="smt" required="">
													<option value="">Pilih Semester</option>
													<option value="GANJIL">Ganjil</option>
													<option value="GENAP">Genap</option>
												</select>
											</div>
											<div class="12u">
												<select name="tapel" required="">
													<option value="">Pilih Tahun Pelajaran</option>
													<option value="--">--</option>
													<option value="--">--</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="submit" value="Download" />
											</div>
										</div>
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