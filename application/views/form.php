<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title>Clinica Médica</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
	<!-- Bootstrap Links-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
			crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col mb-5">
			<div class="card">
				<form class="row g-3 m-lg-2">
					<div class="col-md-6">
						<label for="inputNome" class="form-label">Nome</label>
						<input type="text" class="form-control" id="inputNome">
					</div>
					<div class="col-md-6">
						<label for="inputCPF" class="form-label">CPF</label>
						<input type="text" class="form-control" placeholder="xxx.xxx.xxx-xx" id="inputCPF">
					</div>
					<div class="col-12">
						<label for="inputEmail" class="form-label">Email</label>
						<input type="email" class="form-control" id="inputEmail" placeholder="">
					</div>
					<div class="col-12">
						<label for="inputFone" class="form-label">Telefone</label>
						<input type="text" class="form-control" id="inputFone"
							   placeholder="">
					</div>
					<div class="col-md-4">
						<label for="inputPlano" class="form-label">Plano-teste</label>
						<select id="inputPlano" class="form-select">
							<option selected>Básico</option>
							<option>Privado</option>
						</select>
					</div>
					<div class="col-12">
						<!--<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
								Check me out
							</label>
						</div>-->
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary">Confirmar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>

