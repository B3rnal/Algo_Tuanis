<?php
@session_start();
if(isset($_SESSION["current_user"])){
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'map.php';  // change accordingly

	header("Location: http://$host$uri/$extra");
	exit;
}
?>
<html lang = "en">
	<head>
		<meta charset="UTF-8">
		
		<title>AlgoTuanis!</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
		
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
						
						<a href="index.php" class="navbar-brand">AlgoTuanis!</a>
					</div>
				
					
				</div>				
			</div>
			</nav>
		</header>
		
		<div class="container">
			<section class="main row">
				<h1>Bienvenido!</h1>
				<div  class="col-xs-12">				
									

						<div class="fb-login-button " data-auto-logout-link="true">
							<a href="#" id="login" class="fb-login-button">Iniciar sesion</a>
						</div>
						<hr/>
						<div id="my-signin2" style="margin:0 auto; display:table"></div>

				</div>
						
						
			</section>
		</div>
		
		<script src = "js/jquery-1.11.3.min.js"></script>
		<script src = "js/bootstrap.min.js"></script>
		<script src="js/face.js"></script>
		<script src="js/google.js"></script>
		
		<script src="https://apis.google.com/js/api:client.js"></script>
		<!--SDK Facebook-->
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=1170714032956712";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<!--SDK Google-->
		<script>
			function onSuccess(googleUser) {
				name=googleUser.getBasicProfile().getName();
				email=googleUser.getBasicProfile().getEmail();
				photo=googleUser.getBasicProfile().getImageUrl();
				$.ajax({
				  url: "usuario.php?name="+name+"&email="+email+"&photo="+photo
				}).done(function(data) {
					location.reload();		
				});
			}
			function onFailure(error) {
			  console.log(error);
			}
			function renderButton() {
				gapi.signin2.render('my-signin2', {
			        'scope': 'https://www.googleapis.com/auth/plus.login',
			        'width': 180,
			        'height': 30,
			        'longtitle': true,
			        'theme': 'dark',
			        'onsuccess': onSuccess,
			        'onfailure': onFailure
			      });

			}
		</script>
		<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
		<script>//startApp();</script>
		
	</body>
</html>