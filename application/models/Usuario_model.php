<?php

defined('BASEPATH') or exit('No direct script access allowed');

/** Usado para Login / Cadastro de usuario  */
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

}
