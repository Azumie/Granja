<div class="modal fade" id="TiposHuevo">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/transportador.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Tipos de Huevo</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formTiposHuevo" class="col-lg-5 mb-3 mb-lg-0 ">
						<h6>A continuación...<br>Proporcione la información referente al tipo de huevo</h6>
						<span id="estadoFormTipoHuevo">Agregando...</span>

						<!-- NOMBRE TIPO HUEVO -->

						<div class="input-group input-group-sm mb-3">
						  	<div class="input-group-prepend">
						    	<label for="nombreTipoHuevo" class="input-group-text">
						    		Nombre
						    	</label>
						  	</div>
						  	<input class="form-control" type="text" id="nombreTipoHuevo" name="nombreTipoHuevo"></input>
						</div>
						<input type="hidden" name="idTipoHuevo" id="idTipoHuevoEditar">

						<!-- BOTONES - AGREGAR Y CANCELAR -->

						<button class="btn btn-sm btn-primary btn-block mt-4">Guardar</button>
						<button type="button" class="btn btn-outline-danger btn-sm btn-block" data-dismiss="modal">Cancelar</button>
					</form>

					<!-- TABLA COMPRAS PREVIAMENTE REGISTRADAS -->

					<div class="col-lg-7">
						<p>Tipos de huevos agregados con anterioridad</p>
						<table id="tablaTiposHuevo" class=" datatable table table-striped table-responsive-lg p-0 tablas table-sm">
							<thead class="table-info" >
								<th campo='nombreTipoHuevo'>Nombre</th>
								<th campo='acciones'>Editar</th>
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