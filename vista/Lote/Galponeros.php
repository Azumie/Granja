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
							<h6 class="col-12">A continuación... <br>Ingrese los datos del <em>Galponero:</em></h6>
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
								<input type="text" name="idGalponero" id="idGalponero" class="form-control">
							</div>
							<div class="form-check col-md-2 mt-1">
								<input class="form-check-input" type="checkbox" id="activo" name="activo" disabled checked>
								<label class="form-check-label mb-1" for="activo">
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
							<input type="text" name="nombresGalponero" id="nombresGalponero" class="form-control" placeholder="Antonella Alessandra Lourdes">
						</div>
						<!-- APELLIDOS Galponero -->
						<div class="input-group input-group-sm mb-3 ">
							<div class="input-group-prepend">
								<label for="apellidosGalponero" class="input-group-text">
									Apellidos
								</label>
							</div>
							<input type="text" name="apellidosGalponero" id="apellidosGalponero" class="form-control" placeholder="Mujica Navarro">
						</div>
						<!-- TELEFONO	 -->
						<div class="input-group input-group-sm mb-3 ">
							<div class="input-group-prepend">
								<label for="telefono" class="input-group-text">
									Teléfono
								</label>
							</div>
							<input type="text" name="telefono" id="telefono" class="form-control" placeholder="04162244105">
						</div>
						<!-- EMAIL -->
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<label for="emal" class="input-group-text">
									Email
								</label>
							</div>
							<input class="form-control" type="email" id="emal" name="emal" placeholder="ejemplo@gmail.com"></input>
						</div>
						<!-- BOTONES GUARDAR Y CANCELAR -->
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</form> 
					<!-- TABLA COMPRAS PREVIAMENTE REGISTRADAS -->
					<div class="col-lg-7">
						<table class="table table-striped table-responsive-lg p-0 tablas table-sm text-center" id="tablaGalponeros">
							<thead class="table-info" >
								<th>Documento</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Activo</th>
								<th>Acción</th>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>
										<span class="badge badge-info">Activo</span>
									</td>
									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->
									<td>
										<button class="btn btn-info btn-sm editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>