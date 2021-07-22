<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Controller de Usuários
 */
class Usuarios extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
	}

	// View
	public function index()
	{
		$dados['usuarios'] = $this->usuario_model->index();
		$dados['titulo'] = 'Usuários';

		$this->load->view('header', $dados);
		$this->load->view('pages/usuarios', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id){
		$dados['user'] = $this->usuario_model->id_editar($id);
		$dados['titulo'] = 'Editar Usuário';

		$this->load->view('header', $dados);
		$this->load->view('pages/form-user', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Chama model pra ATUALIZAR no banco o item
	 * */
	public function update()
	{
		$update_item = $_POST;

		$this->usuario_model->atualizar($update_item);
		redirect("usuarios"); // todo
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
