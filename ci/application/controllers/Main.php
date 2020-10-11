<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Main extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model("Main_model");
		$this->load->helper("cookie");
		$this->load->helper('url');
	}
	//main_page
	public function index(){
		$data = array(
			'title' => 'main',
			'cookie' => get_cookie('id')
		);

		$this->load->view("include/header", $data);
		$this->load->view("main/main");
		$this->load->view("include/footer");
	}

	//회원가입 페이지
	public function join(){
		$data['title'] = "join";

		$this->load->view("include/header", $data);
		$this->load->view("main/join");
		$this->load->view("include/footer");
	}

	//회원가입 실행
	public function join_proc(){
		$this->Main_model->join_proc();
		if($this == true){
			redirect('main');
		}else{
			echo "<script>alert('회원가입을 실패했습니다.')</script>";
			redirect('main', 'refresh');
		}
	}

	//로그인 실행
	public function login_proc(){
		$status = $this->Main_model->login_proc();
		if($status == "path"){
			set_cookie('id', $this->input->post('id'), 60);
			redirect("main");
		}else if($status == "pw_fail"){
			echo "<script>alert('비밀번호가 틀렸습니다.');</script>";
			redirect("main", 'refresh');
		}else if($status == "id_fail"){
			echo "<script>alert('ID가 틀렸습니다');</script>";
			redirect("main", 'refresh');
		}
	}

	//로그아웃 실행
	public function logout_proc(){
		delete_cookie('id');
		redirect('main');
	}
}
?>