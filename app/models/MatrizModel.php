<?php

class MatrizModel
{

    protected $db;
 
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    } 

    public function calcular_MTFB(){

    $fallas_inspeccion_2014 = array();
    $int_inspeccion = array();
    $tiempo_medio_fallas = array();
    $indicador_tiempo_medio_fallas = array();

    $query = $this->db->prepare('SELECT TOTAL_FALLAS_INSPECCION_2014 ,Intervalo_de_inspeccion_anos_Tinsp  FROM valvulas ');        
	$query->execute();
	

	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{
		$fallas_inspeccion_2014[] = $row['TOTAL_FALLAS_INSPECCION_2014']; 
		$int_inspeccion[] = $row['Intervalo_de_inspeccion_anos_Tinsp']; 
		}

		$i = 0;
		$length = count($fallas_inspeccion_2014);
		for($i;$i<$length;$i++) {
		    

		    if ($int_inspeccion[$i] > 5) {
		    	$tiempo_medio_fallas[] = (int)($fallas_inspeccion_2014[$i])/ 5;
		    }else if ($int_inspeccion[$i] <= 5 && $int_inspeccion[$i] >= 1  ) {
		    	$tiempo_medio_fallas[] =  (int)($fallas_inspeccion_2014[$i] )/ (int) $int_inspeccion[$i];
		    }else {
		    	$tiempo_medio_fallas[] = 0;
		    }
		}		

		foreach ($tiempo_medio_fallas as $value) {
			
			if ($value > 2) {
				$indicador_tiempo_medio_fallas[] = 5;
			}else if ($value < 2 && $value >= 1) {
				$indicador_tiempo_medio_fallas[] = 4;
			}else if ($value < 1 && $value >= 0.05) {
				$indicador_tiempo_medio_fallas[] = 3;
			}else if ($value <  0.05) {
				$indicador_tiempo_medio_fallas[] = 1;
			}
		}

		return $indicador_tiempo_medio_fallas;
    } 

    public function calcular_indicador_temperatura(){

    	$normal_temp = array();
    	$indicador_temperatura = array();

    	$query = $this->db->prepare('SELECT Normal_Tem FROM valvulas ');        
		$query->execute();

		while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{
		$normal_temp[] = $row['Normal_Tem']; 		
		}		

		foreach ($normal_temp as $value) {
			if ($value >= -20 && $value <= 200) {
				$indicador_temperatura[] = 1;
			}else if ( ($value >= -40 && $value <= -20) || ($value > 200 && $value <= 400) ){
				$indicador_temperatura[] = 2;
			}else if ($value < -40 || $value > 400) {
				$indicador_temperatura[] = 3;
			}
		}

		return $indicador_temperatura;
    }


    public function calcular_corrosividad_agresividad(){

		$line_service = array();
    	$corrosividad_agresividad_fluido = array();   	

    	$query = $this->db->prepare('SELECT LINE_SERVICE_Fluid FROM valvulas ');        
		$query->execute();

		while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{
		$line_service[] = $row['LINE_SERVICE_Fluid']; 		
		}			

		foreach ($line_service as $value) {
			
			switch (trim($value)) {
			    case "NATURALGAS":
			        $corrosividad_agresividad_fluido[] = 2;
			        break;
			    case "CRUDEOIL":
			        $corrosividad_agresividad_fluido[] = 3;
			        break;
			    case "SOURGAS":
			        $corrosividad_agresividad_fluido[] = 4;
			        break;
			    case "AIR":
			        $corrosividad_agresividad_fluido[] = 1;
			        break;
			    case "CHEMINYECT":
			        $corrosividad_agresividad_fluido[] = 2;
			        break;
			    case "CRUDE/NATGAS":
			        $corrosividad_agresividad_fluido[] = 4;
			        break;
			    case "CRUDE/WATER/NATGAS":
			        $corrosividad_agresividad_fluido[] = 4;
			        break;
			    case "DIESEL":
			        $corrosividad_agresividad_fluido[] = 2;
			        break;
			    case "ESPUMACONTRAINCENDIO":
			        $corrosividad_agresividad_fluido[] = 4;
			        break;
			     case "FUELGAS":
			        $corrosividad_agresividad_fluido[] = 1;
			        break;
			    case "GLYCOL":
			        $corrosividad_agresividad_fluido[] = 4;
			        break;
			    case "METHANOL":
			        $corrosividad_agresividad_fluido[] = 1;
			        break;
			    case "NATURALGASWET":
			        $corrosividad_agresividad_fluido[] = 5;
			        break;
			    case "NATURALGASSWEET":
			        $corrosividad_agresividad_fluido[] = 3;
			        break;
			    case "NATURALGASBITTER":
			        $corrosividad_agresividad_fluido[] = 1;
			        break;
			    case "NITROGEN":
			        $corrosividad_agresividad_fluido[] = 1;
			        break;
			    case "OIL/WATER":
			        $corrosividad_agresividad_fluido[] = 4;
			        break;
			    case "PRODUCEDWATER":
			        $corrosividad_agresividad_fluido[] = 4;
			        break;
			    case "WATER":
			        $corrosividad_agresividad_fluido[] = 3;
			        break;
			    case "GAS":
			        $corrosividad_agresividad_fluido[] = 1;
			        break;
			    case "GASINJECTION":
			        $corrosividad_agresividad_fluido[] = 1;
			        break;
			    case "LIQNG":
			        $corrosividad_agresividad_fluido[] = 1;
			        break;
				}
		}

		return $corrosividad_agresividad_fluido;
    }

public function calcular_PW_FactorForma_Vidacaracteristica($ITF , $IT , $CAF){

		$severidad_servicio = array();
		$tipo_equipamento = array();
		$factor_forma = array();
    	$vida_caracteristica = array();

		$i = 0;
		$length = count($CAF);		

		for($i;$i<$length;$i++) {
		    $valor_temp = $ITF[$i] + $IT[$i] + $CAF[$i];

		    
		    if ($valor_temp < 5) {
		    	$severidad_servicio[] = "LEVE";
		   	}else if ($valor_temp < 7 && $valor_temp >= 5) {
		   		$severidad_servicio[] = "MODERADO";		   		
		   	}else if ($valor_temp >= 7) {
		   		$severidad_servicio[] = "SEVERO";	
		   	}		     
		}	


		$query = $this->db->prepare('SELECT EQUIPMENT_TYPE FROM valvulas ');        
		$query->execute();

		while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{
		$tipo_equipamento[] = $row['EQUIPMENT_TYPE']; 		
		}	

		echo count($severidad_servicio);	
		echo count($tipo_equipamento);	

}


  
      

}
?>