<div class="card shadow animate__animated  animate__fadeInUp">
	<!-- CARD HEADER / BUTTON AGREGAR -->
	<div class="card-header d-flex justify-content-between">
		<div class="d-flex justify-content-between">
			<img src="assets/img/granero.svg" height="35px" class="mr-1 bg-warning rounded p-1 float-left icono">
			<h3>Reporte - Alimentación</h3>
		</div>
		
		<div class="col-auto">
			<button class="btn btn-info btn-sm circulo py-0" data-toggle="modal" data-target="#Informacion"><h6 class="p-0"><i class="fas mt-2 fa-info"></i></h6></button>
		</div>
	</div>
	<div class="card-body px-5">
		<form class="row mx-5">

				<!-- DESDE -->

			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Desde</span>
					</div>
					<input type="date" name="fechaGraficoAlimentacion" id="fechaGraficoAlimentacion" class="form-control">
				</div>
			</div>

				<!-- HASTA -->

			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Hasta</span>
					</div>
					<input type="date" name="fechaFinGrAlimentacion" id="fechaFinGrAlimentacion" class="form-control">
				</div>
			</div>

				<!-- Galpon -->
				
			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Granja</span>
					</div>
					<select name="idGalponGrAlimentacion" id="idGalponGrAlimentacion" class="form-control"></select>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-12 d-block contenedor-grafico" style="height: 20em">
				<canvas id="graficoAlimentacion" style="max-height:20em"></canvas>
				<br>
			</div>
		</div>
	</div>
</div>
			