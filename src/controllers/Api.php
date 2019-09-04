<?php


class Api extends Controller
{
	
	//api/products/   -> Obtener todos los productos
	//api/products/ID -> Obtener un producto
	//api/products/ID -> Editar un Producto
	//api/products/ID -> Eliminar un producto
	
	
	public function __construct(){
		
		$this->products = $this->model('producto');
		$this->carrito = $this->model('carrito');
	}
	
	
	public function products($id = NULL)
	{
		$methodRequest = $_SERVER["REQUEST_METHOD"];
		
		switch($methodRequest)
		{
			case 'GET':{
				
				switch ($id)
				{
					case NULL :{
						
						$datos = $this->products->getProductsWithPhotos();
						
						
						echo json_encode($datos); break;
						
						}
					default : { echo json_encode(" REQUEST GET UNIQUE ".$id); break;}
				}
				
				break;
			}
			
			case 'POST':{
				echo json_encode("REQUEST POST");
				
				break;
			}
			
			case 'PUT':{
				echo json_encode("REQUEST PUT");
				break;
			}
			
			case 'DELETE':{
				echo json_encode("REQUEST DELETE");
				break;
			}
		}
		
	}
	
	
	public function cartTotal($id = NULL)
	{
	
	}
	public function cart($id = NULL)
	{
		$methodRequest = $_SERVER["REQUEST_METHOD"];
		
		switch($methodRequest)
		{
			case 'GET':{
				
				switch ($id)
				{
					case NULL :{
						$datos = ['idusuario' => $_SESSION["logueado"]];
						
						$res = $this->carrito->getCart($datos);
						
						
						
						echo json_encode($res); break;
						
						}
					default : { echo json_encode(" REQUEST GET UNIQUE ".$id); break;}
				}
				
				break;
			}
			
			case 'POST':{
				
				$inputs = json_decode(file_get_contents("php://input"));
				
				
				$datos = [
				     'idusuario' => $_SESSION["logueado"],
					 'datos'  => $inputs
				];
				
				
				if($this->carrito->verificarCarrito($datos)){
					
					   // ACTUALIZA
					if ($this->carrito->updateCartProduct($datos))
							echo json_encode("Actualizado Satisfactoriamente");
						else  
							echo json_encode("Ups!! no se actualizo el producto del carrito");
					
				}else{
					   // AGREGA
						if ($this->carrito->addCartProduct($datos))
							echo json_encode("Agregado Satisfactoriamente");
						else  
							echo json_encode("Ups!! no se guardo el nuevo producto al carrito");
					
				}
				
				
				
				
				
				break;
			}
			
			case 'PUT':{
				echo json_encode("REQUEST PUT");
				break;
			}
			
			case 'DELETE':{
				
				switch ($id)
				{
					case NULL :{
								$datos = [ 'idusuario' => $_SESSION["logueado"] ];
								if ($this->carrito->deleteCart($datos))
											echo json_encode(" DELETE SUCCESSFULLY");
										else  
											echo json_encode("Ups!! no se elimino el carrito");
								
								break;
						
						}
					default : { 
					    
							    $datos = [ 'idusuario' => $_SESSION["logueado"] , 'id' =>$id];
								
								
								if ($this->carrito->deleteCartUnique($datos))
											echo json_encode(" DELETE SUCCESSFULLY");
										else  
											echo json_encode("Ups!! no se elimino el item del carrito");
								
								break;
					
					}
				}
				
				break;
				
				
				
				
			}
		}
		
	}
	
	
	
	
}

?>