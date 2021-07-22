<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_model extends CI_Model{

	function __construct(){
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
		$this->db->where("id", $id);
		return $this->db->delete('paciente');
	}

}
