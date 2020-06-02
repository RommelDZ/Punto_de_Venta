<?php

$item = null;
$valor = null;

$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

$arrayClientes = array();
$arraylistaClientes = array();

foreach ($ventas as $key => $valueVentas) {

  foreach ($clientes as $key => $valueClientes) {

    if ($valueClientes["id"] == $valueVentas["id_cliente"]) {
      
      #Capturamos los clientes en un array
      array_push($arrayClientes, $valueClientes["nombre"]);

      #Capturamos los nombres y los valores netos en un mismo array
      $arraylistaClientes = array($valueClientes["nombre"] => $valueVentas["neto"]);

      #sumamos los netos de cada cliente
      foreach ($arraylistaClientes as $key => $value) {
        
        $sumaTotalClientes[$key] += $value;

      }

    }   

  }

}

#Evitamos repetir nombre
$noRepetirNombres = array_unique($arrayClientes);

?>

<!--=====================================
COMPRADORES	
======================================-->

<div class="card card-primary">
	
	<div class="card-header">

		<h3 class="card-title">Compradores</h3>	

	</div>

	<div class="card-body">
		
		<div class="chart">

      <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 450px; max-width: 100%;"></canvas>

    </div>

  </div>
  
</div>

<script>

//-------------
//- BAR CHART -
//-------------

var barData2 = {
  labels  : [
  <?php 

  foreach ($noRepetirNombres as $key => $value) {
        
    $datos3 .= "'".$value."',";

  }

  $datos3 = substr($datos3, 0, -1);

  echo $datos3;
  ?>
  // 'January', 'February', 'March', 'April', 'May', 'June', 'July'
  ],
  datasets: [
    {
      label               : 'Compradores',
      backgroundColor     : 'rgba(210, 214, 222, 1)',
      borderColor         : 'rgba(210, 214, 222, 1)',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [
      <?php 

      foreach ($noRepetirNombres as $key => $value) {
        
        $datos4 .= $sumaTotalClientes[$value].",";

      }

      $datos4 = substr($datos4, 0, -1);

      echo $datos4;
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

var barChartCanvas = $('#barChart2').get(0).getContext('2d')
var barChartData = jQuery.extend(true, {}, barData2)
//var temp0 = barData2.datasets[0]
//var temp1 = barData2.datasets[1]
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
            return 'Compras: '+numeral(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]).format('$ 0,0.00');
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