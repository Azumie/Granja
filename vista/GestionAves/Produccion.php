<style>
/*.tablaProduccion th, .tablaProduccion td {
    width: 11em;
}*/
</style>
<div class="modal fade" id="Produccion">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content modales">
			<div class="modal-body modales">
				<div class="row "style="position: relative; top: -2em;">
					<div class="col-auto d-flex amarillo p-2" style=" border-radius: 5px; left:1em">
						<img src="https://image.flaticon.com/icons/png/128/1979/1979819.png" height="40px" class="align-self-center">
					</div>
					<div class="col-9 col-md-10 text-dark"><h4 class="mt-3 ml-2">Producción</h4></div>
					<button type="button" class="close ml-3 ml-md-5 mt-4" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="white-text">&times;</span>
					</button>
				</div>
				<div class="row">
					<div class="col-6">
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
						<table class="table table-responsive p-0 table-sm text-center col-12 tablaProduccion">
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
					</div>
					<div class="col-6">
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
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="justify-content-center">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
			<button type="button" class="btn btn-danger">Cancelar</button>
		</div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
			<!-- https://image.flaticon.com/icons/png/128/4668/4668923.png
			https://image.flaticon.com/icons/png/128/1979/1979819.png  
			https://www.google.com/search?q=medidas+en+bootstrap&sxsrf=ALeKk02VGb5eHsXGtRx1egKJknSEpj_9tw:1621195165468&source=lnms&tbm=isch&sa=X&ved=2ahUKEwi9rMvP_s7wAhXMhOAKHcGuBvwQ_AUoAXoECAEQAw&biw=1024&bih=578#imgrc=VHNtPBA5DBIkZM
			https://es.stackoverflow.com/questions/59044/asignar-tama%C3%B1o-fijo-a-las-columnas-de-una-tabla-html/59053-->