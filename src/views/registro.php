<?php   include SRC_RUTE.'/views/partials/header.php'; ?>
<?php   include SRC_RUTE.'/views/partials/navigation.php'; ?>
<div class="container pt-5">
<h1>Registro</h1>


<div class="row">

<div class="col-md-5 mx-auto">
<form action="<?=URL_PROJECT?>registro" method="post">

<div class="card ">

<div class="card-header">

<p>Rellene el formulario</p>


</div>

<div class="card-boddy p-3">

<div class="form-group">
	
	<input class="form-control" name="email" type="email" placeholder="Introduzca su email" required>
</div>
<div class="form-group">
	
	<input class="form-control" name="usuario" type="text" placeholder="Introduzca su nombre" required>
</div>
<div class="form-group">
	
	<input class="form-control" name="password" type="password" placeholder="Introduzca su contraseña" required>
</div>
<div class="form-group">
	
	<button class="btn btn-primary btn-block" type="submit"  >Registrar </button>
</div>

</div>

</div>

</form>

 <?php if (isset($_SESSION['usuarioError'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['usuarioError'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['usuarioError']);
            endif ?>
            <div class="contenido-link mt-2">
                <span class="mr-2">¿Ya tienes una cuenta?</span><a href="<?php echo URL_PROJECT ?>/home/login">Ingresar</a>
            </div>

</div>

</div>



	
</div>
	
	
	
<?php   include SRC_RUTE.'/views/partials/footer.php'; ?>	
