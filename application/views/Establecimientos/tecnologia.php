<div class="col-md-9">
<legend><center>TECNOLOGÍA DISPONIBLE</center></legend> 
<div class="col-md-6">
   <div class="row">       
        <form action="<?php echo site_url('/establecimientos/guardarEstablecimientoEquipo');?>" method="POST" id="form2">
        <input type="hidden" name="id_est" id="id_est" value="<?php echo $establecimiento;?>">

        
        <table class="table">
           <tr>
               <td class="text-center" colspan="3"><b>EQUIPOS DISPONIBLES</b></td>
           </tr>
            <tr>
                <td><select name="id_equi" id="id_equi" class="form-control">
            <option value="">Seleccione una opción</option>

            <?php foreach($equipos->result() as $equipo) {    ?>
            <option value="<?php echo $equipo->ID_EQUI?>"><?php echo $equipo->NOMBRE_EQUI ?></option>
            <?php  }    ?>
        </select></td>
                <td><input type="text" name="cantidad_ee" id="cantidad_ee" class="form-control" placeholder="Cantidad"></td>
                <td><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button></td>
            </tr>
        </table>
        </form>        
    </div>
    
    <hr>

    <div class="row">
           <div class="col-md-12">
            <?php if($equipos2){?>
            <table class="table table-hover table-striped table-bordered">
                <tr>
                    <th class="alert-success text-center" >NOMBRE EQUIPO</th>
                    <th class="alert-success text-center" >CANTIDAD</th>
                    <th class="alert-success text-center" >ELIMINAR</th>

                </tr>

                <?php  foreach($equipos2->result() as $equi) {?>
                <tr>
                    <td class="text-center"><?php echo $equi->NOMBRE_EQUI?></td>
                    <td class="text-center"><?php echo $equi->CANTIDAD_EE?></td>

                    <td class="text-center"><a href="<?php echo site_url('/establecimientos/eliminarEstablecimientoEquipo'). "/". $equi->ID_EE."/".$establecimiento;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
            
            <?php }
             echo "</table>";
                                
            }else {?>
            
            <div class="alert alert-danger text-center" >
                <b> <i class="glyphicon glyphicon-remove"> </i> No se encontraron registros</b>
            </div>
            <br>
            <br>
            <br>
            <?php }?>
        </div>  <!-- col-md-12 -->
    </div>  <!-- row -->
</div> <!-- col-md-6 -->

<!--   MAQUINAS -->

<div class="col-md-6">
   <div class="row">       
        <form action="<?php echo site_url('/establecimientos/guardarEstablecimientoMaquina');?>" method="POST" id="form3">
        <input type="hidden" name="id_est" id="id_est" value="<?php echo $establecimiento;?>">

        
        <table class="table">
           <tr>
               <td class="text-center" colspan="3"><b>MAQUINAS DISPONIBLES</b></td>
           </tr>
            <tr>
                <td><select name="id_maqui" id="id_maqui" class="form-control">
            <option value="">Seleccione una opción</option>

            <?php foreach($maquinas->result() as $maquina) {    ?>
            <option value="<?php echo $maquina->ID_MAQUI?>"><?php echo $maquina->NOMBRE_MAQUI ?></option>
            <?php  }    ?>
        </select></td>
                <td><input type="text" name="cantidad_em" id="cantidad_em" class="form-control" placeholder="Cantidad"></td>
                <td><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i></button></td>
            </tr>
        </table>
        </form>        
    </div>
    
    <hr>

    <div class="row">
           <div class="col-md-12">
            <?php if($maquinas2){?>
            <table class="table table-hover table-striped table-bordered">
                <tr>
                    <th class="alert-success text-center" >NOMBRE MAQUINA</th>
                    <th class="alert-success text-center" >CANTIDAD</th>
                    <th class="alert-success text-center" >ELIMINAR</th>

                </tr>

                <?php  foreach($maquinas2->result() as $maqui) {?>
                <tr>
                    <td class="text-center"><?php echo $maqui->NOMBRE_MAQUI?></td>
                    <td class="text-center"><?php echo $maqui->CANTIDAD_EM?></td>

                    <td class="text-center"><a href="<?php echo site_url('/establecimientos/eliminarEstablecimientoMaquina'). "/". $maqui->ID_EM."/".$establecimiento;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
            
            <?php }
             echo "</table>";
                                
            }else {?>
            
            <div class="alert alert-danger text-center" >
                <b> <i class="glyphicon glyphicon-remove"> </i> No se encontraron registros</b>
            </div>
            <br>
            <br>
            <br>
            <?php }?>
        </div>  <!-- col-md-12 -->
    </div>  <!-- row -->
</div> <!-- col-md-6 -->
</div>
</div>

<script type="text/javascript">
    $("#form2").validate({
       rules:{
           id_est: {
               required: true
           },id_equi:{
               required: true
           },cantidad_ee:{
               required: true,
               digits: true,
               positivo: true
           }
           
       },messages:{
           id_equi:{
               required: "Seleccione un equipo"
           },cantidad_ee:{
               required: "Ingrese la cantidad",
               digits: "Ingrese solo numeros"
           }       }
    });
    
    //Maquina
    $("#form3").validate({
       rules:{
           id_est: {
               required: true
           },id_maqui:{
               required: true
           },cantidad_em:{
               required: true,
               digits: true,
               positivo: true
           }
           
       },messages:{
           id_maqui:{
               required: "Seleccione una maquina"
           },cantidad_em:{
               required: "Ingrese la cantidad",
               digits: "Ingrese solo numeros"
           }       }
    });
</script>
<?php  

        if($this->session->flashdata('mensaje')){
      	mostrarModal($this->session->flashdata('mensaje'),'','btn-success','check');     
              
        }