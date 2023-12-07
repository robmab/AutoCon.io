<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "../Tema/CSS.php" ?>
	<link rel="stylesheet" href="../css/views/services.css">
	<link href='../Tema/Button/CSS.css' rel='stylesheet' type='text/css'>
	<title>AutoCon - Servicios</title>
</head>

<body>
	<?php include "../Tema/Menu.php" ?>

	<!-- HERO -->
	<div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/reparacion.png)">
		<h1>Servicios</h1>
	</div>

	<div class="world-catagory-area services" id="1">
		<div class="container">
			<div class="row justify-content-center">

				<!-- Contact Form Area -->
				<div class="col-12 col-md-10 col-lg-8">
					<div class="contact-form">

						<!-- Alert -->
						<?php if (isset($_SESSION['mensajeBD'])) {
							echo " <h5 class='alert'> " . $_SESSION['mensajeBD'] . "";
							unset($_SESSION['mensajeBD']);
						} ?>

						<!-- ========== Single Blog Post ========== -->
						<div class="col-12 ">
							<!-- Single Blog Post -->
							<div class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/1.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=sustituir#1"
											class="button turquoise"><span>➣</span>Sustituir piezas defectuosas</a>
									</div>
									<!-- Post Meta -->
								</div>
							</div>

							<!-- Single Blog Post -->
							<div id="2" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/2.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=neumatico#1"
											class="button turquoise"><span>➣</span>Cambio de neumáticos</a>
									</div>
								</div>
							</div>

							<!-- Single Blog Post -->
							<div id="3" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/3.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=llanta#1"
											class="button turquoise"><span>➣</span>Revisión de llantas</a>
									</div>
								</div>
							</div>

							<!-- Single Blog Post -->
							<div id="4" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/4.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=aceite#1"
											class="button turquoise"><span>➣</span>Aceite y Líquidos</a>
									</div>
								</div>
							</div>

							<!-- Single Blog Post -->
							<div id="5" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/5.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=pintura#1"
											class="button turquoise"><span>➣</span>Renovación de pinturas y arañazos</a>
									</div>
								</div>
							</div>

							<!-- Single Blog Post -->
							<div id="6" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/7.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=carroceria#1"
											class="button turquoise"><span>➣</span>Reparación carrocería</a>
									</div>
								</div>
							</div>

							<div id="7" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/6.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=bateria#1"
											class="button turquoise"><span>➣</span>Baterías y arranque</a>
									</div>
								</div>
							</div>

							<div id="8" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/8.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=bombilla#1"
											class="button turquoise"><span>➣</span>Bombillas</a>
									</div>
								</div>
							</div>

							<div id="9" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/9.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=parabrisas#1"
											class="button turquoise"><span>➣</span>Limpia parabrisas y escobillas</a>
									</div>
								</div>
							</div>

							<div id="10" class="single-blog-post2 post-style-2 d-flex align-items-center">
								<!-- Post Thumbnail -->
								<div class="post-thumbnail">
									<img src="../img/reparacion/10.jpg" alt="">
								</div>
								<!-- Post Content -->
								<div class="post-content">
									<br>
									<div class="container">
										<a href="../Controladores/ReparacionControlador.php?value=limpieza#1"
											class="button turquoise"><span>➣</span>Limpieza</a>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include "../Tema/Scripts.php" ?>
</body>

</html>