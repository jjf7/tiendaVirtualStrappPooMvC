<?php

class Controller
{
	public function model($model)
	{
		require_once '../src/models/'.$model.'.php';
		
		return new $model;
	}
	
	
	public function view($view, $params = [])
	{
		if(file_exists('../src/views/' .$view.'.php'))
		{
			require '../src/views/' .$view.'.php';
		}
		else
		{
			echo "the view dose not exists !!";
		}
	}
}

?>