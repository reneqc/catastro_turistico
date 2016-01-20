<?php
function mostrarModal($linea1,$linea2,$color='btn-primary'){
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
<!--                <h4 class="modal-title">  <?php echo '<i class="glyphicon glyphicon-'.$icono.'"> </i> '.$titulo;?></h4>-->
             <h4 class="modal-title"> <img src="<?php echo base_url().'/assets/img/mejia3.png'; ?>" alt="" height="50" width="40"> CATASTRO TURISTICO</h4>
              </div>
              <div class="modal-body">
                <center><p>
                  <h3><?php echo $linea1;?></h3>
                  <?php echo $linea2;?>
                </p></center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn <?php echo $color; ?>" data-dismiss="modal">OK</button>
              </div>
            </div>

          </div>
        </div>



<?php
}
	

?>