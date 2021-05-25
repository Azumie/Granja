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

  // AGREGAR GRANJA

  const formAgregarGranja = document.getElementById('formAgregarGranja');

  formAgregarGranja.addEventListener('submit', (e) =>{
    e.preventDefault();
    const datosAgregarGranja = new FormData(formAgregarGranja);

    fetch('?c=Configuracion&m=agregarGranja', {
      method: 'POST',
      body: datosAgregarGranja
    })
    .then(resp => resp.json())
    .then(datos => {
      obtenerGranjas();
      formAgregarGranja.reset();
    });

  });

  // EDITAR GRANJA

  let tablaGranjas = document.getElementById('tablaGranjas');

  tablaGranjas.addEventListener('click', (e) => {
    let target = (e.target.tagName === 'I') ? e.target.parentElement : e.target ;
    if (target.tagName === 'BUTTON') {
      // target.attributes
      let idGranja = target.getAttribute('idGranja');
      console.log(idGranja);
      console.log(granjas);
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

});