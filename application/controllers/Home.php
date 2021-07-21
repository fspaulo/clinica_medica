<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	public function index(){
		permission(); // todo colocar em todos controllers

		$dados['titulo'] = "Gerenciamento";

		$this->load->view('header', $dados);
		$this->load->view('home', $dados);
		$this->load->view('footer', $dados);


	}
}
