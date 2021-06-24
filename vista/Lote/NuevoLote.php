<div class="modal fade" id="NuevoLote">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/polluelo.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Nuevo Lote</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formularioNuevoLote" class="col-md-6">

						<!-- el id de la granja esta en la session del usuario -->

							<!-- FECHA DE COMPRA -->

							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<label for='fechaCompraGallinas' class="input-group-text">Fecha Compra</label>
								</div>
								<input type="date" name="fechaOperacion" id="fechaCompraGallinas" class="form-control">
							</div>

						<!-- PROVEEDOR DE LAS GALLINAS -->

						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label for="documentoProveedorLote" class="input-group-text">Proveedor</label>
							</div>
							<select id="documentoProveedorLote" name="documentoProveedor" class="form-control">
								<option disabled selected>Escoge al proveedor</option>
							</select>
						</div>

							<!-- PRECIO DE LAS GALLIANS -->

							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text">Precio</label>
								</div>
								<input type="number" name="precioProducto" id="precioGallinas" class="form-control" placeholder="">
							</div>
						
							<!-- CANTIDAD TOTAL DE GALLINAS -->

							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text">Gallinas totales</label>
								</div>
								<input type="number" name="cantidadProducto" id="cantidadGallinas Total" class="form-control" placeholder="">
							</div>

							<!-- FECHA DE INICIO DEL LOTE -->

							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text">Fecha Inicio</label>
								</div>
								<input type="date" id="fechaInicioNuevoLote" name="fechaInicio" class="form-control">
							</div>

						<!-- LINEA GENETICA -->

						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label class="input-group-text">Línea Genética</label>
							</div>
							<select id="idLineaNuevoLote" name="idLineaGenetica" class="form-control">
								<option disabled selected value=''>Escoge la Línea Genética</option>
							</select>
						</div>


						<!-- lOTE -->

							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text">Numero de Lote</label>
								</div>
								<input type="number" name="numeroLote" id="numeroLote" placeholder="Número del lote" class="form-control">
							</div>

							<p>Asignar gallinas a los galpones</p>

							<!-- ID LOTET -->

							<input type="hidden" name="idLote" id="idLote">

							<!-- IDGALPON -->

							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<label for="idGalponLote" class="input-group-text">Galpon</label>
								</div>
								<select id="idGalponLote" name="idGalpon" class="form-control">
									<option disabled selected value=''>Escoge un galpon</option>
								</select>
							</div>

							<!-- NUMERO DE GALLINAS POR GALPON -->

							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<label class="input-group-text">N° Gallinas</label>
								</div>
								<input type="number" name="cantidadGallinas" id="cantidadGallinas" class="form-control" placeholder="">
							</div>

							<!-- AGREGAR GALPON EN LOTE -->

							<button id="agregarGalonLote" type="button" class="btn btn-info btn-block btn-sm mb-2">Agregar Galpon Al lote</button>

							<table id="tablaGalponesLotes" class="table table-responsive-sm table-sm table-striped mb-3">
								<thead class="table-info">
									<th>Galpon</th>
									<th>Numero de Gallinas</th>
									<th>borrar</th>
								</thead>
								<tbody>
									
								</tbody>
							</table>

						<!-- BOTONES GUARDAR Y CANCELAR -->
	
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</form>
					<div class="col-md-6">
						<table class="table table-sm table-striped">
							<thead>
								
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div><!-- /.modal-dialog -->
	</div>