<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo CONTROLADOR; ?></title>
		<link rel="stylesheet" href="assets/css/css/all.min.css">
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">
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

			<!-- NAVEGACION -->

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand text-warning" href="#"><img src="assets/img/EggL.png" class="img-fluid" style="width: 1.4em">Las Tunas</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<?php
						foreach (MENUITEMS as $nombreItem => $item) {
							$activo = (CONTROLADOR == $nombreItem) ? 'active' : '';
							if (is_array($item)) {
								?>
								<!-- inicio -->
								<li class="nav-item dropdown <?= $activo ?>">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?=$nombreItem?>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<?php foreach ($item as $nombreSubItem => $subItem): ?>
											<a class="dropdown-item" href="?c=<?=$nombreItem?>&p=<?=$nombreSubItem?>">
												<?=$subItem?>
											</a>
										<?php endforeach ?>
									</div>
								</li>
								<!-- fin -->
								<?php
							} else{
								?>
								<li class="nav-item">
									<a href="?c=<?=$nombreItem?>" class="nav-link">
										<?=$item?>
									</a>
								</li>
								<?php
							}
						}
						?>
					</ul>
					<a data-toggle="modal" data-target="#Salir" class="btn btn-danger py-0 m-0"><i class="fas fa-sign-out-alt"></i></a>
				</div>
			</nav>

			<!-- NAVEGACION -->

		<?php endif ?>
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
		<div class="f fondo<?php echo ( CONTROLADOR == 'Login') ? CONTROLADOR : '' ?>"></div>
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
	</body>
</html>