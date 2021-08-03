<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Medicos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('medico_model');
	}

	// View
	public function index()
	{
		permission(); // usado para ver se o user está logado

		$dados['medicos'] = $this->medico_model->index();
		$dados['titulo'] = 'Médicos';

		$this->load->view('header', $dados);
		$this->load->view('pages/medicos', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para cadastrar novo item
	 * */
	public function novo()
	{
		$dados['titulo'] = 'Novo Médico';
		$dados['especialidades'] = $this->medico_model->getEspecialidade();

		$this->load->view('header', $dados);
		$this->load->view('pages/form-medico', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Chama model pra SALVAR no banco o novo item
	 * */
	public function insert()
	{
		$novo_item = $_POST; // valores recebidos do form

		$this->medico_model->salvar($novo_item);
		redirect(base_url("medicos")); //todo
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id)
	{
		$dados['titulo'] = 'Editar Médico';
		$dados['medico'] = $this->medico_model->id_editar($id);
		$dados['especialidades'] = $this->medico_model->getEspecialidade();

		$this->load->view('header', $dados);
		$this->load->view('pages/form-medico', $dados);
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

		$this->medico_model->atualizar($update_item, $id);
		redirect(base_url("medicos"));
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$this->medico_model->delete($id);
		redirect("medicos"); // todo
	}

}
