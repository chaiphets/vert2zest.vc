<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BusModel extends CI_Model {
	function searchBus($filter=null){
		$filter['bus_id'] = $filter['bus_id'];
		$filter['bus_name_th'] = $filter['bus_name_th'];
		$filter['bus_name_eng'] = $filter['bus_name_eng'];

		foreach($filter as $key => $criteria){
			if(empty($criteria))
				unset($filter[$key]);
		}

		$this->db->or_like($filter);
		$query = $this->db->get('Bus');

		return $query->result_array();
	}
	function create($bus){
		date_default_timezone_set('Asia/Bangkok');
		$bus['create_date'] = date('Y-m-d H:i:s');
		$this->load->model('model_utils');
		$bus['bus_id'] = $this->model_utils->getNextId('Bus','bus_id');
		$this->db->insert('Bus', $bus);
		return $bus;
	}
	function update($bus){
		date_default_timezone_set('Asia/Bangkok');
		$bus['update_date'] = date('Y-m-d H:i:s');
		$this->db->where('bus_id', $bus['bus_id']);
		$this->db->update('Bus', $bus);
		return $bus;
	}
	function delete($busIds){
		if(!is_array($busIds))
			return;
		foreach ($busIds as $key => $busId) {
			$this->db->delete('Bus', array('bus_id'=>$busId));
		}
	}
	function getBusById($busId){
		$query = $this->db->get_where('Bus', array('bus_id'=>$busId));
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
