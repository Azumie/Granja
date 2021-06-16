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
		for (propiedad in resp[a]) {
			if (propiedad == valores[0]) {
				select.push(resp[a][propiedad]);
			}
		}
		agregarOption(elemento, select[0], select[0]);
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

function editarObjetoBD(idTabla, controlador, metodo, nombreId, inputs){

  let elemento = document.getElementById(idTabla);

  elemento.addEventListener('click', (e) => {

    let target = (e.target.tagName === 'I') ? e.target.parentElement : e.target ;
    if (target.tagName === 'BUTTON') {
      // target.attributes
      let idElemento = target.getAttribute('id');
      
      fetch(`?c=${controlador}&m=${metodo}&${nombreId}=${idElemento}`)
      .then(resp => resp.json())
      .then(resp => {
        resp = resp[0];
        // llenarForm(resp[0]);
        if (elementoExiste(nombreId)) {
          let inputId = document.getElementById(nombreId);
        	if (nombreId.includes('documento')) {
        		idElemento = idElemento.split('-')[1];
            inputId.setAttribute('editar', true);
        	}
          inputId.value = idElemento
        }else {
          let input = document.createElement('input');
          input.id = nombreId;
          input.name = nombreId;
          input.type = 'hidden';
          input.value = idElemento;
          formGranja.appendChild(input);
        }
        let inputDocumentoEncontrado = false;
        Object.entries(inputs).forEach(([nombreInput, nombreCampo]) => {
          if ((nombreInput.includes('documento') || nombreInput.includes('nacionalidad')) && inputDocumentoEncontrado == false) {
            resp['nacionalidad'] = resp['documento'].split('-')[0];
            resp['documento'] = resp['documento'].split('-')[1];
            inputDocumentoEncontrado = true;
          }
        	let inputForm = document.getElementById(nombreInput);
        	inputForm.value = resp[nombreCampo];
        });
      });
    }
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