<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Main_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->db0 = $this->load->database("db0", true);
	}
	
	//회원가입 실행
	public function join_proc(){
		//비밀번호 암호화, PASSWORD_DEFAULT는 대문자로 해야 함
		$password = password_hash($this->input->post("pw"), PASSWORD_DEFAULT);
		$data = array(
			"id" => $this->input->post("id"),
			"pw" => $password,
			"name" => $this->input->post("name"),
			"gender" => $this->input->post("gender"),
			"year" => $this->input->post("year"),
			"month" => $this->input->post("month"),
			"day" => $this->input->post("day")
		);
		
		$this->db0->insert("member", $data);
		$this->db0->close();
	}

	//로그인 실행
	public function login_proc(){
		$query = $this->db0->query("select count(id) as cnt from member where id = '".$this->input->post('id')."'");
		$row = $query->row();
		if($row->cnt == 1){
			$query = $this->db0->query("select * from member where id = '".$this->input->post('id')."'");
			$row = $query->row();
			if(password_verify($this->input->post("pw"), $row->pw)){
				return "path";
			}else{
				return "pw_fail";
			}
		}else{
			return "id_fail";
		}
	}
}
?>