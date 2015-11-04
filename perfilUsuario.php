<?php 
@session_start();
if(!isset($_SESSION["current_user"])){
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';  // change accordingly

	header("Location: http://$host$uri/$extra");
	exit;
}

?>
<html lang = "en">
	<head>
		<meta charset="UTF-8">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="js/face.js"></script>
		<script src="js/google.js"></script>
		<title>AlgoTuanis!</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
		<script src="https://apis.google.com/js/api:client.js"></script>
		<meta name="google-signin-client_id" content="637326049789-35e4huepoe90t9u9sp68t7tumi5aiovb.apps.googleusercontent.com">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel = "stylesheet" href="css/bootstrap.min.css">
		<link rel = "stylesheet" href="css/perfil.css">
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
							<li class="active"><a href="perfilUsuario.php">Mi Perfil</a></li>
							<li class=""><a href="ingresarPunto.php">Ingresar Punto</a></li>
							<li class=""><a href="misPuntos.php">Mis Sitios</a></li>
						</ul>			
					</div>
				</div>				
			</div>
			</nav>
		</header>
		
		<div class="container">
			<section class="main row">
			
				<div  class="col-xs-12">	
					<img src="<?php echo $_SESSION['current_user']['photo' ] ?>" />	
					<p><?php echo $_SESSION['current_user']['nombre' ] ?></p>
					<p><?php echo $_SESSION['current_user']['correo' ] ?></p>		
					
				</div>				
				
				
			</section>
		</div>
		
		
		<script src = "js/jquery-1.11.3.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
	</body>
</html>