<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cama_habitacion extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultarCamasHabitacion(){
        $query = $this -> db -> get("cama_habitacion");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
	function grabarCama($data){
		$this -> db -> insert("cama_habitacion",$data);
	}
	function consultarCamaHabitacion($id_hab){
        $this->db->join("cama","cama.id_cam=cama_habitacion.id_cam");
        $this->db->join("habitacion","habitacion.id_hab=cama_habitacion.id_hab");
        $query = $this->db->get_where("cama_habitacion",array('cama_habitacion.id_hab'=>$id_hab));
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
	function eliminarCamaHabitacion($id_cam,$id_hab){
		$this->db->delete('cama_habitacion',array("id_cam"=>$id_cam,"id_hab"=>$id_hab));
	}
    
    
}