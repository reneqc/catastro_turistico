<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Establecimientos  extends CI_Controller {
    function __construct(){
      parent::__construct();      
      
      $this->load->model('usuario');
   }  
    public function index(){
        if($this->session->userdata('username'))
        {
        $this->load->view('encabezado');
        $this->load->view('/establecimientos/index');
        $this->load->view('pie');
        }else{
         redirect("/usuarios/login");   
        }
        
    }
}
?>