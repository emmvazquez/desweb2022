<?php print_r($categorias) ?>

<div class="container">
	<?php echo validation_errors(); ?>
	<form action="<?=base_url('index.php/ProductosC/insertProducto') ?>" method="POST">

				<label>Nombre</label>
				<input type="text" class="form-control" name="Nombre">
				<label>Descripción</label>
				<input type="text" class="form-control" name="Descripcion">

				<label>Categoría</label>
				<select class="form-control" name="IdCategoria">
					<?php foreach ($categorias as $key ): ?>
						<option value="<?=$key->IdCategoria ?>"><?=$key->Categoria ?></option>
					<?php endforeach ?>
				</select>
				<input type="submit">
	</form>

</div>