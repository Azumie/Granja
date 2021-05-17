<div class="card bg-dark text-white">
	<div class="card-body">
		<div class="row "style="position: relative; top: -2em;">
			<div class="col-auto d-flex amarillo p-2 mt-2 mt-md-0" style=" border-radius: 5px; left:1em">
				<img src="https://image.flaticon.com/icons/png/128/3628/3628652.png" height="40px" class="align-self-center">
			</div>
			<div class="col-9 col-md-10 text-white"><h4 class="mt-3 ml-2">Agregar <br>Lote</h4></div>
			<button type="button" class="close text-white ml-3 ml-md-5" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true" class="white-text">&times;</span>
			</button>
		</div>
		<div class="row">
			<div class="col-5">
				<div class="row justify-content-between">
					<h6 class="col-auto">Información del lote</h6>
					<div class="custom-control custom-checkbox col-2 mr-3">
						<input type="checkbox" class="custom-control-input mt-3" id="Levante" name="Levante" checked disabled>
						<label class="custom-control-label mb-2" for="Levante">Levante</label>
					</div>
				</div>
				
				<div class="input-group mb-4">
					<div class="input-group-prepend">
						<label for="inicioLote" class="input-group-text">Inicio</label>
					</div>
					<input type="date" name="inicioLote" id="inicioLote" class="form-control" min="2000-01-01" value="<?php echo date("Y-m-d");?>" required>
				</div>
				<div class="input-group mb-4">
					<div class="input-group-prepend">
						<span class="input-group-text">Línea Genética</span>
					</div>
					<select class="form-control idSector" name="idSector" id="idSector">
						<option value="">hoka</option>
						<option value="wapo">wapo</option>
						<option value="">como</option>
						<option value="">estas</option>
						<option value="tu">tu</option>
					</select>
				</div>
				<div class="input-group mb-4">
					<div class="input-group-prepend">
						<span class="input-group-text">Cantidad de Gallinas</span>
					</div>
					<input type="number" name="numeroGalpon" id="numeroGalpon" class="form-control" min="1" max="100" required>
				</div>
				<div class="row justify-content-center">
					<button class="btn btn-info btn-block col-6">Agregar</button>
				</div>
				
				
			</div>
			<div class="col-7">
				<div class="row justify-content-center">
					<label for="galpones" class="col-12">Información a los galpones a los que se unirá</label>
					<div class="col-12">
						<table id="tablaModulos" class="table  table-striped w-100 text-center">
							<thead class="bg-info">
								<th>Galpón</th>
								<th>Agregar</th>
								<th>Fecha Inicio</th>
								<th>Gallinas</th>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="aLote" name="aLote">
											<label class="custom-control-label" for="aLote"> Si</label>
										</div></td>
										<td><input type="date" name="inicioG" id="inicioG" class="form-control" min="2000-01-01" value="<?php echo date("Y-m-d");?>" required></td>
										<td><input type="number" name="numG" id="numG" class="form-control" required></td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>