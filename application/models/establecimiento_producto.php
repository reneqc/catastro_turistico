<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimiento_producto extends CI_Model{
    function __construct (){
        parent :: __construct();
        
        
    }
    
    function grabarEstablecimientoProducto($data){
            $this->db->insert("establecimiento_producto",$data);
    }
    
    function consultarPorEstablecimiento($id_est){
        $this->db->join("producto","producto.id_prod=establecimiento_producto.id_prod");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_producto.id_est");
        $query = $this->db->get_where("establecimiento_producto",array('establecimiento_producto.id_est'=>$id_est));
        if($query -> num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }     
    }
    function consultarExistencia($id_prod,$id_est)
    {
        $this->db->join("producto","producto.id_prod=establecimiento_producto.id_prod");
        $this->db->join("establecimiento","establecimiento.id_est=establecimiento_producto.id_est");
        $query = $this->db->get_where("establecimiento_producto",array('establecimiento_producto.id_est'=>$id_est,'establecimiento_producto.id_prod'=>$id_prod));
    if($query -> num_rows() > 0)
        {
            return $query -> row();
        }else{
            return false;
        } 
    
    }
    function actualizarExistencia($id_ep,$data)
    {
        $this->db->where("id_ep",$id_ep);
        $this->db->update("establecimiento_producto",$data);
    }
    

    function eliminarProducto($id_ep){
        $query=$this->db->delete("establecimiento_producto",array("id_ep"=>$id_ep));        
    }
    
    
      public function contarNacionales($id_est){       
       $this->db->from('establecimiento_producto');
       $this->db->where('id_est', $id_est);
       $this->db->where('descripcion_ep', 'NACIONAL');
       $query = $this->db->count_all_results();
       return $query;
    }
    
    
      public function contarInternacionales($id_est){       
       $this->db->from('establecimiento_producto');
       $this->db->where('id_est', $id_est);
       $this->db->where('descripcion_ep', 'INTERNACIONAL');
       $query = $this->db->count_all_results();
       return $query;
    }
    
}