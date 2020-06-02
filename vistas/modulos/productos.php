<?php 

if ($_SESSION['perfil'] == "Vendedor") {
  
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

            <small>Administrar productos</small>

          </h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="breadcrumb-item active">Administrar productos</li>

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
        
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
                Agregar producto
              </button>

            </div>
        
            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaProductos" width="100%">
                
                <thead>
                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Precio compra</th>
                    <th>Precio venta</th>
                    <th>Agregados</th>
                    <th>Acciones</th>
                  </tr>

                </thead>

              </table>

              <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

            </div>
            
          </div>

        </div>

      </div>

    </div>
   
  </section>
  
</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarProducto" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-gradient-info">

          <h5 class="modal-title" id="staticBackdropLabel">Agregar producto</h5>
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-th"></i></span>

              </div>

              <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                <option value="">Seleccionar categoría</option>

                <?php 

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  } 
                ?>
              </select>

            </div>

          </div>

          <!-- ENTRADA PARA EL CÓDIGO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-code"></i></span>

              </div>

              <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>

            </div>

          </div>

          <!-- ENTRADA PARA LA DESCRIPCIÓN -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>

              </div>

              <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

            </div>

          </div>

          <!-- ENTRADA PARA STOCK -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-check"></i></span>

              </div>

              <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

            </div>

          </div>

          <!-- ENTRADA PARA PRECIO COMPRA -->
          
          <div class="form-group row">

            <div class="col-xs-12 col-sm-6">

              <div class="input-group mb-3">

                <div class="input-group-prepend">
              
                  <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>

                </div>

                <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any"  placeholder="Precio de compra" required>

              </div>
              
            </div>  
         
          <!-- ENTRADA PARA PRECIO VENTA -->

            <div class="col-xs-12 col-sm-6">           
                      
              <div class="input-group mb-3">

                <div class="input-group-prepend">
                
                  <span class="input-group-text"><i class="fa fa-arrow-down"></i></span>

                </div>

                <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de venta" required>

              </div>

              <br>

              <!-- CHECKBOX PARA PORCENTAJE -->

              <div class="col-xs-6">
                
                <div class="form-group">
                  
                  <label>
                    
                    <input type="checkbox" class="minimal porcentaje" checked>
                    Utilizar porcentaje

                  </label>

                </div>

              </div>

              <!-- ENTRADA PARA PORCENTAJE -->

              <div class="col-xs-6" style="padding: 0">
                
                <div class="input-group mb-3">
                  
                  <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                  <div class="input-group-append">

                    <span class="input-group-text"> <i class="fas fa-percent"></i></span>

                  </div>

                </div>

              </div>

            </div>

          </div>

          <!-- ENTRADA PARA SUBIR IMAGEN -->
          
          <div class="form-group">

            <div class="input-group mb-3">

              <div class="custom-file">
            
                <input type="file" class="custom-file-input nuevaImagen" name="nuevaImagen" id="panel">

                <label class="custom-file-label" for="panel">SUBIR IMAGEN</label>

              </div>

            </div>

            <p class="help-block">Peso máximo de la imagen 2MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default float-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar producto</button>

        </div>

      </form>

      <?php

        $crearProducto = new ControladorProductos();
        $crearProducto->ctrCrearProducto();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header bg-gradient-info">

          <h5 class="modal-title" id="staticBackdropLabel2">Editar producto</h5>
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text"><i class="fas fa-th"></i></span>

              </div>

              <select class="form-control input-lg" name="editarCategoria" readonly required>

                <option id="editarCategoria"></option>
               
              </select>

            </div>

          </div>

          <!-- ENTRADA PARA EL CÓDIGO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-code"></i></span>

              </div>

              <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

            </div>

          </div>

          <!-- ENTRADA PARA LA DESCRIPCIÓN -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>

              </div>

              <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

            </div>

          </div>

          <!-- ENTRADA PARA STOCK -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-check"></i></span>

              </div>

              <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

            </div>

          </div>

          <!-- ENTRADA PARA PRECIO COMPRA -->
          
          <div class="form-group row">

            <div class="col-xs-12 col-sm-6">

              <div class="input-group mb-3">

                <div class="input-group-prepend">
              
                  <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>

                </div>

                <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0" step="any" required>

              </div>
              
            </div>  
         
          <!-- ENTRADA PARA PRECIO VENTA -->

            <div class="col-xs-12 col-sm-6">           
                      
              <div class="input-group mb-3">

                <div class="input-group-prepend">
                
                  <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>

                </div>

                <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" step="any" readonly required>

              </div>

              <br>

              <!-- CHECKBOX PARA PORCENTAJE -->

              <div class="col-xs-6">
                
                <div class="form-group">
                  
                  <label>
                    
                    <input type="checkbox" class="minimal porcentaje" checked>
                    Utilizar porcentaje

                  </label>

                </div>

              </div>

              <!-- ENTRADA PARA PORCENTAJE -->

              <div class="col-xs-6" style="padding: 0">
                
                <div class="input-group mb-3">
                  
                  <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                  <div class="input-group-prepend">

                    <span class="input-group-text"> <i class="fas fa-percent"></i></span>

                  </div>

                </div>

              </div>

            </div>

          </div>

          <!-- ENTRADA PARA SUBIR IMAGEN -->
          
          <div class="form-group">

            <div class="input-group">
              
              <div class="custom-file">
            
                <input type="file" class="custom-file-input nuevaImagen" name="editarImagen" id="panel2">

                <label class="custom-file-label" for="panel2">SUBIR IMAGEN</label>

                </div>

            </div>

            <p class="help-block">Peso máximo de la imagen 2MB</p>

            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            <input type="hidden" name="imagenActual" id="imagenActual">

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

        $editarProducto = new ControladorProductos();
        $editarProducto->ctrEditarProducto();

      ?>

    </div>

  </div>

</div>

<?php 

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto->ctrEliminarProducto();

?>