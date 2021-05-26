<div class="card shadow animate__animated  animate__fadeInUp">
	<!-- CARD HEADER / BUTTON AGREGAR -->
	<div class="card-header d-flex justify-content-between">
		<div class="d-flex justify-content-between">
			<img src="assets/img/granero.svg" height="35px" class="mr-1 bg-warning rounded p-1 float-left icono">
			<h3>Galpón</h3>
		</div>
		
		<div class="col-auto">
			<button class="btn btn-info btn-sm circulo py-0" data-toggle="modal" data-target="#Informacion"><h6 class="p-0"><i class="fas mt-2 fa-info"></i></h6></button>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-md-6">
			<form id="formularioAgregarGalpon">
				<div class="input-group input-group-sm mb-4 col-12 col-md-10">
					<div class="input-group-prepend">
						<span class="input-group-text">Granja</span>
					</div>
					<select class="form-control" name="idGranjaGalpon">
						<option disabled selected>Granja a la que se le agregará el galpón</option>
					</select>
				</div>
				<div class="input-group input-group-sm mb-4 col-12 col-md-10">
					<div class="input-group-prepend">
						<span class="input-group-text">Fecha Creación</span>
					</div>
					<input type="date" class="form-control" name="fechaGalpon">
				</div>
				<div class="row">
					<div class="col-12 col-md-6">
						<div class="input-group input-group-sm mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text">Galpón</span>
							</div>
							<input type="number" class="form-control" placeholder="Número de Galpón" name="numeroGalpon">
						</div>
					</div>
					<div class="col-12 col-md-6">
						<div class="input-group input-group-sm mb-4">
							<div class="input-group-prepend">
								<div class="input-group-text">Área útil</div>
							</div>
							<input type="number" class="form-control" placeholder="Área útil del galpón" name="areaUtilGalpon">
						</div>
					</div>
				</div>
				<div class="input-group input-group-sm mb-4 col-12 col-md-10">
					<div class="input-group-prepend">
						<div class="input-group-text">Confinamiento</div>
					</div>
					<select name="ConfinamientoGalpon" class="form-control">
						<option disabled selected>Forma de resguarde</option>
					</select>
				</div>
				<div class="row justify-content-center d-flex">
					<button type="submit" class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
					<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
				</div>
			</form>
			</div>
			<div class="col-12 col-md-6 table-scrolly">
				<table class="table table-striped table-responsive-sm p-0 table-sm text-center">
					<thead class="table-info">
						<th>Número Galpón</th>
						<th>Área útil</th>
						<th>N° gallinas actuales</th>
						<th>Confinamiento</th>
						<th>Inicio del Lote</th>
						<th>Acción</th>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->
							<td>
								<button class="btn btn-info rounded-circle btn-sm botonesModales" data-toggle="modal" data-target='#editarGalpon'>
								<i class="fas fa-pen-fancy"></i>
								</button>
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>