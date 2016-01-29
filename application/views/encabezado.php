<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Catastro Turístico</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <script src="<?php echo base_url("assets/js/jquery-2.1.4.min.js"); ?>" type="text/javascript">  </script>   
    <script src="<?php echo base_url("assets/js/bootstrap.js"); ?>" type="text/javascript">  </script>  
    <script src="<?php echo base_url("assets/js/jquery.validate.js"); ?>" type="text/javascript">  </script>        
    <script src="<?php echo base_url("assets/js/funciones.js"); ?>" type="text/javascript">  </script>        
    <script src="<?php echo base_url("assets/js/excellentexport.js"); ?>" type="text/javascript">  </script>        
    <script src="<?php echo base_url("assets/js/validaciones_adicionales.js"); ?>" type="text/javascript">  </script>        
    <script src="<?php echo base_url("assets/js/validaciones_adicionales1.js"); ?>" type="text/javascript">  </script>        
    <link href="<?php echo base_url("assets/css/stylish-portfolio.css"); ?>"  rel="stylesheet">  
    <link href="<?php echo base_url("assets/css/estilos_validate.css"); ?>"  rel="stylesheet">  
    <link href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">  	
</head>
<body>
  
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">TURISMO</a>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url(); ?>">Inicio <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <?php if($this->session->userdata('username')) {   ?>      
              <li><a href="<?php echo site_url("/establecimientos/consultar"); ?>">Establecimientos</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php  echo $this->session->userdata('username'); ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('/usuarios/cerrarSesion')?>">SALIR</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
        
        <?php  } else { ?>
        
            <li><a href="<?php echo site_url('/usuarios/login'); ?>">Ingresar</a></li>
        
        <?php  } ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  
   <?php  

        if($this->session->flashdata('bienvenida')){
      	mostrarModal('Usuario encontrado!',$this->session->userdata('username'),'btn-success');     
              
        }
    ?>