<div class="modal fade" id="Produccion">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="assets/img/transportador.svg" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Producción</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<h6>A continuación... <br> Ingrese la información de la <em>producción</em> del día:</h6>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label for="GProduccion" class="input-group-text">
									Galpón en Lote
								</label>
							</div>
							<select id="GProduccion" class="form-control">
								<option selected disabled>Elegir Galpón en Lote</option>
							</select>
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label for="fechaProduccion" class="input-group-text">Fecha</label>
							</div>
							<input type="date" class="form-control" id="fechaProduccion" name="fechaProduccion">
						</div>
						<table class="table table-responsive p-0 table-sm text-center col-12">
							<thead class="table-info" >
								<th>Grandes</th>
								<th>Medianos</th>
								<th>Pequeños</th>
								<th>Picados</th>
								<th>Débil</th>
								<th>Derramados</th>
								<th>Rústicos</th>
								<th>Pool</th>
							</thead>
							<tbody class="table-light">
								<tr>
									<td><input type="number" id="Grandes" name="Grandes"></td>
									<td><input type="number" id="Medianos" name="Medianos"></td>
									<td><input type="number" id="Pequeños" name="Pequeños"></td>
									<td><input type="number" id="Picados" name="Picados"></td>
									<td><input type="number" id="Debil" name="Debil"></td>
									<td><input type="number" id="Derramados" name="Derramados"></td>
									<td><input type="number" id="Rusticos" name="Rusticos"></td>
									<td><input type="number" id="Pool" name="Pool"></td>
								</tr>
							</tbody>
						</table>
						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</div>
					<div class="col-md-6">
						<table class="table table-sm text-center">
							<thead class="table-info">
								<th>Fecha</th>
								<th>Galpón</th>
								<th>Producción</th>
							</thead>
							<tbody class="table-light">
								<tr>
									<td>h</td>
									<td>a</td>
									<td>s</td>
								</tr>
								<tr>
									<td>h</td>
									<td>a</td>
									<td>s</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- https://image.flaticon.com/icons/png/128/4668/4668923.png
		https://image.flaticon.com/icons/png/128/1979/1979819.png
		https://www.google.com/search?q=medidas+en+bootstrap&sxsrf=ALeKk02VGb5eHsXGtRx1egKJknSEpj_9tw:1621195165468&source=lnms&tbm=isch&sa=X&ved=2ahUKEwi9rMvP_s7wAhXMhOAKHcGuBvwQ_AUoAXoECAEQAw&biw=1024&bih=578#imgrc=VHNtPBA5DBIkZM
		https://es.stackoverflow.com/questions/59044/asignar-tama%C3%B1o-fijo-a-las-columnas-de-una-tabla-html/59053-->