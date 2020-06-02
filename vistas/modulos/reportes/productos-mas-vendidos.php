<?php

$item = null;
$valor = null;
$orden = "ventas";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$colores = array("#dc3545", "#3d9970", "#ff851b", "#007bff", "#3c8dbc", "#f012be", "#adb5bd", "#605ca8", "#39cccc", "#ffc107");

$totalVentas = ControladorProductos::ctrMostrarSumaVentas();

?>

<div class="card">

  <div class="card-header bg-danger">

    <h3 class="card-title">Productos mas vendidos</h3>
    
  </div>
  
  <div class="card-body">

    <div class="row">

      <div class="col-md-7">

        <div class="chart-responsive">

          <canvas id="pieChart" height="250"></canvas>

        </div>
        
      </div>
      
      <div class="col-md-5">

        <ul class="chart-legend clearfix">

        <?php 
        for ($i = 0; $i < 10; $i++) { 
  
          echo '
          <li>

            <i class="far fa-circle" style="color:'.$colores[$i].'"></i> '.$productos[$i]["descripcion"].'

          </li>';

        }

        ?>        
  
        </ul>

      </div>
      
    </div>

  </div>
  
  <div class="card-footer bg-white p-0">

    <ul class="nav nav-pills flex-column">

    <?php

    for ($i = 0; $i < 5; $i++) { 
          
      echo ' 
        <li class="nav-item">
          
          <a href="#" class="nav-link">

            <img src="'.$productos[$i]["imagen"].'" style="border:1px solid #eee; width: 40px; margin-right: 10px;">
            '.$productos[$i]["descripcion"].'

            <span class="float-right" style="color:'.$colores[$i].'">
              <i class="fa fa-arrow-down text-sm"></i> 
              '.ceil($productos[$i]["ventas"]*100/$totalVentas["total"]).'%

            </span>

          </a>

        </li>';
    }

    ?>   

    </ul>

  </div>
  
</div>

<script>
  
// -------------
// - PIE CHART -
// -------------
// Get context with jQuery - using jQuery's .get() method.
var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
var pieData        = {

  labels: [
  <?php
  for ($i = 0; $i < 10; $i++) { 
  
    echo "'".$productos[$i]["descripcion"]."',";

  }
  ?>
  ],
  datasets: [
    {
      data: [
      <?php
      for ($i = 0; $i < 10; $i++) { 
      
        echo $productos[$i]["ventas"].",";

      }
      ?>
      ],
      backgroundColor : [
      <?php
      for ($i = 0; $i < 10; $i++) { 
      
        echo "'".$colores[$i]."',";

      }
      ?>
      ],
    }
  ]

}
var pieOptions     = {
  legend: {

    display: false

  }
}
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
var pieChart = new Chart(pieChartCanvas, {

  type: 'doughnut',
  data: pieData,
  options: pieOptions      

})

//-----------------
//- END PIE CHART -
//-----------------

</script>