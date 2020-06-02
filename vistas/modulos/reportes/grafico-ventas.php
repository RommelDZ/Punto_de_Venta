<?php

error_reporting(0);

if (isset($_GET["fechaInicial"])) {
  
  $fechaInicial = $_GET["fechaInicial"];
  $fechaFinal = $_GET["fechaFinal"];

} else {

  $fechaInicial = null;
  $fechaFinal = null;

}

$respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {

	#Capturamos solo el año y el mes
	$fecha = substr($value["fecha"], 0, 7);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);

	#Capturamos las ventas
	$arrayVentas = array($fecha=>$value["total"]);

	#Sumamos los pagos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {
		
		$sumaPagosMes[$key] += $value;

	}

}

$noRepetirFechas = array_unique($arrayFechas);

?>

<!--=====================================
GRAFICO DE VENTAS
======================================-->

<div class="card text-white bg-gradient-info">

	<div class="card-header">

		<div class="row">

			<span style="padding-right: 5px;"><i class="fas fa-th"></i></span>

			<h3 class="card-title">Gráfico de Ventas</h3>

		</div>
		

	</div>

	<div class="card-body border-radius-none nuevoGraficoVentas">
		
		<div class="chart" id="line-chart-ventas" style="height: 250px;"></div>

	</div>
	
</div>

<script>
	
var line = new Morris.Line({
  element          : 'line-chart-ventas',
  resize           : true,
  data             : [

	  <?php

	  if ($noRepetirFechas != null) {
	  	
	  	foreach ($noRepetirFechas as $key) {

	  		echo "{y: '".$key."', ventas: ".$sumaPagosMes[$key]."},";
	  		
	  	}

	  	echo "{y: '".$key."', ventas: ".$sumaPagosMes[$key]."}";

	  } else {

	  	echo "{y: '0', ventas: '0'}";

	  }    	

	  ?>

    ],
    xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['Ventas'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits				 : '$', 
    gridTextSize     : 10
  });

</script>
