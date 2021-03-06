<div class="modal fade " id="AgregarGalpon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-fluid" role="document">
		<!--Content-->
		<div class="modal-content modales">
			<div class="modal-body">
				<div class="row "style="position: relative; top: -2em;">
					<div class="col-auto d-flex amarillo p-2" style=" border-radius: 5px; left:1em">
						<!-- <path id="Circulo---imagotipo"></path> -->
						<img src="https://image.flaticon.com/icons/png/128/1037/1037122.png" height="40px" class="align-self-center">
					</div>
					<div class="col-9 col-md-10 text-dark"><h4 class="mt-3 ml-2">Agregar <br>Galpón</h4></div>
					<button type="button" class="close text-white ml-3 ml-md-5" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="white-text">&times;</span>
					</button>
				</div>
				
				<div class="row justify-content-center">
					<div class="col-12 col-md-8 mb-4">
						<div class="row justify-content-center">
							<div class="input-group input-group-sm mb-4 col-12 col-md-10">
								<div class="input-group-prepend">
									<span class="input-group-text">Granja</span>
								</div>
								<select class="form-control idSector" name="idSector" id="idSector">
								</select>
							</div>
							<div class="col-auto">
								<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input  mt-2" id="activo" name="activo"disabled checked>
										<label class="custom-control-label mt-1" for="activo">Activo</label>
									</div>
							</div>
							<div class="col-10 col-md-5">
								<div class="input-group input-group-sm mb-4">
									<div class="input-group-prepend">
										<span class="input-group-text">Confinamiento</span>
									</div>
									<select class="form-control idSector" name="idSector" id="idSector">
										<option value="">Piso</option>
										<option value="">Jaula</option>
									</select>
								</div>
							</div>
							<div class="col-10 col-md-7">
								<div class="input-group input-group-sm mb-4">
									<div class="input-group-prepend">
										<span class="input-group-text">Número Galpón</span>
									</div>
									<input type="number" name="numeroGalpon" id="numeroGalpon" class="form-control" min="1" max="100" required>
								</div>
							</div>
							<div class="input-group input-group-sm mb-4 col-11 col-md-9">
								<div class="input-group-prepend">
									<label for="inicioLote" class="input-group-text">Inicio G.</label>
								</div>
								<input type="date" name="inicioLote" id="inicioLote" class="form-control" min="2000-01-01" value="<?php echo date("Y-m-d");?>" required>
							</div>
							<button class="btn btn-block col-8 btn-info">Guardar</button>
						</div>
					</div>
					<div class="col-4 d-flex">
						<img src="assets/img/granero.png" class="cir">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>