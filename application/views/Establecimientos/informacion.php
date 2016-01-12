<div class="col-md-9">

<center><legend>INFORMACIÓN GENERAL</legend></center>

<form class="form-horizontal" id="form1" method="post" action="<?php echo site_url("/establecimientos/guardarEstablecimiento") ?>">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="registro_est">Registro Nº:</label>  
  <div class="col-md-5">
  <input id="aux_est" name="aux_est" value ="<?php echo $registro; ?>" type="hidden" placeholder="" class="form-control input-md">
  <input id="registro_est" value ="<?php echo $registro; ?>" name="registro_est" type="text" placeholder="" class="form-control input-md" readonly>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="latitud_est">Latitud:</label>  
  <div class="col-md-3">
  <input id="latitud_est" name="latitud_est" type="text" placeholder="Ingrese latitud" class="form-control input-md">
  <span class="help-block">Ej: -0.5</span>  
  </div>
   <label class="col-md-2 control-label" for="longitud_est">Longitud:</label>  
  <div class="col-md-3">
  <input id="longitud_est" name="longitud_est" type="text" placeholder="Ingrese longitud" class="form-control input-md">
  <span class="help-block">Ej: -78</span>  
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nombre_est">Nombre Establecimiento:</label>  
  <div class="col-md-8">
  <input id="nombre_est" name="nombre_est" type="text" placeholder="Ingrese el nombre" class="form-control input-md">
  <span class="help-block">Ej: Establecimiento</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ruc_est">Ruc:</label>  
  <div class="col-md-3">
  <input id="ruc_est" name="ruc_est" type="text" placeholder="Ingrese número de ruc" class="form-control input-md">
  <span class="help-block">Ej: 1717171717172</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="parroquia_est">Parroquia:</label>
  <div class="col-md-3">
    <select id="parroquia_est" name="parroquia_est" class="form-control">
      <option value="">Seleccione una opción</option>
      <option value="50">Machachi</option>
      <option value="52">Aloasi</option>
      <option value="51">Aloag</option>
      <option value="54">El Chaupi</option>
      <option value="55">Manuel Cornejo Astorga</option>
      <option value="56">Tambillo</option>
      <option value="57">Uyumbicho</option>
      <option value="53">Cutuglagua</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="direccion_est">Dirección:</label>
  <div class="col-md-8">                     
    <textarea class="form-control" id="direccion_est" name="direccion_est"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefono_est">Telefono:</label>  
  <div class="col-md-3">
  <input id="telefono_est" name="telefono_est" type="text" placeholder="Ingrese número de teléfono" class="form-control input-md">
  <span class="help-block">Ej: 593 3819-250</span>  
  </div>
  <label class="col-md-2 control-label" for="fax_est">Fax:</label>  
  <div class="col-md-3">
  <input id="fax_est" name="fax_est" type="text" placeholder="Ingrese número de fax" class="form-control input-md">
  <span class="help-block">Ej: (593) 3819-250</span>  
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email_est">Email</label>  
  <div class="col-md-8">
  <input id="email_est" name="email_est" type="text" placeholder="Ingrese el email" class="form-control input-md">
  <span class="help-block">Ej: correo@correo.com</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pagina_est">Pag. Web:</label>  
  <div class="col-md-8">
  <input id="pagina_est" name="pagina_est" type="text" placeholder="Ingrese página web" class="form-control input-md">
  <span class="help-block">Ej: www.pagina.com</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="propietario_est">Propietario:</label>  
  <div class="col-md-8">
  <input id="propietario_est" name="propietario_est" type="text" placeholder="Ingrese nombre y apellido del propietario" class="form-control input-md">
  <span class="help-block">Ej: Nombre Apellido</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="representante_est">Representante Legal:</label>  
  <div class="col-md-8">
  <input id="representante_est" name="representante_est" type="text" placeholder="Ingrese el nombre del representante" class="form-control input-md">
  <span class="help-block">Ej: Nombre Apellido representante</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cadenas_est">Pertenece a cadenas (Nombre):</label>  
  <div class="col-md-8">
  <input id="cadenas_est" name="cadenas_est" type="text" placeholder="Ingrese el nombre de la cadena" class="form-control input-md">
  <span class="help-block">Ej: Cadena</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="franquicias_est">Pertenece a franquicias (Nombre):</label>  
  <div class="col-md-8">
  <input id="franquicias_est" name="franquicias_est" type="text" placeholder="Ingrese el nombre de la franquicia" class="form-control input-md">
  <span class="help-block">Ej: Franquicia</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="afiliacion_est">Afiliación a cámaras (Nombre):</label>  
  <div class="col-md-8">
  <input id="afiliacion_est" name="afiliacion_est" type="text" placeholder="Ingrese el nombre de camara" class="form-control input-md">
  <span class="help-block">Ej: Camara</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="organizacion_est">Tipo de organización:</label>
  <div class="col-md-3">
    <select id="organizacion_est" name="organizacion_est" class="form-control">
      <option value="">Seleccione una opción</option>
      <option value="Persona Natural">Persona Natural</option>
      <option value="Persona Juridica">Persona Juridica</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group" id="tipo_organizacion">
  <label class="col-md-4 control-label" for="especificacion_est">Especificación Tipo Organización:</label>  
  <div class="col-md-3">
  <select id="especificacion_est" name="especificacion_est" class="form-control">
      <option value="">Seleccione una opción</option>
      <option value="Sociedad Anonima">Sociedad Anonima</option>
      <option value="Compañia Limitada">Compañia Limitada</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="lugar_est">Tipo Establecimiento:</label>
  <div class="col-md-3">
    <select id="lugar_est" name="lugar_est" class="form-control">
      <option value="">Seleccione una opción</option>
      <option value="Principal">Principal</option>
      <option value="Sucursal">Sucursal</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="local_est">Tipo de local:</label>
  <div class="col-md-3">
    <select id="local_est" name="local_est" class="form-control">
      <option value="">Seleccione una opción</option>
      <option value="Propio">Propio</option>
      <option value="Arrendado">Arrendado</option>
      <option value="Cedido">Cedido</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="id_act">Nombre Actividad:</label>
  <div class="col-md-3">
    <select id="id_act" name="id_act" class="form-control">
    <option value="">Seleccione una opción</option>
    
    <?php
        foreach($actividades -> result() as $actividad)
        {
            
        
        ?>
        <option value="<?php echo $actividad -> ID_ACT ?>"><?php echo $actividad -> NOMBRE_ACT ?></option>
<?php }
        ?>
    
        </select>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btn_aceptar"></label>
  <div class="col-md-8">
    <button id="btn_aceptar"  type="submit" name="btn_aceptar" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Guardar</button>
    <button id="btn_cancelar" name="btn_cancelar" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
  </div>
</div>

</fieldset>
</form>






</div>


</div> <!--cierre de row de menu -->
</div> <!--cierre de container -->


<script type="text/javascript">
    $("#form1").validate({
      rules: {
        telefono_est:{
            required: true,
            digits: true
        },
        nombre_est:{
            required: true
        },
        ruc_est:{
            required: true,
            remote:{
                url: "<?php echo site_url("/establecimientos/validarRuc")?>",
                type: "POST",
            },
            ruc: true 
        },
        parroquia_est:{
            required: true
        },
        direccion_est:{
            required: true
        },
        fax_est:{
            required: true,
            digits: true 
        },
        email_est:{
            required: true,
            email: true 
        },
        pagina_est:{
            required: true,
            url: true
        },
        propietario_est:{
            required: true,
            letras: true
            
        },
        representante_est:{
            required: true,
            letras: true
            
        },
        organizacion_est:{
            required: true
            
        },
        especificacion_est:{
            required: true
            
        },
        lugar_est:{
            required: true
            
        },
        local_est:{
            required: true
            
        },
        id_act:{
            required: true
            
        }
            },
      messages:{
        telefono_est:{
            required: "Ingrese numero telefónico",
            digits: "Ingrese solo digitos"
        },
        nombre_est:{
            required: "Ingrese nombre de establecimiento"
        },
        ruc_est:{
            required: "Ingrese ruc",
            remote: "Este ruc ya a sido registrado"
        },
        parroquia_est:{
            required: "Seleccione la parroquia"
        },
        direccion_est:{
            required: "Ingrese la dirección"
        },
        fax_est:{
            required: "Ingrese la dirección",
            digits: "Ingrese solo números"
        },
        email_est:{
            required: "Ingrese correo electrónico",
            email: "Correo no valido"
        },
        pagina_est:{
            required: "Ingrese correo electrónico",
            url: "Pagina no valida"
        },
        propietario_est:{
            required: "Ingrese nombre del propietario"
            
        },
        representante_est:{
            required: "Ingrese nombre del representante"
            
        },
        organizacion_est:{
            required: "Seleccione el tipo de organización"
            
        },
        especificacion_est:{
            required: "Ingrese el tipo de organización"
            
        },
        lugar_est:{
            required: "Seleccione el tipo de establecimiento"
            
        },
        local_est:{
            required: "Seleccione el tipo de local"
            
        },
        id_act:{
            required: "Seleccione el tipo de actividad"
            
        }
      }
      });
    $("#tipo_organizacion").prop("hidden",true);
</script>








