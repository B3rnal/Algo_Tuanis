$(document).ready(function(){
	//L.mapbox.accessToken = 'pk.eyJ1IjoiYjNybmFsIiwiYSI6ImNpZnhkb2QwdjN6djh1Z2tyamRsamF5OWgifQ.OTgIHG6xF_iy0ACEa7BFdw';
	//var map = L.mapbox.map('map', 'mapbox.streets').setView([40, -74.50], 9);

	// Provide your access token
	L.mapbox.accessToken = 'pk.eyJ1IjoiYjNybmFsIiwiYSI6ImNpZnhkb2QwdjN6djh1Z2tyamRsamF5OWgifQ.OTgIHG6xF_iy0ACEa7BFdw';
	// Create a map in the div #map
	//var map =L.mapbox.map('map', 'b3rnal.cifxdobfz3zwxuum0ymgq9esk');
	var map;
	var marker;
	var coordinates;

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
					map= L.mapbox.map('map', 'mapbox.streets').setView([position.coords.latitude, position.coords.longitude], 15);
					marker = L.marker([position.coords.latitude, position.coords.longitude], {
					    icon: L.mapbox.marker.icon({
					      'marker-color': '#f86767'
					    }),
					    draggable: true
					}).addTo(map);
					marker.on('dragend', ondragend);
				}
				if($("#map_view").get(0)){
					map= L.mapbox.map('map_view', 'mapbox.streets').setView([position.coords.latitude, position.coords.longitude], 15);
					L.marker([position.coords.latitude, position.coords.longitude], {
					    icon: L.mapbox.marker.icon({
					      'marker-color': '#088A29',
					      'marker-symbol':"star"
					    }),
					    draggable: false
					}).addTo(map);
					setPoints();
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
	

	function setPoints(){
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
				popupContent="<h1>"+field.name_location+"</h1><p>"+field.description+"</p><a href=detalle.php?id="+field.id_location+">Ver Detalles</a>";
	            marker = L.marker([field.latitude, field.longitude], {
				    icon: L.mapbox.marker.icon({
				      'marker-color': '#f86767'
				    }),
				    draggable: false
				}).bindPopup(popupContent,{
			        closeButton: true,
			        minWidth: 320
			    }).addTo(map);

	        });
		});

	}
	

});