<!DOCTYPE html>
<html lang = "en">
	<head>
	
	<?php 
		require "cnx.php";
		
		$id=$_GET["id"];
		$nombre=$_GET["name_location"];
		$descripcion=$_GET["description"];
			
	?>

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
		
		<section class="main row">
			<div  class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
				
				<div id = "form" class = "container">					
				
								<!--Div del buscador-->
								<div class="row buscador">
									<input type="text" class="form-control" placeholder="Buscar" id="lbBuscar">
									<button class="btn btn-primary" id="btnBuscar">
										<span class="glyphicon glyphicon-search"></span>
									</button>
									<button class="btn btn-danger" id="btnCancelar" style = 'display:none'>
										<span class="glyphicon glyphicon-remove-circle"></span>
									</button>
								</div>
								<!--Div de los checkbox-->	
								<div id="divCheckbox" style = 'display:none'>
									<label class="checkbox-inline"><input type="checkbox" id = "tagAlimentacion" value="">Alimentacion</label>
									<label class="checkbox-inline"><input type="checkbox" id = "tagHospedaje" value="Hospedaje">Hospedaje</label>
									<label class="checkbox-inline"><input type="checkbox" id = "tagSalud" value="Salud">Salud</label>
									<label class="checkbox-inline"><input type="checkbox" id = "tagServicio" value="Servicio">Servicio</label>
									<label class="checkbox-inline"><input type="checkbox" id = "tagEntretenimiento" value="Entretenimiento">Entretenimiento</label>			  
								</div>
				
				</div>
				
				
				<div class="container">
					<hr/>
					<form action = "guardarDatosPremium.php?id=<?php echo $id ?>" method= "post" class="">
					
						<div class="form-group">
							<label for = "nombre">Nombre del Lugar:</label>			
							<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre" value="<?php echo $nombre ?>"/>
						</div>
						
						<div class="form-group">
							<label for="descripcion">Detalles:</label>
							<textarea class="form-control" id="detalles" name="detalles" placeholder="Escribe una descripcion detallada del lugar:"><?php echo $descripcion ?></textarea>
						</div>
						
						<div class="form-group">
							<label for = "nombre">Telefono:</label>			
							<input class="form-control" id="telefono" name="telefono" type="text" placeholder="Telefono">
						</div>
						
						<div class="form-group">
							<label for = "nombre">Correo Electronico:</label>			
							<input class="form-control" id="email" name="email" type="text" placeholder="Escriba su correo electronico">
						</div>
						
						<div class="form-group">
							<label for = "nombre">Cuenta de Facebook:</label>			
							<input class="form-control" id="facebook" name="facebook" type="text" placeholder="Escriba la direccion de su cuenta de Facebook">
						</div>
						
						<div class="form-group">
							<label for = "nombre">Cuenta de Youtube:</label>			
							<input class="form-control" id="youtube" name="youtube" type="text" placeholder="Escriba la direccion de su cuenta de Youtube">
						</div>
											
						<div class="">
							<button  type ="submit" class ="btn btn-success center-block">Guardar</button>
						</div>				
					</form>
				</div>		

			</div>
		</section>	
		
		<script src = "js/jquery-1.11.3.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/maps.js"></script>
		<script src = "js/maps-functions.js"></script>		
		<script src = "js/js.js"></script>
	</body>
</html>



