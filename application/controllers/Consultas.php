<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('consulta_model');
	}

	// View
	public function index()
	{
		permission(); // usado para ver se o user está logado

		$dados['consultas'] = $this->consulta_model->index();
		$dados['titulo'] = 'Consultas';

		$this->load->view('header', $dados);
		$this->load->view('pages/consultas', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para cadastrar novo item
	 * */
	public function novo()
	{
		$dados['titulo'] = 'Marcar Consulta';

		$this->load->view('header', $dados);
		$this->load->view('pages/form-consulta', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Chama model pra SALVAR no banco o novo item
	 * */
	public function insert()
	{
		$novo_item = $_POST; // valores recebidos do form

		$this->consulta_model->salvar($novo_item);
		redirect(base_url("consultas")); //todo
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id)
	{
		$dados['consulta'] = $this->consulta_model->id_editar($id);
		$dados['titulo'] = 'Editar Consulta';

		$this->load->view('header', $dados);
		$this->load->view('pages/form-consulta', $dados);
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

		$this->consulta_model->atualizar($update_item, $id);
		redirect(base_url("consultas"));
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$this->consulta_model->delete($id);
		redirect("consultas");
	}

}
