<div class="col-md-9">
   <div class="row">
    <legend><center>TRANSPORTE <a href="<?php echo site_url('/establecimientos/consultar');?>" class="btn btn-info btn-sm pull-right"> <i class="glyphicon glyphicon-arrow-left"> </i> <b>Volver</b></a></center></legend>
    </div>
    <div class="row">
        <form action="<?php echo site_url('/establecimientos/guardarEstablecimientoTransporte')?>" method="POST" name="form1" id="form1">
        <input type="hidden" name="id_est" value="<?php echo $establecimiento;?>"/>
        <table class="table table-bordered">
           <tr class="alert-warning">
               <th class="text-center">TIPO</th>
               <th class="text-center">UNIDADES</th>
               <th class="text-center"></th>
               
           </tr>
            <tr>
                <td class="text-center col-md-4">
                    <select name="id_trans" id="id_trans" class="form-control">
                       
                        <option value="">Seleccione</option>
                        <?php foreach($transporte->result() as $trans){?>
                        <option value="<?php echo $trans -> ID_TRANS?>"><?php echo $trans -> NOMBRE_TRANS?></option>
                        <?php } ?>
                        
                    </select>
                </td>
                <td class="text-center col-md-2">
                   <input type="text" class="form-control" name="unidades_et" id="unidades_et"> 
                </td>
                
                
                <td class="text-center col-md-2">
                    <button class="btn btn-primary" type="submit" id="btn-modal1"><i class="glyphicon glyphicon-plus"></i></button>
                </td>
            </tr>
        </table>
        </form>
    </div>
 <div class="row">
    <?php if($transportes){?>
    	<table class="table table-hover table-striped">
    		<tr>
    			<th class="text-center">Tipo</th>
    			<th class="text-center">Unidades</th>
    			<th class="text-center"></th>

    		</tr>
    		<?php  foreach($transportes->result() as $trans) {?>
    		<tr>
    			<td class="text-center"><?php echo $trans->NOMBRE_TRANS?></td>
    			<td class="text-center"><?php echo $trans->UNIDADES_ET?></td>
    			<td class="text-center"><a href="<?php echo site_url('/establecimientos/eliminarEstablecimientoTransporte'). "/". $trans->ID_ET."/".$establecimiento; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
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
<script type="text/javascript">
	
		
    $("#form1").validate({
       rules:{
           id_trans: {
               required: true,
			   digits: true
			   
           },unidades_et:{
               required: true,
			   digits: true,
			   positivo:true
           }
           
       },messages:{
           id_trans:{
               required: "Seleccione tipo de transporte",
			   digits: "Ingrese solo números"
           },unidades_et:{
               required: "Indique el número de unidades",
			   digits: "Ingrese solo números"
           }
	   }
		
    });
    
	$("#id_trans").focus();
	
	$("#id_trans").change(function(){
		$("#unidades_et").focus();
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