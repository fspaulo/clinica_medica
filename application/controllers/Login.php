<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');
	}

	// View
	public function index()
	{
		$dados['titulo'] = 'Login';
		$this->load->view('pages/login', $dados);
	}

	public function logar()
	{
		$usuario = $_POST["usuario"];
		$senha = $_POST["senha"];

		$user = $this->usuario_model->login($usuario, $senha);

		if ($user) {
			$this->session->set_userdata("logado", $user); // seta uma sessão pro usuario
			redirect("/");
		} else {
			redirect("login");
		}
	}

	public function logout()
	{
		$this->session->unset_userdata("logado"); // desliga a sessão
		redirect("login");
	}

}
