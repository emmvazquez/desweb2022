<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('ProductosC/insertImagen/'.$IdProducto);?>

				<input type="file" name="imagen" size="20" />
				<input type="hidden" name="subir" value="subir">
				<input type="submit">
	</form>

<?php print_r($imagenes) ?>

<?php foreach ($imagenes as $key): ?>
	<img src="<?=base_url('uploads/').$key->Imagen ?>" width="100">
<?php endforeach ?>