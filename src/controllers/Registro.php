<?php

class Registro extends Controller
{
	public function __construct()
	{
		 $this->usuario = $this->model('usuario');
	}
	
	
	public function index(){
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosRegistro = [
                
                'email' => trim($_POST['email']),
                'usuario' => trim($_POST['usuario']),
                'contrasena' => password_hash(trim($_POST['password']), PASSWORD_DEFAULT)
            ];
            if ($this->usuario->verificarUsuario($datosRegistro)) {
                if ($this->usuario->register($datosRegistro)) {
                    $_SESSION['loginComplete'] = 'Tu registro se ha completado satisfactoriamente, ahora puedes ingresar';
                    redirection('/');
                } else { }
            } else {
                $_SESSION['usuarioError'] = 'El usuario no esta disponible, intenta con otro usuario';
                $this->view('registro');
            }
        } else {
            if (isset($_SESSION['logueado'])) {
                redirection('/');
            } else {
                $this->view('registro');
            }
        }
	}
}

?>