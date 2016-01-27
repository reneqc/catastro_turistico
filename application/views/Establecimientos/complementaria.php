<div class="col-md-9">
<div>
	<legend><center>TRANSPORTE <a href="" class="btn btn-info btn-sm pull-right"><i class="glyphicon glyphicon-arrow-left"> </i><b> Volver</b></a></center></legend>
</div>

<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
	<form action="<?php echo site_url('/establecimientos/guardarComplementaria')?>" method="POST" name="form1" id="form1">
	<input type="text" name="id_est" value="<?php echo $establecimiento;?>"/>
	<input type="text" name="comple" id="comple" value=""/>
	<table class="table table-striped">
		<tr class="alert-warning">
			
			<th class="text-center alert-success" colspan="2">TIPO</th>
			
		</tr>
		
		<?php foreach($complementario->result() as $comple){ ?>
		<tr>
			
			<td class="col-md-2 text-right" ><input type="checkbox" id="id_comple<?php echo $comple -> ID_COMPLE; ?>" name="id_comple<?php echo $comple -> ID_COMPLE; ?>" value="<?php echo $comple -> ID_COMPLE; ?>" onclick="pasaDatos(this);"><br></td>
			<td class="col-md-10"><?php echo $comple -> NOMBRE_COMPLE; ?><br></td>
			
		</tr>
		
		<?php } ?>
		<tr>
		<td colspan="2" class="text-center"><input type="button" id="btn-modal1" name="btn-modal1" class="btn-modal1" value="Guardar" onclick="otro();"> </td>
		<!--<button class="btn btn-primary" onclick="otro();" id="btn-modal1"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>-->
		</tr>
	</table>
		
	</form>
	</div>
	<div class="col-md-3"></div>
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
	function pasaDatos(control){
		var a = $('#comple').val();
	
		var b = control.name;
	//alert(b);
		var c = a+b+',';

		$('#comple').val(c);

		
		
	}
	function otro()
	{
		alert('sdfdsf');
		$("input:checkbox:checked").each(function(){
			alert($this.val());
		});
	}
</script>