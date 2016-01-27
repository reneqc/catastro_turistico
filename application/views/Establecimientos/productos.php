<div class="col-md-9">
       
        
       <div class="row">
            <legend><center>Productos más vendidos <a href="<?php echo site_url('/establecimientos/consultar');?>" class="btn btn-info btn-sm pull-right"> <i class="glyphicon glyphicon-arrow-left"> </i> <b>Volver</b></a></center> </legend>          
            <form action="<?php echo site_url('/establecimientos/guardarProducto'); ?>" method="post" id="form1">
                   <input type="hidden" id="id_est" name="id_est" value="<?php echo $establecimiento; ?>">
                <table class="table table-striped ">

                 <tr>
                     <th class="text-center alert-success">Producto</th>
                     <th class="text-center alert-success">Destino</th>                     
                     <th class="text-center alert-success">Agregar</th>
                 </tr>

                  <tr>
                         <td class="text-center"> 
                              <select name="id_prod" id="id_prod" class="form-control">
                                  <option value="">--Seleccione una opción--</option>
                                  <?php foreach($productos->result() as $prod) {?> 
                                      <option value="<?php echo $prod->ID_PROD; ?>"><?php echo $prod->NOMBRE_PROD; ?></option>
                                   <?php } ?>
                              </select> 
                          </td>
                         <td class="text-center">                            
                            <div class="contenedor">
                                 <label for="" class="des">
                                     <input type="radio" name="descripcion_ep" value="NACIONAL"> Nacional
                                </label>
                                <br>
                                <label for="" class="des">
                                    <input type="radio" name="descripcion_ep" value="INTERNACIONAL"> Internacional
                                 </label>   
                                 <br>
                             </div>                    
                        </td>
                         
                         <td class="text-center"><button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-plus"> </i></button> </td>
                 </tr>


              </table>
          </form>
       </div>
       
     <?php if($productos2) { ?>
        <table class="table">
                <tr class="alert-success">
                    <th class="text-center">Nombre del Producto</th>
                    <th class="text-center">Nacional</th>
                    <th class="text-center">Internacional</th>
                    <th class="text-center">Eliminar</th>
                </tr>
            
          
          
        
        <?php foreach($productos2->result() as $prod) {?>          
            <tr>
                <td class="text-center"><?php echo $prod->NOMBRE_PROD; ?></td>
                
                <?php if($prod->DESCRIPCION_EP == 'NACIONAL') { ?>
                    <td class="text-center"> <i class="glyphicon glyphicon-ok"></i> </td>
                <?php } else { ?>                    
                    <td class="text-center"> <i class="glyphicon glyphicon-remove"></i> </td>
                <?php } //if ?>
                
                 <?php if($prod->DESCRIPCION_EP == 'INTERNACIONAL') { ?>
                    <td class="text-center"> <i class="glyphicon glyphicon-ok"></i> </td>
                <?php } else { ?>                    
                    <td class="text-center"> <i class="glyphicon glyphicon-remove"></i> </td>
                <?php } //if ?>
                
                <td class="text-center">
                    <a href="<?php echo site_url("/establecimientos/eliminarProducto").'/'.$establecimiento.'/'.$prod->ID_EP;?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"> </i></a>
                    
                </td>
                
            </tr>
        
        <?php } //foreach ?>
        </table>
        
         <?php $totalProductos = $numeroNacionales + $numeroInternacionales; ?>
        
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <table class="table table-striped">
                    <tr>
                        <th class="text-center alert-success" colspan="3">Porcentajes de Destinos más Vendidos</th>
                    </tr>
                     <tr>
                        <th class="text-center">Destino</th>
                        <th class="text-center">Número</th>
                        <th class="text-center">Porcentaje</th>
                    </tr>
                    <tr>
                        <td class="text-center">Nacionales</td>
                        <td class="text-center"> <?php echo $numeroNacionales; ?> </td>
                        <td class="text-center"> <?php echo round(($numeroNacionales*100/$totalProductos)*100)/100; ?>% </td>
                    </tr>
                     <tr>
                        <td class="text-center">Internacionales</td>
                        <td class="text-center"> <?php echo $numeroInternacionales; ?> </td>
                        <td class="text-center"> <?php echo  round(($numeroInternacionales*100/$totalProductos)*100)/100; ?>% </td>
                    </tr>
                     <tr>
                        <th class="text-center">TOTAL:</th>
                        <th class="text-center"> <?php echo $totalProductos; ?> </th>
                        <th class="text-center">100% </th>
                    </tr>
                </table>
             </div>
            <div class="col-md-3"></div>
        </div>
        
        <?php }else{ ?>
            
            <div class="alert alert-danger">                 
                 <i class="glyphicon glyphicon-remove"> </i> <b>No se encontraron productos</b>               
            </div>
            
            <br>
            <br>
            <br>
            <br>            
        
        <?php }?>
    
       
</div>





</div>
</div>








<script>

    $("#form1").validate({
        rules:{
            id_prod:{
                required:true
            },
            descripcion_ep:{
                required:true
            }
            
        },
        messages:{
            
            id_prod:{
                required:"Seleccione el producto"
            },
            descripcion_ep:{
                required:"Seleccion el destino"
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




<style>
    
    .contenedor > label.des{
        font-weight: normal;
    }

</style>


<?php
if($this->session->flashdata("mensaje")){
	mostrarModal($this->session->flashdata("mensaje"),'','btn-success');
}
?>
