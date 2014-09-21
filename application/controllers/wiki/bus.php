<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bus extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		//$this->load->model('wiki/bus');
	}
	public function index($data=null){
		$this->template->load('wiki/bus', $data);
	}
}