<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Medicos extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('medico_model');
//		$this->load->library('form');
	}

	// View
	public function index(){
		$this->load->view('pages/medico'); // todo
	}

	public function cadastrar(){
		// TODO: Implement cadastrar() method.
	}

	public function listarTodos(){
		// TODO: Implement listarTodos() method.
	}

	public function editar($id){
		// TODO: Implement editar() method.
	}

	public function excluir($id){
		// TODO: Implement excluir() method.
	}
}
