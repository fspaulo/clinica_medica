<div class="row justify-content-center">
	<main role="main" class="col-md-9 ml-sm-auto col-lg-8 px-4">

		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h2 class="h2">Usuários</h2>
			<div class="btn-toolbar mb-2 mb-md-0">
<!--				<div class="btn-group mr-2">-->
<!--					<a href="--><?php //base_url() ?><!--especialidades/novo" class="btn btn-sm btn-secondary">-->
<!--						<i class="bi bi-plus-square"></i> Adicionar</a>-->
<!--				</div>-->
			</div>
		</div>

		<table class="table table-bordered table-hover table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Senha</th>
				<th>Ações</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($usuarios as $user) : ?>
				<tr>
					<td><?= $user['id'] ?></td>
					<td><?= $user['usuario'] ?></td>
					<td><?= $user['senha'] ?></td>
					<td>
						<a href="<?php base_url() ?>usuarios/editar/<?= $user['id'] ?>"
						   class="btn btn-sm btn-warning">
							<i class="bi bi-pencil-square"></i>
						</a>
						<a href="<?php base_url() ?>usuarios/deletar/<?= $user['id'] ?>"
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
