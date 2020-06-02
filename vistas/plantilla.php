<?php

session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sistema de Inventarios</title>

  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- SweetAlert 2 -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2/themes/bootstrap-4.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

   <!-- Daterange picker --> 
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">

  <!-- Morris.js charts -->
  <link rel="stylesheet" href="vistas/plugins/morris.js/morris.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/plugins/fastclick/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/moment/moment.min.js"></script>
  <script src="vistas/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

  <!-- JQueryNumber -->
  <script src="vistas/plugins/jqueryNumber/jqueryNumber.min.js"></script>

  <!-- Daterange picker --> 
  <script src="vistas/plugins/daterangepicker/moment.min.js"></script>
  <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts --> 
  <script src="vistas/plugins/raphael/raphael.min.js"></script>
  <script src="vistas/plugins/morris.js/morris.min.js"></script>

  <!-- ChartJS --> 
  <script src="vistas/plugins/chart.js/Chart.js"></script>

  <!-- Numeral.js 2.0.6 --> 
  <script src="vistas/plugins/numeral.js/numeral.js"></script>

</head>

<!--=====================================
  CUERPO DOCUMENTO
======================================-->

<?php

if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
  
  echo '
  <body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">';
  /*=============================================
  CABEZOTE
  =============================================*/
      
  include "modulos/cabezote.php";

  /*=============================================
  MENU
  =============================================*/

  include "modulos/menu.php";

  /*=============================================
  CONTENIDO
  =============================================*/

  if (isset($_GET["ruta"])) {
    
    if ($_GET["ruta"] == "inicio" || 
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "categorias" ||
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "ventas" ||
        $_GET["ruta"] == "crear-venta" ||
        $_GET["ruta"] == "editar-venta" ||
        $_GET["ruta"] == "reportes" ||
        $_GET["ruta"] == "salir") {

      include "modulos/".$_GET["ruta"].".php";

    } else {

      include "modulos/404.php";

    }

  } else {

    include "modulos/inicio.php";

  }

  /*=============================================
  FOOTER
  =============================================*/

  include "modulos/footer.php";

  echo '</div>';

} else {

  echo '
  <body class="hold-transition sidebar-mini login-page">';

  include "modulos/login.php";

}

?>

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>

</body>
</html>
