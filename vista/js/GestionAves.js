// Validando de que exista el formulario respectivo al módulo de Galpón
if(elementoExiste('formularioAgregarAlimentacion')){
	// Rellenando tabla con la información de los Galpones
	// obtenerGranjas('?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinamiento'], 'idGalpon');
	const formularioAgregarGalpon = document.getElementById('formularioAgregarAlimentacion');
	var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy+'-'+mm+'-'+dd;
	formularioAgregarGalpon.fechaDeAlimentacion.value= today;

	// Rellenando Select llamado ConfinamientoGalpon
	// const select = document.getElementById('ConfinamientoGalpon');
	// agregarOption(select, 'P','Piso'); agregarOption(select,'J','Jaula');
	// Obteniendo formulario del Módulo Galpón
	let datos =  '?c=Galpon&m=obtenerGalpones';
	fetch(datos)
	.then(res => res.json())
	.then(res => {
		console.log(res)
		if (res.length != 0) {
			console.log('entramos')
		Object.entries(res).forEach(([pos]) => {
			agregarOption(formularioAgregarGalpon.idAlimentandoGalpon,res[pos]['idGalpon'], res[pos]['numeroGalpon']);
		});
		} else {
			console.log('sip')
			formularioAgregarGalpon.idAlimentandoGalpon.innerHTML = `<option value='2'>Disculpe, no hay galpones activos</option>`;
		}
		// formularioAgregarGalpon.reset();
		// obtenerGranjas('?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinamiento'], 'idGalpon');
		// document.getElementsByName('fechaCreacionGalpon')[0].value= today;
	});


	// 
	// formularioAgregarGalpon.idAlimentandoGalpón.innerHTML += `<option value="${valor}">${texto}</option>`;
	// Evento que ocurrirá al presionar el botón de guardado en el módulo de Galpón
	// formularioAgregarGalpon.addEventListener('submit',function(e){
	// 	e.preventDefault();
	// 	let probar = formularioAgregarGalpon.fechaCreacionGalpon.value;
	// 	if (probar != null && probar != '') {
	// 		console.log('pasamos we');
	// 		let probar = formularioAgregarGalpon.numeroGalpon.value;
	// 		if (probar != '' && (probar > 0 && probar < 500)
	// 		&& !probar.match(/[^0-9]/)) {
	// 			console.log('Pasamos número galpón');
	// 			probar= formularioAgregarGalpon.areaUtilGalpon.value;
	// 			if (probar != '' && probar != null && !probar.match(/[^,.\d]/) && probar >= 100 && probar <= 2000) {
	// 				probar = formularioAgregarGalpon.ConfinamientoGalpon.value.toUpperCase();
	// 				console.log('pasamos areautil');
	// 				if (probar == 'P' || probar == 'J') {
	// 					console.log('pasamos confinamiento');
	// 					let datos = new FormData(formularioAgregarGalpon);
	// 					fetch('?c=Galpon&m=agregarGalpon',{
	// 						method: 'POST',
	// 						body: datos
	// 					})
	// 					.then(res => res.json())
	// 					.then(res => {
	// 						console.log(res);
	// 						formularioAgregarGalpon.reset();
	// 						obtenerGranjas('?c=Galpon&m=obtenerGalpones', '#tablaGalpon', ['numeroGalpon', 'areaUtil','confinamiento'], 'idGalpon');
	// 						document.getElementsByName('fechaCreacionGalpon')[0].value= today;
	// 					});
	// 				}else alert('Error al escoger el tipo de Confinamiento');
	// 			}else alert('Error al indicar Área Útil');
	// 		}else alert('Error en número galpón');
			
	// 	}
		
	// })
}


