<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_complementaria extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    function grabarComplementaria($data){
		$this->db->insert("establecimiento_complementario",$data);
	}
    function grabarEstablecimientoHabitacion($id_establecimiento,$id_habitacion){
            $this->db->insert("establecimiento_habitacion",array("id_est"=>$id_establecimiento,"id_hab"=>$id_habitacion));
    }
    
    
    function consultarPorEstablecimiento($id_est){
        $this->db->join("complementario","complementario.id_comple=establecimiento_complementario.id_comple");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_complementario.id_est");
        $query = $this->db->get_where("establecimiento_complementario",array('establecimiento_complementario.id_est'=>$id_est));		
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    
    function eliminarComplementarias($id_est){
		$this->db->delete('establecimiento_complementario',array("id_est"=>$id_est));
	}
    

}