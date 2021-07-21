<?php
function permission(){
	$ci = get_instance(); // instancia do ci
	$user = $ci->session->userdata("logado"); //pega usuario logado

	if(!$user) {
		$ci->session->set_flashdata("danger", "Você precisa estar logado");
		redirect("login"); //todo
	}
	return $user;
}
