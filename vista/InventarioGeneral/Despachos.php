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
					<form id="formularioDespachos" class="col-lg-5 mb-3 mb-lg-0">
							<p class="">A continuación...<br>Ingresa la información pertinente a los despachos realizados.</p>
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<label for="fechaDespacho" class="input-group-text">
										Fecha Despacho
									</label>
								</div>
								<input class="form-control" type="date" id="fechaDespacho" name="fechaDespacho"></input>
							</div>
							<div class="input-group input-group-sm mb-3 ">
								<div class="input-group-prepend">
									<label for="idCliente" class="input-group-text">
										Cliente
									</label>
								</div>
								<select id="idCliente" name="idCliente" class="form-control" name="idCliente">
									<option selected disabled>Elegir Cliente</option>
								</select>
							</div>
							<div class="input-group input-group-sm mb-3">
								<div class="input-group-prepend">
									<label for="precinto" class="input-group-text">
										Precinto
									</label>
								</div>
								<input type="text" name="precinto" id="precinto" class="form-control" placeholder='Número de precinto'>
								<input type="hidden" name="idDespachos" id="idDespachos">
							</div>

							
							<p class="col-12">Indique los productos vendidos y presione en el botón + para adicionarlo a la cola.</p>
							
							<table id="tablaDetalleDespacho" class="table table-responsive-sm p-0 table-sm text-center col-12 table-striped">
								<thead class="table-info" >
									<th campo='nombreTipoHuevo'>Tipo de Huevo</th>
									<th campo='cantidadProduccion'>Cantidad</th>
								</thead>
								<tbody>
								</tbody>
							</table>
							<div class="row justify-content-center d-flex">
								<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
								<button type="button" id="resetFormularioPoduccion" class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
							</div>
						
					</form><!-- col-lg-5 -->
						<div class="col-lg-7">
							<table class="table table-striped table-responsive-lg p-0 tablas table-sm" id="tablaDespachos">
								<thead class="table-info" >
									<th campo='fechaInventarioProduccion'>Fecha</th>
									<th campo='produccion'>Producción</th>
									<th campo='documentoCliente'>Galpón</th>
									<th campo='precinto'>Precinto</th>
									<th campo='acciones'>Acción</th>
								</thead>
								<tbody>
								</tbody>
							</table>
							</div> <!-- col-lg-7 -->
						</div>
					</div>
					</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->