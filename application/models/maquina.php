<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Maquina extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultaMaquinas(){
        $query = $this -> db -> get("maquina");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    
}