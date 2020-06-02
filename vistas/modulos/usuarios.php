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

            Administrar usuarios

          </h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="breadcrumb-item active">Administrar usuarios</li>

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
        
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                Agregar Usuario
              </button>

            </div>
        
            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Foto</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Último login</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

                <tbody>

                <?php

                  $item = null;
                  $valor = null;

                  $usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

                  foreach ($usuarios as $key => $value) {
                    
                    echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["nombre"].'</td>
                            <td>'.$value["usuario"].'</td>';

                            if ($value["foto"] != "") {
                              
                              echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                            } else {

                              echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                            }
                            
                            echo '<td>'.$value["perfil"].'</td>';

                            if ($value["estado"] != 0) {

                              echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                            } else {

                              echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                            }
                            
                            
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
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarUsuario" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-gradient-info">

          <h5 class="modal-title" id="staticBackdropLabel">Agregar usuario</h5>
        
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

              <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL USUARIO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              
              </div>

              <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

            </div>

          </div>

          <!-- ENTRADA PARA LA CONTRASEÑA -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-lock"></i></span>

              </div>

              <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

            </div>

          </div>

          <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-users"></i></span>

              </div>

              <select class="form-control input-lg" name="nuevoPerfil">
                <option value="">Seleccionar perfil</option>
                <option value="Administrador">Administrador</option>
                <option value="Especial">Especial</option>
                <option value="Vendedor">Vendedor</option>
              </select>

            </div>

          </div>

          <!-- ENTRADA PARA SUBIR FOTO -->
          
          <div class="form-group">

            <div class="input-group mb-3">
              
              <div class="custom-file">
                
                <input type="file" class="custom-file-input nuevaFoto" name="nuevaFoto" id="panel">

                <label class="custom-file-label" for="panel">SUBIR FOTO</label>

              </div>

            </div>

            <p class="help-block">Peso máximo de la foto 2MB</p>

            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            
           <!--  <div class="panel">SUBIR FOTO</div>
            <input type="file" class="nuevaFoto" name="nuevaFoto">
            <p class="help-block">Peso maximo de la foto 2MB</p>
            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px"> -->

          </div>     

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default float-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-gradient-info">

          <h5 class="modal-title" id="staticBackdropLabel2">Editar usuario</h5>
        
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

              <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL USUARIO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-key"></i></span>

              </div>

              <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

            </div>

          </div>

          <!-- ENTRADA PARA LA CONTRASEÑA -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-lock"></i></span>

              </div>

              <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
              <input type="hidden" id="passwordActual" name="passwordActual">

            </div>

          </div>

          <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-users"></i></span>

              </div>

              <select class="form-control input-lg" name="editarPerfil">
                <option value="" id="editarPerfil"></option>
                <option value="Administrador">Administrador</option>
                <option value="Especial">Especial</option>
                <option value="Vendedor">Vendedor</option>
              </select>

            </div>

          </div>

          <!-- ENTRADA PARA SUBIR FOTO -->
          
          <div class="form-group">

            <div class="input-group">
              
              <div class="custom-file">
                
                <input type="file" class="custom-file-input nuevaFoto" name="editarFoto" id="panel2">

                <label class="custom-file-label" for="panel2">SUBIR FOTO</label>

              </div>

            </div>

            <p class="help-block">Peso máximo de la foto 2MB</p>

            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            <input type="hidden" name="fotoActual" id="fotoActual">
            
            <!-- <div class="panel">SUBIR FOTO</div>
            <input type="file" class="nuevaFoto" name="editarFoto">
            <p class="help-block">Peso maximo de la foto 2MB</p>
            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            <input type="hidden" name="fotoActual" id="fotoActual"> -->

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default float-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

        <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?>