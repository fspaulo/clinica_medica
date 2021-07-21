<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Paciente');
//		$this->load->library('form');
	}

	// View
	public function index(){
		$this->load->view('pacientes'); // todo
	}

	public function cadastrar(){
		// TODO: Implement cadastrar() method.
	}

	public function listarTodos(){
		// TODO: Implement listarTodos() method.
	}

	public function editar(){
		// TODO: Implement editar() method.
	}

	public function excluir(){
		// TODO: Implement excluir() method.
	}

}
