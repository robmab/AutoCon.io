<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "../Tema/CSS.php";
	if (isset($_SESSION['rol'])) {
		if ($_SESSION['rol'] != 'Admin')
			header("Location:Index.php");
	} ?>

	<link rel="stylesheet" href="../css/views/admin.css">
	<link href='../Tema/Button/boton.css' rel='stylesheet' type='text/css'>
	<title>AutoCon - Panel de Control</title>
</head>

<body>
	<?php include "../Tema/Menu.php" ?>

	<!-- HERO -->
	<div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/paneldecontrol.png)">
		<h1>Panel de Control</h1>
	</div>

	<div class="world-catagory-area admin">
		<div class="container">
			<div class="row justify-content-center">

				<!-- Contact Form Area -->
				<div class="col-12 col-md-10 col-lg-8">
					<div class="contact-form">

						<?php if (isset($_SESSION['mensajeBD'])) { ?>
							<?php
							echo " <h5 class='alert'> " . $_SESSION['mensajeBD'] . "";
							unset($_SESSION['mensajeBD']);
						} ?>

						<!-- Single Blog Post -->
						<div class="single-blog-post2 post-style-2 d-flex align-items-center  ">
							<div class="post-content">
								<div class="box">
									<a href="../Controladores/UsuariosControlador.php" 
									class="btn btn-white btn-animation-1">
										Usuarios
									</a>
								</div>
							</div>
						</div>

						<div class="single-blog-post2 post-style-2 d-flex align-items-center">
							<div class="post-content">
								<div class="box">
									<a href="../Controladores/ProveedoresControlador.php" class="btn btn-white btn-animation-1">
										Proveedores
									</a>
								</div>
							</div>
						</div>

						<div class="single-blog-post2 post-style-2 d-flex align-items-center">
							<div class="post-content">
								<div class="box">
									<a href="../Controladores/GVehiculosControlador.php" class="btn btn-white btn-animation-1">
										Gestión de Vehículos
									</a>
								</div>
							</div>
						</div>

						<div class="single-blog-post2 post-style-2 d-flex align-items-center">
							<div class="post-content">
								<div class="box">
									<a href="../Controladores/EventosControlador.php" class="btn btn-white btn-animation-1">
										Eventos de Descuento
									</a>
								</div>
							</div>
						</div>

						<div class="single-blog-post2 post-style-2 d-flex align-items-center wow ">
							<div class="post-content">
								<div class="box">
									<a href="../Controladores/GComponentesControlador.php" class="btn btn-white btn-animation-1">
										Componentes comprados
									</a>
								</div>
							</div>
						</div>

						<div class="single-blog-post2 post-style-2 d-flex align-items-center">
							<div class="post-content">
								<div class="box">
									<a href="../Controladores/GReparacionControlador.php" class="btn btn-white btn-animation-1">
										Servicios de Reparación Solicitados
									</a>
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