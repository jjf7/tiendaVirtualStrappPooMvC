<?php   include SRC_RUTE.'/views/adm/partials/header.php'; ?>
<?php   include SRC_RUTE.'/views/adm/partials/navigation.php'; 
//var_dump($params["id"]);
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?=URL_PROJECT?>adm/productos/agregarImagen/<?=$params["id"]?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
				<label class="control-label">Imagen</label>
				<input type="file" name="imagen" required> 
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<div class="container pt-5">
<div class="row pt-4">
	<div class="col-md-12 mx-auto">
		<h1>Imagenes Productos <code><?=$params["id"]?> <code> <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-sm text-white ">+ Nuevo</a></h1>
	</div>
	<div class="row pt-4">
	<div class="col-md-12 ">
		<table class="table table-striped">
		 <thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
			    <th scope="col">Imagen</th>
				<th scope="col">Acciones</th>
			</tr>
			</thead>
		<tbody>
		
		<?php   foreach($params["datos"] as $datos): ?>
			<tr>
				<td><?=$datos->id?></td>
			    <td><?=$datos->imagen?>
				<br>
				
				<img src="<?=URL_PROJECT?><?=$datos->imagen?>"  style="width:300px" > 
				</td>
				<td>
					<form  action="<?=URL_PROJECT?>adm/productos/eliminarImagen/<?=$datos->id?>" method="POST"  onSubmit="if(confirm('Estas seguro de eliminar esta imagen?')){return true} else{ return false}">
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
</div>
<?php   include SRC_RUTE.'/views/adm/partials/footer.php'; ?>	
