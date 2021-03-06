<div class="container">
	<div class="row justify-content-center">
		<div class="col mb-5">
			<div class="card">
				<?php if (isset($formErrors)) : ?>
					<div class="alert alert-warning mb-0" role="alert">
						<span><?= $formErrors ?></span>
					</div>
				<?php endif; ?>

				<?php if (isset($medico)) : ?> <!-- Se possui a variavel $medico, atualiza -->
				<form action="<?= site_url() ?>medicos/update/<?= $medico['id'] ?>" method="post"
					  class="row g-3 m-lg-2">
					<?php else : ?>
					<form action="<?php base_url() ?>insert" method="post" class="row g-3 m-lg-2">

						<?php endif; ?>

						<input type="hidden" name="id" value="<?= isset($medico) ? $medico["id"] : "" ?>">
						<div class="col-md-5">
							<label for="crm" class="form-label">CRM</label>
							<input type="text" class="form-control" placeholder="xxxxxxxx" id="crm" name="crm"
								   value="<?= isset($medico) ? $medico["crm"] : set_value('crm') ?>">
						</div>
						<div class="col-7">
							<label for="nome" class="form-label">Nome</label>
							<input type="text" class="form-control" id="nome" name="nome"
								   value="<?= isset($medico) ? $medico["nome"] : set_value('nome') ?>">
						</div>
						<div class="col-md-7">
							<label for="especialidade_id" class="form-label">Especialidade</label>
							<select class="form-select" aria-label="" id="especialidade_id" name="especialidade_id">

								<?php if (isset($medico)) : ?> <!-- Se possui a variavel, pega o id ja existente -->
									<option selected value="<?= $especi['id'] ?>">
										<?= $especi['nome'] ?>
									</option>

									<?php foreach ($especialidades as $e) : ?>
										<option value="<?= $e['id'] ?>">
											<?= $e['nome'] ?>
										</option>
									<?php endforeach; ?>

								<?php else : ?> <!-- Senão -->
									<?php foreach ($especialidades as $e) : ?>
										<option value="<?= $e['id'] ?>">
											<?= $e['nome'] ?>
										</option>
									<?php endforeach; ?>

								<?php endif; ?>

							</select>
						</div>
						<div class="col-7">
							<label for="telefone" class="form-label">Telefone</label>
							<input type="text" class="form-control" placeholder="" id="telefone" name="telefone"
								   value="<?= isset($medico) ? $medico["telefone"] : set_value('telefone') ?>">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-success">Confirmar</button>
							<a href="<?php base_url() ?>/ci/medicos" class="btn btn-danger">Cancel</a>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>


