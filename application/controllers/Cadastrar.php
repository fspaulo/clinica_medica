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

		$this->form_validation->set_rules("usuario", "Usuario", "trim|required|min_length[2]",
			array(
				'required' => 'Informe o seu novo Usuário',
				'min_length' => 'O campo deve possuir mais de 2 digitos',
			));
		$this->form_validation->set_rules("senha", "Senha", "trim|required|min_length[1]",
			array(
				'required' => 'Informe o sua nova Senha',
				'min_length' => 'O campo deve possuir mais de 1 digito',
			));

		if ($this->form_validation->run() == false) {
			$dados['titulo'] = 'Cadastro de Login';
			$dados['formErrors'] = validation_errors();

			$this->load->view('pages/cadastrar', $dados);
		} else {
			$this->usuario_model->salvar($user);
			redirect("login");
		}
	}
}
