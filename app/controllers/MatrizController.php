<?php 

class MatrizController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
    public function mostrar(){   

    //Incluye el modelo que corresponde
        require $_SERVER['DOCUMENT_ROOT'].'/ProjectoMaquinas/app/models/MatrizModel.php';        

        $matrizmod = new MatrizModel();         

         $matrizmod->calular_costo_total_holecost();
    

        //Finalmente presentamos nuestra plantilla
        $this->view->show("MatrizView.php",'');    

        


        

        
    }
}

?>