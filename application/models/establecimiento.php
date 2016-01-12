<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    
    //no se usa
    function consultaEstablecimientos(){
        $query = $this -> db -> get("establecimiento");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    function consultarUltimoId(){
        $this->db->from('establecimiento');
        $this->db->select_max('id_est');
        $query=$this->db->get();
        
        if($query -> num_rows() > 0)
         {
                $row = $query -> result_array();
                return  $row[0]['id_est']+1;
         }                
    }
    
    
    function consultaEstablecimientosActividad(){
        $this->db->join('actividad','establecimiento.id_act = actividad.id_act');
        $query = $this -> db -> get("establecimiento");
        
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
    
    function consultaRuc($ruc){
        $data = array("ruc_est"=>$ruc);
        $query = $this -> db -> get_where("establecimiento", $data);
        if($query -> num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
            
    }
    
    function guardarEstablecimiento($data){
        
        $this->db->insert('establecimiento',$data);
        
    }
    
    
}