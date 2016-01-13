

<div class="col-md-9">
<legend><center>TECNOLOGÍA DISPONIBLE</center></legend> 
<form action="<?php echo site_url('/establecimientos/guardarEstablecimientoEquipo');?>" method="POST" id="form2">
<input type="hidden" name="id_est" id="id_est" value="<?php echo $establecimiento;?>">
<div class="col-md-2"></div>
<div class="col-md-4">  
<select name="id_equi" id="id_equi" class="form-control">
    <option value="">Seleccione una opción</option>
    
    <?php foreach($equipos->result() as $equipo) {    ?>
    <option value="<?php echo $equipo->ID_EQUI?>"><?php echo $equipo->NOMBRE_EQUI ?></option>
    <?php  }    ?>
</select>
</div>
<div class="col-md-2"><input type="text" name="cantidad_ee" id="cantidad_ee" class="form-control" placeholder="Cantidad"></div>
<div class="col-md-2"><button class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Agregar</button></div>
<div class="col-md-2"></div>
</form>

<br><br>
<table class="table table-hover table-striped table-bordered">
    <tr>
        <th class="alert-success text-center" >NOMBRE EQUIPO</th>
        <th class="alert-success text-center" >CANTIDAD</th>
        <th class="alert-success text-center" >ELIMINAR</th>
        
    </tr>

<?php foreach($equipos2->result() as $equi) {?>
<tr>
    <td class="text-center"><?php echo $equi->NOMBRE_EQUI?></td>
    <td class="text-center"><?php echo $equi->CANTIDAD_EE?></td>
    
    <td class="text-center"><a href="" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
</tr>

<?php }?>
</table>
</div>
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
               digits: true
           }
           
       },messages:{
           id_equi:{
               required: "Seleccione un equipo"
           },cantidad_ee:{
               required: "Ingrese la cantidad",
               digits: "Ingrese solo numeros"
           }       }
    });
</script>
<?php  

        if($this->session->flashdata('equipoGuardado')){
           
      ?>
                      
        <script>

            $(document).ready(function() {

              $('#myModal').modal({
                show: 'true'
                });     
            });

        </script>         


        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmacion!</h4>
              </div>
              <div class="modal-body">
                <p>
                   <?php  echo '<h4 class="text-center">'.$this->session->flashdata('equipoGuardado').'</h4>'; ?>
                  
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
              </div>
            </div>

          </div>
        </div>
            
            
            
     <?php         
        }
    ?>
    