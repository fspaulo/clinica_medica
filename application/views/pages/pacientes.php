<div class="row justify-content-center">
	<main role="main" class="col-md-9 ml-sm-auto col-lg-8 px-4">

		<?php if (isset($error)) : ?>
			<div class="alert alert-warning mb-3" role="alert">
				<span><?= $error ?></span>
			</div>
		<?php endif; ?>

		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h2 class="h2">Pacientes</h2>
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group mr-2">
					<a href="<?php base_url() ?>pacientes/novo" class="btn btn-sm btn-secondary">
						<i class="bi bi-plus-square"></i> Adicionar</a>
				</div>
			</div>
		</div>

		<table class="table table-hover table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>CPF</th>
				<th>Email</th>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Ações</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($pacientes as $p) : ?>
				<tr>
					<td><?= $p['id'] ?></td>
					<td><?= $p['cpf'] ?></td>
					<td><?= $p['email'] ?></td>
					<td><?= $p['nome'] ?></td>
					<td><?= $p['telefone'] ?></td>
					<td>
						<a href="<?php base_url() ?>pacientes/editar/<?= $p['id'] ?>"
						   class="btn btn-sm btn-warning">
							<i class="bi bi-pencil-square"></i>
						</a>
						<a href="<?php base_url() ?>pacientes/deletar/<?= $p['id'] ?>"
						   class="btn btn-sm btn-danger">
							<i class="bi bi-trash"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</main>
</div>
