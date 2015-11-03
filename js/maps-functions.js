$(document).ready(function(){
	//L.mapbox.accessToken = 'pk.eyJ1IjoiYjNybmFsIiwiYSI6ImNpZnhkb2QwdjN6djh1Z2tyamRsamF5OWgifQ.OTgIHG6xF_iy0ACEa7BFdw';
	//var map = L.mapbox.map('map', 'mapbox.streets').setView([40, -74.50], 9);

	// Provide your access token
	L.mapbox.accessToken = 'pk.eyJ1IjoiYjNybmFsIiwiYSI6ImNpZnhkb2QwdjN6djh1Z2tyamRsamF5OWgifQ.OTgIHG6xF_iy0ACEa7BFdw';
	// Create a map in the div #map
	//var map =L.mapbox.map('map', 'b3rnal.cifxdobfz3zwxuum0ymgq9esk');
	var markerLayer;
	var map;
	var marker;
	var coordinates;
	var point;

	if($("#map_detalle").get(0)){
		map= L.mapbox.map('map_detalle', 'mapbox.streets').setView([lat,long], 15);
		marker = L.marker([lat,long], {
		    icon: L.mapbox.marker.icon({
		      'marker-color': '#f86767'
		    }),
		    draggable: false
		}).addTo(map);
	}else{
		if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		    	coordinates = document.getElementById('coordinates');
		    	if($("#map").get(0)){
					map= L.mapbox.map('map', 'mapbox.streets').setView([position.coords.latitude, position.coords.longitude], 17);
					marker = L.marker([position.coords.latitude, position.coords.longitude], {
					    icon: L.mapbox.marker.icon({
					      'marker-color': '#f86770'
					    }),
					    draggable: true
					}).addTo(map);
					marker.on('dragend', ondragend);
				}
				if($("#map_view").get(0)){
					map= L.mapbox.map('map_view', 'mapbox.streets').setView([position.coords.latitude, position.coords.longitude], 15);
					markerLayer = L.mapbox.featureLayer().addTo(map);
					//puntoActual=almacena el punto de origen
					var puntoActual = L.marker([position.coords.latitude, position.coords.longitude], {
					    icon: L.mapbox.marker.icon({
					      'marker-color': '#008000',
					      'marker-symbol':"star"
					    }),
					    draggable: false
					}).addTo(map);
					//point=almacena la latitud y longitud del punto actual para compararlo con la distancia de los demas.
					point= puntoActual.getLatLng();
					setPoints(point);
				}
		    }, function() {
		    	console.log("no lat/long");
		      
		    });
		}
	}

	




	function ondragend() {
	    var m = marker.getLatLng();
	    coordinates.innerHTML = 'Latitude: ' + m.lat + '<br />Longitude: ' + m.lng;
	    $("#lat").val(m.lat);
	    $("#long").val(m.lng);
	   
	}


	$("#new_place_form").submit(function(e){
		e.preventDefault();
		$.ajax({
		  url: "save_location.php",
		  data: $(this).serialize()
		}).done(function(data) {
			window.location.href = "index.html";		
		});
	});


	$("#new_comment_form").submit(function(e){
		e.preventDefault();
		$.ajax({
		  url: "save_comment.php",
		  data: $(this).serialize()
		}).done(function(data) {
			$("#Comentario").val("");
			location.reload();		
		});
	});

	$("#formSearch").submit(function(e){
		e.preventDefault();
		$.ajax({
		  url: "get_location.php",
		  data: $(this).serialize()
		}).done(function(data) {
			var locations = jQuery.parseJSON(data);
			markerLayer.clearLayers();
			$.each(locations, function(i, field){
				fc=new L.LatLng(field.latitude, field.longitude);
				distance=fc.distanceTo(point).toFixed(0);

				popupContent="<h1>"+field.name_location+"</h1><p>"+field.description+"</p><p>Distancia:"+distance/1000+" Km</p><a href=detalle.php?id="+field.id_location+">Ver Detalles</a>";
	            marker = L.marker([field.latitude, field.longitude], {
				    icon: L.mapbox.marker.icon({
				      'marker-color': '#f86767'
				    }),
				    draggable: false
				}).bindPopup(popupContent,{
			        closeButton: true,
			        minWidth: 320
			    }).addTo(markerLayer);
			    
			    

	        });
		});
	});
	

	function setPoints(point){
		/*$.getJSON("./locations.txt", function(result){
	        $.each(result, function(i, field){
	            marker = L.marker([field.lat, field.long], {
				    icon: L.mapbox.marker.icon({
				      'marker-color': '#f86767'
				    }),
				    draggable: false
				}).addTo(map);
	        });
	    });*/
		$.ajax({
		  url: "get_location.php"
		}).done(function(data) {
			var locations = jQuery.parseJSON(data);
			$.each(locations, function(i, field){
				fc=new L.LatLng(field.latitude, field.longitude);
				distance=fc.distanceTo(point).toFixed(0);
				ratingHtml="";
				for(i=0; i<field.rating; i++){
					if(field.rating-i>1){
						ratingHtml+= '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
					}else{
						ratingHtml+= '<span class="glyphicon glyphicon-star half" aria-hidden="true"></span>';
					}
				}
			
				popupContent="<h1>"+field.name_location+ratingHtml+"</h1><p>"+field.description+"</p><p>Distancia:"+distance/1000+" Km</p><a href=detalle.php?id="+field.id_location+">Ver Detalles</a>";
	            marker = L.marker([field.latitude, field.longitude], {
				    icon: L.mapbox.marker.icon({
				      'marker-color': '#f86767'
				    }),
				    draggable: false
				}).bindPopup(popupContent,{
			        closeButton: true,
			        minWidth: 320
			    }).addTo(markerLayer);
			    
			    

	        });
		});

	}
	

});