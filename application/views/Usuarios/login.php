
<div style="background-image: url(<?php echo base_url("assets/img/parque.jpg"); ?>); height:100%; width:100%;">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <div class="col-md-4"> </div>
    <div class="col-md-4 well">
        <h4 class="text-center">ACCESO AL SISTEMA</h4>
        
            <?php
            
            $username=array(
                    'name'=>'username',
                    'placelhoder' => 'Ingrese el username',
                    'id'=>'username',
                    'class'=>'form-control'
            );
        
           $password=array(
                    'name'=>'password',
                    'placelhoder' => 'Ingrese la contraseña',
                    'id'=>'password',
                    'class'=>'form-control',
                    'type'=>'password'
            );
        
            $formulario=array(
                    'id'=>'formulario',
                    'class'=>'form-horizontal'
            );
        
            
            $boton=array(
                'class'=>'btn btn-primary',
                'type'=>'submit',
                'value'=>'Ingresar'
            );
    
         ?>
         
         <?= form_open('/usuarios/validarDatos',$formulario) ?> 
         
               
        <?= form_label('Usuario:','username');?>          
        <?= form_input($username) ?>
       
        <br>
        <br>

            <?= form_label('Contraseña:','password');?> 
            <?= form_input($password) ?>

        <br>
        <center>
        <?= form_submit($boton); ?>
        </center>
        <?= form_close(); ?>
        
    </div>
    <div class="col-md-3"> </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
</div>
