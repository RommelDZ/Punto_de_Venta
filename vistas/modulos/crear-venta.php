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

            Crear venta

          </h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>

            <li class="breadcrumb-item active">Crear venta</li>

          </ol>

        </div>

      </div>

    </div>

  </div>
  
  <section class="content">

    <div class="container-fluid">

      <div class="row">
        
        <!--=============================================
        EL FORMULARIO
        =============================================--> 
       
        <div class="col-lg-5 col-xs-12">

          <div class="card card-outline card-success">

            <div class="card-header"></div>

            <form role="form" method="post" class="formularioVenta">

              <div class="card-body">   

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
                                               
                <div class="input-group mb-3">
                  
                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-user"></i></span>

                  </div>

                  <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION['nombre']?>" readonly>
                  <input type="hidden" name="idVendedor" value="<?php echo $_SESSION['id']?>">                  

                </div>

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================-->
                
                <div class="input-group mb-3">
                  
                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-key"></i></span>

                  </div>

                  <?php 

                  $item = null;
                  $valor = null;

                  $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                  if (!$ventas) {
                    
                    echo  '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';

                  } else {

                    foreach ($ventas as $key => $value) {

                      
                    }

                    $codigo = $value["codigo"] + 1;

                    echo  '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';

                  }

                  ?>
                    
                </div> 

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================-->
                
                <div class="input-group mb-3">
                  
                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fas fa-users"></i></span>

                  </div>

                  <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" data-toggle="modal" data-target="#modalSeleccionarCliente" data-dismiss="modal" required>
                    <option value="">Seleccionar cliente</option>
                      
                    <?php

                      // $item = null;
                      // $valor = null;

                      // $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                      // foreach ($categorias as $key => $value) {
                        
                      //   echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                      // }

                    ?>

                  </select>

                  <div class="input-group-append">

                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button>
                    
                  </div>

                </div> 

                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================-->
                
                <div class="input-group card nuevoProducto">

                 
                </div> 

                <input type="hidden" id="listaProductos" name="listaProductos">

                <!--=====================================
                BOTON PARA AGREGAR PRODUCTO
                ======================================-->
                
                <button type="button" class="btn btn-default d-block d-sm-block d-md-none btnAgregarProducto">Agregar productos</button>

                <div class="row justify-content-end">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->

                  <div class="col-lg-9">
                    
                    <table class="table">
                      
                      <thead>
                        
                        <tr>
                          
                          <th>Impuestos</th>
                          <th>Total</th>

                        </tr>

                      </thead>

                      <tbody>
                        
                        <tr>
                          
                          <td style="width: 40%">

                            <div class="input-group mb-3">
                              
                              <input type="number" class="form-control form-control-lg" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" min="0" placeholder="0" required>
                              <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>
                              <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <div class="input-group-append">

                                <span class="input-group-text"><i class="fas fa-percent"></i></span>

                              </div>
                              
                            </div>
                                                       
                          </td>

                          <td style="width: 60%">

                            <div class="input-group mb-3">

                              <div class="input-group-prepend">

                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>

                              </div>

                              <input type="text" class="form-control form-control-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                             
                            </div>
                                                       
                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>

                <!--=====================================
                ENTRADA MÉTDO DE PAGO
                ======================================-->

                <div class="row">
                  
                  <div class="col-lg-6" style="padding-right: 0px">
                    
                    <select class="custom-select" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                      <option value="">Seleccion método de pago</option>
                      <option value="Efectivo">Efectivo</option>
                      <option value="TC">Tarjeta Crédito</option>
                      <option value="TD">Tarjeta Débito</option>            
                    </select>

                  </div>

                  <div class="col-lg-6 cajasMetodoPago">
                    
                  </div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">
                  
                </div>                             

                <br>
                                 
              </div>
            
              <div class="card-footer">
                
                <button type="submit" class="btn btn-primary float-right">Guardar venta</button>

              </div> 

            </form>  

            <?php

              $guardarVenta = new ControladorVentas();
              $guardarVenta->ctrCrearVenta();

            ?>      

          </div>       

        </div>

        <!--=============================================
        LA TABLA DE PRODUCTOS
        =============================================-->

        <div class="col-lg-7 d-none d-md-block d-sm-block">
          
          <div class="card card-outline card-warning">

            <div class="card-header"></div>

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%">
                
                <thead>
                  
                  <tr>

                    <td style="width: 10px">#</td>
                    <td>Imagen</td>
                    <td>Código</td>
                    <td>Descripción</td>
                    <td>Stock</td>
                    <td>Acciones</td>

                  </tr>

                </thead>             

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

              <input type="email" class="form-control form-control-lg" name="nuevoEmail" placeholder="Ingresar email" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL TELÉFONO -->
          
          <div class="form-group">
            
            <div class="input-group mb-3">

              <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fas fa-phone"></i></span>

              </div>

              <input type="text" class="form-control form-control-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask': '99-999999'" data-mask required>

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

              <input type="text" class="form-control form-control-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha de nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

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
MODAL SELECCIONAR CLIENTE
======================================-->

<div id="modalSeleccionarCliente" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  
  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

      <div class="modal-header bg-gradient-primary">

        <h5 class="modal-title" id="staticBackdropLabel2">Listado de clientes</h5>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">
 
        <table class="table table-bordered table-striped dt-responsive tablaClientes" width="100%">
          
          <thead>
            
            <tr>

              <td style="width: 10px">#</td>
              <td>id</td>
              <td>Nombre</td>
              <td>Documento CI</td>                  
              <td>Acciones</td>

            </tr>

          </thead>             

        </table>

      </div>

    </div>

  </div>

</div>