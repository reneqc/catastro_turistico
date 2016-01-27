<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Producto extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultarProductos(){
        $query = $this -> db -> get("producto");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    
}