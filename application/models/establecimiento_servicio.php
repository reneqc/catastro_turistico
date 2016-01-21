<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_servicio extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function grabarEstablecimientoServicio($data){
            $this->db->insert("establecimiento_servicio",$data);
    }
    function consultarPorEstablecimiento($id_est){
        $this->db->join("servicio","servicio.id_serv=establecimiento_servicio.id_serv");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_servicio.id_est");
        $query = $this->db->get_where("establecimiento_servicio",array('establecimiento_servicio.id_est'=>$id_est));		
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    
	 function consultarExistencia($id_serv,$id_est)
    {
        $this->db->join("servicio","servicio.id_serv=establecimiento_servicio.id_serv");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_servicio.id_est");
        $query = $this->db->get_where("establecimiento_servicio",array('establecimiento_servicio.id_est'=>$id_est,'establecimiento_servicio.id_serv'=>$id_serv));
    if($query -> num_rows() > 0)
        {
            return $query -> row();
        }else{
            return false;
        } 
    
    }
    function actualizarExistencia($id_es,$data)
    {
		$databd = $this->consultarCantidad($id_es);
        $mesas_tot = $databd-> MESAS_ES + $data['mesas_es'];
		$plazas_tot = $databd-> PLAZAS_ES + $data['plazas_es'];
		$banios_tot = $databd-> BANIOS_ES + $data['banios_es'];
        
        $data1 = array(
			"mesas_es" => $mesas_tot,
			"plazas_es" => $plazas_tot,
			"banios_es" => $banios_tot
		);
        $this->db->where("id_es",$id_es);
        $this->db->update("establecimiento_servicio",$data1);
    }
	
    function consultarCantidad($id_es){
        $query=$this->db->get_where("establecimiento_servicio",array("id_es"=>$id_es));        
        $resultado = $query->row(); 
        return $resultado;
    }
    function eliminarServicio($id_es){
        $query=$this->db->delete("establecimiento_servicio",array("id_es"=>$id_es));        
    }
    
}
