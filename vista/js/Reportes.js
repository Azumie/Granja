
document.addEventListener('DOMContentLoaded', () => {

	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
	    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');


	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	    $('.dropdown-submenu .show').removeClass("show");
	  });


	  return false;
	});
	// TABLAS

	$('.datatable').DataTable({
		// responsive: true,
		"language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

		}

	});

	// COLOCAR LOS GRAFICOS AQUI 





	// const labels = [
	//   'Grandes',
	//   'Pequeños',
	//   'Medianos',
	//   'Derramados',
	//   'Pool',
	//   'Rusticos',
	// ];
	// const data = {
	//   labels: labels,
	//   datasets: [{
	//     label: 'Huevos por tipo',
	//     data: [65, 59, 80, 81, 56, 55],
	//     backgroundColor: [
	//       'rgba(239, 183, 62, 0.5)',
	//       'rgba(233, 84, 32, 0.5)',
	//       'rgba(23, 162, 184, 0.5)',
	//       'rgba(156, 148, 138, 0.5)',
	//     ],
	//     borderColor: [
	//       'rgb(239, 183, 62)',
	//       'rgb(233, 84, 32)',
	//       'rgb(23, 162, 184)',
	//       'rgb(156, 148, 138)',
	//     ],
	//     borderWidth: 1
	//   }]
	// };
	// const config = {
	//   type: 'bar',
	//   data: data,
	//   options: {
	//     scales: {
	//       y: {
	//         beginAtZero: true
	//       }
	//     }
	//   },
	// };
	// var graficoHuevos = new Chart(
	// 	document.getElementById('graficoProduccion'),
	// 	config
	// );



});