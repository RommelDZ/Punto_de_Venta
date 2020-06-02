<?php 

if ($_SESSION['perfil'] == "Especial") {
  
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

            Administrar clientes

          </h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="breadcrumb-item active">Administrar clientes</li>

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
        
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
                Agregar cliente
              </button>

            </div>
        
            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Cédula Identidad</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Fecha Nacimiento</th>
                    <th>Total compras</th>
                    <th>Última compra</th>
                    <th>Fecha Registro</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

                <tbody>

                <?php 

                  $item = null;
                  $valor = null;

                  $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                  foreach ($clientes as $key => $value) {
                    
                    echo '
                    <tr>
                      <td>'.($key + 1).'</td>
                      <td>'.$value["nombre"].'</td>
                      <td>'.$value["documento"].'</td>
                      <td>'.$value["email"].'</td>
                      <td>'.$value["telefono"].'</td>
                      <td>'.$value["direccion"].'</td>
                      <td>'.$value["fecha_nacimiento"].'</td>
                      <td>'.$value["compras"].'</td>
                      <td>'.$value["ultima_compra"].'</td>
                      <td>'.$value["fecha"].'</td>
                      <td>                
                        <div class="btn-group">                  
                          <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'" data-toggle="tooltip" title="Editar"><i class="fas fa-pencil-alt"></i></button>';

                          if ($_SESSION["perfil"] == "Administrador") {

                            echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'" data-toggle="tooltip" title="Eliminar"><i class="fas fa-times"></i></button>';

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

    </div>
    
  </section>
  
</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-gradient-info">

          <h5 class="modal-title" id="staticBackdropLabel">Agregar cliente</h5>
        
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
              
                <span class="input-group-text"><i class="fas fa-user"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL CI -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-key"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="nuevoDocumentoId" placeholder="Ingresar CI" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL EMAIL -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="nuevoEmail" placeholder="Ingresar email" data-inputmask="'alias': 'email'" inputmode="email" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL TELÉFONO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-phone"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask': '99-999999'" required>

            </div>

          </div>

          <!-- ENTRADA PARA LA DIRECCIÓN -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

            </div>

          </div>

          <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha de nacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" inputmode="numeric" required>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default float-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>

      <?php 

        $crearCliente = new ControladorClientes();
        $crearCliente->ctrCrearCliente(); 

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-gradient-info">

          <h5 class="modal-title" id="staticBackdropLabel2">Editar cliente</h5>
        
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
              
                <span class="input-group-text"><i class="fas fa-user"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="editarCliente" id="editarCliente" required>
              <input type="hidden" name="idCliente" id="idCliente">

            </div>

          </div>

          <!-- ENTRADA PARA EL CI -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-key"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="editarDocumentoId"  id="editarDocumentoId" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL EMAIL -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="editarEmail" id="editarEmail" data-inputmask="'alias': 'email'" inputmode="email" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL TELÉFONO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-phone"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask': '99-999999'" required>

            </div>

          </div>

          <!-- ENTRADA PARA LA DIRECCIÓN -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-map-marker"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="editarDireccion" id="editarDireccion" required>

            </div>

          </div>

          <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="editarFechaNacimiento" id="editarFechaNacimiento" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" inputmode="numeric" required>

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

      </form>

      <?php 

        $editarCliente = new ControladorClientes();
        $editarCliente->ctrEditarCliente(); 

      ?>

    </div>

  </div>

</div>

<?php 

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente->ctrEliminarCliente(); 

?>
