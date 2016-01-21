<div class="col-md-9">
   <div class="row">
    <legend><center>SERVICIOS <a href="<?php echo site_url('/establecimientos/consultar');?>" class="btn btn-info btn-sm pull-right"> <i class="glyphicon glyphicon-arrow-left"> </i> <b>Volver</b></a></center></legend>
    </div>
    <div class="row">
        <form action="<?php echo site_url("/establecimientos/guardarServicios");?>" method="POST" name="form1" id="form1">
        <input type="hidden" name="id_est" value="<?php echo $establecimiento;?>"/>
        <table class="table table-bordered">
           <tr class="alert-success">
               <th class="text-center">TIPO</th>
               <th class="text-center">MESAS</th>
               <th class="text-center">PLAZAS</th>
               <th class="text-center">BAÑOS</th>
               <th class="text-center"></th>
               
           </tr>
            <tr>
                <td class="text-center col-md-4">
                   
                    <select name="id_serv" id="id_serv" class="form-control">
                       
                        <option value="">Seleccione</option>
                        <?php foreach($servicios->result() as $serv){?>
                        <option value="<?php echo $serv -> ID_SERV?>"><?php echo $serv -> NOMBRE_SERV?></option>
                        <?php } ?>
                        
                    </select>
                </td>
                <td class="text-center col-md-2">
                   <input type="text" class="form-control" name="mesas_es" id="mesas_es"> 
                </td>
                <td class="text-center col-md-2">
                    <input type="text" class="form-control" name="plazas_es" id="plazas_es">
                </td>
                <td class="text-center col-md-2">
                    <input type="text" class="form-control" name="banios_es" id="banios_es">
                </td>
                <td class="text-center col-md-2">
                    <button class="btn btn-primary" type="submit" id="btn-modal1"><i class="glyphicon glyphicon-plus"></i></button>
                </td>
            </tr>
        </table>
        </form>
    </div>
    <div class="row">
    <?php if($servicios1){?>
    	<table class="table table-striped table-hover">
    		<tr>
    			<th class="alert-success text-center">TIPO</th>
    			<th class="alert-success text-center">MESAS</th>
    			<th class="alert-success text-center">PLAZAS</th>
    			<th class="alert-success text-center">BAÑOS</th>
    			<th class="alert-success text-center"></th>
    		</tr>
    		<?php foreach($servicios1 -> result() as $serv1){ ?>
    		<tr>
    			<td class="text-center"><?php echo $serv1-> NOMBRE_SERV?></td>
    			<td class="text-center"><?php echo $serv1-> MESAS_ES?></td>
    			<td class="text-center"><?php echo $serv1-> PLAZAS_ES?></td>
    			<td class="text-center"><?php echo $serv1-> BANIOS_ES?></td>
    			<td class="text-center"><a href="<?php echo site_url('/establecimientos/eliminarServicio'). "/". $serv1->ID_ES."/".$establecimiento;?>" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a> </td>
    		</tr>
    		<?php } ?>
    	</table>
    	<?php }else{ ?>
	<div class="alert alert-danger"><i class="glyphicon glyphicon-remove"></i><b>No se encontraron servicios</b></div>
		<?php } ?>
    </div>
</div>

</div>
</div>



<script type="text/javascript">
	
		
    $("#form1").validate({
       rules:{
           mesas_es: {
               required: true,
			   digits: true
           },plazas_es:{
               required: true,
			   digits: true
           },banios_es:{
               required: true,
               digits: true,
           }
           
       },messages:{
           mesas_es:{
               required: "Indique el numero de mesas",
			   digits: "Ingrese solo numeros"
           },plazas_es:{
               required: "Indique el numero de plazas",
			   digits: "Ingrese solo numeros"
           },banios_es:{
               required: "Indique el número de baños",
			   digits: "Ingrese solo números"
           }
	   }
		
    });
    
	$("#id_serv").focus();
	
	$("#id_serv").change(function(){
		$("#mesas_es").focus();
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