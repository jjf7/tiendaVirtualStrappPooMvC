<?php
class usuario
{
    private $db;
    public function __construct()
    {
        $this->db = new Base;
    }
    public function getUsuario($email,$perfil)
    {
        $this->db->query('SELECT * FROM usuarios WHERE correo = :email AND perfil = :perfil');
        $this->db->bind(':email', $email);
		$this->db->bind(':perfil', $perfil);
        return $this->db->register();
    }
	
   public function getUsuarioAdm($email,$perfil)
    {
		
        $this->db->query('SELECT * FROM usuarios WHERE correo = :email AND perfil = :perfil');
        $this->db->bind(':email', $email);
		$this->db->bind(':perfil', $perfil);
        return $this->db->register();
    }
   
    public function verificarContrasena($datosUsuario , $contrasena)
    {
            if (password_verify($contrasena , $datosUsuario->contrasena)) {
                return true;
            } else {
                return false;
            }
    }
    public function verificarUsuario($datosUsuario)
    {
        $this->db->query('SELECT usuario FROM usuarios WHERE usuario = :user');
        $this->db->bind(':user', $datosUsuario['usuario']);
        $this->db->execute();
        if ($this->db->rowCount()) {
            return false;
        } else {
            return true;
        }
    }
    public function register($datosUsuario)
    {
        $this->db->query('INSERT INTO usuarios ( correo , usuario , contrasena) VALUES ( :correo , :usuario , :contrasena)');
       
        $this->db->bind(':correo', $datosUsuario['email']);
        $this->db->bind(':usuario', $datosUsuario['usuario']);
        $this->db->bind(':contrasena', $datosUsuario['contrasena']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
   
   
  
}