<div class="modal fade " id="Galpones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-fluid" role="document">
		<!--Content-->
		<div class="modal-content modales">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="https://image.flaticon.com/icons/png/128/1037/1037122.png" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Galpones</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row mt-2 justify-content-center">
					<div class="col-12 col-md-6">
					<h6>A continuación...<br>Proporcione la información referente al galpón</h6>
					<form id="formularioAgregarGalpon">
						<div class="input-group input-group-sm mb-4 col-12 col-lg-10">
							<div class="input-group-prepend">
								<span class="input-group-text">Fecha Creación</span>
							</div>
							<input type="date" class="form-control" name="fechaCreacionGalpon" id="fechaCreacionGalpon">
						</div>
						<div class="col-12 col-lg-10">
							<div class="input-group input-group-sm mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text">Galpón</span>
								</div>
								<input type="number" class="form-control" placeholder="Número de Galpón" name="numeroGalpon" min="0" max="500">
							</div>
						</div>
						<div class="col-12 col-lg-10">
							<div class="input-group input-group-sm mb-4">
								<div class="input-group-prepend">
									<div class="input-group-text">Área útil</div>
								</div>
								<input type="number" class="form-control" placeholder="Área útil del galpón" name="areaUtilGalpon" min="100" max="2000" step="0.01">
							</div>
						</div>
						<div class="input-group input-group-sm mb-4 col-12 col-lg-10">
							<div class="input-group-prepend">
								<div class="input-group-text">Confinamiento</div>
							</div>
							<select name="ConfinamientoGalpon" id="ConfinamientoGalpon" class="form-control">
								<option disabled selected value=''>Forma de resguarde</option>
								<option value="P">Piso</option>
								<option value="J">Jaula</option>
							</select>
						</div>
						<div class="row justify-content-center d-flex">
							<button type="submit" class="btn btn-primary btn-sm col-md-5 form-control text-white ml-4 ml-md-0 mr-4 mr-md-0 mb-3"><strong>Guardar</strong></button>
							<button type="button" class="btn btn-outline-danger btn-sm col-md-5 form-control ml-4 mr-4 mr-md-0 mb-3" id="cancelarGalpones"><strong>Cancelar</strong></button>
						</div>
					</form>
					</div>
					<div class="col-12 col-md-6 table-scrolly">
						<p>Galpones agregados con anterioridad</p>
						<table class="table table-striped table-responsive p-0 table-sm text-center" id="tablaGalpon">
							<thead class="table-info">
								<th>Número Galpón</th>
								<th>Área útil</th>
								<th>N° gallinas actuales</th>
								<th>Confinamiento</th>
								<th>Inicio del Lote</th>
								<th>Acción</th>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>