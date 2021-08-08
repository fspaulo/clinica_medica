<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller de Usuários
 */
class Usuarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');
	}

	// View
	public function index()
	{
		permission(); // usado para ver se o user está logado

		$dados['usuarios'] = $this->usuario_model->index();
		$dados['titulo'] = 'Usuários';

		$this->load->view('header', $dados);
		$this->load->view('pages/usuarios', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id)
	{
		$dados['user'] = $this->usuario_model->id_editar($id);
		$dados['titulo'] = 'Editar Usuário';

		$this->load->view('header', $dados);
		$this->load->view('pages/form-user', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Chama model pra ATUALIZAR no banco o item
	 * */
	public function update($id)
	{
		$update_item = $_POST;

		$this->form_validation->set_rules("usuario", "Usuario", "trim|required|min_length[2]",
			array(
				'required' => 'Informe o novo Usuário',
				'min_length' => 'O campo deve possuir mais de 2 digitos',
			));
		$this->form_validation->set_rules("senha", "Senha", "trim|required|min_length[1]",
			array(
				'required' => 'Informe a nova Senha',
				'min_length' => 'O campo deve possuir mais de 1 digito',
			));

		if ($this->form_validation->run() == false) {
			$dados['user'] = $this->usuario_model->id_editar($id);
			$dados['titulo'] = 'Editar Usuário';
			$dados['formErrors'] = validation_errors();

			$this->load->view('header', $dados);
			$this->load->view('pages/form-user', $dados);
			$this->load->view('footer', $dados);

		} else {
			$this->usuario_model->atualizar($update_item, $id);
			redirect(base_url("usuarios"));
		}
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$this->usuario_model->delete($id);
		redirect("usuarios"); // todo
	}

}
