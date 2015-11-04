$(function(){
	
	var app_id = '1170714032956712';
	var scopes;//= 'email, user_friends, user_onlines_presence';
	
	var btn_login = '<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="true">'+
							'<a href="#" id="login" class="fb-login-button">Iniciar sesion</a></div>';
	
	var div_session = "<div id='facebook-session'>"+
					  "<strong></strong>"+
					  "<img>"+
					  "<a href='#' id='logout' class='btn btn-danger'>Cerrar sesion</a>"+
					  "</div>"
					  
	window.fbAsyncInit = function() {
		FB.init({
			appId      : app_id,
			status	   : true,
			cookie     : true,
			xfbml      : true,
			version    : 'v2.2'
		});

		FB.getLoginStatus(function(response) {
			statusChangeCallback(response, function(){
				
			});
		});

	};
	
	var statusChangeCallback = function(response, callback) {
		console.log(response);
		
		if (response.status === 'connected') {
			getFacebookData();
		} else {
			callback(false);
		}
	}
	
	var checkLoginState = function(callback) {
		FB.getLoginStatus(function(response) {
		  statusChangeCallback(response, function(data){
			callback(data)
		  });
		});
	}
	
	var getFacebookData = function()
	{
		FB.api('/me', function(response){
			$('#login').after(div_session);
			$('#login').remove();
			$('#facebook-session img').attr('src','http://graph.facebook.com/'+response.id+'/picture?type=large');
			$('#facebook-session strong').text("Bienvenido: "+response.name);
		});
	}
	
	var facebookLogin = function(){
		checkLoginState(function(response){
			if(!response){
				FB.login(function(response){
					if(response.status === 'connected')
						getFacebookData();
				}, {scope: scopes})
			}
		})
	}
	
	var facebookLogout = function(){
		FB.getLoginStatus(function(response) {
			if(response.status === 'connected'){
				FB.logout(function(response){
					$('#facebook-session').before(btn_login);
					$('#facebook-session').remove();
				})
			}
		});
	}
			
	
	$(document).on('click', '#login', function(e){
		e.preventDefault();
		
		facebookLogin();
	})
	
	$(document).on('click', '#logout', function(e){
		e.preventDefault();
		if(confirm("¿Esta seguro?"))
			facebookLogout();
		else
			return false;
	})
})
