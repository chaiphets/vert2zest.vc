<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Authen extends CI_Controller{
		public function login(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$username = $this->input->post("txt_user");
			$data['title'] = $username;
			$this->template->load('index', $data);
		}
	}