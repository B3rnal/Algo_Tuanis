
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
							<li class=""><a href="index.html">Inicio</a></li>
							<li class=""><a href="buscar.html">Buscar</a></li>
							<li class=""><a href="perfil.html">Mi Perfil</a></li>
							<li class="active"><a href="calificar.html">Calificar</a></li>
							<li class=""><a href="ingresarPunto.html">Ingresar Punto</a></li>
						</ul>
						<form action="" class="navbar-form" role="search">
							<div class="form-group form-inline">
								<input type="text" class="form-control" placeholder="Buscar">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-search"></span>
								</button>
							</div>
						</form>
					</div>
				</div>				
			</div>
			</nav>
		</header>
		
		<section class="main row">
			<div  class="col-xs-12 col-sm-8 col-md-9 col-lg-9">			
				<div class="col-sm-12">
					<h1><?php echo $data["name_location"] ?></h1>
					<p><?php echo $data["description"] ?></p>
					<!--<img src="images/rest.jpg" class="img-responsive img-rounded">	-->
					<div id="map_detalle"></div>				
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
						<button type="submit" class="btn btn-primary center-block">Calificar</button><br/>									
					</form>
				</div>	
				<div>
					 <blockquote>Esto es un comment de prueba hardcoded</blockquote> 
					 <blockquote>Esto es otro comment de prueba hardcoded</blockquote> 
				</div>			
			</div>			
		</section>
		
		
		<script src = "js/jquery-1.11.3.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/star-rating.min.js"></script>
		<script src = "js/maps.js"></script>
		<script src = "js/maps-functions.js"></script>
	</body>
</html>