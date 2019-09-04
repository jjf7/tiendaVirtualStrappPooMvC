<nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="header">
  <a class="navbar-brand" href="<?=URL_PROJECT?>"><?=NAME_PROJECT?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav ml-auto">
	
	 
	  <?php  if(isset($_SESSION['logueado'])): ?>
	  <li class="nav-item active">
        <a class="nav-link" href="">Bienvenido, <b><?=$_SESSION['usuario']?></b></a>
      </li>
	   <li class="nav-item active my-auto">
       
		 <div class="cart my-auto" >
                                <p id="sidebar" class="text-warning font-weight-bold" title="Carrito">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span id="cart-count" class="cart-count">0</span>
                                </p>
         </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?=URL_PROJECT?>home/salir" >Salir</a>
      </li>
	  
	  <?php  endif; ?>
    </ul>
   
  </div>
</nav>

        
