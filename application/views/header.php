<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title><?php echo $titulo?></title>
	<!-- Favicon-->
	<!-- Bootstrap Links-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
			crossorigin="anonymous"></script>
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f3f3f3;">
	<div class="container px-4 px-lg-5">
		<a class="navbar-brand" href="<?php base_url()?>home">Cliníca Médica</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
				class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
				<li class="nav-item"><a class="nav-link" href="<?php base_url() ?>consultas">Consultas</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php base_url() ?>especialidades">Especialidades</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php base_url() ?>medicos">Médicos</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php base_url() ?>pacientes">Pacientes</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php base_url() ?>usuarios">Usuários</a></li>
			</ul>
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<a class="btn btn-sm btn-secondary" href="<?php base_url() ?>login/logout">
						<i class="bi bi-box-arrow-right"></i> Sair
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- Header-->
<header class="bg-primary py-2">
	<div class="container px-4 px-lg-2 my-1">
		<div class="text-center text-white">
			<h1 class="display-4 fw-bolder"><?php echo $titulo?></h1>
			<p class="lead fw-normal text-white-50 mb-0">Bem vindo</p>
		</div>
	</div>
</header>

<!-- Section-->
<section class="py-4">
	<div class="container px-2 px-lg-5">
