<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('paciente_model');
	}

	// View
	public function index()
	{
		permission(); // usado para ver se o user está logado

		$dados['pacientes'] = $this->paciente_model->index();
		$dados['titulo'] = 'Pacientes';

		$this->load->view('header', $dados);
		$this->load->view('pages/pacientes', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para cadastrar novo item
	 * */
	public function novo()
	{
		$dados['titulo'] = 'Novo Paciente';

		$this->load->view('header', $dados);
		$this->load->view('pages/form-paciente', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Chama model pra SALVAR no banco o novo item
	 * */
	public function insert()
	{
		$novo_item = $_POST; // valores recebidos do form

		$this->paciente_model->salvar($novo_item);
		redirect(base_url("pacientes"));
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id){
		$dados['paciente'] = $this->paciente_model->id_editar($id);
		$dados['titulo'] = 'Editar Paciente';

		$this->load->view('header', $dados);
		$this->load->view('pages/form-paciente', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Chama model pra ATUALIZAR no banco o item
	 * */
	public function update($id) //todo
	{
		$update_item = $_POST;

		$this->paciente_model->atualizar($update_item);
		redirect("pacientes"); // todo
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$this->paciente_model->delete($id);
		redirect("pacientes"); // todo
	}

}
