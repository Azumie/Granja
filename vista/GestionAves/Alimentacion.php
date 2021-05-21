<div class="modal fade" id="Alimentacion">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="https://www.flaticon.es/icono-premium/proteina-en-polvo_1764252?related_id=1764252" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Alimentación</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-5">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Galpón:</span>
							</div>
							<select id="idGalpónEnLote" class="form-control">
								<option disabled selected>Elige Galpón a alimentar</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Alimento:</span>
							</div>
							<select id="idGalpónEnLote" class="form-control">
								<option disabled selected>Elige el alimento a usar</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text">Cantidad</span>
							</div>
							<input type="number" name="" id="" class="form-control" min="1" max="100" required placeholder="Cantidad en Kg de alimento dado en total">
							<div class="input-group-append">
								<span class="input-group-text">Kg</span>
							</div>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text">Fecha de alimentación</div>
							</div>
							<input type="date" class="form-control">
						</div>
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</div>
					<div class="col-lg-7">
						<table class="table table-striped table-responsive-lg p-0 tablas table-sm">
							<thead class="bg-warning" >
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
										<button class="btn btn-danger editarGalpon" data-toggle="modal" data-target='#editarGalpon'><i class="fas fa-pen-fancy"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->