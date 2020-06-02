
<div class="content-wrapper">

  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0 text-dark">

            <small>Panel de Control</small>

          </h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="breadcrumb-item active">Tablero</li>

          </ol>

        </div>

      </div>

    </div>

  </div>

  <section class="content">

    <div class="row">
      
      <?php 

      if ($_SESSION["perfil"] == "Administrador") {

        include "inicio/cajas-superiores.php";

      }      

      ?>

    </div>

    <div class="row">
      
      <div class="col-lg-12">
        
        <?php 

        if ($_SESSION["perfil"] == "Administrador") {

          include "reportes/grafico-ventas.php";

        }

        ?>

      </div>

    </div>

    <div class="row">
      
      <div class="col-lg-6">
        
        <?php 

        if ($_SESSION["perfil"] == "Administrador") {

          include "reportes/productos-mas-vendidos.php";

        }

        ?>

      </div>  
      
      <div class="col-lg-6">
        
        <?php 

        if ($_SESSION["perfil"] == "Administrador") {

          include "inicio/productos-recientes.php";

        }

        ?>
        
      </div>

      <div class="col-lg-12">

        <?php 

          if ($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor") {
            
            echo '<div class="callout callout-info">
             
                <h1>Bienvenid@ '.$_SESSION["nombre"].' </h1>

            </div>';

          }

        ?>        

      </div>

    </div>

  </section>
  
</div>