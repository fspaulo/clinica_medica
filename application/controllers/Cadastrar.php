<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Usado para cadastrar usuário
 */
class Cadastrar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');

		$this->load->library('form_validation');
		$this->load->helper(array('form'));
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
			"usuario" => $_POST["usuario"],
			"senha" => $_POST["senha"]
		);

		$this->form_validation->set_rules('usuario', 'Usuário', 'required|min_length[3]|max_length[12]');
		$this->form_validation->set_rules('senha', 'Senha', 'required|min_length[1]', array('required' => 'Você deve preencher a %s.'));

		if ($this->form_validation->run() == FALSE) {

			$erros = array('mensagens' => validation_errors());
			$this->load->view('pages/cadastrar', $erros);

		} else {
			$this->usuario_model->salvar($user);
			redirect("login"); // todo
		}

	}

}
