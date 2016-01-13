<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Equipo extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultaEquipos(){
        $query = $this -> db -> get("equipo");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    
}