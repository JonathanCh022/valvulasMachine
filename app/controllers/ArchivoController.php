<?php 

class ArchivoController
{
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
 
    public function cargar()
    {                
        //Incluye el modelo que corresponde
        require $_SERVER['DOCUMENT_ROOT'].'/ProjectoMaquinas/app/models/ArchivoModel.php';
 
        //Creamos una instancia de nuestro "modelo"
        $infoValvulas = new ArchivoModel();

        if (isset($_FILES['archivo']['type'])) { 

            if ($_FILES['archivo']['type']  =="text/plain" || $_FILES['archivo']['type']  =="application/vnd.ms-excel" || $_FILES['archivo']['type']  =="text/x-csv") {

            $informacion = $this->validar( $_FILES['archivo']['tmp_name'] );

            $infoValvulas->crearTabla($informacion);            

            }else{
                $mensaje = "Archivo subido no valido, recuerda solo se recibe extension .csv";
                echo $mensaje;
            }
        }

        //Finalmente presentamos nuestra plantilla
        $this->view->show("ArchivoView.php",'');         
    } 

     public function validar($filename){
        
                
                $handle = fopen($filename, "r");
                $filas = array(); 
                $datos = array();

                $a= 0;
                while (($data = fgetcsv($handle, 0, ",")) !== FALSE) // Lectura de los registros del CSV
                {
                    
                    foreach($data as $row) {
                        $datos =  explode(";", $row);
                       
                        $filas[] = $datos; 
                    }

                }
                return $filas;     

     }
}

?>
