<?php

$item = null;
$valor = null;

$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
$usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

$arrayVendedores = array();
$arraylistaVendedores = array();

foreach ($ventas as $key => $valueVentas) {

	foreach ($usuarios as $key => $valueUsuarios) {

		if ($valueUsuarios["id"] == $valueVentas["id_vendedor"]) {
			
			#Capturamos los vendedores en un array
			array_push($arrayVendedores, $valueUsuarios["nombre"]);

			#Capturamos los nombres y los valores netos en un mismo array
			$arraylistaVendedores = array($valueUsuarios["nombre"] => $valueVentas["neto"]);

			#sumamos los netos de cada vendedor
			foreach ($arraylistaVendedores as $key => $value) {
				
				$sumaTotalVendedores[$key] += $value;

			}

		}		

	}

}

#Evitamos repetir nombre
$noRepetirNombres = array_unique($arrayVendedores);

?>

<!--=====================================
VENDEDORES	
======================================-->

<div class="card card-success">

  <div class="card-header">

    <h3 class="card-title">Vendedores</h3>

  </div>

  <div class="card-body">

    <div class="chart">

      <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 450px; max-width: 100%;"></canvas>

    </div>

  </div>
  
</div>

<script>

//-------------
//- BAR CHART -
//-------------

var barData = {
  labels  : [
	<?php 

	foreach ($noRepetirNombres as $key => $value) {
		  	
		$datos .= "'".$value."',";

	}

	$datos = substr($datos, 0, -1);

	echo $datos;
	?>
  // 'January', 'February', 'March', 'April', 'May', 'June', 'July'
  ],
  datasets: [
    {
      label               : 'Vendedores',
      backgroundColor     : 'rgba(60,141,188,0.9)',
      borderColor         : 'rgba(60,141,188,0.8)',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : [
			<?php 

		  foreach ($noRepetirNombres as $key => $value) {
		  	
		  	$datos2 .= $sumaTotalVendedores[$value].",";

		  }

		  $datos2 = substr($datos2, 0, -1);

		  echo $datos2;
		  ?>      
      //28, 48, 40, 19, 86, 27, 90
      ]
    },
    // {
    //   label               : 'Electronics',
    //   backgroundColor     : 'rgba(210, 214, 222, 1)',
    //   borderColor         : 'rgba(210, 214, 222, 1)',
    //   pointRadius         : false,
    //   pointColor          : 'rgba(210, 214, 222, 1)',
    //   pointStrokeColor    : '#c1c7d1',
    //   pointHighlightFill  : '#fff',
    //   pointHighlightStroke: 'rgba(220,220,220,1)',
    //   data                : [65, 59, 80, 81, 56, 55, 40]
    // },
  ]
}

var barChartCanvas = $('#barChart').get(0).getContext('2d')
var barChartData = jQuery.extend(true, {}, barData)
//var temp0 = barData.datasets[0]
//var temp1 = barData.datasets[1]
//barChartData.datasets[0] = temp1
//barChartData.datasets[1] = temp0

var barChartOptions = {
  responsive              : true,
  maintainAspectRatio     : false,
  datasetFill             : false,
	scales: {
    xAxes: [
      {
        ticks: {
          beginAtZero: true,
          userCallback: function(value, index, values) {
            // Convert the number to a string and splite the string every 3 charaters from the end
            return numeral(value).format('$ 0,0');
        	}
        }
      }
    ]
  },
  tooltips: {
    callbacks: {
      label: function(tooltipItem, data) {
            return 'Ventas: '+numeral(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]).format('$ 0,0.00');
      }
  	}
  }
}

var barChart = new Chart(barChartCanvas, {
  type: 'horizontalBar', 
  data: barChartData,
  options: barChartOptions
})

</script>