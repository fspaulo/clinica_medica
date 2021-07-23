<div class="container">
	<div class="row justify-content-center">
		<div class="col mb-5">
			<div class="card">
				<?php if (isset($especialidade)) : ?> <!-- Se possui a variavel $especialidade, atualiza -->
					<form action="<?= site_url() ?>especialidades/update/<?=$especialidade['id']?>" method="post" class="row g-3 m-lg-2">
      			<?php else : ?> <!-- Se possui a variavel $especialidade, abre novo -->
					<form action="<?php base_url() ?>insert" method="post" class="row g-3 m-lg-2"><!-- <=//php base_url() ?>especialidades/salvar-->
				<?php endif; ?>
						<input type="hidden" name="id" value="<?= isset($especialidade) ? $especialidade["id"] : "" ?>">
						<div class="col-md-5">
							<label for="nome" class="form-label">Nome</label>
							<input type="text" class="form-control" id="nome" name="nome"
								   value="<?= isset($especialidade) ? $especialidade["nome"] : "" ?>">
<!--							<small>--><?php //echo form_error("email") ?><!--</small>-->
						</div>
						<div class="col-md-3">
							<label for="valor" class="form-label">Valor</label>
							<input type="text" class="form-control" placeholder="" id="valor" name="valor"
								   value="<?= isset($especialidade) ? $especialidade["valor"] : "" ?>">
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-success">Confirmar</button>
							<a href="<?php base_url() ?>/ci/especialidades" class="btn btn-danger">Cancel</a>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>


