<div class="row justify-content-center">
	<main role="main" class="col-md-9 ml-sm-auto col-lg-8 px-4">

		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h2 class="h2">Médicos</h2>
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group mr-2">
					<a href="<?php base_url() ?>medicos/novo" class="btn btn-sm btn-secondary">
						<i class="bi bi-plus-square"></i> Adicionar</a>
				</div>
			</div>
		</div>

		<table class="table table-hover table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>CRM</th>
				<th>Nome</th>
				<th>Especialidade</th>
				<th>Telefone</th>
				<th>Ações</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($medicos as $m) : ?>
				<tr>
					<td><?= $m['id'] ?></td>
					<td><?= $m['crm'] ?></td>
					<td><?= $m['nome'] ?></td>
					<td><?= $m['especialidade_id'] ?></td>
					<td><?= $m['telefone'] ?></td>
					<td>
						<a href="<?php base_url() ?>medicos/editar/<?= $m['id'] ?>"
						   class="btn btn-sm btn-warning">
							<i class="bi bi-pencil-square"></i>
						</a>
						<a href="<?php base_url() ?>medicos/deletar/<?= $m['id'] ?>"
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
