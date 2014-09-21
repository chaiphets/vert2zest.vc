<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sendgmail extends CI_Controller {
	public function send(){
		header('Content-Type: application/json');
		
		$post = $this->input->post();
		if(!$post){
			echo json_encode(array('success'=>false,'error'=>'invalid arguments'));
		}
		
		$config = array(
			'username'	=> $post['username'],
			'password'	=> $post['password']
		);
		$this->load->library('gmail', $config);
		
		$mail['to'] = $post['to'];
		$mail['subject'] = $post['subject'];
		$mail['message'] = $post['message'];
		
		if(!$this->gmail->send($mail)){
			echo json_encode(array('success'=>false));
		} else {
			echo json_encode(array('success'=>true, 'error'=>$this->gmail->getErrorMessage()));
		}
	}
}