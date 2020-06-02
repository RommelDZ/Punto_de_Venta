<?php 

$item = null;
$valor = null;
$orden = "id";

$ventas = ControladorVentas::ctrSumaTotalVentas();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
$totalProductos = count($productos);

?>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-info">

    <div class="inner">

      <h3>$<?php echo number_format($ventas["total"],2, ",", "."); ?></h3>

      <p>Ventas</p>

    </div>

    <div class="icon">

      <i class="fas fa-file-invoice-dollar"></i>

    </div>

    <a href="ventas" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-success">

    <div class="inner">

      <h3><?php echo number_format($totalCategorias); ?></h3>

      <p>Categorias</p>

    </div>
    
    <div class="icon">

      <i class="fas fa-clipboard-list"></i>

    </div>

    <a href="categorias" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">
  
  <div class="small-box bg-warning">

    <div class="inner">

      <h3><?php echo number_format($totalClientes); ?></h3>

      <p>Clientes</p>

    </div>

    <div class="icon">

      <i class="fas fa-user-plus"></i>

    </div>

    <a href="clientes" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-danger">

    <div class="inner">

      <h3><?php echo number_format($totalProductos); ?></h3>

      <p>Productos</p>

    </div>

    <div class="icon">

      <i class="fas fa-shopping-cart"></i>

    </div>

    <a href="productos" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>