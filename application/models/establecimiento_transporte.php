<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_transporte extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function grabarEstablecimientoTransporte($data){
            $this->db->insert("establecimiento_transporte",$data);
    }
	
    function consultarEstablecimientoTransporte($id_est){
        $this->db->join("transporte","transporte.id_trans=establecimiento_transporte.id_trans");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_transporte.id_est");
        $query = $this->db->get_where("establecimiento_transporte",array('establecimiento_transporte.id_est'=>$id_est));		
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    
	 function consultarExistencia($id_trans,$id_est)
    {
        $this->db->join("transporte","transporte.id_trans=establecimiento_transporte.id_trans");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_transporte.id_est");
        $query = $this->db->get_where("establecimiento_transporte",array('establecimiento_transporte.id_trans'=>$id_trans,'establecimiento_transporte.id_est'=>$id_est));
    if($query -> num_rows() > 0)
        {
            return $query -> row();
        }else{
            return false;
        } 
    
    }
    function actualizarExistencia($id_et,$data)
    {
		$databd = $this->consultarCantidad($id_et);
        $unidades_tot = $databd-> UNIDADES_ET + $data['unidades_et'];
		
        $data1 = array(
			"unidades_et" => $unidades_tot,
		);
        $this->db->where("id_et",$id_et);
        $this->db->update("establecimiento_transporte",$data1);
    }
	
    function consultarCantidad($id_et){
        $query=$this->db->get_where("establecimiento_transporte",array("id_et"=>$id_et));        
        $resultado = $query->row(); 
        return $resultado;
    }
    function eliminarTransporte($id_et){
        $query=$this->db->delete("establecimiento_transporte",array("id_et"=>$id_et));        
    }
    
}
