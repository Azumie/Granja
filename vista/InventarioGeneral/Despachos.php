<div class="modal fade" id="Despachos">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="https://image.flaticon.com/icons/png/128/1374/1374123.png" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Despachos</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-5 mb-3 mb-lg-0 ">

						<!-- CLIENTE -->

						<div class="row">
							<div class="col-md-11 input-group mb-3 ">
						  	<div class="input-group-prepend">
						    	<label for="idClinete" class="input-group-text">
						    		Cliente
						    	</label>
						  	</div>
								<select id="idClinete" class="form-control" name="idClinete">
									<option selected disabled>Elegir Cliente</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
							<button class="btn btn-info col-md-auto h-100 mb-3">+</button>
						</div>

						<!-- TIPO DE VENTA -->

						<div class="input-group mb-3 ">
					  	<div class="input-group-prepend">
					    	<label for="idTipoVenta" class="input-group-text">
					    		Tipo Venta
					    	</label>
					  	</div>
							<select id="idTipoVenta" class="form-control" name="idTipoVenta">
								<option selected disabled>Elegir Tipo de Venta</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>

						<!-- PRECINTO -->

						<div class="input-group mb-3 ">
					  	<div class="input-group-prepend">
					    	<label for="precinto" class="input-group-text">
					    		Precinto
					    	</label>
					  	</div>
					  	<input type="text" name="precinto" id="precinto" class="form-control">
						</div>

						<!-- FECHA DEL DESPACHO -->

						<div class="input-group mb-3">
						  	<div class="input-group-prepend">
						    	<label for="fechaDespacho" class="input-group-text">
						    		Fecha Despacho
						    	</label>
						  	</div>
						  	<input class="form-control" type="date" id="fechaDespacho" name="fechaDespacho"></input>
						</div>

						<hr>

						<div class="row">

							<!-- TIPO DE HUEVO -->

							<div class="input-group mb-3 col-md-6">
							  	<div class="input-group-prepend">
							    	<label for="idTipoHuevo" class="input-group-text">
							    		Tipo Huevo
							    	</label>
							  	</div>
								<select id="idTipoHuevo" class="form-control" name="idTipoHuevo">
									<option selected disabled>Elegir Tipo de Huevo</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>

							<!-- CANTIDAD -->

							<div class="input-group mb-3  col-md-5">
							  	<div class="input-group-prepend">
							    	<label for="cantidadHuevos" class="input-group-text">
							    		Cantidad
							    	</label>
							  	</div>
							  	<input class="form-control" type="number" id="cantidadHuevos" name="cantidadHuevos"></input>
							</div>

							<!-- BOTON AGREGAR A DETALLE DESPACHO -->

							<button class="btn btn-info font-weight-bold  col-md-auto h-100">+</button>
						</div>

						<!-- TABLA DEL DETALLE DE LA COMPRA -->

						<table class="table table-striped table-responsive-lg p-0 tablas table-sm text-center">
							<thead class="table-warning">
								<th>Tipo de Huevo</th>
								<th>Cantidad</th>
								<th>Borrar</th>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td><i class="fa fa-trash"></i></td>
								</tr>
							</tbody>
						</table>

						<!-- BOTONES GUARDAR Y CANCELAR -->
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</div>

					<!-- TABLA COMPRAS PREVIAMENTE REGISTRADAS -->

					<div class="col-lg-7">
						<table class="table table-striped table-responsive-lg p-0 tablas table-sm">
							<thead class="table-info" >
								<th>Fecha</th>
								<th>precinto</th>
								<th>Total Huevos</th>
								<th>Editar</th>
							</thead>
							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>

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