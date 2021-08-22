<?php

defined('BASEPATH') or exit('No direct script access allowed');

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

		$this->buildMainScreen($dados);
	}

	/**
	 * Metodo responsavel por montar a tabela
	 */
	public function buildMainScreen(array $dados)
	{
		$this->load->view('header', $dados);
		$this->load->view('pages/medicos', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Metodo responsavel por montar o formulario
	 */
	public function montarForm(array $dados)
	{
		$this->load->view('header', $dados);
		$this->load->view('pages/form-medico', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para cadastrar novo item
	 * */
	public function novo()
	{
		$dados['titulo'] = 'Novo Médico';
		$dados['especialidades'] = $this->medico_model->getEspecialidade();

		$this->montarForm($dados);
	}

	/**
	 * Chama model pra SALVAR no banco o novo item
	 * */
	public function insert()
	{
		$novo_item = $this->getValidation_item();

		if ($this->form_validation->run() == false) {

			$dados['titulo'] = 'Novo Médico';
			$dados['especialidades'] = $this->medico_model->getEspecialidade();
			$dados['formErrors'] = validation_errors();

			$this->montarForm($dados);

		} else {
			$this->medico_model->salvar($novo_item);
			redirect(base_url("medicos"));
		}
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id)
	{
		$dados['titulo'] = 'Editar Médico';
		$dados['medico'] = $this->medico_model->id_editar($id);
		$dados['especialidades'] = $this->medico_model->getEspecialidade();
		$dados['especi'] = $this->medico_model->getNomeFromEspecialidade($id);

		$this->montarForm($dados);
	}

	/**
	 * Chama model pra ATUALIZAR no banco o item
	 * */
	public function update($id)
	{
		$update_item = $this->getValidation_item();

		if ($this->form_validation->run() == false) {

			$dados['titulo'] = 'Editar Médico';
			$dados['medico'] = $this->medico_model->id_editar($id);
			$dados['especialidades'] = $this->medico_model->getEspecialidade();
			$dados['especi'] = $this->medico_model->getNomeFromEspecialidade($id);
			$dados['formErrors'] = validation_errors();

			$this->montarForm($dados);

		} else {
			$this->medico_model->atualizar($update_item, $id);
			redirect(base_url("medicos"));
		}
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$valido = $this->medico_model->delete($id);

		$dados['medicos'] = $this->medico_model->index();
		$dados['titulo'] = 'Médicos';

		if(!$valido) { // se não for valido, add msg erro
			$dados['error'] = "Médico vinculado a uma Consulta";
			$this->buildMainScreen($dados);
			return false;
		}
		redirect("medicos");
		return true;
	}

	/**
	 * Busca por nome do medico ou especialidade
	 */
	public function pesquisar()
	{
		$dados["titulo"] = "Pesquisa por *" . $_POST["busca"] . "*";
		$dados["medicos"] = $this->medico_model->buscar($_POST);

		$this->buildMainScreen($dados);
	}


	/**
	 * Método retorna o _POST do form e tambem as validacoes configuradas
	 */
	public function getValidation_item()
	{
		$update_item = $_POST;

		$this->form_validation->set_rules("crm", "CRM", "trim|required|min_length[8]|max_length[8]",
			array(
				'required' => 'Informe o CRM',
				'min_length' => 'O CRM deve possuir 8 digitos',
				'max_length' => 'O CRM deve possuir 8 digitos',
			));

		$this->form_validation->set_rules("nome", "Nome", "trim|required|min_length[2]",
			array(
				'required' => 'Informe o Nome',
				'min_length' => 'O Nome deve possuir mais de 2 digitos',
			));

		$this->form_validation->set_rules("telefone", "Telefone", "trim|required",
			array(
				'required' => 'Informe o Telefone',
			));

		return $update_item;
	}

}
