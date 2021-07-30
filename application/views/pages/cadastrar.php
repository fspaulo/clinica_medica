<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $titulo ?></title>

	<!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<meta name="theme-color" content="#563d7c">


	<style>
		a {
			text-decoration: none;
		}
		.login-page {
			width: 100%;
			height: 100vh;
			display: inline-block;
			display: flex;
			align-items: center;
		}
		.form-right i {
			font-size: 100px;
		}
	</style>
	<!-- Custom styles for this template -->
</head>
<body class="text-center">
<div class="login-page bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<h3 class="mb-3">Novo Usuário</h3>
				<div class="bg-white shadow rounded">
					<div class="row">
						<div class="col-md-7 pe-0">
							<div class="form-left h-100 py-5 px-5">
								<?php if(isset($mensagens)) echo $mensagens; ?>
								<form action="<?php base_url() ?>cadastrar/salvar" method="post" class="row g-4">
<!--									--><?php //echo validation_errors(); ?>
<!--									--><?php //echo form_open('form'); ?>
									<div class="col-12">
										<label for="usuario">Usuário<span class="text-danger">*</span></label>
										<div class="input-group">
											<div class="input-group-text"><i class="bi bi-person-fill"></i></div>
											<input type="text" name="usuario" id="usuario" class="form-control"
												   placeholder="Informe o novo usuário" required autofocus>
										</div>
									</div>

									<div class="col-12">
										<label for="senha">Senha<span class="text-danger">*</span></label>
										<div class="input-group">
											<div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
											<input type="password" name="senha" id="senha" class="form-control" placeholder="Informe a nova senha" required>
										</div>
									</div>

									<div class="col-sm-6">
										<a href="<?php base_url() ?>login" class="float-end text-primary">Já possui uma conta?</a>
									</div>

									<div class="col-12">
										<button type="submit" class="btn btn-primary px-4 float-end mt-4">Cadastrar</button>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-5 ps-0 d-none d-md-block">
							<div class="form-right h-100 bg-primary text-white text-center pt-5">
								<i class="bi bi-person-plus-fill"></i>
								<h2 class="fs-1">Cadastro</h2>
							</div>
						</div>
					</div>
				</div>
				<p class="text-end text-secondary mt-3">Frameworks II</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
