
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
        if($this -> session -> flashdata("errorLogin")){
             
			 mostrarModal('Acceso denegado.',$this -> session -> flashdata("errorLogin"),'','btn-danger');
        }
        ?>
            
                
                
               
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
                    'class'=>'form-horizontal',
                    
            );
        
            
            $boton=array(
                'class'=>'btn btn-primary',
                'type'=>'submit',
                'value'=>'Ingresar'
            );
    
         ?>
         
         <?php echo form_open('/usuarios/validarDatos',$formulario) ?> 
         
               
        <?php echo form_label('Usuario:','username');?>          
        <?php echo form_input($username) ?>
       
        <br>
        <br>

            <?php echo form_label('Contraseña:','password');?> 
            <?php echo form_input($password) ?>

        <br>
        <center>
        <?php echo form_submit($boton); ?>
        </center>
        <?php echo form_close(); ?>
        
    </div>
    <div class="col-md-4"> </div>
    
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
