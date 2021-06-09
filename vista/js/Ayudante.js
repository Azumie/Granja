function elementoExiste (elemento) {
    if (document.getElementById(elemento) === null || document.getElementById(elemento) === undefined) {
      return false;
    }else {
      return true;
    }
  }
 function agregarOption(elemento, valor, texto){
	elemento.innerHTML += `<option value="${valor}">${texto}</option>`;
}
 // OBTENER GRANJAS 
function obtenerObjeto (url,elemento,valores, id, funcion = '') {
	fetch(url).then(resp => resp.json())
    .then(resp => {
    	if (funcion != '') {
    		funcion(resp, elemento,valores, id);
    	}
    });
}

function llenarTabla(resp, elemento,valores, id){
	console.log('pasamos')
	let tbody = '';
	Object.entries(resp).forEach(([pos]) => {
		tbody += `<tr>`
		for (let e = 0; e < valores.length; e++) {
			tbody += `<td>${resp[pos][valores[e]]}</td>`;
		}
		tbody += `<td><button id="${resp[pos][id]}" type="button"class="btn btn-sm btn-info rounded-circle editarGranja">
                    <i class="fas fa-pen-fancy"></i></button></td>`
		tbody += `</tr>`
	});
	for (var i = 0; i < 4; i++) {
		tbody += `<tr>`
		for (var e = 0; e <= valores.length; e++) {
			tbody += `<td></td>`;
		}
		tbody += `</tr>`
	}
    tabla = resp;
    document.querySelector(elemento+' tbody').innerHTML = tbody;
}

function llenarSelect(resp, elemento,valores, id){
	for (a in resp) {
		let select = [];
		console.log(resp[a])
		for (propiedad in resp[a]) {
			if (propiedad == valores[0] || propiedad == valores[1]) {
				select.push(resp[a][propiedad]);
			}
		}
		console.log(select)
		agregarOption(elemento, select[0], select[1]);
	}
}

function alerta (mensaje, color = 'info') {
	const alertBox = document.getElementById('alertas');

	let alerta = document.createElement('div');
	alerta.classList.add('alert', `alert-${color}`);
	alerta.innerHTML = `${mensaje}
				<button type="button" class="close ml-2" data-dismiss="alert" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>`;
	alertBox.appendChild(alerta);
}

function agragarObjetoBD(formulario, url, funcion = '', tabla, infotabla, id){
	let datos = new FormData(formulario);
	fetch(url,{
		method: 'POST',
		body: datos
	})
	.then(res => res.json())
	.then(res => {
		console.log(res);
		formulario.reset();
		obtenerObjeto(funcion, tabla,infotabla, id, llenarTabla);
	});
}

function editarObjetoBD(idElemento, metodo, buscarId, inputs){
  console.log(e.target.tagName);
  let elemento = document.getElementById(idElemento);


  elemento.addEventListener('click', (e) => {

    let target = (e.target.tagName === 'I') ? e.target.parentElement : e.target ;
    if (target.tagName === 'BUTTON') {
      // target.attributes
      let obtenerId = target.getAttribute('id');
      fetch(`?c=Configuracion&m=${metodo}&${buscarId}=${obtenerId}`)
      .then(resp => resp.json())
      .then(resp => {
        resp = resp[0];
        // llenarForm(resp[0]);
        if (elementoExiste(buscarId)) {
          document.getElementById(buscarId).value = obtenerId;
        }else {
          let input = document.createElement('input');
          input.id = buscarId;
          input.name = buscarId;
          input.type = 'hidden';
          input.value = obtenerId;
          formGranja.appendChild(input);
        }
        inputs.forEach((pos) => {
        	let inputForm = document.getElementById(pos);
        	inputForm.value = resp[pos];
        });
      });
    };
  });
}

function fechaHoy(){
	let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    let yyyy = today.getFullYear();
    today = yyyy+'-'+mm+'-'+dd;
    return today;
}