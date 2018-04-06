<?php

Class BaseController{

	static function main()
	{

		require 'libs/Setting.php'; //de configuracion
        require 'libs/SPDO.php'; //PDO con singleton
        require 'libs/View.php'; //Mini motor de plantillas
 
        require 'config.php'; //Archivo con configuraciones.
		//Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
        if(! empty($_GET['controlador']))
	        {
	        	$controllerName = $_GET['controlador'] . 'Controller';
	        }
	    else{

	    	$controllerName = "IndexController";
	    }


	    if(! empty($_GET['accion']))
	        {
	        	$actionName = $_GET['accion'];
	        }
	    else{
	    	
	    	$actionName = "index";
	    }

	     $controllerPath = $config->get('controllersFolder') . $controllerName . '.php';	

	//Incluimos el fichero que contiene nuestra clase controladora solicitada
        if(is_file($controllerPath))
            {
            	require $controllerPath;
            }  
        else
        	{
        		die('El controlador no existe - 404 not found');
        	}
              
        
 
        //Si no existe la clase que buscamos y su acción, mostramos un error 404
        if (is_callable(array($controllerName, $actionName)) == false)
        {
            trigger_error ($controllerName . '->' . $actionName . '` no existe', E_USER_NOTICE);
            return false;
        }

        //Si todo esta bien, creamos una instancia del controlador y llamamos a la acción
        $controller = new $controllerName();
        $controller->$actionName();

    }

}

?>