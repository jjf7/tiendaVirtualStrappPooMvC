<?php   include SRC_RUTE.'/views/adm/partials/header.php'; ?>
<?php   include SRC_RUTE.'/views/adm/partials/navigation.php'; ?>
<div class="container pt-5">


<div class="row pt-4">
	<div class="col-md-6 mx-auto">
		<div class="card">
		<form action="<?=URL_PROJECT?>adm/productos" method="POST">
			<div class="card-header">
				<h1>+ Nuevo Producto</h1>
			</div>
			<div class="card-body">
			
				<div class="form-group">
					<input class="form-control" type="text" name="nombre" placeholder="Introduzca el nombre" required>
				</div>
				<div class="form-group">
					<input class="form-control" type="number"  step="0.01" name="precio" placeholder="Introduzca el precio" required>
				</div>
				<div class="form-group">
					<textarea class="form-control" rows="3"  name="descripcion" placeholder="Introduzca la descripción" required></textarea>
				</div>
			</div>
			<div class="card-footer">
			
				<div class="form-group">
				   <button class="btn btn-info btn-block" type="submit"> Guardar</button>	
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

</div>

<?php   include SRC_RUTE.'/views/adm/partials/footer.php'; ?>	
