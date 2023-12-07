<!DOCTYPE html>
<html lang="en">

<head>
	<link href='../Tema/Tabla/tabla.css' rel='stylesheet' type='text/css'>
	<?php include "../Tema/CSS.php";

	if (isset($_SESSION['chekon']))
		unset($_SESSION['chekon']);
	else
		header("Location:../Controladores/GComponentesControlador.php");

	if (isset($_SESSION['rol'])) {
		if ($_SESSION['rol'] != 'Admin')
			header("Location:Index.php");
	} ?>

	<title>AutoCon - Gestión de Componentes</title>
	<link rel="stylesheet" href="../Tema/Button/Cancelar.css">
</head>

<body>
	<?php include "../Tema/Menu.php" ?>

	<!-- HERO -->
	<div class="hero-area bg-img background-overlay" style="background-image: url(../img/blog-img/Gcomponentes.jpg)">
		<h1>Componentes comprados</h1>
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
						<th class="transparent">______________</th>
						<th>Numero Componente</th>
						<th>Fecha</th>
						<th>Componente</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Nombre de Usuario</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Correo</th>
						<th>Telefono</th>
						<th>DNI</th>
						<th>Estado</th>
						<th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($_SESSION['datosGComponentes'] as $num) { ?>
						<tr>
							<td><img height="200%" width="200%" src="../img/componentes/<?php echo $num['ruta'] ?>"></td>
							<td>
								<?php echo "#" . $num['n'] ?>
							</td>
							<td>
								<?php echo $num['fecha'] ?>
							</td>
							<td>
								<?php echo $num['nombreC'] . " - " . $num['tipo'] ?>
							</td>
							<td>
								<?php echo "x" . $num['cantidad']; ?>
							</td>
							<td>
								<?php echo $num['precio'] . " €"; ?>
							</td>
							<td>
								<?php echo $num['nombreUsuario'] ?>
							</td>
							<td>
								<?php echo $num['nombre'] ?>
							</td>
							<td>
								<?php echo $num['apellidos'] ?>
							</td>
							<td>
								<?php echo $num['correo'] ?>
							</td>
							<td>
								<?php echo $num['numeroMovil'] ?>
							</td>
							<td>
								<?php echo $num['nif'] ?>
							</td>
							<td>
								<?php if ($num['finalizado'] == "Si") { ?>
									<p class="buyed">Comprado</p>
								<?php } elseif ($num['finalizado'] == "No") { ?>
									<p class="reserved">En pedido</p>
								<?php } ?>
							</td>

							<td>
								<?php if ($num['finalizado'] != "Si") { ?>
									<a href="../Controladores/GComponentesControlador.php?buy=1&user=<?php echo $num['idU']
										?>&component=<?php echo $num['idC']
										?>#1" class="<?php if ($num['finalizado'] == "No") { ?>reserved <?php } else { ?>rented <?php } ?>">
										&ltPasar a comprado&gt</a>
								<?php } ?>
							</td>

							<td>
								<?php if ($num['finalizado'] != "Si") { ?><a href="../Controladores/GComponentesControlador.php?cancel=1&user=<?php echo $num['idU']
										 	?>&component=<?php echo $num['idC']
										 	?>&n=<?php echo $num['n']
										 	?>#1" class="delete">Cancelar</a>
								<?php } ?>
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