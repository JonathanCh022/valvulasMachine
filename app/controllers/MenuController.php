<?php 

/**
* 
*/
class MenuController
{
	
	function __construct()
	{
		
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
	}


	public function mostrar()
	{
		//Finalmente presentamos nuestra plantilla
        $this->view->show("MenuView.php",'');    

	}
}
?>