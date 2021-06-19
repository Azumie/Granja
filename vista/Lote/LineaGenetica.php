<div class="modal fade" id="LineaGenetica">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/transportador.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Línea genética</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formularioLineaGenetica" class="col-md-6">
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label class="input-group-text">Nombre</label>
							</div>
							<input type="text" class="form-control" placeholder="Nombre de la Línea Genética" name="nombreLineaGenetica" id="nombreLineaGenetica">
						</div>
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><strong>Guardar</strong></button>
							<button type="button" class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><strong>Cancelar</strong></button>
						</div>
					</form>
					<div class="col-md-6">
						<table class="datatable table table-sm text-center table-sm table-striped" id="tablaLineaGenetica">
							<thead class="table-info">
								<th>Nombre</th>
								<th>Acción</th>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div><!-- /.modal-dialog -->
	</div>