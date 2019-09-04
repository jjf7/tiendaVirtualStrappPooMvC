<?php

class Login extends Controller
{
	public function __construct()
	{
		 $this->usuario = $this->model('usuario');
	}
	
	public function index()
	{
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datosLogin = [
                'email' => trim($_POST['email']),
                'contrasena' => trim($_POST['password'])
            ];
            $datosUsuario = $this->usuario->getUsuario($datosLogin['email'],'1');
            if ($this->usuario->verificarContrasena($datosUsuario, $datosLogin['contrasena'])) {
                $_SESSION['logueado'] = $datosUsuario->id;
                $_SESSION['usuario'] = $datosUsuario->usuario;
                redirection('');
            } else {
                $_SESSION['errorLogin'] = 'El usuario o la contraseña son incorrectos';
                redirection('');
            }
        } else {
            if (isset($_SESSION['logueado'])) {
                redirection('');
            } else {
                $this->view('login');
            }
        }
    }
}

?>