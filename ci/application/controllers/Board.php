<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller{

	//게시판 목록
	public function board_list(){
		$data['title'] = "board_list";

		$this->load->view("include/header", $data);
		$this->load->view("board/board_list");
		$this->load->view("include/footer");
	}
}