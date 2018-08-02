<?php 

/**
* 
*/
class HistorialModel
{
	
	protected $db;
 
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    public function consultarLog(){
    	$query = $this->db->prepare('SELECT accion , fecha FROM loghistory ');        
        $query->execute();

        return $query;
    }

    public function consultarValvula(){

        $query = $this->db->prepare('SELECT ITEM FROM valvulas ');        
        $query->execute();

        return $query;
    }

     public function guardarlog($valvula , $accion){

        $string = "Numero valvula: ". $valvula. " | ".$accion;
        date_default_timezone_set("America/Bogota"); 
        $fechareg  = date("Y-m-d H:i:s");        
        $query = $this->db->prepare("INSERT INTO loghistory ( accion , fecha) VALUES ( '$string' , '$fechareg' )");  
        $query->execute();
    }

}

?>