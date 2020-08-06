<?php

$plantilla = ControladorComercio::ctrSeleccionarPlantilla();

?>

<div class="box box-danger">
	
	<div class="box-header with-border"><!-- inicia el header -->

		<h3 class="box-title">NOSTROS</h3>

  		<div class="box-tools pull-right">

        		<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">

          		<i class="fa fa-minus"></i>

          	</button>

      </div>
	
	</div><!-- termina el header -->

	<div class="box-body">
	 	
   		<div class="form-group">
        
        		<label for="comment">NOSOTROS:</label>
        
        		<textarea class="form-control cambioScript" rows="5" id="apiFacebook">

        		<?php echo $plantilla["apiFacebook"]; ?>

        		</textarea>
      
  	 	</div>


	 	<div class="form-group">
      
  			<label for="comment">VISIÓN:</label>
      
  			<textarea class="form-control cambioScript" rows="5" id="pixelFacebook">

  			<?php echo $plantilla["pixelFacebook"]; ?>
    
  			</textarea>
    
    	</div>

    	<div class="form-group">
      
  			<label for="comment">MISIÓN:</label>
      
  			<textarea class="form-control cambioScript" rows="5" id="googleAnalytics">

  			<?php echo $plantilla["googleAnalytics"]; ?>
      
  			</textarea>
    
    	</div>

	</div>

   	<div class="box-footer">
      
    	<button type="button" id="guardarScript" class="btn btn-primary pull-right">Guardar</button>
    
  	</div>

</div>