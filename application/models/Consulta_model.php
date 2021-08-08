<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->db->select('c.*, m.nome as medico, p.nome as paciente'); // no html é preciso chamar a var passada no as '***'
		$this->db->from('consulta c');
		$this->db->join('medico m', 'm.id = c.medico_id', 'left');
		$this->db->join('paciente p', 'p.id = c.paciente_id', 'left');

		$query = $this->db->get();

		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	/**
	 * Insert no banco
	 */
	function salvar($data)
	{
		$this->db->insert('consulta', $data);
	}

	/**
	 * Funcao retorna o id para mostrar na tela editar
	 */
	public function id_editar($id)
	{
		return $this->db->get_where('consulta', array(
			"id" => $id  // campo banco => parametro
		))->row_array();
	}

	/**
	 * Update no banco
	 */
	public function atualizar($update_item, $id)
	{
		return $this->db->update('consulta', $update_item, array('id' => $id));
	}

	/**
	 * Delete no banco
	 */
	function delete($id)
	{
		$this->db->where("id", $id);
		return $this->db->delete('consulta');
	}

	/**
	 * Pega medicos para mostrar em <select> consultas
	 */
	public function getMedicos()
	{
		return $this->db->get("medico")->result_array();
	}

	/**
	 * Pega medico para mostrar em consultas (Editar)
	 */
	public function getNomeFromMedico($id)
	{
		$this->db->select('m.id as id, m.nome as nome');
		$this->db->from('consulta c');
		$this->db->join('medico m', 'm.id = c.medico_id', 'left');
		$this->db->where('c.id',$id);

		$query = $this->db->get();

		if($query->num_rows() != 0)
			return $query->row_array();
		else
			return false;
	}

	/**
	 * Pega pacientes para mostrar em <select> consultas
	 */
	public function getPacientes()
	{
		return $this->db->get("paciente")->result_array();
	}

	/**
	 * Pega paciente para mostrar em consultas (Editar)
	 */
	public function getNomeFromPaciente($id)
	{
		$this->db->select('p.id as id, p.nome as nome');
		$this->db->from('consulta c');
		$this->db->join('paciente p', 'p.id = c.paciente_id', 'left');
		$this->db->where('c.id',$id);

		$query = $this->db->get();

		if($query->num_rows() != 0)
			return $query->row_array();
		else
			return false;
	}

}
