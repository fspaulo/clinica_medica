<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Especialidades extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('especialidade_model');
	}

	// View
	public function index()
	{
		permission(); // usado para ver se o user está logado

		$dados['especialidades'] = $this->especialidade_model->index();
		$dados['titulo'] = 'Especialidades';
		$this->buildMainScreen($dados);
	}

	/**
	 * Metodo responsavel por montar a tabela
	 */
	public function buildMainScreen(array $dados)
	{
		$this->load->view('header', $dados);
		$this->load->view('pages/especialidades', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Metodo responsavel por montar o formulario
	 */
	public function montarForm(array $dados)
	{
		$this->load->view('header', $dados);
		$this->load->view('pages/form-especi', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para cadastrar novo item
	 * */
	public function novo()
	{
		$dados['titulo'] = 'Nova Especialidade';

		$this->montarForm($dados);
	}

	/**
	 * Chama model pra SALVAR no banco o novo item
	 * */
	public function insert()
	{
		$novo_item = $this->getValidation_item();

		if ($this->form_validation->run() == false) {
			$dados['titulo'] = 'Nova Especialidade';
			$dados['formErrors'] = validation_errors();

			$this->montarForm($dados);

		} else {
			$this->especialidade_model->salvar($novo_item);
			redirect(base_url("especialidades"));
		}
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id)
	{
		$dados['especialidade'] = $this->especialidade_model->id_editar($id);
		$dados['titulo'] = 'Editar Especialidade';

		$this->montarForm($dados);
	}

	/**
	 * Chama model pra ATUALIZAR no banco o item
	 * */
	public function update($id)
	{
		$update_item = $this->getValidation_item();

		if ($this->form_validation->run() == false) {
			$dados['titulo'] = 'Editar Especialidade';
			$dados['especialidade'] = $this->especialidade_model->id_editar($id);
			$dados['formErrors'] = validation_errors();

			$this->montarForm($dados);

		} else {
			$this->especialidade_model->atualizar($update_item, $id);
			redirect(base_url("especialidades"));
		}
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$valido = $this->especialidade_model->delete($id);

		$dados['especialidades'] = $this->especialidade_model->index();
		$dados['titulo'] = 'Especialidades';

		if(!$valido) { // se não for valido, add msg erro
			$dados['error'] = "Especialidade vinculada a um Médico";
			$this->buildMainScreen($dados);
			return false;
		}
		redirect("especialidades");
		return true;
	}

	/**
	 * Método retorna o _POST do form e tambem as validacoes configuradas
	 */
	public function getValidation_item()
	{
		$update_item = $_POST;

		$this->form_validation->set_rules("nome", "Nome", "trim|required|min_length[2]",
			array(
				'required' => 'Informe o seu nome',
				'min_length' => 'O campo deve possuir mais de 2 digitos',
			));

		$this->form_validation->set_rules("valor", "Valor", "trim|required|min_length[1]|numeric",
			array(
				'required' => 'Informe o valor',
				'min_length' => 'O campo deve possuir mais de 1 digito',
				'numeric' => 'O campo deve ser numérico',
			));

		return $update_item;
	}
}
