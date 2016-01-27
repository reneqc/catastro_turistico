<div class="col-md-9">

<div class="row">
        <legend><center>Especialidad <a href="<?php echo site_url('/establecimientos/consultar');?>" class="btn btn-info btn-sm pull-right"> <i class="glyphicon glyphicon-arrow-left"> </i> <b>Volver</b></a></center> </legend>    

    <form action="<?php echo site_url('/establecimientos/guardarEspecialidad');?>" id="form1" method="post">
       <input type="hidden" name="id_est" value="<?php echo $establecimiento; ?>" >
        <table class="table table-striped">
            <tr>
                <th class="text-center alert-success">NOMBRE</th>
                <th class="text-center alert-success">SELECCIONAR</th>
            </tr>
 
        <?php foreach($especialidades -> result() as $espe){ ?>


            <tr>
                <td class="text-center"><?php echo $espe->NOMBE_ESPE; ?></td>
                <td class="text-center">
                    <div class="contenedor">
                        <input type="radio" name="id_espe" value="<?php echo $espe->ID_ESPE; ?>"><br>
                     </div>
                </td>
            </tr>

        <?php } ?>
   
            <tr>
                <td></td>
                <td class="text-center">
                    <button class="btn btn-primary" type="submit">
                    <i class="glyphicon glyphicon-ok"></i>    <b>Guardar</b>
                    </button>
                </td>
            </tr>

        </table>
    </form>
</div>    

<div class="row">
    
    <?php if($especialidad) { ?>
        
         <div class="alert alert-success">
            <b>Especialidad: </b> 
            <?php foreach($especialidad->result() as $especialidad1 ){
            
                    echo $especialidad1->NOMBE_ESPE;

        }
             ?>
        </div>    
    
    <?php }else { ?>
    
        <div class="alert alert-danger">
            <i class="glyphicon glyphicon-remove"> </i> La especialidad aún no ha sido asignada
        </div>
    
    <?php }?>
    
</div>

</div>
</div>
</div>






<script>

    
    $("#form1").validate({
        
        rules:{
            id_espe:{
                required:true,
            }
        },
        messages:{
            id_espe:{
                required:"Por favor seleccione una especialidad",
            }
            
        },
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