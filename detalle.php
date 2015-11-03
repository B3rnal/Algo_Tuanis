
<html lang = "en">
	<head>
		<?php 
			require "cnx.php";
			$id=$_GET["id"];
			$sql="Select * from locations where id_location=".$id;
			$results=$cnx->query($sql);
			$data=null;
			while($row = $results->fetch_assoc()) {
				echo "<script type='text/javascript'>var lat=".$row["latitude"].";var long=".$row["longitude"].";</script>";
				$data=$row;
			}
			
		
		?>
		<meta charset="UTF-8">
		<title>AlgoTuanis!</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel = "stylesheet" href="css/bootstrap.min.css">
		<link rel = "stylesheet" href="css/estilos.css">
		<link rel = "stylesheet" href="css/star-rating.min.css">
		<link rel = "stylesheet" href="css/maps.css">
		<link rel = "stylesheet" href="css/maps-custom.css">
		<link rel = "stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">
		<link rel = "stylesheet" href="css/bootstrap-social.css">
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
				<hr/>		
				<div class="col-sm-12">
					<h1><?php echo $data["name_location"] ?></h1>
					<p><?php echo $data["description"] ?></p>
					<!--<img src="images/rest.jpg" class="img-responsive img-rounded">	-->
					<div id="map_detalle"></div>				
				</div>
				
				<!-- Div de los datos premium solo se ve si la variable premium es igual a 1-->
				<div class = "container premium" <?php if($data["premium"] == 0){?> style="display:none"><?php } ?>
					<br/>
					 <hr/>
					 <table>
						<tr>
							<div >
								<td><p><strong>Telefono: </strong></p></td>
								<td><p><?php echo $data["telefono"] ?></p></td>
							</div>
						</tr>
						<tr>
							<td><p><strong>Email: </strong></p></td>
							<td><p> <?php echo $data["email"] ?> </p></td>
						</tr>
					 </table>					 
					<hr/>
					
					<a class="btn btn-lg btn-block btn-social btn-facebook" href="<?php echo $data["facebook"] ?>">
						<i class="fa fa-facebook-official"></i> Buscanos en Facebook
					</a><br/>
					<a class="btn  btn-lg btn-block btn-social btn-google" href="<?php echo $data["youtube"] ?>">
						<i class="fa fa-youtube"></i> Buscanos en Youtube
					</a>
					<hr/>
				</div>
				
				<br/>					
				<div>
					<form action = "" class="container">								
						<div class="form-group">
							<label for="Mensaje">Dejar un comentario:</label>
							<textarea class="form-control" id="Comentario" placeholder="Escribe un comentario sobre este lugar"></textarea>
						</div>							
						<input id="input-id" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm" >
						<br/>
						<button type="submit" class="btn btn-primary center-block">Guardar Comentario</button><br/>									
					</form>
					<hr/>
				</div>	
				<div>
					 <blockquote>Esto es un comment de prueba hardcoded</blockquote> 
					 <blockquote>Esto es otro comment de prueba hardcoded</blockquote> 
				</div>				

				<div <?php if($data["premium"] == 1){?> style="display:none"><?php } ?>>
					<a  class ="btn btn-success center-block" href="editarDatos.php?id=<?php echo $id?>&name_location=<?php echo $data["name_location"]?>&description=<?php echo $data["description"]?>&latitud=<?php echo $data["latitude"]?>&longitud=<?php echo $data["longitude"]?>">Premium</a>
				</div>				
			</div>	

			
		</section>
				
		<script src = "js/jquery-1.11.3.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/star-rating.min.js"></script>
		<script src = "js/maps.js"></script>
		<script src = "js/maps-functions.js"></script>
		<script src = "js/js.js"></script>
	</body>
</html>