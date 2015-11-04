<?php 
@session_start();
if(!isset($_SESSION["current_user"])){
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';  // change accordingly

	header("Location: http://$host$uri/$extra");
	exit;
}
require "cnx.php";
$sql="select locations.id_location, name_location,description, telefono, email, facebook, youtube 
from locations where id_usuario=".$_SESSION["current_user"]["id_users"];
$puntos=$cnx->query($sql);

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
						<a href="index.php" class="navbar-brand">AlgoTuanis!</a>
					</div>
					<!--Inicia Menu-->
					<div class="collapse navbar-collapse" id="navegacion-at">
						<ul class="nav navbar-nav">
							<li class=""><a href="index.php">Inicio</a></li>
							<li class=""><a href="perfilUsuario.php">Mi Perfil</a></li>
							<li class=""><a href="ingresarPunto.php">Ingresar Punto</a></li>
							<li class="active"><a href="misPuntos.php">Mis Sitios</a></li>
						</ul>			
					</div>
				</div>				
			</div>
			</nav>
		</header>
		
		<section  class="main row">
			<div  class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
				
				<?php 
				while($row = $puntos->fetch_assoc()) {
				?>
					 <div class="panel-group">
					  <div class="panel panel-default">
					    <div class="panel-heading">
					      <h4 class="panel-title">
					        <a data-toggle="collapse" href="#collapse1"><?php echo $row["name_location"] ?></a>
					        <a href="detalle.php?id=<?php echo $row["id_location"] ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
					      </h4>
					    </div>
					    <div id="collapse1" class="panel-collapse collapse">
					    	<form>
						      	<div class="panel-body">
						      		<input value="<?php echo $row["id_location"] ?>" class="form-control"  name="id" type="hidden" >
						      		<div class="form-group">
										<label for = "Nombre">Nombre del Lugar:</label>			
										<input value="<?php echo $row["name_location"] ?>" class="form-control"  name="name" type="text" placeholder="Nombre">
									</div>
									
									<div class="form-group">
										<label for="description">Descripcion:</label>
										<textarea class="form-control" name="description"  placeholder="Escribe una descripcion del lugar"><?php echo $row["description"] ?></textarea>
									</div>

									<div class="form-group">
										<label for="telefono">Telefono</label>
										<textarea class="form-control" name="telefono"  placeholder="Escribe un telefono"><?php echo $row["telefono"] ?></textarea>
									</div>

									<div class="form-group">
										<label for="telefono">Email</label>
										<textarea class="form-control" name="email"  placeholder="Escribe un email"><?php echo $row["email"] ?></textarea>
									</div>

									<div class="form-group">
										<label for="facebook">Facebook</label>
										<textarea class="form-control" name="facebook" id="Facebook" placeholder="Escribe un url de facebook"><?php echo $row["facebook"] ?></textarea>
									</div>

									<div class="form-group">
										<label for="youtube">Youtube</label>
										<textarea class="form-control" name="youtube"  placeholder="Escribe un url de youtube"><?php echo $row["youtube"] ?></textarea>
									</div>

									<?php
										$sql="select id_categoria from categorias_location where id_location=".$row["id_location"];
										$categorias_punto=$cnx->query($sql);
										$current_cat=array();
										while($row2 = $categorias_punto->fetch_assoc()) {
											$current_cat[]=$row2["id_categoria"];
										}
										while($row3 = $categorias->fetch_assoc()) {
											$checked=in_array($row3["id_categorias"], $current_cat)?"checked":"";
									?>
										<label for=""><?php echo utf8_encode($row3["nombre_categoria"]) ?></label>
										<input type="checkbox" name="cat[]" value="<?php echo $row3["id_categorias"] ?>" <?php echo $checked?>>
										<br/>
									<?php
											
										}
									?>

						      	</div>
					      		<div class="panel-footer"><button class="btn btn-primary center-block" type="submit" id="save_place">Guardar</button></div>
					    	</form>
					    </div>
					  </div>
					</div>
				<?php
					
				}
				
				
				?>
				
				
			</div>
		</section>	
				
		<script src = "js/jquery-1.11.3.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src = "js/maps.js"></script>
		<script src = "js/maps-functions.js"></script>		
		<script src = "js/js.js"></script>
	</body>
</html>