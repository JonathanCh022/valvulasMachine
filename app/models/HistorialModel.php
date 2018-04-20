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
}

?>