<?php 

/**
* 
*/
class HistorialController 
{
	
	function __construct()
	{
		//Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
	}


	public function mostrar(){

		//Incluye el modelo que corresponde
        require $_SERVER['DOCUMENT_ROOT'].'/ProjectoMaquinas/app/models/HistorialModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $historialInfo = new HistorialModel();

        $informacion = $historialInfo->consultarLog();

        $data['informacion'] = $informacion ;

		//Finalmente presentamos nuestra plantilla
        $this->view->show("HistorialView.php", $data );

	}
}

?>