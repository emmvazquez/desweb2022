<div class="container">
	<?php echo validation_errors(); ?>
	<form action="<?=base_url('index.php/ProductosC/updateProducto/').$producto[0]->IdProducto ?>" method="POST">

				<label>Nombre</label>
				<input type="text" class="form-control" name="Nombre" value="<?=$producto[0]->Nombre ?>">
				<label>Descripción</label>
				<input type="text" class="form-control" name="Descripcion" value="<?=$producto[0]->Descripcion ?>">
				<input type="submit" value="Actualizar">
	</form>

</div>