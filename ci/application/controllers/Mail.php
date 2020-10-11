<?php
defined("BASEPATH") or exit("no direct script access allowed");

class Mail extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	//main_page
	public function mail_page(){
		
		$this->load->view("mail/mail");

	}
}
?>