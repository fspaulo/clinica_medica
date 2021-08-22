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
	 * Metodo responsavel por montar o formulario
	 * @param array $dados
	 */
	public function montarForm(array $dados)
	{
		$this->load->view('header', $dados);
		$this->load->view('pages/form-consulta', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Abre página para cadastrar novo item
	 * */
	public function novo()
	{
		$dados['titulo'] = 'Marcar Consulta';
		$dados['medicos'] = $this->consulta_model->getMedicos();
		$dados['pacientes'] = $this->consulta_model->getPacientes();

		$this->montarForm($dados);
	}

	/**
	 * Chama model pra SALVAR no banco o novo item
	 * */
	public function insert()
	{
		$novo_item = $this->getValidation_item();

		if($this->form_validation->run() == false){

			$dados['titulo'] = 'Marcar Consulta';
			$dados['medicos'] = $this->consulta_model->getMedicos();
			$dados['pacientes'] = $this->consulta_model->getPacientes();
			$dados['formErrors'] = validation_errors();

			$this->montarForm($dados);

		} else {

			$this->consulta_model->salvar($novo_item);
			redirect(base_url("consultas"));
		}
	}

	/**
	 * Abre página para Editar um item
	 * */
	public function editar($id)
	{
		$dados['titulo'] = 'Editar Consulta';
		$dados['consulta'] = $this->consulta_model->id_editar($id);
		$dados['medicos'] = $this->consulta_model->getMedicos();
		$dados['pacientes'] = $this->consulta_model->getPacientes();

		$dados['med'] = $this->consulta_model->getNomeFromMedico($id);
		$dados['paci'] = $this->consulta_model->getNomeFromPaciente($id);

		$this->montarForm($dados);
	}

	/**
	 * Chama model pra ATUALIZAR no banco o item
	 * */
	public function update($id)
	{
		$update_item = $this->getValidation_item();

		if($this->form_validation->run() == false){

			$dados['titulo'] = 'Editar Consulta';
			$dados['consulta'] = $this->consulta_model->id_editar($id);
			$dados['medicos'] = $this->consulta_model->getMedicos();
			$dados['pacientes'] = $this->consulta_model->getPacientes();
			$dados['formErrors'] = validation_errors();

			$this->montarForm($dados);

		} else {

			$this->consulta_model->atualizar($update_item, $id);
			redirect(base_url("consultas"));
		}
	}

	/**
	 * Abre página para Excluir um item
	 * */
	public function deletar($id)
	{
		$this->consulta_model->delete($id);
		redirect("consultas");
	}

	/**
	 * Busca por nome do paciente ou medico
	 */
	public function pesquisar()
	{
		$dados["titulo"] = "Pesquisa por *" . $_POST["busca"] . "*";
		$dados['consultas'] = $this->consulta_model->buscar($_POST);

		$this->load->view('header', $dados);
		$this->load->view('pages/consultas', $dados);
		$this->load->view('footer', $dados);
	}

	/**
	 * Método retorna o _POST do form e tambem as validacoes configuradas
	 * @return array
	 */
	public function getValidation_item()
	{
		$update_item = $_POST;

		$this->form_validation->set_rules("data", "Data", "required",
			array(
				'required' => 'Informe a Data da consulta',
			));

		$this->form_validation->set_rules("hora", "Hora", "required",
			array(
				'required' => 'Informe a Hora da consulta',
			));

		$this->form_validation->set_rules("valor", "Valor", "required|min_length[1]|numeric",
			array(
				'required' => 'Informe o valor',
				'numeric' => 'O campo deve ser numérico',
			));

		return $update_item;
	}
}
