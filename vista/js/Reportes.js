
document.addEventListener('DOMContentLoaded', () => {

	// TABLAS

	$('.datatable').DataTable();

	// COLOCAR LOS GRAFICOS AQUI 

	const labels = [
	  'Grandes',
	  'Pequeños',
	  'Medianos',
	  'Derramados',
	  'Pool',
	  'Rusticos',
	];
	const data = {
	  labels: labels,
	  datasets: [{
	    label: 'Huevos por tipo',
	    data: [65, 59, 80, 81, 56, 55],
	    backgroundColor: [
	      'rgba(239, 183, 62, 0.5)',
	      'rgba(233, 84, 32, 0.5)',
	      'rgba(23, 162, 184, 0.5)',
	      'rgba(156, 148, 138, 0.5)',
	    ],
	    borderColor: [
	      'rgb(239, 183, 62)',
	      'rgb(233, 84, 32)',
	      'rgb(23, 162, 184)',
	      'rgb(156, 148, 138)',
	    ],
	    borderWidth: 1
	  }]
	};
	const config = {
	  type: 'bar',
	  data: data,
	  options: {
	    scales: {
	      y: {
	        beginAtZero: true
	      }
	    }
	  },
	};
	var graficoHuevos = new Chart(
		document.getElementById('graficoHuevos'),
		config
	);



});