<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Busstop extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('wiki/bus_stop');
		$this->load->helper("url");
        $this->load->library("paginations");
	}
	public function index($data=null){
		$this->template->load('wiki/busstop/bus_stop', $data);
	}
	public function search(){
		$filter = $this->input->post();
		if($filter == FALSE)
			return $this->index();
		
		$data['filter'] = $filter;
		if(isset($filter['searchBusStop'])){
			$data['result'] = $this->bus_stop->searchBusStop($filter);
		} else {
			
		}
		
		return $this->index($data);
	}
	private function __init(){
		$busStop['busstop_no'] = null;
		$busStop['busstop_name'] = null;
		$busStop['busstop_new_name'] = null;
		$busStop['busstop_th_name'] = null;
		$busStop['road_name'] = null;
		$busStop['latitude'] = null;
		$busStop['longtitude'] = null;
		$busStop['bts'] = 0;
		$busStop['mrt'] = 0;
		$busStop['ship'] = 0;
		$busStop['airlink'] = 0;
		$busStop['brt'] = 0;
		$busStop['one_side'] = 0;
		return $busStop;
	}
	public function create($data=null){
		$data['busStop'] = $this->__init();
		$this->template->load('wiki/busstop/bus_stop_detail', $data);
	}
	public function display($data=null){
		$filter = $this->input->post();
		if($filter == false){
			$data['filter'] = $this->__init();
			$data['paging'] = $this->paginations->prepareFilter();
			$this->template->load('wiki/busstop/bus_stop_list', $data);
			return;
		}
		
		// $filter = $pagination->filter;
		$pagination = $this->paginations->prepareFilter($filter);
		
		// $data['busStops'] = $this->bus_stop->search($filter);
		$pagination = $this->bus_stop->searchWithPaging($pagination);
		
		$data['filter'] = $pagination->filter;
		$data['paging'] = $pagination;
		$data['busStops'] = $pagination->data;
		
		$this->template->load('wiki/busstop/bus_stop_list', $data);
	}
	public function show($busStopId){
		$busStop = $this->bus_stop->getBusStopById($busStopId);
		if(empty($busStop))
			show_404();
		$data['busStop'] = $busStop;
		$this->template->load('wiki/busstop/bus_stop_detail', $data);
	}
	public function save($data=null){
		$busStop = $this->input->post();
		if($busStop == false){
			$this->create();
			return;
		}
		
		if($busStop['busstop_no'] == "")
			$busStop = $this->bus_stop->create($busStop);
		else
			$busStop = $this->bus_stop->update($busStop);
		$this->template->load('templates/success');
		
		// $data['busStop'] = $busStop;
		// $this->template->load('wiki/busstop/bus_stop_detail', $data);
	}
	public function delete(){
		$this->output->set_content_type('application/json');
		
		$busStops = $this->input->post();
		if($busStops == false){
			// redirect('wiki/busstop/display');
    		$this->output->set_output(json_encode(array('responseCode' => 0)));
			return;
		}
		
		$this->bus_stop->delete($busStops['busstop_no']);
		// $this->template->load('templates/success');
		$this->output->set_output(json_encode(array('responseCode' => 1)));
	}
}
