<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?=NAME_PROJECT?> - <b>Administración</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
	
	 
     
     
	  
	  <?php  if(isset($_SESSION['adm_logueado'])): ?>
	   <li class="nav-item active">
        <a class="nav-link text-danger font-weight-bold" href="<?=URL_PROJECT?>adm/productos" >Productos</a>
      </li>
     
	  <li class="nav-item active">
        <a class="nav-link" href="">Bienvenido, <b><?=$_SESSION['adm_usuario']?></b></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?=URL_PROJECT?>adm/salir">Salir</a>
      </li>
	  
	  <?php  endif; ?>
    </ul>
   
  </div>
</nav>