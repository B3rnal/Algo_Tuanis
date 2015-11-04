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

			$sql="Select * from comments where id_locations=".$id;
			$results=$cnx->query($sql);
			$data_comments=array();
			while($row = $results->fetch_assoc()) {
				$data_comments[]=$row["text_comments"];
			}

			$sql="Select * from ratings where id_locations=".$id;
			$results=$cnx->query($sql);
			$rating_final=0;
			$count=0;
			while($row = $results->fetch_assoc()) {
				$rating_final+=$row["rating"];
				$count++;
			}
			if($rating_final>0){
				$rating_final=$rating_final/$count;
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
							<a href="index.php" class="navbar-brand">AlgoTuanis!</a>
					</div>
					<!--Inicia Menu-->
					<div class="collapse navbar-collapse" id="navegacion-at">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Inicio</a></li>
							<li class=""><a href="perfilUsuario.php">Mi Perfil</a></li>
							<li class=""><a href="ingresarPunto.php">Ingresar Punto</a></li>
							<li class=""><a href="misPuntos.php">Mis Sitios</a></li>
						</ul>			
					</div>
				</div>				
			</div>
			</nav>
		</header>
		
		<section class="main row">
			<div  class="col-xs-12 col-sm-8 col-md-9 col-lg-9">	
			
				
				<div class="col-sm-12">
					<h1><?php echo $data["name_location"] ?>
						<?php 
							for($i=0; $i<$rating_final; $i++){
								if($rating_final-$i>1){
									echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
								}else{
									echo '<span class="glyphicon glyphicon-star half" aria-hidden="true"></span>';
								}
								
							}
						?>
					</h1>
					<p><?php echo $data["description"] ?></p>
					<!--<img src="images/rest.jpg" class="img-responsive img-rounded">	-->
					<div id="map_detalle"></div>				
				</div>
				<hr/>		
				<!-- Div de los datos premium solo se ve si la variable premium es igual a 1-->
				<div class="col-sm-12">
				<?php if($data["id_usuario"]!=0){?>
				
				
				
					<p>
						Teléfono:<?php echo !empty($data["telefono"])?$data["telefono"]:"No registrado" ?>
					</p>
					<p>
						Email:<?php echo !empty($data["email"])?$data["email"]:"No registrado"?>
					</p>
					
					<a class="btn btn-lg btn-block btn-social btn-facebook" href="<?php echo $data["facebook"] ?>">
						<i class="fa fa-facebook-official"></i> Buscanos en Facebook
					</a>
					<br/>
					<a class="btn  btn-lg btn-block btn-social btn-google" href="<?php echo $data["youtube"] ?>">
						<i class="fa fa-youtube"></i> Buscanos en Youtube
					</a>
					
					
				
				<?php }else{ ?>	
					<form id="form_paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="22PZJ3RXFK9AE">
						<input type="hidden" id="id_user" value="<?php echo $_SESSION["current_user"]["id_users"] ?>">
						<input type="hidden" id="id_location" value="<?php echo $id ?>">
						<input id="btn_paypal" type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
					</form>
					
				<?php } ?>
				</div>
				<hr/>					
				<div >
					<form action = "" class="container" id="new_comment_form">	
						<input type="hidden" name="id" value=<?php echo $id ?>>							
						<div class="form-group">
							<label for="Mensaje">Dejar un comentario:</label>
							<textarea  name="comment_text" class="form-control" id="Comentario" placeholder="Escribe un comentario sobre este lugar"></textarea>
						</div>							
						<input id="input-id" name="rating" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm">
						<br/>
						<button type="submit" class="btn btn-primary center-block">Guardar Comentario</button><br/>									
					</form>
					<hr/>
				</div>	
				<div class="col-sm-12">
					<?php 
						foreach ($data_comments as $key => $value) {
							echo "<blockquote>".$value."</blockquote> ";
						}
					?>
					 
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