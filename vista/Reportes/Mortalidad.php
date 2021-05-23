<div class="card shadow animate__animated  animate__fadeInUp">
	<!-- CARD HEADER / BUTTON AGREGAR -->
	<div class="card-header d-flex justify-content-between">
		<div class="d-flex justify-content-between">
			<img src="assets/img/granero.svg" height="35px" class="mr-1 bg-warning rounded p-1 float-left icono">
			<h3>Reporte - Mortalidad</h3>
		</div>
		
		<div class="col-auto">
			<button class="btn btn-info btn-sm circulo py-0" data-toggle="modal" data-target="#Informacion"><h6 class="p-0"><i class="fas mt-2 fa-info"></i></h6></button>
		</div>
	</div>
	<div class="card-body px-5">
		<div class="row mx-5">

				<!-- DESDE -->

			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Desde</span>
					</div>
					<input type="date" name="fechaInicio" id="fechaInicio" class="form-control">
				</div>
			</div>

				<!-- HASTA -->

			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Hasta</span>
					</div>
					<input type="date" name="fechaFin" id="fechaFin" class="form-control">
				</div>
			</div>

				<!-- Granja -->
				
			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Granja</span>
					</div>
					<select name="idGranja" id="idGranja" class="form-control">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>
			</div>

				<!-- Calpon -->
				
			<div class="col-md-6">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">Galpón</span>
					</div>
					<select name="idGranja" id="idGranja" class="form-control">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>
			</div>

				<!-- GRAFICO -->

				<div class="col-12 contenedor-grafico" style="height: 20em"></div>

		</div>
	</div>
</div>
			