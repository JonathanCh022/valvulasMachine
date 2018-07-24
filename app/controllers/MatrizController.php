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


         $a = $matrizmod->calcular_MTFB();
         $b = $matrizmod->calcular_indicador_temperatura();
         $c = $matrizmod->calcular_corrosividad_agresividad();


         $matrizmod->calcular_PW_FactorForma_Vidacaracteristica($a , $b, $c);
    

        //Finalmente presentamos nuestra plantilla
        $this->view->show("MatrizView.php",'');    

        


        

        
    }
}

?>