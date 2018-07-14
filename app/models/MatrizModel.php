<?php

class MatrizModel
{

    protected $db;
 
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }            
  
      

}
?>