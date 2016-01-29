<div class="col-md-9">
    
    <div class="row">
        <legend>
            
            <center> PERSONAL
            <a href="<?php echo site_url("/establecimientos/consultar"); ?>" class="btn btn-info btn-sm pull-right"><i class="glyphicon glyphicon-arrow-left"> </i><b> Volver</b></a>
            </center>
        </legend>
    </div>
    
    
    
    <div class="row">
        <form action="<?php echo site_url("/establecimientos/guardarPersonal");?>" method="POST" name="form1" id="form1">
        <input type="hidden" name="id_est" value="<?php echo $establecimiento;?>"/>
        <table class="table table-bordered">
           <tr class="alert-success">
               <th class="text-center">PERSONAL</th>
               <th class="text-center">HOMBRES</th>
               <th class="text-center">MUJERES</th>               
               <th class="text-center"></th>
               
           </tr>
            <tr>
                <td class="text-center col-md-4">
                   
                    <select name="id_per" id="id_per" class="form-control">
                       
                        <option value="">Seleccione</option>
                        <?php foreach($cargos->result() as $cargo){?>
                        <option value="<?php echo $cargo -> ID_PER?>"><?php echo $cargo -> CARGO_PER?></option>
                        <?php } ?>
                        
                    </select>
                </td>
                <td class="text-center col-md-2">
                   <input type="text" class="form-control" name="hombres_eper" id="hombres_eper"> 
                </td>
                <td class="text-center col-md-2">
                    <input type="text" class="form-control" name="mujeres_eper" id="mujeres_eper">
                </td>
                <td class="text-center col-md-2">
                    <button class="btn btn-primary" type="submit" id="btn-modal1"><i class="glyphicon glyphicon-plus"></i></button>
                </td>
            </tr>
        </table>
        </form>
    </div>
    
    
    <div class="row">
        
        <div class="col-md-12">
            
            <?php if($personal){ ?>
               
               <table class="table table-stripped table-hover">
                   
                   <tr>
                       <th class="text-center alert-success">PERSONAL</th>
                       <th class="text-center alert-success">HOMBRES</th>
                       <th class="text-center alert-success">MUJERES</th>
                       <th class="text-center alert-success"></th>
                   </tr>

            <?php foreach( $personal->result() as $p){ ?>
                                  
                   <tr>
                       <td class="text-center"><?php echo $p->CARGO_PER;?></td>
                       <td class="text-center"><?php echo $p->HOMBRES_EPER;?></td>
                       <td class="text-center"><?php echo $p->MUJERES_EPER?></td>
                       <td class="text-center">
                           <a href="<?php echo site_url('/establecimientos/eliminarPersonal'). "/". $p->ID_EPER."/".$establecimiento;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                       </td>
                   </tr>
            
            <?php } //foreach?>

            </table>
            <?php }else{ ?>
            
                <div class="alert alert-danger">
                    
                    <i class="glyphicon glyphicon-remove"> </i> No se encontraron resultados
                    
                </div>
            
            <?php } ?>
        </div>
        
    </div>

</div>
</div>
</div>



<?php
if($this->session->flashdata("mensaje")){
	mostrarModal($this->session->flashdata("mensaje"),'','btn-success');
}
?>




<script>
    
    $("#form1").validate({
        
        rules:{
            id_per:{
                required: true
            },
            hombres_eper:{
                digits:true
            },
            mujeres_eper:{
                digits:true
            }  
        },
        messages:{
             id_per:{
                required: "Seleccine el cargo"
            },
             hombres_eper:{
                positivo: "Indique la cantidad",
                digits: "Cantidad invalida"
            },
            mujeres_eper:{
                positivo: "Indique la cantidad",
                digits: "Cantidad invalida"
            }  
            
            
        }
        
    });

</script>