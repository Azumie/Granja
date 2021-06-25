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
					<form id="formularioConsumos" class="col-lg-5 mb-3 mb-lg-0 ">

						<!-- SELECT GALPON EN LOTE O GRANJA -->

						<div class="input-group input-group-sm mb-3 ">
						  	<div class="input-group-prepend">
						    	<label for="idGalponConsumo" class="input-group-text">
						    		Galpón en Lote
						    	</label>
						  	</div>
							<select id="idGalponConsumo" name="idGalponEnLote" class="form-control">
								<option selected disabled>Elegir Galpón en Lote</option>
							</select>
						</div>

						<!-- FECHA DE LA COMPRA -->

						<div class="input-group input-group-sm mb-3">
						  	<div class="input-group-prepend">
						    	<label for="fechaConsumo" class="input-group-text">
						    		Fecha Compra
						    	</label>
						  	</div>
						  	<input class="form-control" type="date" id="fechaConsumo" name="fechaOperacion"></input>
						</div>

						<hr>

						<div class="row">

							<!-- PRODUCTO -->

							<div class="input-group input-group-sm mb-3  col-md-6">
							  	<div class="input-group-prepend">
							    	<label for="idProducto" class="input-group-text">
							    		Producto
							    	</label>
							  	</div>
								<select id="idProducto" class="form-control" name="alimentoAUsar">
									<option selected disabled>Elegir Galpón en Lote</option>
								</select>
							</div>

							<!-- CANTIDAD -->

							<div class="input-group input-group-sm mb-3  col-md-11">
							  	<div class="input-group-prepend">
							    	<label for="cantidadProductoConsumido" class="input-group-text">
							    		Cantidad
							    	</label>
							  	</div>
							  	<input class="form-control" type="number" id="cantidadProductoConsumido" name="cantidadProducto"></input>
							</div>

							<!-- BOTON AGREGAR A DETALLE CONSUMO -->

							<button class="btn btn-info font-weight-bold btn-sm  col-md-auto h-100">+</button>
						</div>

						<!-- TABLA DEL DETALLE DE LA COMPRA -->

						<table class="table table-striped table-responsive-lg p-0 tablas table-sm text-center" id="tablaDetalleCompra">
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
					</form>

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
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->