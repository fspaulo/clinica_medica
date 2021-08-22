<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Paciente_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->db->get("paciente")->result_array();
	}

	/**
	 * Insert no banco
	 */
	function salvar($data)
	{
		$this->db->insert('paciente', $data);
	}

	/**
	 * Funcao retorna o id para mostrar na tela editar
	 */
	public function id_editar($id)
	{
		return $this->db->get_where('paciente', array(
			"id" => $id  // campo banco => parametro
		))->row_array();
	}

	/**
	 * Update no banco
	 */
	public function atualizar($update_item)
	{
		$this->db->where("id", $update_item["id"]);
		return $this->db->update('paciente', $update_item);
	}

	/**
	 * Delete no banco
	 */
	function delete($id)
	{
		if ($this->validarDelete($id)) {
			$this->db->where("id", $id);
			return $this->db->delete('paciente');
		} else
			return false;
	}

	public function validarDelete($id)
	{
		$this->db->select('*');
		$this->db->from('consulta c');
		$this->db->where('c.paciente_id', $id);

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
		$this->db->like('nome', $busca);
		return $this->db->get("paciente")->result_array();
	}

}
