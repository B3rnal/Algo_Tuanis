$(document).ready(function(){
		$("#lbBuscar").on( "click", function() {
			$('#divCheckbox').show(); //muestro mediante id
			$('#btnCancelar').show();
		});	
		$("#btnBuscar").on( "click", function() {
			$('#divCheckbox').hide(); //muestro mediante id
			$('#btnCancelar').hide();
		});		
		$("#btnCancelar").on( "click", function() {
			$('#divCheckbox').hide(); //muestro mediante id
			$('#btnCancelar').hide();
			$("#lbBuscar").val("");	
		});	

		
});