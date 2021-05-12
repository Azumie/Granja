<div class="modal fade" id="Mortalidad">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Mortalidad</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-5 mb-3 mb-lg-0 ">
						<div class="input-group input-group-sm mb-2">
						  	<div class="input-group-prepend">
						    	<label for="idGalponEnLote" class="input-group-text">
						    		Galpón en Lote
						    	</label>
						  	</div>
							<select id="idGalponEnLote" class="form-control">
								<option selected disabled>Elejir Galpón en Lote</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div class="input-group input-group-sm mb-2">
						  <div class="input-group-prepend">
						    <label for="fechaMortalidad" class="input-group-text">Fecha</label>
						  </div>
						  <input type="date" class="form-control" id="fechaMortalidad" name="fechaMortalidad">
						</div>
						<div class="input-group input-group-sm mb-2">
						  <div class="input-group-prepend">
						    <label for="fechaMortalidad" class="input-group-text">Gallinas</label>
						  </div>
						  <input type="number" class="form-control" id="fechaMortalidad" name="fechaMortalidad">
						</div>
					</div>
					<div class="col-lg-7">
						<table class="table table-striped table-responsive-lg p-0 tablas table-sm text-center">
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
										<button class="btn btn-info rounded-circle btn-sm">
											<i class="fas fa-pen-fancy"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
				<button type="button" class="btn btn-danger">Cancelar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->