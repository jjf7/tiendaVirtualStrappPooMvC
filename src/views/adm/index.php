<?php   include SRC_RUTE.'/views/adm/partials/header.php'; ?>
<?php   include SRC_RUTE.'/views/adm/partials/navigation.php'; ?>
<div class="container pt-5">
<h1>Login</h1>


<div class="row">

<div class="col-md-5 mx-auto">
<form action="<?=URL_PROJECT?>adm" method="post">

<div class="card ">

<div class="card-header">

<p>Introduzca sus datos de acceso al administrador:</p>


</div>

<div class="card-boddy p-3">

<div class="form-group">
	
	<input class="form-control" name="email" type="email" placeholder="Introduzca su email" required>
</div>

<div class="form-group">
	
	<input class="form-control" name="password" type="password" placeholder="Introduzca su contraseña" required>
</div>
<div class="form-group">
	
	<button class="btn btn-success btn-block" type="submit"  >Acceder </button>
</div>

</div>

</div>

</form>
 <!-- Esta es la alerta cuando el usuario o la contraseña son incorrectos -->
            <?php if (isset($_SESSION['adm_errorLogin'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['adm_errorLogin'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['adm_errorLogin']);
            endif ?>

</div>

</div>



	
</div>
	
	
	
<?php   include SRC_RUTE.'/views/partials/footer.php'; ?>	
