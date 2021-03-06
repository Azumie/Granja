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
		<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> -->
		<!-- chartist js -->
		<link rel="stylesheet" type="text/css" href="assets/css/chartist.min.css">
		<link rel="stylesheet" href="assets/css/main.css">
	</head>
	<body>

		<?php if (CONTROLADOR != 'Login'): ?>

			<!-- NAVEGACION -->

			<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-nav">
				<a class="navbar-brand text-warning" href="#"><img src="assets/img/EggL.png" class="img-fluid" style="width: 1.4em">Las Tunas</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<!-- ITEMS DEL MENU -->

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<?php
						foreach (MENUITEMS as $nombreItem => $item) {
							$activo = (CONTROLADOR == $nombreItem) ? 'active' : '';

							// LINK SUB-MODULOS

							if (is_array($item)) {
								?>
									<li class="nav-item dropdown <?= $activo ?>">
									<a class="nav-link dropdown-toggle rounded" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?=$nombreItem?>
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<?php foreach ($item as $nombreSubItem => $subItem): ?>
											<?php if ($nombreItem == 'Reportes'): ?>
												<a class="dropdown-item" href="?c=<?=$nombreItem?>&p=<?=$nombreSubItem?>">
													<?=$subItem?>
												</a>
											<?php elseif (is_array($subItem)): ?>
												<div class="dropdown-submenu">
																												
													<a class="dropdown-item dropdown-toggle" href="#"><?=$nombreSubItem?></a>
							            <ul class="dropdown-menu">
							            	<?php foreach ($subItem as $nombreSubSubItem => $subSubItem): ?>
							              <li><a class="dropdown-item"data-toggle="modal" data-target="#<?=$nombreSubSubItem?>"><?=$subSubItem?></a></li>
							            	<?php endforeach ?>
							            </ul>
												</div>
											<?php else: ?>
												<a class="dropdown-item"  data-toggle="modal" data-target="#<?=$nombreSubItem?>"><?=$subItem?>
												</a>
											<?php endif ?>


										<?php endforeach ?>
									</div>
								</li>
								<?php

							// LINK MODULO
								
							}else{
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
		<div class="container-fluid my-4">
			<div class="row <?php echo ( CONTROLADOR == 'Login') ? 'justify-content-center' : '' ?>">
				<div class="col<?php echo ( CONTROLADOR == 'Login') ? '-8 col-md-6 col-lg-4 align-self-center' : '-12' ?>">
					<?php
						foreach ($vistas as $vista) {
							require_once "vista/".CONTROLADOR."/$vista.php";
						}
					?>
				</div>
			</div>
		</div>

		<?php 
			foreach (MENUITEMS as $nombreItem => $item) {
				if (is_array($item) && $nombreItem != 'Reportes') {
					foreach ($item as $nombreSubIteme => $subItem) {
							$nombreItem = prepararRequire($nombreItem);
							$nombreSubIteme = prepararRequire($nombreSubIteme);
						if (is_array($subItem)) {
							foreach ($subItem as $nombreSubSubItem => $subSubItem) {
								$nombreSubSubItem = prepararRequire($nombreSubSubItem);
								$subSubItem = prepararRequire($subSubItem);
								if (file_exists("vista/$nombreItem/$nombreSubSubItem.php")) {
									require_once "vista/$nombreItem/$nombreSubSubItem.php";
								}
							}
						}else {
							if (file_exists("vista/$nombreItem/$nombreSubIteme.php")) {
								require_once "vista/$nombreItem/$nombreSubIteme.php";
							}
						}
					}
				}
			}
		?>
		<?php foreach (MENUITEMS as $nombreItem => $item): ?>
			
		<?php endforeach ?>

		<div id="alertas" class="alertBox d-flex flex-column-reverse mb-2 mr-2">
	
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
		<!-- <script type="text/javascript" src="assets/js/dataTables.bootstrap4.min.js"></script> -->
		<!-- JSPDF core JavaScript -->
		<!-- <script type="text/javascript" src="assets/js/html2pdf.bundle.min.js"></script> -->
		<!-- CHARTjs core JavaScript -->
		<script type="text/javascript" src="assets/js/Chart.min.js"></script>
		<script type="text/javascript" src="vista/js/Ayudante.js"></script>
		<script type="text/javascript" src="vista/js/Reportes.js"></script>
		<!-- CAMBIO AQUIIIIIII -->
		<!-- <script type="text/javascript" src="assets/js/moment.min.js"></script> -->

		<script type="module" src="assets/js/main.js"></script>

	</body>
</html>	
<div class="modal fade" id="Salir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-danger text-white mb-4">
				<h5>¿Seguro que quiere salir?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true" class="white-text">&times;</span>
				</button>
			</div>
			<div class="modal-body d-flex justify-content-end">
				<a href="?c=Login&m=salir" class="btn btn-danger mr-3">Si</a>
				<a role="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Cancelar</a>
			</div>
		</div>
	</div>
</div>