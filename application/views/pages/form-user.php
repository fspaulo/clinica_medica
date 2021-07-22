<div class="container">
	<div class="row justify-content-center">
		<div class="col mb-5">
			<div class="card">
				<?php if (isset($user)) : ?> <!-- Se possui a variavel $especialidade, atualiza -->
					<form action="<?php base_url() ?>update" method="post" class="row g-3 m-lg-2">
      			<?php else : ?> <!-- Se possui a variavel $especialidade, abre novo -->
					<form action="<?php base_url() ?>insert" method="post" class="row g-3 m-lg-2">
				<?php endif; ?>
						<input type="hidden" name="id" value="<?= isset($user) ? $user["id"] : "" ?>">
						<div class="col-md-5">
							<label for="nome" class="form-label">Usuário</label>
							<input type="text" class="form-control" id="nome" name="nome" value="<?= isset($user) ? $user["usuario"] : "" ?>">
						</div>
						<div class="col-md-3">
							<label for="valor" class="form-label">Senha</label>
							<input type="text" class="form-control" placeholder="" id="valor" name="valor" value="<?= isset($user) ? $user["senha"] : "" ?>">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-success">Confirmar</button>
							<a href="<?php base_url() ?>/ci/usuarios" class="btn btn-danger">Cancel</a>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>


