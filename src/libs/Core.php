<?php

class Core
{
	private $currentController = 'Home';
	private $currentMethod = 'index';
	private $parameters = [];
	
	
	public function __construct()
	{
		$url = $this->getUrl();
		
		//verificar que existe el controlador
		if(file_exists('../src/controllers/'. ucwords($url[0]) .'.php'))
		{
			$this->currentController= ucwords($url[0]);
			unset($url[0]);
		}
		
		// requiero el controlador
		require_once ('../src/controllers/'.$this->currentController.'.php');
		
		//creo el objeto controlador
		$this->currentController = new $this->currentController;
		
		//verifico si existe un metodo del controlador instanciado
		if(isset($url[1]))
		{
			if(method_exists($this->currentController,$url[1]))
			{
				$this->currentMethod = $url[1];
				unset($url[1]);
			}
		}
		
		if(isset($url[2]))
		{
			if(method_exists($this->currentController,$url[2]))
			{
				$this->currentMethod = $url[2];
				unset($url[2]);
			}
		}
		
		//asigno los parametros al controlador - metodo 
		$this->parameters = $url ? array_values($url) : [];
		//var_dump($this->parameters);
		call_user_func_array([$this->currentController,$this->currentMethod] ,$this->parameters);
		
	}
	
	//verificar la url entrante
	public function getUrl()
	{
		if(isset($_GET["url"]))
		{
			$url = rtrim($_GET["url"] , "/");
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/',$url);
			return $url;
		}
	}
	
	
}

?>