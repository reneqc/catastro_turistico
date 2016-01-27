<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_especialidad extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function grabarEstablecimientoEspecialidad($data){
            $this->db->insert("establecimiento_especialidad",$data);
    }
    
    function consultarPorEstablecimiento($id_est){
        $this->db->join("especialidad","especialidad.id_espe=establecimiento_especialidad.id_espe");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_especialidad.id_est");
        $query = $this->db->get_where("establecimiento_especialidad",array('establecimiento_especialidad.id_est'=>$id_est));
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    
    function consultarExistencia($id_est)
    {
        $this->db->join("especialidad","especialidad.id_espe=establecimiento_especialidad.id_espe");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_especialidad.id_est");
        $query = $this->db->get_where("establecimiento_especialidad",array('establecimiento_especialidad.id_est'=>$id_est));
    if($query -> num_rows() > 0)
        {
            return $query -> row();
        }else{
            return false;
        } 
    
    }
    
    
    
        function consultarEspecialidadAsignada($id_est)
    {
        $this->db->join("especialidad","especialidad.id_espe=establecimiento_especialidad.id_espe");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_especialidad.id_est");
        $query = $this->db->get_where("establecimiento_especialidad",array('establecimiento_especialidad.id_est'=>$id_est));
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        } 
    
    }
    
    
    function actualizarExistencia($id_ees,$data)
    {
        $this->db->where("id_ees",$id_ees);
        $this->db->update("establecimiento_especialidad",$data);
    }
    

    function eliminarespecialidad($id_ees){
        $query=$this->db->delete("establecimiento_especialidad",array("id_ees"=>$id_ees));        
    }

    
}