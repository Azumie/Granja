<div class="row">

	<!-- FILTROS -->

	<form class="col-12 d-flex justify-content-center mb-4" id="formularioInicio">
		<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			<button type="button" class="btn btn-secondary">Galpon</button>
			<select name="idGalponInicio" id="idGalponInicio" class="form-control-sm form-control rounded-left-0">
			</select>
			<button type="button" class="btn btn-secondary">Desde</button>
			<input type="date" id="fechaDesde" name="fechaDesde" class="form-control-sm form-control rounded-0">
			<button type="button" class="btn btn-secondary">Hasta</button>
			<input type="date" id="fechaHasta" name="fechaHasta" class="form-control-sm form-control rounded-0">
			<button class='btn btn-primary'>-</button>
		</div>
	</form>

	<!-- CARDS ESTADO DE LA GRANJA -->

	<div class="col-3 d-flex flex-column align-self-center">

		<div class="card mb-3 bg-primary border-0 shadow">
			<div class="card-body py-0 pr-2">
				<div class="row">
					<div class="col-2 text-center d-flex justify-content-center">
						<img src="https://image.flaticon.com/icons/png/128/3363/3363571.png" height="40px" class="align-self-center">
					</div>
					<div class="col-10 bg-white rounded">
						<h5>Alimentación <br>
							<label class="text-muted h6">Fecha: <span name='cardAlimentacion'></span></label>
						</h5>
						<p>Consumo por Ave: <span name='cardAlimentacion' class="text-primary font-weight-bold"></span>g</p>
						<p>Consumo Total: <span class="text-primary font-weight-bold" name='cardAlimentacion'></span>k</p>
						<p>Alimento en inventario: <span class="text-primary font-weight-bold" name='cardAlimentacion'></span>k</p>

					</div>
				</div>
			</div>
		</div>

		<div class="card mb-3 bg-danger border-0 shadow">
			<div class="card-body py-0 pr-2">
				<div class="row">
					<div class="col-2 text-center d-flex justify-content-center">
						<img src="https://image.flaticon.com/icons/png/128/1979/1979819.png" height="40px" class="align-self-center">
					</div>
					<div class="col-10 bg-white rounded"> 
						<h5>Mortalidad <br>
							<label class="text-muted h6">Lote: <span name='cardMortalidad'></span></label>
						</h5>
						<p>% de Mortalidad Obtenida: <span class="text-danger font-weight-bold" name='cardMortalidad'></span>%</p>
						<p>Mortalidad Total: <span name='cardMortalidad' class="text-danger font-weight-bold"></span></p>
						<p>Gallinas Restantes: <span name='cardMortalidad' class="text-danger font-weight-bold"></span></p>

					</div>
				</div>
			</div>
		</div>

		<div class="card mb-3 bg-info border-0 shadow">
			<div class="card-body py-0 pr-2">
				<div class="row">
					<div class="col-2 text-center d-flex justify-content-center">
						<img src="assets/img/transportador.svg" height="40px" class="align-self-center">
					</div>
					<div class="col-10 bg-white rounded">
						<h5>Producción <br>
							<label class="text-muted h6">Fecha: <span name='cardProduccion'></span></label>
						</h5>
						<p>% de Huevos Producidos: <span class="text-info font-weight-bold" name='cardProduccion'></span>%</p>
						<p>Huevos Producidos: <span class="text-info font-weight-bold" name='cardProduccion'></span></p>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- CARD DE INVENTARIO -->
	<div class="col-9 d-flex flex-column">	

		<div class="card mb-3">
			<div class="card-header">
				Inventario de Huevos
			</div>
			<div class="card-body ">
				<div class="row">
					<div class="col-8">
						<canvas id="graficoHuevos" style="height: 15em"></canvas>
					</div>
					<div class="col-4 align-self-center">
						<table class="table-sm table-responsive text-center" id="inicioCaducidad">
							<thead class="table-secondary">
								<th width="100">Dias</th>
								<th>Grandes</th>
								<th>Pequeños</th>
								<th>Medianos</th>
							</thead>
							<tbody>
								<tr class="table-danger">
									<td class="bg-white" width="100">15-20 Dias</td>
									<td>23</td>
									<td>20</td>
									<td>25</td>
								</tr>
								<tr class="table-warning">
									<td class="bg-white" width="100">10-15 Dias</td>
									<td>23</td>
									<td>20</td>
									<td>25</td>
								</tr>
								<tr class="table-info">
									<td class="bg-white" width="100">5-10 Dias</td>
									<td>23</td>
									<td>20</td>
									<td>25</td>
								</tr>
								<tr class="table-success">
									<td class="bg-white" width="100">0-5 Dias</td>
									<td>23</td>
									<td>20</td>
									<td>25</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				Inventario de Productos
			</div>
			<div class="card-body pb-2">
				<table class="table table-responsive-sm table-sm table-striped" id="tablaInicioProductos">
					<thead class="table-info">
						<th>Tipo de Producto</th>
						<th>Nombre Producto</th>
						<th>Proveedor</th>
						<th>Ultima compra</th>
						<th>Cantidad kg</th>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>