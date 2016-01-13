<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimientos  extends CI_Controller {
    function __construct(){
      parent::__construct();      
      
    $this->load->model('actividad');
    $this->load->model('establecimiento');
    $this->load->model('equipo');
    $this->load->model('establecimiento_equipo');
   }  
    public function index(){
        if($this->session->userdata('username'))
        {
        $this->load->view('encabezado');
        $this->load->view('/establecimientos/menuLateral');
        $this->load->view('/establecimientos/index');
        $this->load->view('pie');
        }else{
         redirect("/usuarios/login");   
        }
        
    }
    
    public function informacion(){
        $data['actividades'] = $this -> actividad -> consultaActividades();
        $data['registro'] = $this->establecimiento->consultarUltimoId();
        
        
        if($this->session->userdata('username'))
        {
        $this->load->view('encabezado');
        $this->load->view('/establecimientos/menuLateral');
        $this->load->view('/establecimientos/informacion',$data);
        $this->load->view('pie');
        }else{
         redirect("/usuarios/login");   
        }
    }
    
    public function validarRuc(){
        $ruc = $this->input->post("ruc_est");
        if(array_key_exists("ruc_est",$_POST))
        {
            if($this->establecimiento->consultaRuc($ruc)==true)
            {
                echo json_encode(false);
            }else{
                echo json_encode(true);
            }
            
        }
        
    }
    public function guardarEstablecimiento(){
        $data = array(
            "registro_est" => $this->input->post("registro_est"),
            "latitud_est" => $this->input->post("latitud_est"),
            "longitud_est" => $this->input->post("longitud_est"),
            "nombre_est" => $this->input->post("nombre_est"),
            "ruc_est" => $this->input->post("ruc_est"),
            "parroquia_est" => $this->input->post("parroquia_est"),
            "direccion_est" => $this->input->post("direccion_est"),
            "telefono_est" => $this->input->post("telefono_est"),
            "fax_est" => $this->input->post("fax_est"),
            "email_est" => $this->input->post("email_est"),
            "pagina_est" => $this->input->post("pagina_est"),
            "propietario_est" => $this->input->post("propietario_est"),
            "representante_est" => $this->input->post("representante_est"),
            "cadenas_est" => $this->input->post("cadenas_est"),
            "franquicias_est" => $this->input->post("franquicias_est"),
            "afiliacion_est" => $this->input->post("afiliacion_est"),
            "organizacion_est" => $this->input->post("organizacion_est"),
            "especificacion_est" => $this->input->post("especificacion_est"),
            "lugar_est" => $this->input->post("lugar_est"),
            "local_est" => $this->input->post("local_est"),
            "id_act" => $this->input->post("id_act"),
            "provincia_est" => 17,
            "canton_est" => 3,
            "fecha_est" => date("Y-m-d"),            
   
        );
        
        $this->establecimiento->guardarEstablecimiento($data);
        
        $this -> session -> set_flashdata('establecimientoGuardado','Establecimiento Guardado Exitosamente!');
        
        redirect('/establecimientos/consultar');

        
    }
    
    
    public function consultar(){                 
                 
             
         if($this->session->userdata('username'))
        {                
             $data['busqueda'] = $this->input->post("busqueda");
             if($data['busqueda']==""){
                 $data['establecimientos']=$this -> establecimiento -> consultaEstablecimientosActividad();
             }else{
                 $data['establecimientos']=$this -> establecimiento -> buscarEstablecimientosActividad($data['busqueda']);
             }            
             $this->load->view('encabezado');
             $this->load->view('/establecimientos/menuLateral');
             $this->load->view('/establecimientos/consultar',$data);
             $this->load->view('pie');
        }else{
         redirect("/usuarios/login");   
        }
        
    }
    public function tecnologia($establecimiento){
        if($this->session->userdata('username'))
        {                
             $data['equipos'] = $this->equipo ->consultaEquipos();  
             $data['establecimiento'] = $establecimiento;
             $data['equipos2']= $this->establecimiento_equipo->consultarPorEstablecimiento($establecimiento);
             $this->load->view('encabezado');
             $this->load->view('/establecimientos/menuLateral');
             $this->load->view('/establecimientos/tecnologia',$data);
             $this->load->view('pie');
        }else{
         redirect("/usuarios/login");   
        }
    }
    public function guardarEstablecimientoEquipo(){
        $data = array(
            "id_est"=>$this->input->post("id_est"),
            "id_equi"=>$this->input->post("id_equi"),
            "cantidad_ee"=>$this->input->post("cantidad_ee")
        );
      $this->establecimiento_equipo->grabarEstablecimientoEquipo($data);
        $this -> session -> set_flashdata('equipoGuardado','Equipo Guardado Exitosamente!');
        redirect('/establecimientos/tecnologia/'.$data['id_est']);

    }
}
?>