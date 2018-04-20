<?php
class ArchivoModel
{
    protected $db;
 
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }
 
    public function crearTabla($array)
    {

        
        $nombreTabla= "valvulas";
        $columnas = $array[0];
        $string = "";

        foreach ($columnas as $value) {
                $string .= ", " .$value." VARCHAR(30) NOT NULL ";
            }        
        
        if ($this->existeTabla($nombreTabla)) 
        {
            $this->borrarTabla($nombreTabla);  
            
        } 

        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('CREATE TABLE ' .$nombreTabla. ' (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY' .$string. '
        ) ENGINE = InnoDB');
        
        //Ejecutamos el query, si se realiza la tabla no existe
        if ($consulta->execute()) {
             $this->guardarlog('Crea la tabla '.$nombreTabla.' en la base de datos');
             header("Location: index.php?controlador=Menu&accion=mostrar");
        } else {
        
        print_r($consulta->errorInfo());
        }
    }

    public function existeTabla($nombre){

        $query = $this->db->prepare('Show tables like "'.$nombre. '"');        
        $query->execute();
        $cantidad  = $query->rowCount();
        echo $cantidad;

        if ($cantidad > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function borrarTabla($nombre){
        $query = $this->db->prepare('DROP TABLE IF EXISTS '.$nombre.'');        
        $query->execute();
    }

    public function guardarlog($accion){

        date_default_timezone_set("America/Bogota"); 
        $fechareg  = date("Y-m-d H:i:s");        
        $query = $this->db->prepare("INSERT INTO loghistory ( accion , fecha) VALUES ( '$accion' , '$fechareg' )");  
        $query->execute();
    }

}
?>