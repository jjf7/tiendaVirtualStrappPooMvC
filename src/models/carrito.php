<?php
class carrito
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }
    
	
	 public function deleteCart($datos)
    {
        $this->db->query('DELETE from  carrito  where id_usuario=:idusuario '); 
		
		$this->db->bind(':idusuario', $datos['idusuario']);
		$this->db->execute();
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }		
       
    }
	
	 public function deleteCartUnique($datos){
		 
		$this->db->query('DELETE from  carrito  where id=:id and id_usuario=:idusuario '); 
		$this->db->bind(':id', $datos['id']);
		$this->db->bind(':idusuario', $datos['idusuario']);
		$this->db->execute();
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }	 
	 }

	
   public function getCart($datos)
    {
        $this->db->query('SELECT C.id, P.nombre, P.precio , C.cantidad  from carrito C INNER JOIN productos P on C.id_producto = P.id where C.id_usuario=:idusuario '); 
		
		$this->db->bind(':idusuario', $datos['idusuario']);		
        return $this->db->registers();
    }
	
	public function getCartProductsWithPhotos()
    {
        $this->db->query('SELECT P.* , PI.imagen FROM `productos` P INNER JOIN productos_imagenes PI ON P.id=PI.id_producto group by P.id');    
        return $this->db->registers();
    }
	
	 
   public function verificarCarrito($datos){
	 
     $this->db->query('SELECT * FROM carrito WHERE id_producto = :idproducto and id_usuario= :idusuario');
        $this->db->bind(':idproducto', $datos['datos']->producto);
		 $this->db->bind(':idusuario', $datos['idusuario']);
        $this->db->execute();
        if ($this->db->rowCount()) {
            return $this->db->registers();
        } else {
            return false;
        }  
	 
   }
   
   public function updateCartProduct($datos){
   
       $this->db->query('UPDATE carrito SET cantidad = :cantidad WHERE id_producto = :idproducto and id_usuario=:idusuario' );
       $this->db->bind(':cantidad' , $datos['datos']->cantidad);
	   $this->db->bind(':idproducto' , $datos['datos']->producto);
	   $this->db->bind(':idusuario' , $datos['idusuario']);
     
       if ($this->db->execute()) {
           return true;
       } else {
           return false;
       }
   
   
    }
	public function addCartProduct($datos){
		
		$this->db->query('INSERT INTO  carrito (id_usuario,id_producto,cantidad)  VALUES(:id_usuario,:id_producto,:cantidad) ');
		$this->db->bind(':id_usuario', $datos['idusuario']);
        $this->db->bind(':id_producto', $datos['datos']->producto);
		 $this->db->bind(':cantidad', $datos['datos']->cantidad);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
	}
	
	 
	
	 public function deleteCartProduct($id)
    {
        
		$this->db->query('DELETE from productos WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
       if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
	
	
   
  
}