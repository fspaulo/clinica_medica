<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Medico_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->db->select('m.*, e.nome as especi'); // no html é preciso chamar a var passada no as '***'
		$this->db->from('medico m');
		$this->db->join('especialidade e', 'e.id = m.especialidade_id', 'left');

		$query = $this->db->get();

		if ($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	/**
	 * Insert no banco
	 */
	function salvar($data)
	{
		$this->db->insert('medico', $data);
	}

	/**
	 * Funcao retorna o id para mostrar na tela editar
	 */
	public function id_editar($id)
	{
		return $this->db->get_where('medico', array(
			"id" => $id  // campo banco => parametro
		))->row_array();
	}

	/**
	 * Update no banco
	 */
	public function atualizar($update_item, $id)
	{
		return $this->db->update('medico', $update_item, array('id' => $id));
	}

	/**
	 * Delete no banco
	 */
	function delete($id)
	{
		if ($this->validarDelete($id)) {
			$this->db->where("id", $id);
			return $this->db->delete('medico');
		} else
			return false;
	}

	/**
	 * Pega especialidades para mostrar em medicos
	 */
	public function getEspecialidade()
	{
		return $this->db->get("especialidade")->result_array();
	}

	/**
	 * Pega especialidades para mostrar em medicos (Editar)
	 */
	public function getNomeFromEspecialidade($id)
	{
		$this->db->select('e.*');
		$this->db->from('medico m');
		$this->db->join('especialidade e', 'e.id = m.especialidade_id');
		$this->db->where('m.id', $id);

		$query = $this->db->get();

		if ($query->num_rows() != 0)
			return $query->row_array();
		else
			return false;
	}

	public function validarDelete($id)
	{
		$this->db->select('*');
		$this->db->from('consulta c');
		$this->db->where('c.medico_id', $id);

		$query = $this->db->get();

		if ($query->num_rows() != 0)
			return false; // possui registros
		else
			return true; // não possui registros, pode exluir
	}

	public function buscar($busca)
	{
		if (empty($busca)) {
			return array();
		}

		$busca = $this->input->post('busca');

		$this->db->distinct('m.nome, e.nome');
		$this->db->select('m.*, e.nome as especi');
		$this->db->from('medico m');
		$this->db->join('especialidade e', 'e.id = m.especialidade_id', '');
		$this->db->where("(m.nome LIKE '%" . $busca . "%' or e.nome LIKE '%" . $busca . "%')");

		return $this->db->get("medico")->result_array();
	}

}
