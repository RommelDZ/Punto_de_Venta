<?php 

if ($_SESSION['perfil'] == "Especial") {
  
  echo '<script>

    window.location = "inicio";

  </script>';

  return;
  
}

?>

<div class="content-wrapper">

  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0 text-dark">

            Administrar ventas

          </h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="breadcrumb-item active">Administrar ventas</li>

          </ol>

        </div>

      </div>

    </div>

  </div>

  <section class="content">

    <div class="container-fluid">

      <div class="row">
        
        <div class="col-12">

          <div class="card">
        
            <div class="card-header">

              <a href="crear-venta">
        
                <button class="btn btn-primary">
                  Agregar venta
                </button>

              </a>

              <button type="button" class="btn btn-default float-right" id="daterange-btn">
                
                <i class="far fa-calendar-alt"></i> Rango de fecha
                <i class="fas fa-caret-down"></i>

              </button>

            </div>
        
            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Código Factura</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Forma de pago</th>
                    <th>Neto</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

                <tbody>

                <?php

                  if (isset($_GET["fechaInicial"])) {
                    
                    $fechaInicial = $_GET["fechaInicial"];
                    $fechaFinal = $_GET["fechaFinal"];

                  } else {

                    $fechaInicial = null;
                    $fechaFinal = null;

                  }
                  
                  $respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

                  foreach ($respuesta as $key => $value) {

                    echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.$value["codigo"].'</td>';

                      $itemCliente = "id";
                      $valorCliente = $value["id_cliente"];

                      $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                      echo '<td>'.$respuestaCliente["nombre"].'</td>';

                      $itemUsuario = "id";
                      $valorUsuario = $value["id_vendedor"];

                      $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuario($itemUsuario, $valorUsuario);

                      echo '<td>'.$respuestaUsuario["nombre"].'</td>
                      <td>'.$value["metodo_pago"].'</td>
                      <td>$. '.number_format($value["neto"],2).'</td>
                      <td>$. '.number_format($value["total"],2).'</td>
                      <td>'.$value["fecha"].'</td>
                      <td>                
                        <div class="btn-group">                  

                          <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'" data-toggle="tooltip" title="Imprimir"><i class="fas fa-print"></i></button>';

                          if ($_SESSION["perfil"] == "Administrador") {

                            echo '<button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                            
                            <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'" data-toggle="tooltip" title="Eliminar"><i class="fas fa-times"></i></button>';
                            
                          }

                        echo '</div>

                      </td>
                    </tr>';

                  }

                ?>           
                              
                </tbody>

              </table>

              <?php

                $eliminarVenta = new ControladorVentas();
                $eliminarVenta->ctrEliminarVenta();

              ?>

            </div>
            
          </div>
    
  </section>
  
</div>