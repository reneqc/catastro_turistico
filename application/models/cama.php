<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cama extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultaCamas(){
        $query = $this -> db -> get("cama");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
	
    
    
}