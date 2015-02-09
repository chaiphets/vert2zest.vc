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

		// $filter = $pagination->filter;
		$pagination = $this->paginations->prepareFilter($filter);

		// $data['busStops'] = $this->bus_stop->search($filter);
		$pagination = $this->busModel->searchWithPaging($pagination);

		$data['filter'] = $pagination->filter;
		$data['paging'] = $pagination;
		$data['bus'] = $pagination->data;

		$this->template->load('wiki/bus/bus_list', $data);
	}

	public function show($busId){
		$bus = $this->busModel->getBusById($busId);
		if(empty($bus))
			show_404();
		$data['bus'] = $bus;
		$this->template->load('wiki/bus/bus_detail', $data);
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

	public function search(){
		$filter = $this->input->post();
		if($filter == FALSE)
			return $this->index();

		$data['filter'] = $filter;
		if(isset($filter['searchBus'])){
			$data['result'] = $this->bus->searchBus($filter);
		} else {

		}

		return $this->index($data);
	}

}
