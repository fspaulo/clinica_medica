<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_model extends CI_Model{

	function __construct(){
		parent::__construct();
//		$this->load->library('database'); // carrega o banco
	}

	function Save($data){
		$this->db->insert('table',$data);
		if($this->db->insert_id()){
			return true;
		}else{
			return false;
		}
	}

	function edit($data){

	}

	function delete($data){

	}

	function getAll($data){

	}

}
