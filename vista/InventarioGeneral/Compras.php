<div class="modal fade" id="Compras">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="https://image.flaticon.com/icons/png/128/1077/1077999.png" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Compras</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formularioCompras" class="col-lg-5 mb-3 mb-lg-0 ">
						<p>A continuación...<br>Ingrese la información de la compra realizada.</p>
					
						<!-- FECHA DE LA COMPRA -->

						<div class="input-group input-group-sm mb-3">
						  	<div class="input-group-prepend">
						    	<label for="fechaCompra" class="input-group-text">
						    		Fecha Compra
						    	</label>
						  	</div>
						  	<input class="form-control" type="date" id="fechaCompra" name="fechaCompra"></input>
						</div>
						<button type="button" class="my-3 btn btn-info btn-block btn-sm" id="agregarProducto">Agregar producto</button>

						<!-- TABLA DEL DETALLE DE LA COMPRA -->

						<table id='tablaAgregarProductos' class="table table-striped table-responsive p-0 tablas table-sm text-center">
							<thead class="table-info">
								<th>Proveedor</th>
								<th>Tipo</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Borrar</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<select id="idProveeor" class="form-control" name="idProveeor">
											<option selected disabled>Elegir Proveedor</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</td>
									<td>
										<select id="idTipoProducto" class="form-control" name="idTipoProducto">
											<option selected disabled>Elegir Galpón en Lote</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</td>
									<td>
										<select id="idProducto" class="form-control" name="idProducto">
											<option selected disabled>Elegir Galpón en Lote</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</td>
									<td>
							  		<input class="form-control" type="number" id="cantidadProducto" name="cantidadProducto"></input>
									</td>
									<td> 
										<input id="precioProducto" class="form-control" name="precioProducto">
									</td>
									<td class="borrar"><i class="fa fa-trash btn btn-danger borrar"></i></td>
								</tr>
							</tbody>
						</table>

						<!-- BOTONES GUARDAR Y CANCELAR -->
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</form>

					<!-- TABLA COMPRAS PREVIAMENTE REGISTRADAS -->

					<div class="col-lg-7">
						<table class="table table-striped table-responsive-lg p-0 tablas table-sm">
							<thead class="table-info" >
								<th>Fecha</th>
								<th>Galpón en lote</th>
								<th>Alimento</th>
								<th>Cantidad</th>
								<th>Acción</th>
							</thead>
							<tbody>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>

									<!-- BUTTONS / MOSTRAR-EDITAR-ELIMINAR -->

									<td>
										<button class="btn btn-info btn-sm rounded-circle"><i class="fas fa-pen-fancy"></i></button>
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