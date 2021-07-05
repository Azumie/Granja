<div class="card shadow animate__animated  animate__fadeInUp">
	<!-- CARD HEADER / BUTTON AGREGAR -->
	<div class="card-header d-flex justify-content-between">
		<div class="d-flex justify-content-between">
			<img src="assets/img/granero.svg" height="35px" class="mr-1 bg-warning rounded p-1 float-left icono">
			<h3>Reporte - Producción</h3>
		</div>
	</div>
	<div class="card-body px-5">
		<form id="inputsGraficoProduccion" class="row mx-5">
				<!-- DESDE -->

			<div class="col-md-6">
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Desde</span>
					</div>
					<input type="date" name="fechaDesdeGrafico" id="fechaDesdeGrafico" class="form-control">
				</div>
			</div>

				<!-- HASTA -->

			<div class="col-md-6">
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Hasta</span>
					</div>
					<input type="date" name="fechaHastaGrafico" id="fechaHastaGrafico" class="form-control">
				</div>
			</div>

				<!-- Galpon -->
				
			<div class="col-md-6">
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Galpón</span>
					</div>
					<select name="galponGraficaProduccion" id="galponGraficaProduccion" class="form-control">
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<button class="btn form-control btn-primary btn-sm">Buscar</button>
			</div>
				<!-- GRAFICO -->
		</form>
		<div class="row">
			<div class="col-12 d-block contenedor-grafico" style="height: 20em">
				<canvas id="graficoProduccion" style="max-height:20em"></canvas>
				<br>
			</div>
		</div>
	</div>
</div>
			