<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct(){
      parent::__construct();      
      $this->load->helper('form');
      $this->load->helper('url');
      //$this->load->model('empleado');
   }  
    

	public function index()
	{        
		
	}
    
    public function login(){        
        $this->load->view('encabezado');
		$this->load->view('/usuarios/login');
        $this->load->view('pie');        
    }
    
    public function validarDatos(){        
        $data=array(
        'username'=> $this->input->post('username'),
        'password'=> $this->input->post('password')
        );
        
        echo $data['username'];
    }
}

?>