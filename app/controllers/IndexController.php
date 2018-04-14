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

        //Miramos si se ha logeado , si no es asi mostramos el index normal
        $this->validar($listado);
 
        
    }
 
    public function validar($datos)
    {
        $logeado = 1;

        if ( isset($_POST['username'])  && isset($_POST['password'])) {

            while($item = $datos->fetch())
                {
                    if ($item['username'] == $_POST['username'] && $item['pass'] == ($_POST['password']) ){
                        $logeado = 0;
                    }                    
                }

            if ($logeado == 0) {
                header("Location: index.php?controlador=Archivo&accion=cargar");
            }else{
                $this->view->show("InicioSesionView.php", $datos);
            }
            
        }else{
            //Finalmente presentamos nuestra plantilla
        $this->view->show("InicioSesionView.php", $datos);
        }
    }
}

?>