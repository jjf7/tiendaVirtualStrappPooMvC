<?php

       class Checkout extends Controller
	   {
		   
		   public function index()
		   {
			   if(isset($_SESSION["logueado"]))
			   {
				    $this->view('checkout');
			   }
			   else
			   {
				    redirection('login');
			   }
			  
		   }
		   
		   public function salir(){
			   
			    session_start();
				$_SESSION = [];
				session_destroy();
				redirection('/');
		   }
		   
	   }

?>