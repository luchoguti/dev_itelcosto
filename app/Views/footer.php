	    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	    
	    <script type="text/javascript" src="<?php echo $ruta_public; ?>public/js/ion.rangeSlider.min.js"></script>
	    <script type="text/javascript" src="<?php echo $ruta_public; ?>public/js/materialize.min.js"></script>
	    <script type="text/javascript" src="<?php echo $ruta_public; ?>public/js/index.js"></script>
	    <script type="text/javascript" src="<?php echo $ruta_public; ?>public/js/buscador.js"></script>
	    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	    <script type="text/javascript">
	      $( document ).ready(function() {
	          $( "#tabs" ).tabs();
	      });
	      $('#filtrarRegistros').click(function(){
	      	    var selectciudad=$('#selectCiudad').val();
	      	    var selecttipo=$('#selectTipo').val();
				var parameters={ciudad:selectciudad,tipo:selecttipo,action:'getFilter',controller:'Home'};	        
		        $.ajax({
		          url:'index.php',
		          type:'POST',
		          data:parameters,
		          success:function(resultado){
		      		$('#resultados_busqueda').html(resultado);
		          },
		          error:function(){alert('Error: ajax...');}
		        });

	      });
	    </script>

    </body>
</html>