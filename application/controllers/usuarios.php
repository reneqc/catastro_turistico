<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios extends CI_Controller {

    function __construct(){
      parent::__construct();      
      $this->load->helper('form');
      $this->load->helper('url');
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
          redirect("/");
        }else
        {
            $this -> login();
        }
    }
}

?>