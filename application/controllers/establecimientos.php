<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimientos  extends CI_Controller {
    function __construct(){
      parent::__construct();      
      
    $this->load->model('actividad');
    $this->load->model('establecimiento');
    $this->load->model('equipo');
    $this->load->model('maquina');
	$this->load->model('habitacion');
	$this->load->model('cama');
	$this->load->model('servicio');
    $this->load->model('establecimiento_equipo');
	$this->load->model('establecimiento_servicio');
    $this->load->model('establecimiento_maquina');
	$this->load->model('establecimiento_habitacion');
	$this->load->model('cama_habitacion');
	
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
    public function consultarCamas()
	{
		$id = $this->input->post("id_hab");
		
		$resultado= $this->cama_habitacion->consultarCamaHabitacion($id);
		
		if($resultado){
			echo json_encode($resultado->result());
		}else
		{}
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
	    public function guardarCamaHabitacion(){
		$id_est = $this->input->post("id_est");
        $data = array(
            "id_cam" => $this->input->post("id_cam"),
            "id_hab" => $this->input->post("id_hab"),
            "numero" => $this->input->post("numero"),
        );
        
        $this->cama_habitacion->grabarCama($data);
        
        $this -> session -> set_flashdata('mensaje','Cama Guardada Exitosamente!');
        
        redirect('/establecimientos/habitaciones/'.$id_est);

        
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
             $data['maquinas'] = $this->maquina ->consultaMaquinas(); 
             $data['establecimiento'] = $establecimiento;
             $data['equipos2']= $this->establecimiento_equipo->consultarPorEstablecimiento($establecimiento);
             $data['maquinas2']= $this->establecimiento_maquina->consultarPorEstablecimiento($establecimiento);
             $this->load->view('encabezado');
             $this->load->view('/establecimientos/menuLateral');
             $this->load->view('/establecimientos/tecnologia',$data);
             $this->load->view('pie');
        }else{
         redirect("/usuarios/login");   
        }
    }
	public function servicios($establecimiento){
        if($this->session->userdata('username'))
        {                
//             $data['equipos'] = $this->equipo ->consultaEquipos();  
//             $data['maquinas'] = $this->maquina ->consultaMaquinas(); 
//             $data['establecimiento'] = $establecimiento;
//             $data['equipos2']= $this->establecimiento_equipo->consultarPorEstablecimiento($establecimiento);
			 $data['servicios1']= $this->establecimiento_servicio->consultarPorEstablecimiento($establecimiento);
             $data['servicios']= $this->servicio->consultaServicios();
			 $data['establecimiento'] = $establecimiento;
             $this->load->view('encabezado');
             $this->load->view('/establecimientos/menuLateral');
             $this->load->view('/establecimientos/servicios',$data);
             $this->load->view('pie');
        }else{
         redirect("/usuarios/login");   
        }
    }
	
    public function habitaciones($establecimiento){
        if($this->session->userdata('username'))
        {                
         /*    $data['equipos'] = $this->equipo ->consultaEquipos();  
             $data['maquinas'] = $this->maquina ->consultaMaquinas(); 
             $data['establecimiento'] = $establecimiento;
             $data['equipos2']= $this->establecimiento_equipo->consultarPorEstablecimiento($establecimiento);
             $data['maquinas2']= $this->establecimiento_maquina->consultarPorEstablecimiento($establecimiento);*/
			 $data['habitaciones']= $this->establecimiento_habitacion->consultarPorEstablecimiento($establecimiento);
             $data['establecimiento'] = $establecimiento;
			 $data['camas']= $this->cama->consultaCamas();
			 
             $this->load->view('encabezado');
             $this->load->view('/establecimientos/menuLateral');
             $this->load->view('/establecimientos/habitaciones',$data);
             $this->load->view('pie');
        }else{
         redirect("/usuarios/login");   
        }
    }
	public function eliminarServicio($id_es,$id_est)
	{
		$this->establecimiento_servicio->eliminarServicio($id_es);
		$this -> session -> set_flashdata('mensaje','Servicio Eliminado Exitosamente!');	
		redirect('/establecimientos/servicios/'.$id_est);
	}
	public function guardarServicios()
	{
		
		$data = array(
            "id_serv"=>$this->input->post("id_serv"),
            "mesas_es"=>$this->input->post("mesas_es"),
			"plazas_es"=>$this->input->post("plazas_es"),
			"banios_es"=>$this->input->post("banios_es"),
			"id_est"=>$this->input->post("id_est")
        );
		$consulta = $this->establecimiento_servicio->consultarExistencia($data['id_serv'],$data['id_est']);
		if($consulta){
			$this -> establecimiento_servicio->actualizarExistencia($consulta->ID_ES,$data);
			$this -> session -> set_flashdata('mensaje','Servicio Actualizado Exitosamente!');
		}else{
			$this -> establecimiento_servicio->grabarEstablecimientoServicio($data);
			$this -> session -> set_flashdata('mensaje','Servicio Guardado Exitosamente!');	
		}
		
		redirect('/establecimientos/servicios/'.$data['id_est']);
	}
    public function guardarEstablecimientoEquipo(){
        $data = array(
            "id_est"=>$this->input->post("id_est"),
            "id_equi"=>$this->input->post("id_equi"),
            "cantidad_ee"=>$this->input->post("cantidad_ee")
        );
        $consulta = $this->establecimiento_equipo->consultarExistencia($data['id_equi'],$data['id_est']);
        if($consulta)
        { 
            $this->establecimiento_equipo->actualizarExistencia($consulta->ID_EE,$data['cantidad_ee']);
            $this -> session -> set_flashdata('mensaje','Equipo Actualizado Exitosamente!');
        }else{
            $this->establecimiento_equipo->grabarEstablecimientoEquipo($data);
            $this -> session -> set_flashdata('mensaje','Equipo Guardado Exitosamente!');
        }
      
        redirect('/establecimientos/tecnologia/'.$data['id_est']);

    }
	
    public function eliminarEstablecimientoEquipo($id_ee,$id_est){
        $this->establecimiento_equipo->eliminarEquipo($id_ee);
        $this -> session -> set_flashdata('mensaje','Equipo Eliminado Exitosamente!');
        redirect('/establecimientos/tecnologia/'.$id_est);
            
    }
    public function eliminarEstablecimientoHabitacion($id_eh,$id_hab,$id_est){
		$this->establecimiento_habitacion->eliminarEstablecimientoHabitacion($id_eh);
        $this->habitacion->eliminarHabitacion($id_hab);
        $this -> session -> set_flashdata('mensaje','Habitación Eliminada Exitosamente!');
        redirect('/establecimientos/habitaciones/'.$id_est);
            
    }
    //Maquina
        public function guardarEstablecimientoMaquina(){
        $data = array(
            "id_est"=>$this->input->post("id_est"),
            "id_maqui"=>$this->input->post("id_maqui"),
            "cantidad_em"=>$this->input->post("cantidad_em")
        );
        $consulta = $this->establecimiento_maquina->consultarExistencia($data['id_maqui'],$data['id_est']);
        if($consulta)
        {
            $this->establecimiento_maquina->actualizarExistencia($consulta->ID_EM,$data['cantidad_em']);
            $this -> session -> set_flashdata('mensaje','Maquina Actualizada Exitosamente!');
        }else{
            $this->establecimiento_maquina->grabarEstablecimientoMaquina($data);
            $this -> session -> set_flashdata('mensaje','Maquina Guardada Exitosamente!');
        }
      
        redirect('/establecimientos/tecnologia/'.$data['id_est']);

    }
    public function eliminarEstablecimientoMaquina($id_em,$id_est){
        $this->establecimiento_maquina->eliminarMaquina($id_em);
        $this -> session -> set_flashdata('mensaje','Maquina Eliminada Exitosamente!');
        redirect('/establecimientos/tecnologia/'.$id_est);
            
    }
    //Habitaciones
    public function guardarHabitacion(){	
        
        if($this->input->post("banio")=="banioPrivado_hab"){
            $auxPrivado = 1;
            $auxCompartido = 0;
        }else
        {
            $auxPrivado = 0;
            $auxCompartido = 1;
        }
        
        $data = array(
            "descripcion_hab"=> ($this->input->post("descripcion_hab")),
            "banioPrivado_hab" => $auxPrivado,
            "banioCompartido_hab" => $auxCompartido,
            "television_hab"=>$this->input->post("television_hab"),
            "nevera_hab"=>$this->input->post("nevera_hab"),
            "aire_hab"=>$this->input->post("aire_hab"),
            "telefono_hab"=>$this->input->post("telefono_hab"),
            "secadora_hab"=>$this->input->post("secadora_hab"),
            "musica_hab"=>$this->input->post("musica_hab")
        );
		$id_habitacion = $this->habitacion->guardarHabitacion($data);
		
        $id_establecimiento = $this->input->post("id_establecimiento");
		$this -> establecimiento_habitacion -> grabarEstablecimientoHabitacion($id_establecimiento,$id_habitacion);
		$this -> session -> set_flashdata('mensaje','Habitación Guardada Exitosamente!');
        redirect('/establecimientos/habitaciones/'.$id_establecimiento);
    }
	
	public function eliminarCamaHabitacion($id_est,$id_ch){
		$this->cama_habitacion->eliminarCamaHabitacion($id_ch);
		//$this->cama->eliminarCama($id_cam);
        //$this->habitacion->eliminarHabitacion($id_hab);
        $this -> session -> set_flashdata('mensaje','Cama Eliminada Exitosamente!');
        redirect('/establecimientos/habitaciones/'.$id_est);
		
            
    }
    
}
?>