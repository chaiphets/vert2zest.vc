<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	var $ci;

	public function __construct() {
		$this->ci =& get_instance();
	}
	
	public function load($viewName, $data = null){
		$this->ci->load->view('templates/header');
		$this->ci->load->view($viewName, $data);
		$this->ci->load->view('templates/footer');
	}
}