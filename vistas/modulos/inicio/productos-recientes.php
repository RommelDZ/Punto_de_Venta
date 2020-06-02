<?php 

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

$colores = array("warning", "info", "danger", "success", "primary", "secondary", "purple", "orange", "olive", "lightblue");

?>

<div class="card">

  <div class="card-header bg-primary">

    <h3 class="card-title">Productos recien añadidos</h3>

  </div>
  
  <div class="card-body p-0">

    <ul class="products-list product-list-in-card pl-2 pr-2">

      <?php

      for ($i = 0; $i < 10; $i++) { 

        echo '<li class="item">

          <div class="product-img">

            <img src="'.$productos[$i]["imagen"].'" alt="Product Image">

          </div>

          <div class="product-info">

            <a href="javascript:void(0)" class="product-title">'.$productos[$i]["descripcion"].'

              <span class="badge bg-'.$colores[$i].' float-right">
                <h5>$ '.number_format($productos[$i]["precio_venta"],2).'</h5>
              </span>

              <span class="product-description">
                Stock Disponible: '.$productos[$i]["stock"].'
              </span> 

            </a>                   

          </div>

        </li>';

      } 

      ?>
      
    </ul>

  </div>
  
  <div class="card-footer text-center">

    <a href="productos" class="uppercase">Ver Todos los Productos</a>

  </div>
  
</div>