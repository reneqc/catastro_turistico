<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transporte extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultaTransporte(){
        $query = $this -> db -> get("transporte");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    
}