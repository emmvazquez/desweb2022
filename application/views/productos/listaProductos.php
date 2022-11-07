<div class="container">
	<?php print_r($productos) ?>
	<a class="btn btn-success" href="<?=base_url('index.php/ProductosC/insertProducto') ?>">Agregar Producto</a>

	<form action="<?=base_url('index.php/ProductosC/show') ?>" method="POST">
		
		<input type="text" name="Termino">
		<input type="submit" >
	</form>

	<table class="table table-striped">
		<thead>
			<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Categoría</th>
			<th>Costo</th>
			<th>Operaciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($productos as $key): ?>
				<tr>
					<td><?=$key->IdProducto ?></td>
					<td><?=$key->Nombre?></td>
					<td><?=$key->Descripcion ?></td>
					<td><?=$key->Categoria ?></td>
					<td><?=$key->Costo ?></td>
					<td><a class="btn btn-success" href="<?=base_url('index.php/ProductosC/detalleProducto/').$key->IdProducto ?>">Ver detalle</a></td>


					<td>
						<?php if($this->session->userdata('Perfil')==1): ?>
						<a class="btn btn-danger" href="<?=base_url('index.php/ProductosC/borrarProducto/').$key->IdProducto ?>">Borrar</a>
					<?php endif ?>
					</td>
					<td><a class="btn btn-danger" href="<?=base_url('index.php/ProductosC/updateProducto/').$key->IdProducto ?>">Editar</a></td>
				</tr>
			<?php endforeach ?>

		</tbody>
	</table>
</div>

