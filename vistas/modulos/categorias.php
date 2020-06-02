<?php 

if ($_SESSION['perfil'] == "Vendedor") {
  
  echo '<script>

    window.location = "inicio"

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

            Administrar categorías

          </h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="breadcrumb-item active">Administrar categorías</li>

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
        
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
                Agregar categoria
              </button>

            </div>
        
            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablas">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

                <tbody>

                <?php 

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                  echo '
                  <tr>
                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$value["categoria"].'</td>
                    <td>                

                      <div class="btn-group">                  

                        <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></button>';

                        if ($_SESSION["perfil"] == "Administrador") {

                          echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'" data-toggle="tooltip" title="Eliminar"><i class="fas fa-times"></i></button>';

                        }

                      echo '</div>

                    </td>
                  </tr>';
                }

                ?>          
                              
                </tbody>

              </table>

            </div>

         </div>
          
        </div>
        
      </div>
    
  </section>
  
</div>

<!--=====================================
MODAL AGREGAR CATEGORIA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-info">

          <h5 class="modal-title" id="staticBackdropLabel">Agregar categoría</h5>
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <!-- ENTRADA PARA EL NOMBRE -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-th"></i></span>

              </div>

              <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoria" required>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default float-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>

        <?php 

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORIA
======================================-->

<div id="modalEditarCategoria" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-info">

          <h5 class="modal-title" id="staticBackdropLabel2">Editar categoría</h5>
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <!-- ENTRADA PARA EL NOMBRE -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-th"></i></span>

              </div>

              <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

              <input type="hidden" name="idCategoria" id="idCategoria">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default float-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php 

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<?php 

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>