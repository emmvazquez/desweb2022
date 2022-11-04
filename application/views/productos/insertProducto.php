<div class="container">
	<?php echo validation_errors(); ?>
	<form action="<?=base_url('index.php/ProductosC/insertProducto') ?>" method="POST">

				<label>Nombre</label>
				<input type="text" class="form-control" name="Nombre">
				<label>Descripción</label>
				<input type="text" class="form-control" name="Descripcion">
				<input type="submit">
	</form>

</div>