<?php

       class Fin extends Controller
	   {
		   
		   public function index()
		   {
			   if(isset($_SESSION["logueado"]))
			   {
				    $this->view('fin');
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