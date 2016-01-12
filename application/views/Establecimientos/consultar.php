<div class="col-md-9">

<center><legend>ESTABLECIMIENTOS REGISTRADOS</legend></center>

<form action="">
    
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Escriba su búsqueda..." autofocus>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
      </span>
    </div><!-- /input-group -->
    
</form>
<br>

<?php   if ($establecimientos){  ?>
        
    
        <table class="table table-hover table-striped">
            
            <tr>
                <th class="alert-info">Registro</th>
                <th class="alert-info">Fecha</th>
                <th class="alert-info">Nombre</th>
                <th class="alert-info">Telefono</th>
                <th class="alert-info">Actividad</th>
                <th class="alert-info">Opciones</th>
            </tr>

          <?php   foreach($establecimientos->result() as $establecimiento){ ?>

             <tr>
                 <td><?php echo $establecimiento->REGISTRO_EST; ?></td>
                 <td><?php echo $establecimiento->FECHA_EST; ?></td>
                 <td><?php echo $establecimiento->NOMBRE_EST; ?></td>
                 <td><?php echo $establecimiento->TELEFONO_EST; ?></td>
                 <td><?php echo $establecimiento->NOMBRE_ACT; ?></td>
                 <td>
                    <a href="" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a> 
                 </td>
             </tr>

          <?php  } //foreach ?>
      
    </table>


<!-- IF ELSE -->
<?php   } else {  ?>
             

    <div class="alert alert-danger">
        
        <i class="glyphicon glyphicon-remove"> </i> <b> No se encontraron establecimientos registrados</b>
        
    </div>
    <br><br><br><br><br><br><br><br><br>
<?php } //else ?>





</div>

</div> <!--cierre de row de menu -->
</div> <!--cierre de container -->




   <!-- Modal Ver Detalles -->
    <div id="detalles" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Bienvenido!</h4>
          </div>
          <div class="modal-body">
            <p>
              detalles

            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div>
        </div>

      </div>
    </div>













  <?php  

        if($this->session->flashdata('establecimientoGuardado')){
           
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
                <h4 class="modal-title">Bienvenido!</h4>
              </div>
              <div class="modal-body">
                <p>
                   <?php  echo '<h4 class="text-center">'.$this->session->flashdata('establecimientoGuardado').'</h4>'; ?>
                  
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