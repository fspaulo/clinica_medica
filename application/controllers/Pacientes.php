<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pacientes extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('paciente_model');
	}

	// View
	public function index()
	{
		permission(); // usado para ver se o user está logado

		$dados['pacientes'] = $this->paciente_model->index();
		$dados['titulo'] = 'Pacientes';

		$this->buildMainScreen($dados);
	}

	/**
	 * Metodo responsavel por montar a tabela
	 */
	public function buildMainScreen(array $dados)
	{
		$this->load->view('header', $dados);
		$this->load->view('pages/pacientes', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Metodo responsavel por montar o formulario
	 */
	public function montarForm(array $dados)
	{
		$this->load->view('header', $dados);
		$this->load->view('pages/form-paciente', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para cadastrar novo item
	 * */
	public function novo()
	{
		$dados['titulo'] = 'Novo Paciente';

		$this->montarForm($dados);
	}

	/**
	 * Chama model pra SALVAR no banco o novo item
	 * */
	public function insert()
	{
		$novo_item = $this->getValidation_item(); // valores recebidos do form

		if ($this->form_validation->run() == false) {

			$dados['titulo'] = 'Novo Paciente';
			$dados['formErrors'] = validation_errors();

			$this->montarForm($dados);

		} else {
			$this->paciente_model->salvar($novo_item);
			redirect(base_url("pacientes"));
		}
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id)
	{
		$dados['titulo'] = 'Editar Paciente';
		$dados['paciente'] = $this->paciente_model->id_editar($id);

		$this->montarForm($dados);
	}

	/**
	 * Chama model pra ATUALIZAR no banco o item
	 * */
	public function update($id)
	{
		$update_item = $this->getValidation_item();

		if ($this->form_validation->run() == false) {

			$dados['titulo'] = 'Editar Paciente';
			$dados['paciente'] = $this->paciente_model->id_editar($id);
			$dados['formErrors'] = validation_errors();

			$this->montarForm($dados);

		} else {
			$this->paciente_model->atualizar($update_item);
			redirect("pacientes");
		}
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$valido = $this->paciente_model->delete($id);

		$dados['pacientes'] = $this->paciente_model->index();
		$dados['titulo'] = 'Pacientes';

		if (!$valido) {
			$dados['error'] = "Paciente vinculado a uma Consulta";
			$this->buildMainScreen($dados);
			return false;
		}
		redirect("pacientes");
		return true;
	}

	/**
	* Busca por nome do paciente
	 */
	public function pesquisar()
	{
		$dados["titulo"] = "Pesquisa por *" . $_POST["busca"] . "*";
		$dados["pacientes"] = $this->paciente_model->buscar($_POST);

		$this->buildMainScreen($dados);
	}

	/**
	 * Método retorna o _POST do form e tambem as validacoes configuradas
	 * @return array
	 */
	public function getValidation_item()
	{
		$update_item = $_POST;

		$this->form_validation->set_rules("cpf", "CPF", "trim|required|min_length[11]|max_length[11]|numeric",
			array(
				'required' => 'Informe o CPF',
				'min_length' => 'O CPF deve possuir 11 digitos',
				'max_length' => 'O CPF deve possuir 11 digitos',
				'numeric' => 'O CPF deve ser numérico',
			));

		$this->form_validation->set_rules("nome", "Nome", "trim|required|min_length[2]",
			array(
				'required' => 'Informe o Nome',
				'min_length' => 'O Nome deve possuir mais de 2 digitos',
			));

		$this->form_validation->set_rules("email", "Email", "trim|required|min_length[2]",
			array(
				'required' => 'Informe o Email',
				'min_length' => 'O Email deve possuir mais de 2 digitos',
			));

		$this->form_validation->set_rules("telefone", "Telefone", "trim|required",
			array(
				'required' => 'Informe o Telefone',
			));

		return $update_item;
	}
}
