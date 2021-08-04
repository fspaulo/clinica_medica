<div class="row justify-content-center">
	<main role="main" class="col-md-9 ml-sm-auto col-lg-8 px-4">

		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
			<h2 class="h2">Consultas</h2>
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group mr-2">
					<a href="<?php base_url() ?>consultas/novo" class="btn btn-sm btn-secondary">
						<i class="bi bi-plus-square"></i> Adicionar</a>
				</div>
			</div>
		</div>

		<table class="table table-hover table-striped">
			<thead>
			<tr>
				<th>#</th>
				<th>Data</th>
				<th>Hora</th>
				<th>Valor</th>
				<th>Médico</th>
				<th>Paciente</th>
				<th>Ações</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($consultas as $c) : ?>
				<tr>
					<td><?= $c['id'] ?></td>
					<td><?= $c['data'] ?></td>
					<td><?= $c['hora'] ?></td>
					<td><?= $c['valor'] ?></td>
					<td><?= $c['medico_id'] ?></td>
					<td><?= $c['paciente_id'] ?></td>
					<td>
						<a href="<?php base_url() ?>consultas/editar/<?= $c['id'] ?>"
						   class="btn btn-sm btn-warning">
							<i class="bi bi-pencil-square"></i>
						</a>
						<a href="<?php base_url() ?>consultas/deletar/<?= $c['id'] ?>"
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
