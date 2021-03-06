<div class="modal fade" id="Clientes">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/cliente2.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Clientes</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id='formularioClientes' class="col-lg-5 mb-3 mb-lg-0 ">
						<div class="row">
							<h6 class="col-12">A continuación...<br>Proporcione la información referente al cliente </h6>
							<div class="input-group input-group-sm mb-3 col-md-10">
						  	<div class="input-group-prepend">
						    	<label for="documentoCliente" class="input-group-text">
						    		Documento
						    	</label>
						  	</div>
						  	<select id='nacionalidadCliente' name="nacionalidadCliente" class="form-control" style="max-width: 25%">
						  		<option>V</option>
						  		<option>R</option>
						  	</select>
								<input placeholder="Número de cédula" type="text" name="documentoCliente" id="documentoCliente" class="form-control">
							</div>
							<div class="form-check col-md-2">
				        <input class="form-check-input" type="checkbox" id="activoCliente" name="activoCliente" checked>
				        <label class="form-check-label" for="activo">
				          Activo
				        </label>
				      </div>

						</div>

						<!-- NOMBRES CLIENTE -->

						<div class="input-group input-group-sm mb-3 ">
					  	<div class="input-group-prepend">
					    	<label for="nombresCliente" class="input-group-text">
					    		Nombre
					    	</label>
					  	</div>
							<input placeholder="Nombres del cliente" type="text" name="nombresCliente" id="nombresCliente" class="form-control">
						</div>

						<!-- APELLIDOS CLIENTE -->

						<div class="input-group input-group-sm mb-3 ">
					  	<div class="input-group-prepend">
					    	<label for="apellidosCliente" class="input-group-text">
					    		Apellidos
					    	</label>
					  	</div>
							<input placeholder="Apellidos del cliente" type="text" name="apellidosCliente" id="apellidosCliente" class="form-control">
						</div>

						<!-- TELEFONO	 -->

						<div class="input-group input-group-sm mb-3 ">
					  	<div class="input-group-prepend">
					    	<label for="telefonoCliente" class="input-group-text">
					    		Teléfono
					    	</label>
					  	</div>
							<input placeholder="04161234567" type="text" name="telefonoCliente" id="telefonoCliente" class="form-control">
						</div>


						<!-- EMAIL -->

						<div class="input-group input-group-sm mb-3">
						  	<div class="input-group-prepend">
						    	<label for="emal" class="input-group-text">
						    		Email
						    	</label>
						  	</div>
						  	<input placeholder="Correo del cliente" class="form-control" type="emailCliente" id="emailCliente" name="emailCliente"></input>
						</div>

						<!-- BOTONES GUARDAR Y CANCELAR -->

						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button type="button" class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</form>

					<!-- TABLA COMPRAS PREVIAMENTE REGISTRADAS -->

					<div class="col-lg-7">
						<p>Clientes agregados con anterioridad</p>						<table class="datatable table table-striped table-responsive p-0 tablas table-sm" id="tablaCliente">
							<thead class="table-info" >
								<th>Documento</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Activo</th>
								<th>Editar</th>
							</thead>
							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										<span class="badge badge-info">Activo</span>
									</td>

									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->

									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
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