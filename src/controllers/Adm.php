<?php

class Adm extends Controller
{
	
	public function __construct()
	{
		$this->usuario = $this->model('usuario');
		$this->productos = $this->model('producto');
	}
	
	public function index()
	{
		
		
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosLogin = [
                'email' => trim($_POST['email']),
                'contrasena' => trim($_POST['password'])
            ];
			
            $datosUsuario = $this->usuario->getUsuarioAdm($datosLogin['email'],'0');
			
			
			
            if ($this->usuario->verificarContrasena($datosUsuario, $datosLogin['contrasena'])) {
                $_SESSION['adm_logueado'] = $datosUsuario->id;
                $_SESSION['adm_usuario'] = $datosUsuario->usuario;
                redirection('adm/home');
            } else {
                $_SESSION['adm_errorLogin'] = 'El usuario o la contraseña son incorrectos';
                redirection('adm/index');
            }
        } else {
            if (isset($_SESSION['adm_logueado'])) {
                redirection('adm/home');
            } else {
                $this->view('adm/index');
            }
        }
		
		
	}
	
	public function home()
	{
		 if (isset($_SESSION['adm_logueado'])) {
               $this->view("adm/home");
         } else {
               $this->view("adm/index");
         }
		
	}
	
	public function nuevo()
	{ 
		 if (isset($_SESSION['adm_logueado'])) {
               $this->view("adm/nuevoProducto");
         } else {
               $this->view("adm/index");
         }
		
	}
	
	public function editar($id)
	{ 
		 if (isset($_SESSION['adm_logueado'])) {
			 
			$datos = $this->productos->getProduct($id);
			 
            $this->view("adm/editarProducto",$datos);
         } else {
               $this->view("adm/index");
         }
	}
	
	public function agregarImagen($id){
		
		 if (isset($_SESSION['adm_logueado'])) {
			 
			$carpeta = 'img/imagenesProductos/';
			opendir($carpeta);
			$rutaImagen = 'img/imagenesProductos/' . $_FILES['imagen']['name'];
			$ruta = $carpeta . $_FILES['imagen']['name'];
			copy($_FILES['imagen']['tmp_name'], $ruta);
			
			 $datos = [
				'idproducto' => $id,
				'imagen' => $rutaImagen
			];
			
			
				
			if ($this->productos->addProductImage($datos))
				$_SESSION['success'] = 'Genial!! Proceso exitoso';
			else  
				$_SESSION['danger'] = 'Ups!! Algo ha pasado, intente de nuevo';
			
			redirection('adm/productos');
			
            
         } else {
               $this->view("adm/index");
         }
		
	}
	
	public function eliminarImagen($id)
	{ 
		 if (isset($_SESSION['adm_logueado'])) {
			 
			if ($this->productos->deleteProductImagen($id))
				$_SESSION['success'] = 'Genial!! Proceso exitoso';
			else  
				$_SESSION['danger'] = 'Ups!! Algo ha pasado, intente de nuevo';
			
			redirection('adm/productos');
         } else {
               $this->view("adm/index");
         }
		
	}
	
	
	
	public function imagenes($id)
	{ 
		 if (isset($_SESSION['adm_logueado'])) {
			 
			$imagesProductos = $this->productos->getProductImages($id);
			
			$datos = [
			 'id' => $id ,
			 'datos' => $imagesProductos
			];
			
			
			
            $this->view("adm/imagenesProducto",$datos);
         } else {
               $this->view("adm/index");
         }
	}
	
	public function eliminar($id)
	{ 
	
	
		 if (isset($_SESSION['adm_logueado'])) {
			 
			if ($this->productos->deleteProduct($id))
				$_SESSION['success'] = 'Genial!! Proceso exitoso';
			else  
				$_SESSION['danger'] = 'Ups!! Algo ha pasado, intente de nuevo';
			
			redirection('adm/productos');
         } else {
               $this->view("adm/index");
         }
		
	}
	
	public function productos($id = NULL)
	{
		
		
		if (isset($_SESSION['adm_logueado'])) {
			
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				
			      if($id === NULL)
				  {
						$producto = [
						   'nombre' => filter_var($_POST["nombre"],FILTER_SANITIZE_STRING),
						   'precio' => filter_var($_POST["precio"],FILTER_SANITIZE_NUMBER_FLOAT),
						   'descripcion' => filter_var($_POST["descripcion"],FILTER_SANITIZE_STRING)
						];
						
						
						if ($this->productos->register($producto))
							$_SESSION['success'] = 'Genial!! Proceso exitoso';
						else  
							$_SESSION['danger'] = 'Ups!! Algo ha pasado, intente de nuevo';
						
						redirection('adm/productos');  
				  }else{
					  
					  
					  
						$producto = [
						   'id' =>$id,
						   'nombre' => filter_var($_POST["nombre"],FILTER_SANITIZE_STRING),
						   'precio' => filter_var($_POST["precio"],FILTER_SANITIZE_NUMBER_FLOAT),
						   'descripcion' => filter_var($_POST["descripcion"],FILTER_SANITIZE_STRING)
						];
						
						
						if ($this->productos->editarProducto($producto))
							$_SESSION['success'] = 'Genial!! Proceso exitoso';
						else  
							$_SESSION['danger'] = 'Ups!! Algo ha pasado, intente de nuevo';
						
						redirection('adm/productos');
						
					
				  }
			}else{
				
						$datos = $this->productos->getProducts();
						$this->view("adm/productos",$datos);		
			}
			
				 
		}
		else {
               $this->view("adm/index");
        }
		
	}
	
	public function salir(){
		session_start();
		$_SESSION = [];
		session_destroy();
		redirection('adm');
	}
	
}

?>