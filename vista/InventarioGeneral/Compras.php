<div class="modal fade" id="Compras">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Compras</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

						<div class="input-group mb-3 ">
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

						<!-- PROVEEDOR -->

						<div class="input-group mb-3 ">
						  	<div class="input-group-prepend">
						    	<label for="idProveeor" class="input-group-text">
						    		Proveedor
						    	</label>
						  	</div>
							<select id="idProveeor" class="form-control" name="idProveeor">
								<option selected disabled>Elegir Proveedor</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>

						<!-- FECHA DE LA COMPRA -->

						<div class="input-group mb-3">
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

							<div class="input-group mb-3 col-md-6">
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

							<div class="input-group mb-3  col-md-6">
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

							<div class="input-group mb-3  col-md-6">
							  	<div class="input-group-prepend">
							    	<label for="cantidadProducto" class="input-group-text">
							    		Cantidad
							    	</label>
							  	</div>
							  	<input class="form-control" type="number" id="cantidadProducto" name="cantidadProducto"></input>
							</div>

							<!-- PRECIO -->

							<div class="input-group mb-3  col-md-5">
							  	<div class="input-group-prepend">
							    	<label for="precioProducto" class="input-group-text">
							    		Precio
							    	</label>
							  	</div>
								<input id="precioProducto" class="form-control" name="precioProducto">
							</div>
							<button class="btn btn-info col-md-auto h-100">+</button>
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

						<button type="button" class="btn btn-primary text-white  btn-block mt-4" data-dismiss="modal">Guardar</button>
						<button type="button" class="btn btn-outline-danger btn-block">Cancelar</button>
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
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->

									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->

									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->

									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->

									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->

									<td>
										<button class="btn btn-info editarGalpon rounded-circle" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
								<tr>
									<td></td>
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