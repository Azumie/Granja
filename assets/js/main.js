document.addEventListener('DOMContentLoaded', () => {


  obtenerGranjas('?c=Configuracion&m=obtenerGranjas', '#tablaGranjas', ['nombreGranja','ubicacionGranja'], 'idGranja');

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
      obtenerGranjas('?c=Configuracion&m=obtenerGranjas', '#tablaGranjas', ['nombreGranja','ubicacionGranja'], 'idGranja');
      formGranja.reset();
      let mensaje = 'Granja agregada Exitosamente';
      if (elementoExiste('idGranja')) {
        document.getElementById('idGranja').remove();
        document.getElementById('estadoFormGranja').innerText = 'Agregando...'
        mensaje = 'Granja editada Exitosamente';
      }
      alerta(mensaje);
    });

  });

  // EDITAR - CARGAR DATA EN EL FORMULARIO

  let tablaGranjas = document.getElementById('tablaGranjas');

  tablaGranjas.addEventListener('click', (e) => {
    console.log(e.target);
    editarObjetoBD(e, 'obtenerGranjas', 'idGranja', ['nombreGranja', 'ubicacionGranja'], ['nombreGranja', 'ubicacion']);
    // let target = (e.target.tagName === 'I') ? e.target.parentElement : e.target ;
    // if (target.tagName === 'BUTTON') {
    //   // target.attributes
    //   let idGranja = target.getAttribute('id');
    //   console.log(idGranja);
    //   fetch(`?c=Configuracion&m=obtenerGranjas&idGranja=${idGranja}`)
    //   .then(resp => resp.json())
    //   .then(resp => {
    //     resp = resp[0];
    //     if (elementoExiste('idGranja')) {
    //       document.getElementById('idGranja').value = idGranja;
    //     }else {
    //       let inputIdGranja = document.createElement('input');
    //       inputIdGranja.id = 'idGranja';
    //       inputIdGranja.name = 'idGranja';
    //       inputIdGranja.type = 'hidden';
    //       inputIdGranja.value = idGranja;
    //       formGranja.appendChild(inputIdGranja);
    //     }

    //     document.getElementById('nombreGranja').value = resp.nombreGranja;
    //     document.getElementById('ubicacionGranja').value = resp.ubicacion;
    //     document.getElementById('estadoFormGranja').innerText = 'Editando...'
    //   });
    // }
  });
})




