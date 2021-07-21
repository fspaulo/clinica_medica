<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Especialidade_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->db->get("especialidade")->result_array();
	}

	/**
	 * Insert no banco
	 */
	function salvar($data)
	{
		$this->db->insert('especialidade', $data);

		if ($this->db->insert_id())
			return true;
		else
			return false;
	}

	/**
	 * Funcao retorna o id para mostrar na tela editar
	 */
	public function id_editar($id)
	{
		return $this->db->get_where('especialidade', array(
			"id" => $id  // campo banco => parametro
		))->row_array();
	}

	/**
	 * Update no banco
	 */
	public function atualizar($id, $update_item)
	{
		$this->db->where("id", $id);
		return $this->db->update('especialidade', $update_item);
	}

	/**
	 * Delete no banco
	 */
	function delete($id)
	{
		$this->db->where("id", $id);
		return $this->db->delete('especialidade');
	}

}

