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
		return $this->db->get("consulta")->result_array();
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
	 * Pega medicos para mostrar em consultas
	 */
	public function getMedicos()
	{
		return $this->db->get("medico")->result_array();
	}

	/**
	 * Pega pacientes para mostrar em consultas
	 */
	public function getPacientes()
	{
		return $this->db->get("paciente")->result_array();
	}

}
