<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	public function index(){
		permission(); // usado para ver se o user está logado

		$dados['titulo'] = "Gerenciamento";

		$this->load->view('header', $dados);
		$this->load->view('home', $dados);
		$this->load->view('footer', $dados);

	}
}
