document.addEventListener('DOMContentLoaded', () => {

  let granjas = [];
  obtenerGranjas();

  // GRAFICOS

  new Chartist.Line('.contenedor-grafico', {
    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
    series: [
      [12, 9, 7, 8, 5],
      [2, 1, 3.5, 7, 3],
      [1, 3, 4, 5, 6]
    ]
  }, {
    fullWidth: true,
    chartPadding: {
      right: 40
    }
  });

  // AGREGAR/EDITAR GRANJA

  const formGranja = document.getElementById('formGranja');

  formGranja.addEventListener('submit', (e) =>{
    e.preventDefault();
    const datosAgregarGranja = new FormData(formGranja);

    let metodo = elementoExiste('idGranja') ? 'editarGranja' : 'agregarGranja';

    fetch(`?c=Configuracion&m=${metodo}`, {
      method: 'POST',
      body: datosAgregarGranja
    })
    .then(resp => resp.json())
    .then(datos => {
      obtenerGranjas();
      formGranja.reset();
      if (elementoExiste('idGranja')) {
        document.getElementById('idGranja').remove();
        document.getElementById('estadoFormGranja').innerText = 'Agregando...'
      }
    });

  });

  // EDITAR - CARGAR DATA EN EL FORMULARIO

  let tablaGranjas = document.getElementById('tablaGranjas');

  tablaGranjas.addEventListener('click', (e) => {
    let target = (e.target.tagName === 'I') ? e.target.parentElement : e.target ;
    if (target.tagName === 'BUTTON') {
      // target.attributes
      let idGranja = target.getAttribute('idGranja');
      granjas.forEach(granja => {
        if (granja.idGranja === idGranja) {

          if (elementoExiste('idGranja')) {
            document.getElementById('idGranja').value = idGranja;
          }else {
            let inputIdGranja = document.createElement('input');
            inputIdGranja.id = 'idGranja';
            inputIdGranja.name = 'idGranja';
            inputIdGranja.type = 'hidden';
            inputIdGranja.value = idGranja;
            formGranja.appendChild(inputIdGranja);
          }

          document.getElementById('nombreGranja').value = granja.nombreGranja;
          document.getElementById('ubicacionGranja').value = granja.ubicacion;
          document.getElementById('estadoFormGranja').innerText = 'Editando...'
        }
      });
    }
  });










  // OBTENER GRANJAS

  function obtenerGranjas () {
    fetch('?c=Configuracion&m=obtenerGranjas').then(resp => resp.json())
    .then(datos => {
      let tbody = '';

      datos.forEach((dato) => {
        tbody += `<tr>
                    <td>${dato.nombreGranja}</td>
                    <td>${dato.ubicacion}</td>
                    <td>
                      <button idGranja="${dato.idGranja}" type="button"class="btn btn-danger rounded-circle editarGranja">
                        <i class="fas fa-pen-fancy"></i>
                      </button>
                    </td>
                  </tr>`;
      });
      granjas = datos;
      document.querySelector('#tablaGranjas tbody').innerHTML = tbody;
    });
  };

  function elementoExiste (elemento) {
    if (document.getElementById(elemento) === null || document.getElementById(elemento) === undefined) {
      return false;
    }else {
      return true;
    }
  }

});