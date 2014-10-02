<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Paginations {
	// var $ci;

	var $pageSizeList = array(5, 10, 20, 50, 100);
	var $pageSize = 5;
	var $currentPage = 1;
	var $totalPage;
	
	var $filter;
	var $data;
	
	var $offsetItem = 0;
	var $totalItem = 0;
	
	public function __construct() {
		// $this->ci =& get_instance();
	}
	
	public function prepareFilter($filter = null){
		if($filter == null)
			return $this;
		
		foreach ($filter as $key => $value) {
			$pos = strpos($key, "paging_");
			if($pos !== false && $value !== ""){
				$pos = strpos($key, "paging_pagesize");
				if($pos !== false)
					$this->pageSize = intval($value);
				$pos = strpos($key, "paging_currentpage");
				if($pos !== false)
					$this->currentPage = intval($value);
				unset($filter[$key]);
			}
		}
		$this->filter = $filter;
		
		$this->offsetItem = ($this->currentPage-1) * $this->pageSize;
		
		return $this;
	}
	
	public function paging($totalItem = null){
		if($totalItem == null)
			return $this;
		
		$this->totalItem = $totalItem;
		
		
		if($this->pageSize == 0)
			$this->pageSize = $this->totalItem;
		
		$this->totalPage = $this->totalItem/$this->pageSize;
		
		if($this->totalItem%$this->pageSize > 0)
			$this->totalPage++;
		
		return $this;
	}
}