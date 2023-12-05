<!DOCTYPE html>
<html lang="en">

<head>
	<link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
	<link href='../Tema/Button/on.css' rel='stylesheet' type='text/css'>

	<?php include "../Tema/CSS.php";
	if (isset($_SESSION['chekon']))
		unset($_SESSION['chekon']);
	else
		header("Location:../Controladores/ProveedoresControlador.php");

	if (isset($_SESSION['rol'])) {
		if ($_SESSION['rol'] != 'Admin')
			header("Location:Index.php");
	} ?>

	<title>AutoCon - Proveedores</title>
	<link rel="stylesheet" href="../Tema/Button/Cancelar.css">
</head>

<body>
	<?php include "../Tema/Menu.php" ?>

	<!-- HERO -->
	<div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/proveedor.jpg)">
		<h1>Proveedores disponibles</h1>
	</div>

	<section>
		<div class="col-12 col-md-10 col-lg-8">
			<?php if (isset($_SESSION['mensajeBD'])) {
				echo " <h5 class='alert'> " . $_SESSION['mensajeBD'] . "</h5> ";
				unset($_SESSION['mensajeBD']);
			} ?>
		</div>

		<!-- Contact Form Area -->
		<div class="table">
			<!-- Data -->
			<table>
				<thead>
					<tr>
						<th></th>
						<th>Nombre</th>
						<th>Número</th>
						<th>Correo</th>
						<th>Disponibilidad</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($_SESSION['datosProveedores'] as $name => $num) { ?>
						<tr>
							<td><img src="../img/proveedores/<?php echo $num['logo'] ?>"></td>
							<td>
								<?php echo $name ?>
							</td>
							<td>
								<?php echo $num['numero'] ?>
							</td>
							<td>
								<?php echo $num['correo'] ?>
							</td>
							<td>
								<label class="switch">

									<input class="switch-input" type="checkbox" <?php if ($num['disponibilidad'] == 'Si') { ?>checked <?php } ?> />

									<span onclick="window.location='../Controladores/ProveedoresControlador.php?proveedor=<?php
									echo $name ?>&cambiar=<?php if ($num['disponibilidad'] == 'Si') { ?>1<?php } else {
											?>2<?php } ?>#1'" class="switch-label" data-on="Si" data-off="No"></span>

									<span onclick="window.location='../Controladores/ProveedoresControlador.php?proveedor=<?php
									echo $name ?>&cambiar=<?php if ($num['disponibilidad'] == 'Si') { ?>1<?php } else {
											?>2<?php } ?>#1'" class="switch-handle"></span>

								</label>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>

	<?php include "../Tema/Scripts.php" ?>
</body>

</html>