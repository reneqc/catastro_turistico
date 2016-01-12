$(document).ready(function(){
    $("#parroquia_est").change(function(){
        $("#registro_est").val("");
        val1 = $("#aux_est").val(); 
         $("#registro_est").val("1703"+this.value+val1); 
        
    });
    $("#organizacion_est").change(function(){
       var_opcion = this.value;
        
        if(var_opcion == "Persona Juridica"){
             $("#tipo_organizacion").prop("hidden",false);
        }else{
             $("#tipo_organizacion").prop("hidden",true);
        }
        
    });
});