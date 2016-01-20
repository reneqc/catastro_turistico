<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_maquina extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function grabarEstablecimientoMaquina($data){
            $this->db->insert("establecimiento_maquina",$data);
    }
    function consultarPorEstablecimiento($id_est){        
        $this->db->join("maquina","maquina.id_maqui=establecimiento_maquina.id_maqui");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_maquina.id_est");
        $query = $this->db->get_where("establecimiento_maquina",array('establecimiento_maquina.id_est'=>$id_est));
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    function consultarExistencia($id_maqui,$id_est)
    {
        $this->db->join("maquina","maquina.id_maqui=establecimiento_maquina.id_maqui");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_maquina.id_est");
        $query = $this->db->get_where("establecimiento_maquina",array('establecimiento_maquina.id_est'=>$id_est,'establecimiento_maquina.id_maqui'=>$id_maqui));
    if($query -> num_rows() > 0)
        {
            return $query -> row();
        }else{
            return false;
        } 
    
    }
    function actualizarExistencia($id_em,$cantidad)
    {
        $cantidad_tot = $this->consultarCantidad($id_em)+ $cantidad;
        
        $data = array("cantidad_em" => $cantidad_tot);
        $this->db->where("id_em",$id_em);
        $this->db->update("establecimiento_maquina",$data);
    }
    function consultarCantidad($id_em){
        $query=$this->db->get_where("establecimiento_maquina",array("id_em"=>$id_em));        
        $resultado = $query->row(); 
        return $resultado->CANTIDAD_EM;
    }
    function eliminarMaquina($id_em){
        $query=$this->db->delete("establecimiento_maquina",array("id_em"=>$id_em));        
    }
    
}