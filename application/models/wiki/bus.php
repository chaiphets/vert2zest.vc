<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bus extends CI_Model {
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
	function reconstrutBus($bus){
		foreach ($bus as $key => $value) {
			if($value == "")
				$bus[$key] = null;
		}
		foreach ($keys as $key) {
			if($bus[$key] == "1")
				$bus[$key] = true;
			else if($bus[$key] == "0")
				$bus[$key] = false;
		}
		return $bus;
	}
	function create($bus){
		$bus = $this->reconstrutBus($bus);
		date_default_timezone_set('Asia/Bangkok');
		$bus['create_date'] = date('Y-m-d H:i:s');
		$this->load->model('model_utils');
		$bus['bus_no'] = $this->model_utils->getNextId('Bus','bus_no');
		$this->db->insert('Bus', $bus);
		return $bus;
	}
	function update($bus){
		$bus = $this->reconstrutBusStop($bus);
		date_default_timezone_set('Asia/Bangkok');
		$bus['update_date'] = date('Y-m-d H:i:s');
		$this->db->where('bus_no', $bus['bus_no']);
		$this->db->update('Bus', $bus);
		return $bus;
	}
	function delete($busIds){
		if(!is_array($busIds))
			return;
		foreach ($busIds as $key => $busId) {
			$this->db->delete('Bus', array('bus_no'=>$busId));
		}
	}
	function getBusById($busId){
		$query = $this->db->get_where('Bus', array('bus_no'=>$busId));
		return $query->row_array();
	}
	function search($filter, $pageSize = null, $offsetItem = null){
		foreach ($filter as $key => $value) {
			if($value == "")
				unset($filter[$key]);
			else
				$this->db->like($key, $value);
		}
		$query = $this->db->get('Bus', $pageSize, $offsetItem);
		return $query->result_array();
	}
	function searchWithPaging($pagination){
		$pagination->paging($this->record_count($pagination->filter));
		$pagination->data = $this->search($pagination->filter, $pagination->pageSize, $pagination->offsetItem);
		return $pagination;
	}
	public function record_count($filter) {
        return count($this->search($filter));
    }
}