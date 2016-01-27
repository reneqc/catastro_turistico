<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Especialidad extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultarEspecialidades(){
        $query = $this -> db -> get("especialidad");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    
}