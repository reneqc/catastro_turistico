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
            return $query;
        }else{
            return false;
        } 
    
    }
    functio actualizarExistencia($id_ee,$cantidad)
    
    
}