<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{        
        if(rand(0,1) == 1){
            $this->session->set_flashdata('eliminado', 'Eliminado!');
        }
        
        $this->load->helper('url');
        $this->load->view('encabezado');
		$this->load->view('welcome_message');
        $this->load->view('pie');

	}

}

?>