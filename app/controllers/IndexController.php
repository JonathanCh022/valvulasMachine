<?php 

class IndexController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
    public function index()
    {
        //Incluye el modelo que corresponde
        require $_SERVER['DOCUMENT_ROOT'].'/ProjectoMaquinas/app/models/IndexModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $usuario = new IndexModel();

        //Le pedimos al modelo todos los items
        $listado = $usuario->listadoTotal();
        
 
        //Pasamos a la vista toda la información que se desea representar
        $data['listado'] = $listado ;


 
        //Finalmente presentamos nuestra plantilla
        $this->view->show("InicioSesionView.php", $data);
    }
 
    public function agregar()
    {
        echo 'Aquí incluiremos nuestro formulario para insertar items';
    }
}

?>