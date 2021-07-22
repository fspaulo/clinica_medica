<?php

defined('BASEPATH') or exit('No direct script access allowed');

/** Usado para Login/Cadastro de usuario  */
class Usuario_model extends CI_Model
{
	/**
	 * Busca resgistros no banco
	 */
	public function index()
	{
		return $this->db->get("login")->result_array();
	}

	/**
	 * Insert no banco
	 */
	function salvar($user)
	{
		$this->db->insert('login', $user);
	}

	/**
	 * Realiza login
	 */
	function login($usuario, $senha)
	{
		$this->db->where("usuario", $usuario);
		$this->db->where("senha", $senha);

		$user = $this->db->get("login")->row_array();
		return $user;
	}

	/**
	 * Funcao retorna o id para mostrar na tela editar
	 */
	public function id_editar($id)
	{
		return $this->db->get_where('login', array(
			"id" => $id  // campo banco => parametro
		))->row_array();
	}

	/**
	 * Update no banco
	 */
	public function atualizar($update_item)
	{
		$this->db->where("id", $update_item["id"]);
		return $this->db->update('login', $update_item);
	}

	/**
	 * Delete no banco
	 */
	function delete($id)
	{
		$this->db->where("id", $id);
		return $this->db->delete('login');
	}

}
