<div class="modal fade" id="Consumos">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="https://image.flaticon.com/icons/png/128/2390/2390240.png" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Consumos</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-5 mb-3 mb-lg-0 ">

						<!-- RADIO BUTTON - GRANJA O GALPON -->

						<div class="form-check mb-3">
							<label class="form-check-label mr-5">
								<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
								Granja
							</label>
							<label class="form-check-label">
								<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
								Galpon en Lote
							</label>
						</div>

						<!-- SELECT GALPON EN LOTE O GRANJA -->

						<div class="input-group input-group-sm mb-3 ">
						  	<div class="input-group-prepend">
						    	<label for="idGalponEnLote" class="input-group-text">
						    		Granja - Galpón en Lote
						    	</label>
						  	</div>
							<select id="idGalponEnLote" class="form-control" name="idGalponEnLote">
								<option selected disabled>Elegir Galpón en Lote</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>

						<!-- FECHA DE LA COMPRA -->

						<div class="input-group input-group-sm mb-3">
						  	<div class="input-group-prepend">
						    	<label for="fechaCompra" class="input-group-text">
						    		Fecha Compra
						    	</label>
						  	</div>
						  	<input class="form-control" type="date" id="fechaCompra" name="fechaCompra"></input>
						</div>

						<hr>

						<div class="row">

							<!-- TIPO DE PRODUCTO -->

							<div class="input-group input-group-sm mb-3 col-md-6">
							  	<div class="input-group-prepend">
							    	<label for="idTipoProducto" class="input-group-text">
							    		Tipo Producto
							    	</label>
							  	</div>
								<select id="idTipoProducto" class="form-control" name="idTipoProducto">
									<option selected disabled>Elegir Galpón en Lote</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>

							<!-- PRODUCTO -->

							<div class="input-group input-group-sm mb-3  col-md-6">
							  	<div class="input-group-prepend">
							    	<label for="idProducto" class="input-group-text">
							    		Producto
							    	</label>
							  	</div>
								<select id="idProducto" class="form-control" name="idProducto">
									<option selected disabled>Elegir Galpón en Lote</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>

							<!-- CANTIDAD -->

							<div class="input-group input-group-sm mb-3  col-md-11">
							  	<div class="input-group-prepend">
							    	<label for="cantidadProducto" class="input-group-text">
							    		Cantidad
							    	</label>
							  	</div>
							  	<input class="form-control" type="number" id="cantidadProducto" name="cantidadProducto"></input>
							</div>

							<!-- BOTON AGREGAR A DETALLE CONSUMO -->

							<button class="btn btn-info font-weight-bold  col-md-auto h-100">+</button>
						</div>

						<!-- TABLA DEL DETALLE DE LA COMPRA -->

						<table class="table table-striped table-responsive-lg p-0 tablas table-sm text-center">
							<thead class="table-warning">
								<th>Tipo</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Borrar</th>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
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
								<th>Galpón en lote</th>
								<th>Alimento</th>
								<th>Cantidad</th>
								<th>Editar</th>
							</thead>
							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->

									<td>
										<button class="btn btn-sm btn-info rounded-circle"><i class="fas fa-pen-fancy"></i></button>
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