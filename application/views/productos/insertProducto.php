<?php print_r($categorias) ?>

<div class="container">
	<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('ProductosC/insertProducto2');?>



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

				<input type="file" name="userfile" size="20" />
				<input type="submit">
	</form>

</div>