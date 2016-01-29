<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Personal extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultaPersonal(){
        $query = $this -> db -> get("personal");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    
}