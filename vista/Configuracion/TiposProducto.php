<div class="modal fade" id="TipoProducto">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/transportador.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Productos</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formularioAgregarProducto" class="col-lg-6 mb-3 mb-lg-0 ">
						<!-- NOMBRE TIPO Venta -->
						<h6>A continuación...<br>Elija un tipo de producto</h6>
						<div class="input-group input-group-sm mb-3 col-11">
							<div class="input-group-prepend"><label class="input-group-text">Tipo producto</label></div>
							<select name="idTipoProducto" id="idTipoProducto" class="form-control">
							</select>
						</div>
						<p>Ahora, indique los productos pertenecientes a él</p>
						<div class="input-group input-group-sm mb-3 col-11">
						  	<div class="input-group-prepend">
						    	<label class="input-group-text">Nombre</label>
						  	</div>
						  	<input class="form-control" type="text" name="nombreProducto"></input>
						</div>
						<div class="input-group input-group-sm">
							<div class="input-group-prepend"><label class="input-group-text">Proveedor</label></div>
							<select name="idProveedorProducto" id="idProveedorProducto" class="form-control"></select>
							<div class="input-group-append">
								<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#Proveedores">+</button>
							</div>
							</div>
						</div>
						<!-- BOTONES - AGREGAR Y CANCELAR -->
						<button type="submit" class="btn btn-primary btn-sm text-white btn-block mt-4" >Guardar</button>
						<button type="button" class="btn btn-outline-danger mb-3 btn-sm btn-block"data-dismiss="modal">Cancelar</button>
					
					</form>
					<div class="col-lg-6 table-scrolly">
					<p>Productos pertenecientes al tipo escogido</p>
						<table class="table table-striped table-responsive-sm p-0 tablas table-sm text-center" id="tablaProducto">
							<thead class="table-info" >
								<th>Nombre</th>
								<th>Proveedor</th>
								<th>Editar</th>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->