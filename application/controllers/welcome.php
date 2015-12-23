<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $datos['nombre'] = 'juan';
        $this->load->helper('url');
<<<<<<< HEAD
        $this->load->view('a1',$datos);
		$this->load->view('welcome_message');
        $this->load->view('a2');
=======
        $this->load->view('encabezado');
		$this->load->view('welcome_message');
        $this->load->view('pie');
>>>>>>> e53336d2834be01ef2b509b7c5a29586f78d8027
	}
}

?>