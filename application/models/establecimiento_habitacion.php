<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_habitacion extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function grabarEstablecimientoHabitacion($id_establecimiento,$id_habitacion){
            $this->db->insert("establecimiento_habitacion",array("id_est"=>$id_establecimiento,"id_hab"=>$id_habitacion));
    }
    function consultarPorEstablecimiento($id_est){
        $this->db->join("habitacion","habitacion.id_hab=establecimiento_habitacion.id_hab");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_habitacion.id_est");
        $query = $this->db->get_where("establecimiento_habitacion",array('establecimiento_habitacion.id_est'=>$id_est));		
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    function eliminarEstablecimientoHabitacion($id_eh){
		$this->db->delete('establecimiento_habitacion',array("id_eh"=>$id_eh));
	}
}