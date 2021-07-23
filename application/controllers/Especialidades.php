<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Especialidades extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('especialidade_model');
	}

	// View
	public function index()
	{
		$dados['especialidades'] = $this->especialidade_model->index();
		$dados['titulo'] = 'Especialidades';

		$this->load->view('header', $dados);
		$this->load->view('pages/especialidades', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para cadastrar novo item
	 * */
	public function novo()
	{
		$dados['titulo'] = 'Nova Especialidade';

		$this->load->view('header', $dados);
		$this->load->view('pages/form-especi', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Chama model pra SALVAR no banco o novo item
	 * */
	public function insert()
	{
		$novo_item = $_POST; // valores recebidos do form

		$this->especialidade_model->salvar($novo_item);
		redirect(base_url("especialidades")); //todo
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id){
		$dados['especialidade'] = $this->especialidade_model->id_editar($id);
		$dados['titulo'] = 'Editar Especialidade';

		$this->load->view('header', $dados);
		$this->load->view('pages/form-especi', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Chama model pra ATUALIZAR no banco o item
	 * */
	public function update($id)
	{
		$update_item = [
			'nome' => $this->input->post('nome'),
			'valor' => $this->input->post('valor'),
		];

		$this->especialidade_model->atualizar($update_item, $id);
		redirect(base_url("especialidades"));
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$this->especialidade_model->delete($id);
		redirect("especialidades"); // todo
	}

}
