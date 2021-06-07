<div class="row">

	<!-- FILTROS -->

	<div class="col-12 d-flex justify-content-center mb-4">
		<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
			<button type="button" class="btn btn-secondary">Desde</button>
			<input type="date" class="form-control-sm form-control rounded-0">
			<button type="button" class="btn btn-secondary">Hasta</button>
			<input type="date" class="form-control-sm form-control rounded-0">
			<button type="button" class="btn btn-secondary">Galpon</button>
			<select name="idGalpon " id="idGalpon" class="form-control-sm form-control rounded-left-0">
				<option value="Todos">Todos</option>
				<option value="1">G-1</option>
				<option value="2">G-2</option>
				<option value="3">G-3</option>
				<option value="4">G-4</option>
			</select>
		</div>
	</div>

	<!-- CARDS ESTADO DE LA GRANJA -->

	<div class="col-3 d-flex flex-column align-self-center">

		<div class="card mb-3 bg-primary border-0 shadow">
			<div class="card-body py-0 pr-2">
				<div class="row">
					<div class="col-2 text-center d-flex justify-content-center">
						<img src="https://image.flaticon.com/icons/png/128/3363/3363571.png" height="40px" class="align-self-center">
					</div>
					<div class="col-10 bg-white rounded">
						<h5>Alimentacion
							<label class="text-muted h6">fecha: <span>20-05-2021</span></label>
						</h5>
						<p>Consumo por Ave: <span class="text-primary font-weight-bold">150g</span></p>
						<p>Consumo Total: <span class="text-primary font-weight-bold">150k</span></p>
						<p>Alimento en inventario: <span class="text-primary font-weight-bold">500k</span></p>

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
						<h5>Mortalidad
							<label class="text-muted h6">fecha: <span>20-05-2021</span></label>
						</h5>
						<p>Mortalidad Esperada: <span class="text-danger font-weight-bold">0.15%</span></p>
						<p>Mortalidad Obtenida: <span class="text-danger font-weight-bold">1%</span></p>
						<p>Mortaloidad Total: <span class="text-danger font-weight-bold">10 Gallinas</span></p>
						<p>Gallinas Restantes: <span class="text-danger font-weight-bold">1000</span></p>

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
						<h5>Produccion
							<label class="text-muted h6">fecha: <span>20-05-2021</span></label>
						</h5>
						<p>Produccion Esperada: <span class="text-info font-weight-bold">60%</span></p>
						<p>Produccion Obtenida: <span class="text-info font-weight-bold">61%</span></p>
						<p>Huevos Producidos: <span class="text-info font-weight-bold">2000</span></p>

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
						<table class="table table-sm table-responsive text-center">
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
				<table class="table table-responsive-sm table-sm table-striped">
					<thead class="table-info">
						<th>Tipo de Producto</th>
						<th>Nombre Producto</th>
						<th>Proveedor</th>
						<th>Ultima compra</th>
						<th>Cantidad</th>
					</thead>
					<tbody>
						<tr>
							<td>Alimento </td>
							<td>Iniciador </td>
							<td>Granja las Tunas </td>
							<td>05-10-2021 </td>
							<td>500kg</td>
						</tr>
						<tr>
							<td>Consumible </td>
							<td>Cajas </td>
							<td>El chino </td>
							<td>05-06-2021 </td>
							<td>100 </td>
						</tr>
						<tr>
							<td>Consumible </td>
							<td>Separadores </td>
							<td>El chino </td>
							<td>03-06-2021 </td>
							<td>30 </td>
						</tr>
						<tr>
							<td>Alimento </td>
							<td>Crecimiento </td>
							<td>Granja las Tunas </td>
							<td>02-02-2021 </td>
							<td>1kg </td>
						</tr>
						<tr>
							<td>Alimento </td>
							<td>Postura </td>
							<td>El tunal alimentos</td>
							<td>03-03-2021 </td>
							<td>30k</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	

</div>