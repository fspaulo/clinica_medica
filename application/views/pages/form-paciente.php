<div class="container">
	<div class="row justify-content-center">
		<div class="col mb-5">
			<div class="card">
				<?php if (isset($paciente)) : ?> <!-- Se possui a variavel $especialidade, atualiza -->
					<form action="<?php base_url() ?>update" method="post" class="row g-3 m-lg-2">
      			<?php else : ?> <!-- Se possui a variavel $especialidade, abre novo -->
					<form action="<?php base_url() ?>insert" method="post" class="row g-3 m-lg-2">
				<?php endif; ?>
						<input type="hidden" name="id" value="<?= isset($paciente) ? $paciente["id"] : "" ?>">
						<div class="col-md-5">
							<label for="cpf" class="form-label">CPF</label>
							<input type="text" class="form-control" placeholder="xxx.xxx.xxx-xx" id="cpf" name="cpf"
								   value="<?= isset($paciente) ? $paciente["cpf"] : "" ?>">
						</div>
						<div class="col-md-7">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" value="<?= isset($paciente) ? $paciente["email"] : "" ?>">
						</div>
						<div class="col-12">
							<label for="nome" class="form-label">Nome</label>
							<input type="text" class="form-control" id="nome" name="nome" value="<?= isset($paciente) ? $paciente["nome"] : "" ?>">
						</div>
						<div class="col-7">
							<label for="telefone" class="form-label">Telefone</label>
							<input type="text" class="form-control" placeholder="" id="telefone" name="telefone" value="<?= isset($paciente) ? $paciente["telefone"] : "" ?>">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-success">Confirmar</button>
							<a href="<?php base_url() ?>/ci/pacientes" class="btn btn-danger">Cancel</a>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>


