<div class="col-md-9">
<div>
	<legend><center>TRANSPORTE <a href="<?php echo site_url("/establecimientos/consultar"); ?>" class="btn btn-info btn-sm pull-right"><i class="glyphicon glyphicon-arrow-left"> </i><b> Volver</b></a></center></legend>
</div>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
	<form action="<?php echo site_url('/establecimientos/guardarComplementaria')?>" method="POST" name="form1" id="form1">
	<input type="hidden" name="id_est" value="<?php echo $establecimiento;?>"/>
	<input type="hidden" name="comple" id="comple" value=""/>
	<table class="table table-striped">
		<tr class="alert-warning">
			
			<th class="text-center alert-success" colspan="2">TIPO</th>
			
		</tr>
		
		<?php foreach($complementario->result() as $comple){ ?>
		<tr>
			
			<td class="col-md-2 text-right" ><input type="checkbox" id="id_comple<?php echo $comple -> ID_COMPLE; ?>" name="id_comple<?php echo $comple -> ID_COMPLE; ?>" value="<?php echo $comple -> ID_COMPLE; ?>" onclick="pasaDatos(this);" class="id_comple"><br></td>
			<td class="col-md-10"><?php echo $comple -> NOMBRE_COMPLE; ?><br></td>
			
		</tr>
		
		<?php } ?>
		<tr>
		<td colspan="2" class="text-center">
		<button type="submit" class="btn btn-primary"  id="btn-modal1"><i class="glyphicon glyphicon-plus"></i> Guardar</button>
		 </td>
		</tr>
	</table>
		
	</form>
	</div>
	<div class="col-md-3"></div>
</div>

		
	
	<div class="row">
	        
          <div class="col-md-3"> </div>
           
           
          
            
            
            <div class="col-md-6">
            
            
             <?php if ($complementariasEstablecimiento) {  ?>
                 
                 <table class="table table-striped">
                     
                     <tr class="alert-success">
                         <th class="text-center alert-success">OPCIÓN</th>    
                     </tr>
                     
                     
                     <?php foreach($complementariasEstablecimiento->result() as $comple){ ?>
            	     <tr>

                         <td class="text-center alert-sucess"><?php echo $comple->NOMBRE_COMPLE ?>                          <i class="glyphicon glyphicon-ok"> </i>  </td>
                     </tr>            	
            	    <?php } ?>
                     
                     
                 </table>
             
            	
            <?php } else { ?>
            
	            <div class="alert alert-danger">
	                
	                <i class="glyphicon glyphicon-remove"> </i>  No se encontraron servicios complementarios
	                
	            </div>
	            
	            
	            <?php  } ?>
	        </div>
	        
	        
	       
	        <div class="col-md-3"> </div>
    </div>

</div>
</div>
</div>
<?php
if($this->session->flashdata("mensaje")){
	mostrarModal($this->session->flashdata("mensaje"),'','btn-success');
}
?>
<script type="text/javascript">

    
    	
	$('.id_comple').click(function(){
		obtenerSeleccionados();
	});

	function obtenerSeleccionados(){
			var checkboxValues = new Array();
			//recorremos todos los checkbox seleccionados con .each
			$('.id_comple:checked').each(function() {
				//$(this).val() es el valor del checkbox correspondiente
				checkboxValues.push($(this).val());
			});
			
			
			$('#comple').val(checkboxValues);
		}
    
 
</script>