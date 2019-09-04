<?php
class producto
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }
    
	
   public function getProducts()
    {
        $this->db->query('SELECT * FROM productos ');    
        return $this->db->registers();
    }
	
	public function getProductsWithPhotos()
    {
        $this->db->query('SELECT P.* , PI.imagen FROM `productos` P INNER JOIN productos_imagenes PI ON P.id=PI.id_producto group by P.id');    
        return $this->db->registers();
    }
	
	public function getProductImages($id){
		
		$this->db->query('SELECT * FROM productos_imagenes WHERE id_producto = :id ');
		$this->db->bind(':id', $id);
		$this->db->execute();
		return $this->db->registers();
	}
   
    
    public function getProduct($id)
    {
        $this->db->query('SELECT * FROM productos WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        if ($this->db->rowCount()) {
            return $this->db->registers();
        } else {
            return false;
        }
    }
	
	public function addProductImage($datos){
		
		$this->db->query('INSERT INTO  productos_imagenes (id_producto,imagen)  VALUES(:id,:imagen) ');
		$this->db->bind(':id', $datos['idproducto']);
        $this->db->bind(':imagen', $datos['imagen']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
	}
	
	 public function deleteProductImagen($id)
    {
        
		$this->db->query('DELETE from productos_imagenes WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
       if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
	
	 public function deleteProduct($id)
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
    public function register($producto)
    {
        $this->db->query('INSERT INTO productos ( nombre , descripcion , precio) VALUES ( :nombre , :descripcion , :precio)');
       
        $this->db->bind(':nombre', $producto['nombre']);
        $this->db->bind(':descripcion', $producto['descripcion']);
        $this->db->bind(':precio', $producto['precio']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
	
	public function editarProducto($datos)
   {
       $this->db->query('UPDATE productos SET nombre = :nombre,descripcion = :descripcion,precio = :precio WHERE id = :id');
       $this->db->bind(':nombre' , $datos['nombre']);
	   $this->db->bind(':descripcion' , $datos['descripcion']);
	   $this->db->bind(':precio' , $datos['precio']);
       $this->db->bind(':id' , $datos['id']);
       if ($this->db->execute()) {
           return true;
       } else {
           return false;
       }
   }
    
   
   
  
}