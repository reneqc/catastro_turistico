<div class="col-md-9">
   <div class="row">
    <legend><center>HABITACIONES <a href="<?php echo site_url('/establecimientos/consultar');?>" class="btn btn-info btn-sm pull-right"> <i class="glyphicon glyphicon-arrow-left"> </i> <b>Volver</b></a></center></legend>
    </div>
    <div class="row">
        <form action="<?php echo site_url("/establecimientos/guardarHabitacion")?>" method="POST" name="form1" id="form1">
        <input type="hidden" name="id_establecimiento" value="<?php echo $establecimiento;?>"/>
        <table class="table table-bordered">
           <tr>
               <th class="text-center alert-info">TIPO</th>
               <th class="text-center alert-info">BAÑO</th>
               <th class="text-center alert-info">TELEVISION</th>
               <th class="text-center alert-info">NEVERA</th>
               <th class="text-center alert-info">AIRE</th>
               <th class="text-center alert-info">TELEFONO</th>
               <th class="text-center alert-info">SECADORA</th>
               <th class="text-center alert-info">MÚSICA</th>
               <th class="text-center alert-info"></th>
               
           </tr>
            <tr>
                <td class="text-center">
                    <select name="descripcion_hab" id="descripcion_hab" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="SENCILLA">SENCILLA</option>
                        <option value="DOBLE">DOBLE</option>
                        <option value="TRIPLE">TRIPLE</option>
                        <option value="CUADRUPLE">CUADRUPLE</option>
                        <option value="MATRIMONIAL">MATRIMONIAL</option>
                        <option value="SUITE">SUITE</option>
                        <option value="SUITE PRESIDENCIAL">SUITE PRESIDENCIAL</option>
                        <option value="APARTAMENTO">APARTAMENTO</option>
                        <option value="CABAÑA">CABAÑA</option>
                    </select>
                </td>
                <td class="">
                   <p class="contenedor">
                   	<label for=""><input type="radio" name="banio" value="banioPrivado_hab"> Privado</label>
                   	<label for=""><input type="radio" name="banio" value="banioCompartido_hab"> Compartido</label>
                   </p>
                    
                    
                    
                </td>
                <td class="text-center col-md-1">
                    <input type="text" class="form-control" name="television_hab" id="television_hab">
                </td>
                <td class="text-center col-md-1">
                    <input type="text" class="form-control" name="nevera_hab" id="nevera_hab">
                </td>
                <td class="text-center col-md-1">
                    <input type="text" class="form-control" name="aire_hab" id="aire_hab">
                </td>
                <td class="text-center col-md-1">
                    <input type="text" class="form-control" name="telefono_hab" id="telefono_hab">
                </td>
                <td class="text-center col-md-1">
                    <input type="text" class="form-control" name="secadora_hab" id="secadora_hab">
                </td>
                <td class="text-center col-md-1">
                    <input type="text" class="form-control" name="musica_hab" id="musica_hab">
                </td>
                <td>
                    <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-plus"></i></button>
                </td>
            </tr>
        </table>
        </form>
    </div>
    <div class="row">
    <?php if($habitaciones){?>
    	<table class="table table-hover table-striped">
    		<tr>
    			<th class="text-center">Tipo</th>
    			<th class="text-center">Baño privado</th>
    			<th class="text-center">Baño compartido</th>
    			<th class="text-center">Televisión</th>
    			<th class="text-center">Nevera</th>
    			<th class="text-center">Aire</th>
    			<th class="text-center">Telefono</th>
    			<th class="text-center">Secadora</th>
    			<th class="text-center">Musica</th>
    			<th class="text-center"></th>
    			<th class="text-center"></th>
    		</tr>
    		<?php  foreach($habitaciones->result() as $habi) {?>
    		<tr>
    			<td class="text-center"><?php echo $habi->DESCRIPCION_HAB?></td>
    			<td class="text-center"><?php if($habi->BANIOPRIVADO_HAB == 1){echo "<i class='glyphicon glyphicon-ok'>";}else{echo "<i class='glyphicon glyphicon-remove'>";}?></td>
    			<td class="text-center"><?php if($habi->BANIOCOMPARTIDO_HAB == 1){echo "<i class='glyphicon glyphicon-ok'>";}else{echo "<i class='glyphicon glyphicon-remove'>";}?></td>
    			<td class="text-center"><?php echo $habi->TELEVISION_HAB?></td>
    			<td class="text-center"><?php echo $habi->NEVERA_HAB?></td>
    			<td class="text-center"><?php echo $habi->AIRE_HAB?></td>
    			<td class="text-center"><?php echo $habi->TELEFONO_HAB?></td>
    			<td class="text-center"><?php echo $habi->SECADORA_HAB?></td>
    			<td class="text-center"><?php echo $habi->MUSICA_HAB?></td>
    			<td class="text-center"><button id="<?php echo $habi->ID_HAB;?>" onclick="pasarDatos(this);" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="glyphicon glyphicon-bed"></i></button></td>
    			<td class="text-center"><a href="<?php echo site_url('/establecimientos/eliminarEstablecimientoHabitacion'). "/". $habi->ID_EH."/".$habi->ID_HAB."/".$establecimiento;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
    		</tr>
    	<?php }
				echo  "</table>";
			}else{
			?>
			<div class="alert alert-danger text-center" >
                <b> <i class="glyphicon glyphicon-remove"> </i> No se encontraron registros</b>
            </div>
            <br>
            <br>
            <br>
            <?php }?>
    </div>
</div>

</div>
</div>



<!-- Ventana Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gestión de Camas</h4>
      </div>
      <div class="modal-body">
       <form action="<?php echo site_url("/establecimientos/guardarCamaHabitacion");?>" method="POST" id="formModal" name="formModal">
        <table class="table">
        	<tr>
        		<th>TIPO</th>
        		<th>CANTIDAD</th>
        		 <input type="hidden" name="id_est" value="<?php echo $establecimiento;?>"/>
        		<th><input type="hidden" id="id_hab" name="id_hab" ></th>
        	</tr>
        	<tr>
        		<td class="col-md-5">
        			<select name="id_cam" id="id_cam" class="form-control">
        				<option value="">Seleccione</option>
        				<?php foreach($camas -> result() as $cama ) {?>
        				<option value="<?php echo $cama->ID_CAM;?>"><?php echo $cama->TIPO_CAM;?></option>
        				<?php } ?>
        			</select>
        		</td>
        		<td class="col-md-5"><input type="text" name="numero" id="numero" class="form-control"></td>
        		<td class="col-md-2"><button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-plus"></i></button></td>
        	</tr>
        </table>
        </form>
        
        <div id="contenedorTabla">
        	
        	
        </div>
        
        
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cerrar</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
	function pasarDatos(boton){
		
		$('#id_hab').val(boton.id);
		$('#numero').val("");
		//$('#id_cam option:first').attr("selected","selected");
		$('#id_cam').val("");
		$("#formModal").validate().resetForm();
		$("input").removeClass('error');
		$("select").removeClass('error');
		var id = $('#id_hab').val();
		
			
		$.ajax({
			data: {
				id_hab: id
				
			},
			type: 'POST',
			url: "<?php echo site_url("/establecimientos/consultarCamas");?>"
			
			
	})
		.success(function(data,textStatus,jqXHR){
			var resultado = JSON.parse(data);
			
			if(resultado.length>0){
			var tabla = "<table class='table table-striped'>";
			tabla += "<tr>";
			tabla += "<th class = 'text-center'>TIPO</th>";
			tabla += "<th class = 'text-center'>CANTIDAD</th>";
			tabla += "<th class = 'text-center'></th>";
			tabla += "</tr>";
			for(i=0; i < resultado.length; i++)
				{
					tabla += "<tr>";
					tabla += "<td class = 'text-center'>"+resultado[i].TIPO_CAM+"</td>";
					tabla += "<td class = 'text-center'>"+resultado[i].NUMERO+"</td>";
					tabla += "<td class = 'text-center'><a class='btn btn-danger' href='<?php echo site_url('/establecimientos/eliminarCamaHabitacion/'.'/'.$establecimiento);?>/"+resultado[i].ID_CH+"'> <i class='glyphicon glyphicon-trash'> </i></a></td>";
					tabla += "</tr>";
				}
			
			tabla += "</table>";
			}else{
				var tabla="<div class='alert alert-danger'> <i class='glyphicon glyphicon-remove'> </i><b>No se encontraron camas registradas en esta habitación </b>  </div> ";
			}
				$("#contenedorTabla").html(tabla);
			//alert(resultado[1].TIPO_CAM);
	
	});
		
	}
	
	$("#formModal").validate({
		rules:{
			id_cam:{
				required: true
			},numero:{
				required: true,
				digits: true,
				positivo: true
			}
		},messages:{
			id_cam:{
				required: "Seleccione el tipo de cama"
			},numero:{
				required: "Ingrese el numero de camas",
				digits: "Ingrese solo numeros",
			}
		}
		
	});
    $("#form1").validate({
       rules:{
           descripcion_hab: {
               required: true
           },banio:{
               required: true
           },television_hab:{
               required: true,
               digits: true,
               
           },nevera_hab:{
               required: true,
               digits: true,
               
           },aire_hab:{
               required: true,
               digits: true,
               
           },telefono_hab:{
               required: true,
               digits: true,
               
           },secadora_hab:{
               required: true,
               digits: true,
               
           },musica_hab:{
               required: true,
               digits: true,
               
           }
           
       },messages:{
           descripcion_hab:{
               required: "Seleccione una habitación"
           },banio:{
               required: "Seleccione un tipo de baño",
               
           },television_hab:{
               required: "Indique el número de televisores",
			   digits: "Ingrese solo números",
           },nevera_hab:{
               required: "Indique el número de neveras",
			   digits: "Ingrese solo números",
           },aire_hab:{
               required: "Indique el número aires",
			   digits: "Ingrese solo números",
           },telefono_hab:{
               required: "Indique el número de telefonos",
			   digits: "Ingrese solo números",
           },secadora_hab:{
               required: "Indique el número de secadoras",
			   digits: "Ingrese solo números",
           },musica_hab:{
               required: "Indique el número de equipos de audio",
			   digits: "Ingrese solo números",
           }
	   }
		,
        errorPlacement: function(error, element) 
        {
            if ( element.is(":radio") ) 
            {
                error.appendTo( element.parents('.contenedor') );
            }
            else 
            { // This is the default behavior 
                error.insertAfter( element );
            }
         }
    });
    

</script>
<?php
if($this->session->flashdata("mensaje")){
	mostrarModal($this->session->flashdata("mensaje"),'','btn-success');
}
?>


<style>
	.contenedor > label{
		font-weight: normal;
	}
</style>