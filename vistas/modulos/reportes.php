<?php 

if ($_SESSION['perfil'] == "Especial" || $_SESSION['perfil'] == "Vendedor") {
  
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

            Reportes de ventas

          </h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="breadcrumb-item active">Reportes de ventas</li>

          </ol>

        </div>

      </div>

    </div>

  </div>
 
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-md-12">

          <div class="card">

            <div class="card-header"> 
                      
              <button type="button" class="btn btn-default float-left" id="daterange-btn2">
                
                  <i class="far fa-calendar-alt"></i> Rango de fecha
                  <i class="fas fa-caret-down"></i>

              </button>   

              <?php 

              if (isset($_GET["fechaInicial"])) {
                
                echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'" class="float-right">';

              } else {

                echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte" class="float-right">';

              }      
              
              ?>
                 
                <button type="button" class="btn btn-success">
                  
                  <i class="fas fa-file-excel"></i> 
                  Descargar

                </button>

              </a>
                     
            </div>

            <div class="card-body">                             
                  
            <?php

              include "reportes/grafico-ventas.php";

            ?>

            </div>

          </div>

        </div>

      </div>

      <div class="row">

        <div class="col-md-6 col-xs-12">

          <?php

            include "reportes/productos-mas-vendidos.php";

          ?>
          
        </div>

        <div class="col-md-6 col-xs-12">

          <?php

            include "reportes/vendedores.php";

            include "reportes/compradores.php";

          ?>
          
        </div>

      </div>

    </div>

  </section>
  
</div>
