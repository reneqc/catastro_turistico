<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios extends CI_Controller {

    function __construct(){
      parent::__construct();      
    
      $this->load->model('usuario');
   }  
    

	public function index()
	{
        $data['usuarios'] = $this -> usuario -> consultaUsuarios();
        $this->load->view('encabezado');
		$this->load->view('/usuarios/index',$data);
        $this->load->view('pie');        
		
	}
    
    public function login(){        
        $this->load->view('encabezado');
		$this->load->view('/usuarios/login');
        $this->load->view('pie');        
    }
    
    public function validarDatos(){        
        $data=array(
        'username'=> $this->input->post('username'),
        'password'=> MD5($this->input->post('password'))
        );
        
        $resultado = $this -> usuario -> consultaUsuario($data);
        if($resultado){
            $this -> session -> set_flashdata('bienvenida','Usuario encontrado, bienvenido!');
            $newData = array(
                'username' => $resultado -> USERNAME, 
                'descripcion' => $resultado -> DES_USU
            );
            $this -> session -> set_userdata($newData);
          redirect("/establecimientos");
            
        }else
        {
            $this -> session -> set_flashdata('errorLogin','Usuario o contraseña incorrectos');
            //$this -> login();
            redirect ("/usuarios/login");
        }
    }
    public function cerrarSesion(){
        $this -> session -> sess_destroy();
        redirect ("/usuarios/login");
    }
}

?>