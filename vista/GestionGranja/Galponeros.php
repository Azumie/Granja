<div class="modal fade" id="Galponeros">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/empleados.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Galponeros</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formularioGalponeros" class="col-lg-5 mb-3 mb-lg-0 ">
						<!-- DOCUMENTO -->
						<div class="row">
							<h6 class="col-12">A continuación... Ingrese los datos del Galponero:</h6>
							<div class="input-group input-group-sm mb-3 col-md-10">
								<div class="input-group-prepend">
									<label for="idGalponero" class="input-group-text">
										Documento
									</label>
								</div>
								<select id='nacionalidadGalponero' name="nacionalidadGalponero" class="form-control" style="max-width: 20%">
									<option>V</option>
									<option>R</option>
								</select>
								<input type="text" name="documentoGalponero" id="documentoGalponero" class="form-control" placeholder="Número de cédula">
							</div>
							<div class="form-check col-md-2 mt-1">
								<input class="form-check-input" type="checkbox" id="activoGalponero" name="activoGalponero" disabled checked>
								<label class="form-check-label mb-1" for="activoGalponero">
									Activo
								</label>
							</div>
						</div>
						<!-- NOMBRES Galponero -->
						<div class="input-group input-group-sm mb-3 input-group-sm">
							<div class="input-group-prepend">
								<label for="nombresGalponero" class="input-group-text">
									Nombres
								</label>
							</div>
							<input type="text" name="nombresGalponero" id="nombresGalponero" class="form-control" placeholder="Nombres del galponero">
						</div>
						<!-- APELLIDOS Galponero -->
						<div class="input-group input-group-sm mb-3 ">
							<div class="input-group-prepend">
								<label for="apellidosGalponero" class="input-group-text">
									Apellidos
								</label>
							</div>
							<input type="text" name="apellidosGalponero" id="apellidosGalponero" class="form-control" placeholder="Apellidos del galponero">
						</div>
						<!-- TELEFONO	 -->
						<div class="input-group input-group-sm mb-3 ">
							<div class="input-group-prepend">
								<label for="telefono" class="input-group-text">
									Teléfono
								</label>
							</div>
							<input type="text" name="telefonoGalponero" id="telefonoGalponero" class="form-control" placeholder="04162244105">
						</div>
						<!-- EMAIL -->
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<label for="emal" class="input-group-text">
									Email
								</label>
							</div>
							<input class="form-control" type="email" id="emailGalponero" name="emailGalponero" placeholder="Email del galponero"></input>
						</div>
						<!-- BOTONES GUARDAR Y CANCELAR -->
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><strong>Guardar</strong></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><strong>Cancelar</strong></button>
						</div>
					</form> 
					<!-- TABLA COMPRAS PREVIAMENTE REGISTRADAS -->
					<div class="col-lg-7">
						<table class="datatable table table-striped table-responsive p-0 tablas table-sm text-center" id="tablaGalponeros">
							<thead class="table-info" >
								<th>Documento</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Activo</th>
								<th>Acción</th>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>