<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaController extends CI_Controller implements BaseFunctions{

	function __construct(){
		parent::__construct();
		$this->load->model('Consulta');
//		$this->load->library('form');
	}

	// View
	public function index(){
		$this->load->view('consultas'); // todo
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
