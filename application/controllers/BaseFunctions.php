<?php


namespace App\Controllers;

/**
	* Interface contempla as funções base
 */
interface BaseFunctions{
	public function cadastrar();
	public function listarTodos();
	public function editar($id);
	public function excluir($id);

}
