<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Actividad extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultaActividades(){
        $query = $this -> db -> get("actividad");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    
}