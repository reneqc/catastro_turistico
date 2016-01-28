<div class="col-md-9">

<center><legend>ESTABLECIMIENTOS REGISTRADOS</legend></center>  

<form action="<?php site_url("/establecimientos/consultar");?>" method="post">
    
    <div class="input-group">
      <input type="text" name="busqueda" class="form-control" value="<?php echo $busqueda; ?>" placeholder="Escriba su búsqueda..." autofocus>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"> <i class="glyphicon glyphicon-search"> </i> </button>
      </span>
    </div><!-- /input-group -->
    
</form>
<br>

<?php   if ($establecimientos){  ?>
        
    
        <table class="table table-hover table-striped">
            
            <tr>
                <th class="alert-success">Registro</th>
                <th class="alert-success">Fecha</th>
                <th class="alert-success">Nombre</th>
                <th class="alert-success">Telefono</th>
                <th class="alert-success">Actividad</th>
                
                <th class="alert-success">Información</th>
                
                
            </tr>

          <?php   foreach($establecimientos->result() as $establecimiento){ ?>

             <tr>
                 <td><?php echo $establecimiento->REGISTRO_EST; ?></td>
                 <td><?php echo $establecimiento->FECHA_EST; ?></td>
                 <td><?php echo $establecimiento->NOMBRE_EST; ?></td>
                 <td><?php echo $establecimiento->TELEFONO_EST; ?></td>
                 <td><?php echo $establecimiento->NOMBRE_ACT; ?></td>
                 
                  
                
                 <td>
                 	<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Seleccione
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li> <a href="<?php echo site_url("/establecimientos/tecnologia/").'/'.$establecimiento->ID_EST; ?>"><i class="glyphicon glyphicon-phone-alt"></i> Tecnología</a></li>
    <?php if($establecimiento->NOMBRE_ACT == "Alojamiento"){?>
    <li><a href="<?php echo site_url("/establecimientos/habitaciones/").'/'.$establecimiento->ID_EST; ?>"><i class="glyphicon glyphicon-home"></i> Habitaciones</a> </li>
    <?php } ?>
    
    <?php if($establecimiento->NOMBRE_ACT == "Agencia de Viajes"){?>
    <li><a href="<?php echo site_url("/establecimientos/productos/").'/'.$establecimiento->ID_EST; ?>"><i class="glyphicon glyphicon-globe"></i> Productos Más Vendidos</a> </li>
    <?php } ?>
    
    
     <?php if($establecimiento->NOMBRE_ACT == "Alimentación"){?>
    <li><a href="<?php echo site_url("/establecimientos/especialidad/").'/'.$establecimiento->ID_EST; ?>"><i class="glyphicon  glyphicon-glass"></i>Especialidad </a> </li>
    <?php } ?>
    <li><a href="<?php echo site_url("/establecimientos/servicios/").'/'.$establecimiento->ID_EST; ?>"><i class="glyphicon glyphicon-cutlery"></i> Servicios</a> </li>
<li> <a href="<?php echo site_url("/establecimientos/transporte/").'/'.$establecimiento->ID_EST; ?>"><i class="glyphicon glyphicon-road"></i> Transporte</a></li>
<li> <a href="<?php echo site_url("/establecimientos/complementarias/").'/'.$establecimiento->ID_EST; ?>" ><i class="glyphicon glyphicon-th-list"></i> Servicios Complementarios</a></li>    
    
  </ul>
</div>
                 </td>
                
             </tr>

          <?php  } //foreach ?>
      
    </table>


<!-- IF ELSE -->
<?php   } else {  ?>
             

    <div class="alert alert-danger">
        
        <i class="glyphicon glyphicon-remove"> </i> <b> No se encontraron establecimientos</b>
        
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