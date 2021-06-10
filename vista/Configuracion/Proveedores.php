<div class="modal fade" id="Proveedores">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/equipo.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Proveedores</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formularioProveedores" class="col-lg-5 mb-3 mb-lg-0 ">

						<!-- DOCUMENTO -->
						<div class="row">
							<h6 class="ml-2">A continuación...<br>Proporcione la información referente al proveedor </h6>
							<div class="input-group input-group-sm mb-3 col-md-10">
						  	<div class="input-group-prepend">
						    	<label for="idProveedor" class="input-group-text">
						    		Documento
						    	</label>
						  	</div>
						  	<select id='nacionalidad' name="nacionalidad" class="form-control" style="max-width: 25%">
						  		<option>V</option>
						  		<option>R</option>
						  	</select>
								<input type="text" name="documento" id="documento" class="form-control" minlength="7" maxlength="9">
							</div>
							<div class="form-check col-md-2">
				        <input class="form-check-input" type="checkbox" id="activoProveedor" name="activoProveedor" checked>
				        <label class="form-check-label" for="activoProveedor">
				          Activo
				        </label>
				      </div>

						</div>
						<!-- NOMBRES Proveedor -->

						<div class="input-group input-group-sm mb-3 ">
					  	<div class="input-group-prepend">
					    	<label for="nombresProveedor" class="input-group-text">
					    		Nombre Proveedor
					    	</label>
					  	</div>
							<input type="text" name="nombresProveedor" class="form-control" minlength="2" maxlength="40">
						</div>

						<!-- APELLIDOS Proveedor -->

						<div class="input-group input-group-sm mb-3 ">
					  	<div class="input-group-prepend">
					    	<label for="apellidosProveedor" class="input-group-text">
					    		Apellidos
					    	</label>
					  	</div>
							<input type="text" name="apellidosProveedor" id="apellidosProveedor" class="form-control" minlength="2" maxlength="40">
						</div>

						<!-- TELEFONO	 -->

						<div class="input-group input-group-sm mb-3 ">
					  	<div class="input-group-prepend">
					    	<label for="telefonoProveedor" class="input-group-text">
					    		Teléfono
					    	</label>
					  	</div>
							<input type="text" name="telefonoProveedor" id="telefonoProveedor" class="form-control">
						</div>


						<!-- EMAIL -->

						<div class="input-group input-group-sm mb-3">
						  	<div class="input-group-prepend">
						    	<label for="emailProveedor" class="input-group-text">
						    		Email
						    	</label>
						  	</div>
						  	<input class="form-control" type="email" id="emailProveedor" name="emailProveedor"></input>
						</div>

						<!-- BOTONES GUARDAR Y CANCELAR -->
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</form>

					<!-- TABLA COMPRAS PREVIAMENTE REGISTRADAS -->

					<div class="col-lg-7">
						<p>Edite o busque mayor información acerca de un Proveedor</p>
						<table class="table table-striped table-responsive p-0 tablas table-sm" id="tablaProveedor">
							<thead class="table-info" >
								<th>Documento</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Teléfono</th>
								<th>Email</th>
								<th>Activo</th>
								<th>Editar</th>
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
										<button type="button" class="btn btn-info btn-sm rounded-circle"><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->