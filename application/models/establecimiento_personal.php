<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_personal extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function grabarEstablecimientoPersonal($data){
            $this->db->insert("establecimiento_personal",$data);
    }
    
    function consultarPorEstablecimiento($id_est){
        $this->db->join("personal","personal.id_per=establecimiento_personal.id_per");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_personal.id_est");
        $query = $this->db->get_where("establecimiento_personal",array('establecimiento_personal.id_est'=>$id_est));		
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    
	 function consultarExistencia($id_per,$id_est)
    {
        $this->db->join("personal","personal.id_per=establecimiento_personal.id_per");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_personal.id_est");
        $query = $this->db->get_where("establecimiento_personal",array('establecimiento_personal.id_est'=>$id_est,'establecimiento_personal.id_per'=>$id_per));
    if($query -> num_rows() > 0)
        {
            return $query -> row();
        }else{
            return false;
        } 
    
    }
    function actualizarExistencia($id_eper,$data)
    {
		$databd = $this->consultarCantidad($id_eper);
        $total_hombres = $databd-> HOMBRES_EPER + $data['hombres_eper'];
		$total_mujeres = $databd-> MUJERES_EPER+ $data['mujeres_eper'];		
        
        $data1 = array(
			"hombres_eper" => $total_hombres,
			"mujeres_eper" => $total_mujeres,			
		);
        $this->db->where("id_eper",$id_eper);
        $this->db->update("establecimiento_personal",$data1);
    }
	
    function consultarCantidad($id_eper){
        $query=$this->db->get_where("establecimiento_personal",array("id_eper"=>$id_eper));        
        $resultado = $query->row(); 
        return $resultado;
    }
    
    function eliminarpersonal($id_eper){
        $query=$this->db->delete("establecimiento_personal",array("id_eper"=>$id_eper));        
    }
    
}



