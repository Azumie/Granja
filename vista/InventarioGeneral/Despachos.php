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
					<div class="col-lg-5 mb-3 mb-lg-0">
						<div class="row">
							<p class="ml-3">A continuación...<br>Ingresa la información pertinente a los despachos realizados.</p>
							<div class="col-md-11 input-group input-group-sm mb-3 ">
							  	<div class="input-group-prepend">
							    	<label for="idCliente" class="input-group-text">
							    		Cliente
							    	</label>
							  	</div>
								<select id="idCliente" class="form-control" name="idCliente">
									<option selected disabled>Elegir Cliente</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
							<div class="input-group input-group-sm mb-3 col-12">
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
							<div class="input-group input-group-sm mb-3 col-12">
							  	<div class="input-group-prepend">
							    	<label for="precinto" class="input-group-text">
							    		Precinto
							    	</label>
							  	</div>
							  	<input type="text" name="precinto" id="precinto" class="form-control" placeholder='Número de precinto'>
						</div>
						<div class="input-group input-group-sm mb-3 col-12">
						  	<div class="input-group-prepend">
						    	<label for="fechaDespacho" class="input-group-text">
						    		Fecha Despacho
						    	</label>
						  	</div>
						  	<input class="form-control" type="date" id="fechaDespacho" name="fechaDespacho"></input>
						</div>
						<div class="row justify-content-center">
						<p class="ml-4">Indique los productos vendidos y presione en el botón + para adicionarlo a la cola.</p>
						<div class="input-group input-group-sm mb-3 col-md-10">
						  	<div class="input-group-prepend">
						    	<label for="idTipoHuevo" class="input-group-text">
						    		Tipo Huevo
						    	</label>
						  	</div>
							<select id="idTipoHuevoDespacho" class="form-control" name="idTipoHuevo">
								<option selected disabled>Elegir Tipo de Huevo</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<div class="input-group input-group-sm mb-3 col-md-10">
						  	<div class="input-group-prepend">
						    	<label for="cantidadHuevos" class="input-group-text">
						    		Cantidad
						    	</label>
						  	</div>
						  	<input class="form-control" type="number" id="cantidadHuevos" name="cantidadHuevos"></input>
						</div>
						<!-- Adicionar a la cola los productos vendidos -->
						<button class="btn btn-info btn-sm col-6 col-md-3 justify-content-center mb-2">+</button>
						</div>
						<table class="table table-striped table-lg p-0 tablas table-sm text-center col-12 ml-1">
							<thead class="table-info">
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
						</div>
						<div class="row justify-content-between">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-1 mr-4 mr-md-0 mb-3"><strong>Guardar</strong></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><strong>Cancelar</strong></button>
						</div>
						
					</div><!-- col-lg-5 -->
					<div class="col-lg-7">
						<table class="table table-striped table-responsive-lg p-0 tablas table-sm">
							<thead class="table-info" >
								<th>Fecha</th>
								<th>precinto</th>
								<th>Total Huevos</th>
								<th>Acción</th>
							</thead>
							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>
										<button class="btn btn-info btn-sm rounded-circle"><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>

							</tbody>
						</table>
					</div> <!-- col-lg-7 -->
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->