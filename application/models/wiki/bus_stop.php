<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bus_stop extends CI_Model {
	function searchBusStop($filter=null){
		$filter['busstop_new_name'] = $filter['busstop_name'];
		$filter['road_name'] = $filter['busstop_name'];
		
		foreach($filter as $key => $criteria){
			if(empty($criteria))
				unset($filter[$key]);
		}
		
		$this->db->or_like($filter);
		$query = $this->db->get('BusStop');
		
		return $query->result_array();
	}
	function create($busStop){
		$this->load->model('model_utils');
		$busStop['busstop_no'] = $this->model_utils->getNextId('BusStop','busstop_no');
		$this->db->insert('BusStop', $busStop);
		return $busStop;
	}
	function update($busStop){
		$this->db->where('busstop_no', $busStop['busstop_no']);
		$this->db->update('BusStop', $busStop);
		return $busStop;
	}
	function delete($busStopIds){
		if(!is_array($busStopIds))
			return;
		foreach ($busStopIds as $key => $busStopId) {
			$this->db->delete('BusStop', array('busstop_no'=>$busStopId));
		}
	}
	function getBusStopById($busStopId){
		$query = $this->db->get_where('BusStop', array('busstop_no'=>$busStopId));
		return $query->row_array();
	}
	function search($filter){
		foreach ($filter as $key => $value) {
			if($value == "")
				unset($filter[$key]);
			else
				$this->db->like($key, $value);
		}
		$query = $this->db->get('BusStop');
		return $query->result_array();
	}
	public function record_count($filter) {
        return count($this->search($filter));
    }
}