<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= CONTROLADOR ?></title>
		<link rel="stylesheet" href="assets/css/css/all.min.css">
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="assets/cssCompilado/bootstrap.css">
		<!-- Datatable css -->
		<link rel="stylesheet" href="assets/css/Datatable.min.css">
		<!-- Imagen de la pestaña  POR ALGUNARAZÓN NO AGARRA >N<-->
		<link rel="shortcut icon" href="assets/img/EggL.png">
		<!-- Am¿nimate css -->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
		<link rel="stylesheet" href="assets/css/main.css">
	</head>
	<body>

		<?php if (CONTROLADOR != 'Login'): ?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand text-warning" href="#"><img src="assets/img/EggL.png" class="img-fluid" style="width: 1.4em">Las Tunas</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item <?= (CONTROLADOR == 'Recogida') ? 'active' : '' ?>">
						<a href="?c=recogida" class="nav-link">Recogida</a>
					</li>
					<li class="nav-item <?= (CONTROLADOR == 'Galpon') ? 'active' : '' ?>">
						<a href="?c=Galpon" class="nav-link">Galpón</a>
					</li>
					<li class="nav-item <?= (CONTROLADOR == 'ControlAves') ? 'active' : '' ?>">
						<a href="?c=ControlAves" class="nav-link">Control de Aves</a>
					</li>
					<li class="nav-item <?= (CONTROLADOR == 'Lote') ? 'active' : '' ?>">
						<a href="?c=Lote" class="nav-link">Lotes</a>
					</li>
					<?php if ($_SESSION['nombreUsuario'] == 'Admin'): ?>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#Responsables">Responsables</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#Usuario">Usuarios</a>
					</li>
					<?php endif ?>
					<li class="nav-item dropdown <?= (CONTROLADOR == 'Reportes') ? 'active' : '' ?>">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Reportes
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<!-- <a class="dropdown-item" href="?c=Reportes&p=CierreMes">Cierre de Mes</a> -->
							<a class="dropdown-item" href="?c=Reportes&p=ProduccionDiaria">Producción Diaria</a>
							<a class="dropdown-item" href="?c=Reportes&p=ProduccionEntreFechas">Producción Entre Fechas</a>
							<a class="dropdown-item" href="?c=Reportes&p=FormatoDistribucion">Formato de Distribución</a>
						</div>
					</li>
				</ul>
				<a data-toggle="modal" data-target="#Salir" class="btn btn-danger py-0 m-0"><i class="fas fa-sign-out-alt"></i></a>
			</div>
		</nav>
		<?php endif ?>
		<div class="f fondo<?php echo ( CONTROLADOR == 'Login') ? CONTROLADOR : '' ?>"></div>
		<?php if (CONTROLADOR == 'Login'): ?>
			<div class="burbujas">
				<div class="burbuja"></div>
				<div class="burbuja"></div>
				<div class="burbuja"></div>
				<div class="burbuja"></div>
				<div class="burbuja"></div>
				<div class="burbuja"></div>
			</div>
		<?php endif ?>
		<div class="container-fluid my-3">
			<div class="row <?php echo ( CONTROLADOR == 'Login') ? 'justify-content-end' : '' ?>">
				<div class="col<?php echo ( CONTROLADOR == 'Login') ? '-8 col-md-6 col-lg-4' : '-12' ?>">
					<?php
						foreach ($vistas as $vista) {
							require_once "vista/".CONTROLADOR."/$vista.php";
						}
					?>
				</div>
			</div>
		</div>
		<!-- jQuery -->
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<!-- Bootstrap tooltips -->
		<script type="text/javascript" src="assets/js/popper.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<!-- DataTable core JavaScript -->
		<script type="text/javascript" src="assets/js/Datatable.min.js"></script>
		<script type="text/javascript" src="assets/js/dataTables.bootstrap4.min.js"></script>
		<!-- JSPDF core JavaScript -->
		<script type="text/javascript" src="assets/js/html2pdf.bundle.min.js"></script>
		<!-- CHARTjs core JavaScript -->
		<script type="text/javascript" src="assets/js/Chart.min.js"></script>
		<!-- CAMBIO AQUIIIIIII -->
		<script type="text/javascript" src="assets/js/moment.min.js"></script>
	</body>
</html>