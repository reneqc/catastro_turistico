<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_equipo extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function grabarEstablecimientoEquipo($data){
            $this->db->insert("establecimiento_equipo",$data);
    }
    function consultarPorEstablecimiento($id_est){
        $this->db->join("equipo","equipo.id_equi=establecimiento_equipo.id_equi");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_equipo.id_est");
        $query = $this->db->get_where("establecimiento_equipo",array('establecimiento_equipo.id_est'=>$id_est));
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    function consultarExistencia($id_equi,$id_est)
    {
        $this->db->join("equipo","equipo.id_equi=establecimiento_equipo.id_equi");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_equipo.id_est");
        $query = $this->db->get_where("establecimiento_equipo",array('establecimiento_equipo.id_est'=>$id_est,'establecimiento_equipo.id_equi'=>$id_equi));
    if($query -> num_rows() > 0)
        {
            return $query -> row();
        }else{
            return false;
        } 
    
    }
    function actualizarExistencia($id_ee,$cantidad)
    {
        $cantidad_tot = $this->consultarCantidad($id_ee)+ $cantidad;
        
        $data = array("cantidad_ee" => $cantidad_tot);
        $this->db->where("id_ee",$id_ee);
        $this->db->update("establecimiento_equipo",$data);
    }
    function consultarCantidad($id_ee){
        $query=$this->db->get_where("establecimiento_equipo",array("id_ee"=>$id_ee));        
        $resultado = $query->row(); 
        return $resultado->CANTIDAD_EE;
    }
    function eliminarEquipo($id_ee){
        $query=$this->db->delete("establecimiento_equipo",array("id_ee"=>$id_ee));        
    }
    
}