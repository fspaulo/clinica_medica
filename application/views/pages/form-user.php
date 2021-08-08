<div class="container">
	<div class="row justify-content-center">
		<div class="col mb-5">
			<div class="card">
				<?php if (isset($formErrors)) : ?>
					<div class="alert alert-warning mb-0" role="alert">
						<span><?= $formErrors ?></span>
					</div>
				<?php endif; ?>

				<?php if (isset($user)) : ?>
					<form action="<?= site_url() ?>usuarios/update/<?=$user['id']?>" method="post" class="row g-3 m-lg-2">
      			<?php else : ?>
					<form action="<?php base_url() ?>insert" method="post" class="row g-3 m-lg-2">
				<?php endif; ?>
						<input type="hidden" name="id" value="<?= isset($user) ? $user["id"] : "" ?>">
						<div class="col-md-5">
							<label for="usuario" class="form-label">Usuário</label>
							<input type="text" class="form-control" id="usuario" name="usuario"
								   value="<?= isset($user) ? $user["usuario"] : "" ?>">
						</div>
						<div class="col-md-3">
							<label for="senha" class="form-label">Senha</label>
							<input type="text" class="form-control" placeholder="" id="senha" name="senha"
								   value="<?= isset($user) ? $user["senha"] : "" ?>">
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


