<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Habitacion extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function consultaHabitacion(){
        $query = $this -> db -> get("habitacion");
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
            
    }
	function guardarHabitacion($data){
		$this->db->insert('habitacion',$data);
		return $this->db->insert_id();
	}
    function eliminarHabitacion($id_hab){
		$this->db->delete('habitacion',array("id_hab"=>$id_hab));
	}
    
}