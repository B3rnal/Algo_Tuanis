<?php 
require "cnx.php";

$sql="select * from categorias";
$categorias=$cnx->query($sql);
?>
<html lang = "en">
	<head>
		<meta charset="UTF-8">
		<title>AlgoTuanis!</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel = "stylesheet" href="css/bootstrap.min.css">
		<link rel = "stylesheet" href="css/estilos.css">
		<link rel = "stylesheet" href="css/maps.css">
		<link rel = "stylesheet" href="css/maps-custom.css">
	</head>
	<body>
		<header>
			<nav class = "navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-at">
							<span class="sr-only">Desplegar / Ocultar Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="index.html" class="navbar-brand">AlgoTuanis!</a>
					</div>
					<!--Inicia Menu-->
					<div class="collapse navbar-collapse" id="navegacion-at">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.html">Inicio</a></li>
							<li class=""><a href="perfilUsuario.html">Mi Perfil</a></li>
							<li class=""><a href="ingresarPunto.html">Ingresar Punto</a></li>
							<li class=""><a href="#">Mis Sitios</a></li>
						</ul>			
					</div>
				</div>				
			</div>
			</nav>
		</header>
		
		<section  class="main row">
			<div  class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
				
				<div id = "form" class = "container">	
				<form id="formSearch">				
				
								<!--Div del buscador-->
								<div class="row buscador">
									<input type="text" class="form-control " name="search_value" placeholder="Buscar" id="lbBuscar">
									<button class="btn btn-primary" id="btnBuscar">
										<span class="glyphicon glyphicon-search"></span>
									</button>
									
								</div>
								<!--Div de los checkbox-->	
								<div id="divCheckbox" style = 'display:none'>
									<?php
										while($row = $categorias->fetch_assoc()) {
									?>
										<label class="checkbox-inline"><input type="checkbox" name = "categoria[]" value="<?php echo $row['id_categorias'] ?>"><?php echo  utf8_encode($row["nombre_categoria"]) ?></label>	
									<?php 
										}
									?>
									
									<button class="btn btn-danger" id="btnCancelar" style = 'display:none'>
										<span class="glyphicon glyphicon-remove-circle"></span>
									</button>	  
								</div>
				</form>
				</div>
				
				<!--Div del mapa-->	
				<div id='map_view'></div>
			</div>
		</section>	
				
		<script src = "js/jquery-1.11.3.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/maps.js"></script>
		<script src = "js/maps-functions.js"></script>		
		<script src = "js/js.js"></script>
	</body>
</html>