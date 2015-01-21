<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bus extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('wiki/busModel');
		$this->load->helper("url");
		$this->load->library("paginations");
	}
	public function index($data=null){
		$this->template->load('wiki/bus/bus', $data);
	}
	private function __init(){
		$bus['bus_id'] = null;
		$bus['bus_no'] = null;
		$bus['bus_name_th'] = null;
		$bus['bus_name_eng'] = null;
		return $bus;
	}
	public function create($data=null){
		$data['bus'] = $this->__init();
		$this->template->load('wiki/bus/bus_detail', $data);
	}
	public function display($data=null){
		$filter = $this->input->post();
		if($filter == false){
			$data['filter'] = $this->__init();
			$data['paging'] = $this->paginations->prepareFilter();
			$this->template->load('wiki/bus/bus_list', $data);
			return;
		}
	}
	public function save($data=null){
		$bus = $this->input->post();
		if($bus == false){
			$this->create();
			return;
		}
		/*	if there is no bus exist in database, this will create new one	*/
		if($bus['bus_id'] == ""){
			$bus = $this->busModel->create($bus);
		}
		else{
			$bus = $this->busModel->update($bus);
		}
		$this->template->load('templates/success');
	}
}
