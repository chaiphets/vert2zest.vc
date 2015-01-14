<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bus extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->model('wiki/bus');
	}
	public function index($data=null){
		$this->template->load('wiki/bus/bus', $data);
	}
	private function __init(){
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

		if($busStop['bus_no'] == "")
		$bus = $this->bus->create($bus);
		else
		$bus = $this->bus->update($bus);
		$this->template->load('templates/success');
	}
}
