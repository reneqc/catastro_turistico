<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
class Complementario extends CI_Model{
	function __construct(){
		parent :: __construct();
	}
	function consultaComplementario(){
		$query = $this->db->get("complementario");
		if($query->num_rows() > 0)
		{
			return $query;
		}else{
			return false;
		}
	}
}