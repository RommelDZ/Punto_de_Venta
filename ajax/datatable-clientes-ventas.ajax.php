<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class TablaClientesVentas {

	/*=============================================
	MOSTRAR LA TABLA DE CLIENTES
	=============================================*/
		
	public function mostrarTablaClientesVentas() {

		$item = null;
		$valor = null;

		$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

		$datosJson = '{
			"data": [';

			for ($i = 0; $i < count($clientes); $i++) { 
			
				/*=============================================
				TRAEMOS LAS ACCIONES
				=============================================*/

				$botones = "<div class='btn-group'><button class='btn btn-primary seleccionarCliente recuperarBoton' idCliente='".$clientes[$i]["id"]."'data-toggle='tooltip' title='Seleccionar'><i class='fas fa-reply'></i></button></div>";
				
				$datosJson .='[
					
					"'.($i+1).'",
					"'.$clientes[$i]["id"].'",
					"'.$clientes[$i]["nombre"].'",					
					"'.$clientes[$i]["documento"].'",
					"'.$botones.'"
				],';
			}

			$datosJson = substr($datosJson, 0, -1);

		$datosJson .= ']

		}';
		
		echo $datosJson;
	
	}

}

/*=============================================
ACTIVAR TABLA DE CLIENTES
=============================================*/

$activarProductosVentas =  new TablaClientesVentas();
$activarProductosVentas->mostrarTablaClientesVentas();