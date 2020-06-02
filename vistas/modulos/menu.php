<aside class="main-sidebar elevation-4 sidebar-dark-success">

	<a href="inicio" class="brand-link">

  	<img src="vistas/img/plantilla/icono-blanco.png" alt="Inventory Sytem Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

  	<span class="brand-text font-weight-light">
  		Inventory SYSTEM
  	</span>

  </a>
	
	<div class="sidebar">

		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			
			<div class="image">

			<?php

			if ($_SESSION["foto"] != "") {

				echo '<img src="'.$_SESSION["foto"].'" class="img-circle elevation-2">';
			
			} else {

				echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle elevation-2">';

			}

			?>

      </div>

      <div class="info">

        <a href="#" class="d-block"><?php echo $_SESSION["nombre"]?></a>

      </div>

    </div>

    <nav class="mt-2">
		
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

			<?php 

			if ($_SESSION["perfil"] == "Administrador") {

			 	echo '
			 	<li class="nav-item">
					
					<a href="inicio" class="nav-link active" id="inicio">
						
						<i class="nav-icon fas fa-home"></i>
						<p>Inicio</p>

					</a>

				</li>

				<li class="nav-item">
					
					<a href="usuarios" class="nav-link" id="usuarios">
						
						<i class="nav-icon fas fa-user"></i>
						<p>Usuarios</p>

					</a>

				</li>';

			} 	

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial") {

			 	echo '
			 	<li class="nav-item">
					
					<a href="categorias" class="nav-link" id="categorias">
						
						<i class="nav-icon fas fa-th"></i>
						<p>Categorias</p>

					</a>

				</li>

				<li class="nav-item">
					
					<a href="productos" class="nav-link" id="productos">
						
						<i class="nav-icon fab fa-product-hunt"></i>
						<p>Productos</p>

					</a>

				</li>';

			} 	

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor") {

			 	echo '
			 	<li class="nav-item">
					
					<a href="clientes" class="nav-link" id="clientes">
						
						<i class="nav-icon fas fa-users"></i>
						<p>Clientes</p>

					</a>

				</li>';

			}

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor") {

			 	echo '
			 	<li class="nav-item has-treeview">
					
					<a href="" class="nav-link" id="ventas">
						
						<i class="nav-icon fas fa-list-ul"></i>
						<p>
							Ventas
							<i class="right fas fa-angle-left"></i>
						</p>

					</a>

					<ul class="nav nav-treeview">
						
						<li class="nav-item">
							
							<a href="ventas" class="nav-link" id="ventas">
								
								<i class="nav-icon far fa-circle"></i>
								<p>Administrador ventas</p>
							
							</a>
						
						</li>

						<li class="nav-item">
							
							<a href="crear-venta" class="nav-link" id="ventas">
								
								<i class="nav-icon far fa-circle"></i>
								<p>Crear ventas</p>
							
							</a>
						
						</li>';

						if ($_SESSION["perfil"] == "Administrador") {

							echo '<li class="nav-item">
							
								<a href="reportes" class="nav-link" id="ventas">
									
									<i class="nav-icon far fa-circle"></i>
									<p>Reporte de ventas</p>
								
								</a>
							
							</li>';

						}	
				
					echo '</ul>

				</li>';

			}

			?>	

			</ul>

		</nav>

	</div>

</aside>