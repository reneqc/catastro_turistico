<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuario extends CI_Model{
    function __construct (){
        parent :: __construct();
        $this -> load -> database();
        
    }
    function crearUsuario($data){
        $this -> db -> insert("usuario", array("USERNAME" => $data['username'],"PASSWORD" => $data['password']));
    }
    function consultaUsuarios(){
        $query = $this -> db -> get("usuario");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    function consultaUsuario($data){
        $query = $this -> db -> get_where("usuario", $data);
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
}