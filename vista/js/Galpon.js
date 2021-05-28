if(elementoExiste('formularioAgregarGalpon')){
	const formularioAgregarGalpon = document.getElementById('formularioAgregarGalpon');
	const select = document.getElementById('ConfinamientoGalpon');
	agregarOption(select, 'P','Piso'); agregarOption(select,'J','Jaula');
	//  select = $('#ConfinamientoGalpon').html();
	// select += 
	// select += `<option value="J">Jaula</option>`;

	formularioAgregarGalpon.addEventListener('submit',function(e){
		console.log('Click');
		e.preventDefault();
		let datos = new FormData(formularioAgregarGalpon);
		console.log(datos.get('numeroGalpon'));
		fetch('?c=Galpon&m=agregarGalpon',{
			method: 'POST',
			body: datos
		})
		.then(res => res.json())
		.then(res => {
			console.log(res);
			formularioAgregarGalpon.reset();
			obtenerGranjas('?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinamiento'], 'idGalpon');

		});
	})
}


