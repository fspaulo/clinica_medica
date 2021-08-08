<div class="container">
	<div class="row justify-content-center">
		<div class="col mb-5">
			<div class="card">
				<?php if (isset($formErrors)) : ?>
					<div class="alert alert-warning mb-0" role="alert">
						<span><?= $formErrors ?></span>
					</div>
				<?php endif; ?>

				<?php if (isset($consulta)) : ?> <!-- Se possui a variavel $especialidade, atualiza -->
				<form action="<?= site_url() ?>consultas/update/<?= $consulta['id'] ?>" method="post"
					  class="row g-3 m-lg-2">
					<?php else : ?> <!-- Se possui a variavel $especialidade, abre novo -->
					<form action="<?php base_url() ?>insert" method="post" class="row g-3 m-lg-2">
						<?php endif; ?>
						<input type="hidden" name="id" value="<?= isset($consulta) ? $consulta["id"] : "" ?>">
						<div class="col-md-4">
							<label for="data" class="form-label">Data</label>
							<input type="date" class="form-control" id="data" name="data"
								   value="<?= isset($consulta) ? $consulta["data"] : set_value('data') ?>">
						</div>
						<div class="col-md-4">
							<label for="hora" class="form-label">Hora</label>
							<input type="time" class="form-control" placeholder="00:00" id="hora" name="hora"
								   value="<?= isset($consulta) ? $consulta["hora"] : set_value('hora') ?>">
						</div>
						<div class="col-md-3 ms-4">
							<label for="valor" class="form-label">Valor</label>
							<input type="number" class="form-control" placeholder="R$" id="valor" name="valor"
								   value="<?= isset($consulta) ? $consulta["valor"] : set_value('valor') ?>">
						</div>
						<div class="col-md-7">
							<label for="medico" class="form-label">Médico</label>
							<select class="form-select" aria-label="" id="medico" name="medico_id">

								<?php if (isset($consulta)) : ?> <!-- Se possui a variavel, pega o id ja existente -->
									<option selected value="<?= $med['id'] ?>">
										<?= $med['nome'] ?>
									</option>

									<?php foreach ($medicos as $m) : ?>
										<option value="<?= $m['id'] ?>">
											<?= $m['nome'] ?>
										</option>
									<?php endforeach; ?>

								<?php else : ?> <!-- Senão -->
									<?php foreach ($medicos as $m) : ?>
										<option value="<?= $m['id'] ?>">
											<?= $m['nome'] ?>
										</option>
									<?php endforeach; ?>

								<?php endif; ?>

							</select>
						</div>
						<div class="col-md-7">
							<label for="paciente" class="form-label">Paciente</label>
							<select class="form-select" aria-label="" id="paciente" name="paciente_id">

								<?php if (isset($consulta)) : ?>
									<option selected value="<?= $paci['id'] ?>">
										<?= $paci['nome'] ?>
									</option>

									<?php foreach ($pacientes as $p) : ?>
										<option value="<?= $p['id'] ?>">
											<?= $p['nome'] ?>
										</option>
									<?php endforeach; ?>

								<?php else : ?> <!-- Senão -->
									<?php foreach ($pacientes as $p) : ?>
										<option value="<?= $p['id'] ?>">
											<?= $p['nome'] ?>
										</option>
									<?php endforeach; ?>

								<?php endif; ?>

							</select>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-success">Confirmar</button>
							<a href="<?php base_url() ?>/ci/consultas" class="btn btn-danger">Cancel</a>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>


