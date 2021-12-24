<?php 
	require_once 'Lib/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>SIMPEG | BHAYANGKARA PALEMBANG</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Dr PRO template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/theme/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="<?=BASE_URL?>/theme/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/theme/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/theme/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/theme/plugins/OwlCarousel2-2.2.1/animate.css">
<link href="<?=BASE_URL?>/theme/plugins/jquery-datepicker/jquery-ui.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/theme/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/theme/styles/responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header trans_400">
		<div class="header_content d-flex flex-row align-items-center jusity-content-start trans_400">

			<!-- Logo -->
			<div class="logo">
				<a href="#">
					<div>SIM<span>PEG</span></div>
					<div>SISTEM INFORMASI KEPEGAWAIAN</div>
				</a>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<li class="active"><a href="index.html">HOME</a></li>
					<li><a href="/loginsiemen/index.html">SEIMEN</a></li>
					<li><a href="/logindawai/index.html">DAWAI</a></li>
					<li><a href="contact.html">KONTAK</a></li>
					<li><a href="about.html">TENTANG KAMI</a></li>
				</ul>
			</nav>
			<div class="header_extra d-flex flex-row align-items-center justify-content-end ml-auto">
				<!-- Hamburger -->
				<div class="hamburger">6<i class="fa fa-bars" aria-hidden="true"></i></div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu_overlay trans_400"></div>
	<div class="menu trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<nav class="menu_nav">
			<ul>
				<li><a href="index.html">HOME</a></li>
				<li><a href="about.html">SEIMEN</a></li>
				<li><a href="services.html">DAWAI</a></li>
				<li><a href="blog.html">KONTAK</a></li>
				<li><a href="about.html">TENTANG</a></li>
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="background_image" style="background-image:url(images/dokter.jpg)"></div>
					<div class="home_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content">
										<div class="home_subtitle">PORTAL APLIKASI</div>
										<div class="home_title"><b>RS BHAYANGKARA PALEMBANG</b></div>
										<div class="home_buttons d-flex flex-row align-items-center justify-content-start">
											<div class="button button_1 trans_200"><a href="/loginsiemen/index.html">SEIMEN</a></div>
											<div class="button button_2 trans_200"><a href="/logindawai/index.html">DAWAI</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- Why Choose Us -->

	<div class="why">
		<!-- <div class="background_image" style="background-image:url(images/why.jpg)"></div> -->
		<div class="container">
			<div class="row row-eq-height">

				<!-- Why Choose Us Image -->
				<div class="col-lg-6 order-lg-1 order-2">
					<div class="why_image_container">
						<div class="why_image"><img src="<?=BASE_URL?>/theme/images/why_1.jpg" alt=""></div>
					</div>
				</div>

				<!-- Why Choose Us Content -->
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="why_content">
						<div class="section_title_container">
							<div class="section_subtitle">RSUD BHAYANGKARA PALEMBANG</div>
							<div class="section_title"><h2>Bergabunglah bersama kami</h2></div>
						</div>
						<div class="why_text">
							<p>Menjadi Rumah Sakit Umum Rujukan Provinsi dan Rumah Sakit Pendidikan yangmampu Mewujudkan Pelayanan yang Bermutu, Profesional, Efisien, dengan StandarPelayanan Kelas Dunia.</p>
						</div>
						<div class="why_list">
							<ul>

								<!-- Why List Item -->
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="icon_container d-flex flex-column align-items-center justify-content-center">
										<div class="icon"><img src="<?=BASE_URL?>/theme/images/icon_1.svg" alt="https://www.flaticon.com/authors/prosymbols"></div>
									</div>
									<div class="why_list_content">
										<div class="why_list_title">Hanya Produk Teratas</div>
										<div class="why_list_text">Etiam ac erat ut enim maximus accumsan vel ac nisl</div>
									</div>
								</li>

								<!-- Why List Item -->
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="icon_container d-flex flex-column align-items-center justify-content-center">
										<div class="icon"><img src="<?=BASE_URL?>/theme/images/icon_2.svg" alt="https://www.flaticon.com/authors/prosymbols"></div>
									</div>
									<div class="why_list_content">
										<div class="why_list_title">Dokter terbaik</div>
										<div class="why_list_text">Ac erat ut enim maximus accumsan vel ac</div>
									</div>
								</li>

								<!-- Why List Item -->
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="icon_container d-flex flex-column align-items-center justify-content-center">
										<div class="icon"><img src="<?=BASE_URL?>/theme/images/icon_3.svg" alt="https://www.flaticon.com/authors/prosymbols"></div>
									</div>
									<div class="why_list_content">
										<div class="why_list_title">Umpan Balik yang Bagus</div>
										<div class="why_list_text">Etiam ac erat ut enim maximus accumsan vel</div>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Call to action -->

	<div class="cta">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_container d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<div class="cta_content">
							<div class="cta_title">Buat janji Anda hari ini!</div>
						</div>
						<div class="cta_phone ml-lg-auto">+62 853 8094 8294</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Extra -->

	<div class="extra">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?=BASE_URL?>/theme/images/extra.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="extra_container d-flex flex-row align-items-start justify-content-end">
						<div class="extra_content">
							<div class="extra_disc d-flex flex-row align-items-end justify-content-start">
								
								<div>RSUD BHAYANGKARA</div>
							</div>
							<div class="extra_title">Official Youtube</div>
							<div class="extra_text">
								<p>Menjadi Rumah Sakit Umum Rujukan Provinsi dan Rumah Sakit Pendidikan yang mampu Mewujudkan Pelayanan yang Bermutu, Profesional, Efisien, dengan StandarPelayanan Kelas Dunia.</p>
							</div>
							<div class="button button_1 extra_link trans_200"><a href="Youtube.com">Lihat Video</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="<?=BASE_URL?>/theme/images/newsletter.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="newsletter_title">Subscribe to our newsletter</div>
				</div>
			</div>
			<div class="row newsletter_row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_form_container">
						<form action="#" id="newsleter_form" class="newsletter_form">
							<input type="email" class="newsletter_input" placeholder="Your E-mail" required="required">
							<button class="newsletter_button">subscribe</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="container">
				<div class="row">

					<!-- Footer About -->
					<div class="col-lg-3 footer_col">
						<div class="footer_about">
							<div class="footer_logo">
								<a href="#">
									<div>SIM<span>PEG</span></div>
									<div>Rs. BHAYANGKARA PALEMBANG</div>
								</a>
							</div>
							<div class="footer_about_text">
								<p>Nulla facilisi. Nulla egestas vel lacus sed interdum. Sed mollis, orci eleme ntum eleifend tempor, nunc libero porttitor tellus.</p>
							</div>
						</div>
					</div>

					<!-- Footer Contact Info -->
					<div class="col-lg-3 footer_col">
						<div class="footer_contact">
							<div class="footer_title">Info Kontak</div>
							<ul class="contact_list">
								<li>+53 345 7953 32453</li>
								<li>yourmail@gmail.com</li>
								<li>contact@gmail.com</li>
							</ul>
						</div>
					</div>

					<!-- Footer Locations -->
					<div class="col-lg-3 footer_col">
						<div class="footer_location">
							<div class="footer_title">Lokasi Kami</div>
							<ul class="locations_list">
								<li>
									<div class="location_title">Sumatera Selatan</div>
									<div class="location_text">Jl. Jend. Sudirman No.km 4, RW.5, Ario Kemuning, Kec. Kemuning, Kota Palembang</div>
								</li>
							</ul>
						</div>
					</div>

					<!-- Footer Opening Hours -->
					<div class="col-lg-3 footer_col">
						<div class="opening_hours">
							<div class="footer_title">Jam Operasional</div>
							<ul class="opening_hours_list">
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div>Senin:</div>
									<div class="ml-auto">8:00am - 9:00pm</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div>Selasa:</div>
									<div class="ml-auto">8:00am - 9:00pm</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div>Rabu:</div>
									<div class="ml-auto">8:00am - 9:00pm</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div>Kamis:</div>
									<div class="ml-auto">8:00am - 9:00pm</div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div>Jumat:</div>
									<div class="ml-auto">8:00am - 7:00pm</div>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_bar_content  d-flex flex-md-row flex-column align-items-md-center justify-content-start">
							<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
							<nav class="footer_nav ml-md-auto">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="index.html">Home</a></li>
									<li><a href="about.html">Tentang</a></li>
									<li><a href="contact.html">Kontak</a></li>
									<li><a href="/logindawai/index.html">Dawai</a></li>
									<li><a href="/loginsiemen/index.html">Siemen</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</footer>
</div>

<script src="<?=BASE_URL?>/theme/js/jquery-3.2.1.min.js"></script>
<script src="<?=BASE_URL?>/theme/styles/bootstrap-4.1.2/popper.js"></script>
<script src="<?=BASE_URL?>/theme/styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/greensock/TweenMax.min.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/easing/easing.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/parallax-js-master/parallax.min.js"></script>
<script src="<?=BASE_URL?>/theme/plugins/jquery-datepicker/jquery-ui.js"></script>
<script src="<?=BASE_URL?>/theme/js/custom.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="<?=BASE_URL?>/theme/https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>