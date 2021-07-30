<div class="container">
	<div class="row justify-content-center">
		<div class="col mb-5">
			<div class="card">
				<?php if (isset($consulta)) : ?> <!-- Se possui a variavel $especialidade, atualiza -->
					<form action="<?= site_url() ?>consultas/update/<?=$consulta['id']?>" method="post" class="row g-3 m-lg-2">
      			<?php else : ?> <!-- Se possui a variavel $especialidade, abre novo -->
					<form action="<?php base_url() ?>insert" method="post" class="row g-3 m-lg-2">
				<?php endif; ?>
						<input type="hidden" name="id" value="<?= isset($consulta) ? $consulta["id"] : "" ?>">
						<div class="col-md-4">
							<label for="data" class="form-label">Data</label>
							<input type="date" class="form-control" id="data" name="data"
								   value="<?= isset($consulta) ? $consulta["data"] : "" ?>">
						</div>
						<div class="col-md-4">
							<label for="hora" class="form-label">Hora</label>
							<input type="text" class="form-control" placeholder="00:00" id="hora" name="hora"
								   value="<?= isset($consulta) ? $consulta["hora"] : "" ?>">
						</div>
						<div class="col-md-3 ms-4">
							<label for="valor" class="form-label">Valor</label>
							<input type="text" class="form-control" placeholder="R$" id="valor" name="valor"
								   value="<?= isset($consulta) ? $consulta["valor"] : "" ?>">
						</div>
						<div class="col-md-7">
							<label for="medico" class="form-label">Médico</label>
							<select class="form-select" aria-label="" id="medico" name="medico">
								<option selected>Selecione</option> <!-- todo pegar id's de medico -->
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
						<div class="col-md-7">
							<label for="paciente" class="form-label">Paciente</label>
							<select class="form-select" aria-label="" id="paciente" name="paciente">
								<option selected>Selecione</option> <!-- todo pegar id's de paciente -->
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
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


