<div class="modal fade" id="Mortalidad">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content">
			<div class="modal-header iconosModales mt-2 mt-md-0">
				<div class="col-auto bg-warning p-2 icono">
					<img src="https://image.flaticon.com/icons/png/128/1979/1979819.png" height="40px" class="align-self-center">
				</div>
				<h4 class="modal-title mt-3 ml-2">Mortalidad</h4>
				<button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formularioMortalidad" class="col-lg-5 mb-3 mb-lg-0 align-self-center h-50">
						<h6>A continuación... <br> Ingrese la información de la <em>mortalidad</em> de las gallinas:</h6>
						<div class="input-group input-group-sm mb-2 ">
							<div class="input-group-prepend">
								<label for="idGalponEnLoteMortalidad" class="input-group-text">
									Galpón
								</label>
							</div>
							<select id="idGalponEnLoteMortalidad" name="idGalponEnLote" class="form-control">
								<option selected disabled>Elegir Galpón en Lote</option>
							</select>
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label for="fechaMortalidad" class="input-group-text">Fecha</label>
							</div>
							<input type="date" class="form-control" id="fechaMortalidad" name="fechaOperacion">
						</div>
						<div class="input-group input-group-sm mb-2">
							<div class="input-group-prepend">
								<label for="GallinaMortalidad" class="input-group-text">Gallinas</label>
							</div>
							<input type="number" class="form-control" id="GallinaMortalidad" name="cantidadProducto" placeholder="Cant. de Gallinas">
						</div>

						<input type="hidden" name="idInventario" id="idInventarioMortalidad" disabled="true">

						<div class="row justify-content-center d-flex">
							<button class="btn btn-primary btn-sm col-5 form-control text-white"><i class="far fa-save mr-4"></i><strong>Guardar</strong><i class="far fa-save ml-4"></i></button>
							<button class="btn btn-outline-danger btn-sm col-5 form-control ml-4"><i class="fas fa-ban mr-4"></i><strong>Cancelar</strong><i class="fas fa-ban ml-4"></i></button>
						</div>
					</form>
					<div class="col-lg-7 table-scrolly">
						<p>Cantidad de gallinas que han perecido a lo largo del tiempo.</p>
						<table class="table table-striped table-responsive-sm p-0 tablas table-sm text-center" id="tablaMortalidad">
							<thead class="table-info" >
								<th campo='fechaOperacion'>Fecha</th>
								<th campo='numeroGalpon'>Galpón</th>
								<th campo='cantidadProducto'>Cantidad</th>
								<th campo='acciones'>Acción</th>
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