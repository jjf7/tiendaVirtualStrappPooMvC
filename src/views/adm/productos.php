<?php   include SRC_RUTE.'/views/adm/partials/header.php'; ?>
<?php   include SRC_RUTE.'/views/adm/partials/navigation.php'; ?>
<div class="container pt-5">
<h1>Listado Productos <a href="<?=URL_PROJECT?>adm/productos/nuevo" class="btn btn-success btn-sm text-white ">+ Nuevo</a></h1>
	
<div class="row pt-4">
	<div class="col-md-12 ">
		<table class="table table-striped">
		 <thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
			    <th scope="col">Nombre</th>
				<th scope="col">Descripción</th>
				<th scope="col">Precio</th>
				<th scope="col">Acciones</th>
			</tr>
			</thead>
		<tbody>
		
		<?php  
				foreach($params as $datos):

		?>
			<tr>
				<td><?=$datos->id?></td>
			    <td><?=$datos->nombre?></td>
				<td><?=$datos->descripcion?></td>
				<td><?=$datos->precio?></td>
				<td>
						<a class="btn btn-primary btn-sm text-white " href="<?=URL_PROJECT?>adm/productos/editar/<?=$datos->id?>">Editar</a>
						<a class="btn btn-warning btn-sm text-white " href="<?=URL_PROJECT?>adm/productos/imagenes/<?=$datos->id?>">Agregar Imágenes</a>
						
						<form class="d-inline" action="<?=URL_PROJECT?>adm/productos/eliminar/<?=$datos->id?>" method="POST"  onSubmit="if(confirm('Estas seguro de eliminar este producto?')){return true} else{ return false}">
									
							<button type="submit" class="btn btn-danger btn-sm text-white ">Eliminar</button>		
						</form>
						
						
						
				</td>
			</tr>
		
		<?php endforeach; ?>
		
		
		</tbody>

		</table>
		
		
		 <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['success'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['success']);
            endif ?>
			
			 <?php if (isset($_SESSION['danger'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['danger'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['danger']);
            endif ?>
	</div>
</div>	
</div>


	
	
<?php   include SRC_RUTE.'/views/adm/partials/footer.php'; ?>	
