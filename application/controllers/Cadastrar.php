<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** Usado para cadastrar usuário  */
class Cadastrar extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
	}

	// View
	public function index()
	{
		$dados['titulo'] = 'Cadastro de Login';
		$this->load->view('pages/cadastrar', $dados);
	}

	/**
	 * Cadastra novo usuário
	 * */
	public function salvar()
	{
		$user = array(
			"usuario"=> $_POST["usuario"],
			"senha"=> $_POST["senha"]
		);
		$this->usuario_model->salvar($user);
		redirect("login"); // todo
	}

}
