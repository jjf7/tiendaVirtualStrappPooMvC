<?php session_start();
          include_once 'config/Config.php';
		  include_once 'helpers/helper.php';
		  spl_autoload_register(function($nameClass){
			  require_once 'libs/'.$nameClass.'.php';
		  })

?>