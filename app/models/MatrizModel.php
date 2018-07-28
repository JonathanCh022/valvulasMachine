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

public function calcular_PW_FactorForma_Vidacaracteristica(){

		$severidad_servicio = array();
		$tipo_equipamento = array();
		$factor_forma = array();
    	$vida_caracteristica = array();

    	$ITF = $this->calcular_MTFB(); 
    	$IT  = $this->calcular_indicador_temperatura(); 
    	$CAF = $this->calcular_corrosividad_agresividad();

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

		$i = 0;
		$length = count($severidad_servicio);

				

		for($i;$i<$length;$i++) {
		    
		    if ( ($severidad_servicio[$i] == "LEVE" &&  trim($tipo_equipamento[$i]) == "HandValve") || ($severidad_servicio[$i] == "LEVE" &&  trim($tipo_equipamento[$i]) == "CheckValve") || ($severidad_servicio[$i] == "LEVE" && trim($tipo_equipamento[$i]) == "ActuatedValve") || ($severidad_servicio[$i] == "LEVE" && trim($tipo_equipamento[$i]) == "ControlValve" )) {
		    	$factor_forma[] = 1.5; 
		    	
		    }else if (($severidad_servicio[$i] == "LEVE" &&  trim($tipo_equipamento[$i]) == "SafetyValve") || ($severidad_servicio[$i] == "LEVE" &&  trim($tipo_equipamento[$i]) == "ReliefValve") )
		    {
		    	$factor_forma[] = 1;
		    	
		    }else if ($severidad_servicio[$i] == "MODERADO" ) 
		    {
		    	$factor_forma[] = 1.5;
		    	
		    }else if (($severidad_servicio[$i] == "SEVERO" &&  trim($tipo_equipamento[$i]) == "HandValve") || ($severidad_servicio[$i] == "SEVERO" && trim($tipo_equipamento[$i]) == "CheckValve") || ($severidad_servicio[$i] == "SEVERO" && trim($tipo_equipamento[$i]) == "ActuatedValve") || ($severidad_servicio[$i] == "SEVERO" && trim($tipo_equipamento[$i]) == "ControlValve") ) {
		    	$factor_forma[] = 1.5;
		    	
		    }else if (($severidad_servicio[$i] == "SEVERO" &&  trim($tipo_equipamento[$i]) == "SafetyValve") || ($severidad_servicio[$i] == "SEVERO" && trim($tipo_equipamento[$i]) == "ReliefValve" )) {
		    	$factor_forma[] = 2;
		    	
		    }



		    if (($severidad_servicio[$i] == "LEVE" &&  trim($tipo_equipamento[$i]) == "HandValve") || ($severidad_servicio[$i] == "LEVE" && trim($tipo_equipamento[$i]) == "ActuatedValve") ) {
		    	$vida_caracteristica[] = 70.5;
		    }else if (($severidad_servicio[$i] == "LEVE" &&  trim($tipo_equipamento[$i]) == "CheckValve") || ($severidad_servicio[$i] == "LEVE" && trim($tipo_equipamento[$i]) == "ControlValve") ) {
		    	$vida_caracteristica[] = 33.7;
		    }else if (($severidad_servicio[$i] == "LEVE" &&  trim($tipo_equipamento[$i]) == "SafetyValve") || ($severidad_servicio[$i] == "LEVE" && trim($tipo_equipamento[$i]) == "ReliefValve")) {
		    	$vida_caracteristica[] = 6;
		    }else if (($severidad_servicio[$i] == "MODERADO" &&  trim($tipo_equipamento[$i]) == "HandValve") || ($severidad_servicio[$i] == "MODERADO" && trim($tipo_equipamento[$i]) == "ActuatedValve")) {
		    	$vida_caracteristica[] = 45.9;
		    }else if (($severidad_servicio[$i] == "MODERADO" &&  trim($tipo_equipamento[$i]) == "CheckValve") || ($severidad_servicio[$i] == "MODERADO" && trim($tipo_equipamento[$i]) == "ControlValve") ) {
		    	$vida_caracteristica[] = 28;
		    }else if (($severidad_servicio[$i] == "MODERADO" &&  trim($tipo_equipamento[$i]) == "SafetyValve") || ($severidad_servicio[$i] == "MODERADO" && trim($tipo_equipamento[$i]) == "ReliefValve")) {
		    	$vida_caracteristica[] = 4;
		    }else if (($severidad_servicio[$i] == "SEVERO" &&  trim($tipo_equipamento[$i]) == "HandValve") || ($severidad_servicio[$i] == "SEVERO" && trim($tipo_equipamento[$i]) == "ActuatedValve")) {
		    	$vida_caracteristica[] = 27.6;
		    }else if (($severidad_servicio[$i] == "SEVERO" &&  trim($tipo_equipamento[$i]) == "CheckValve") || ($severidad_servicio[$i] == "SEVERO" && trim($tipo_equipamento[$i]) == "ControlValve") ) {
		    	$vida_caracteristica[] = 20;
		    }else if (($severidad_servicio[$i] == "SEVERO" &&  trim($tipo_equipamento[$i]) == "SafetyValve") || ($severidad_servicio[$i] == "SEVERO" && trim($tipo_equipamento[$i]) == "ReliefValve")) {
		    	$vida_caracteristica[] = 3;
		    }

		}		

		return array($factor_forma, $vida_caracteristica);	

}

public function calcular_factor_tipo_aplicacion(){

	$tipo_aplicacion = array();
	$factor_tipo_aplicacion = array();

	$query = $this->db->prepare('SELECT APPLICATION_TYPE FROM valvulas ');        
	$query->execute();

	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{
			$tipo_aplicacion[] = $row['APPLICATION_TYPE']; 		
		}		

		foreach ($tipo_aplicacion as $value) {

			if ( trim($value) == "Block" || trim($value) == "block"  || trim($value) == "BLOCK"  ||trim($value) == "PurgeorBleed"  ){
				$factor_tipo_aplicacion[] = 1;
			}else if (trim($value) == "Control" || trim($value) == "Retention" ) {
				$factor_tipo_aplicacion[] = 1.3;
			}else if (trim($value) == "SafetyandRelief") {
				$factor_tipo_aplicacion[] = 2;
			}
		}
		
		return $factor_tipo_aplicacion;
}

public function calcular_factor_overhaul(){

	
	$Prueba_operativa_de_lazo_de_control = array();
	$Overhaul_de_actuador = array();
	$Overhaul_de_instrumentacion_y_control = array();
	$Overhaul_de_cuerpo = array();
	$Mantenimiento_preventivo = array();
	$Documentacion = array();
	$factor_Overhaul = array();

	$query = $this->db->prepare('SELECT  Prueba_operativa_de_lazo_de_control, Overhaul_de_actuador , Overhaul_de_instrumentacion_y_control, Overhaul_de_cuerpo, Mantenimiento_preventivo ,Documentacion_registro_adecuado_y_detallado_de_las_actividades  FROM valvulas ');        
	$query->execute();


	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{
			
			$Prueba_operativa_de_lazo_de_control[] = $row['Prueba_operativa_de_lazo_de_control']; 	
			$Overhaul_de_actuador[] = $row['Overhaul_de_actuador']; 	
			$Overhaul_de_instrumentacion_y_control[] = $row['Overhaul_de_instrumentacion_y_control']; 	
			$Overhaul_de_cuerpo[] = $row['Overhaul_de_cuerpo']; 	
			$Mantenimiento_preventivo[] = $row['Mantenimiento_preventivo']; 
			$Documentacion[] = $row['Documentacion_registro_adecuado_y_detallado_de_las_actividades']; 			
		}		
		

		$i = 0;
		$length = count($Prueba_operativa_de_lazo_de_control);				

		for($i;$i<$length;$i++) {

			if (trim($Documentacion[$i]) == "NO" ) {
				$factor_Overhaul[] = 0;
			}else{

				if (trim($Prueba_operativa_de_lazo_de_control[$i]) == "SI") {
					$v1 = 0.1;
				}else {
					$v1 = 0;
				}

				if (trim($Overhaul_de_actuador[$i]) == "SI") {
					$v2 = 0.3;
				}else {
					$v2 = 0;
				}

				if (trim($Overhaul_de_instrumentacion_y_control[$i]) == "SI") {
					$v3 = 0.2;
				}else {
					$v3 = 0;
				}

				if (trim($Overhaul_de_cuerpo[$i]) == "SI") {
					$v4 = 0.3;
				}else {
					$v4 = 0;
				}

				if (trim($Mantenimiento_preventivo[$i]) == "SI") {
					$v5 = 0.1;
				}else {
					$v5 = 0;
				}


				$factor_Overhaul[] = $v1 + $v2 + $v3 + $v4 + $v5;
			}
		}

		 return $factor_Overhaul;
}


public function calcular_factor_tiempo_overhaul(){

	$Overhaul_de_actuador = array();
	$Overhaul_de_cuerpo = array();
	$manufacturing_year = array();
	$año_ultimo_overhaul = array();
	$factor_tiempo_overhaul = array();

	$query = $this->db->prepare('SELECT  Overhaul_de_actuador ,  Overhaul_de_cuerpo , MANUFACTURING_YEAR , ANO_ULTIMO_OVERHAUL_CUERPO_Y_ACTUADOR  FROM valvulas ');        
	$query->execute();


	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{
			
			$Overhaul_de_actuador[] = $row['Overhaul_de_actuador'];				
			$Overhaul_de_cuerpo[] = $row['Overhaul_de_cuerpo'];			
			$manufacturing_year[] = $row['MANUFACTURING_YEAR'];
			$año_ultimo_overhaul[] = $row['ANO_ULTIMO_OVERHAUL_CUERPO_Y_ACTUADOR'];

		}

		$i = 0;
		$length = count($Overhaul_de_actuador);				

		for($i;$i<$length;$i++) {

			if (trim($año_ultimo_overhaul[$i]) == "NOPRACTICADO") {
				$año_ultimo = $manufacturing_year[$i];
			}else{
				$año_ultimo = trim($año_ultimo_overhaul[$i]);
			}

			if (trim($Overhaul_de_actuador[$i]) == "SI" &&  trim($Overhaul_de_cuerpo[$i]) == "SI" ) {
				$tiempo_transcurrido = abs(2014 - $año_ultimo);
			}else {
				$tiempo_transcurrido = 2014 - (int)($manufacturing_year[$i]); 
			}

			if ($tiempo_transcurrido < 5) {
				$factor_tiempo_overhaul[] = 1;
			}else if ($tiempo_transcurrido < 8 && $tiempo_transcurrido >= 5) {
				$factor_tiempo_overhaul[] = 2;
			}else if ($tiempo_transcurrido < 10 && $tiempo_transcurrido >= 8) {
				$factor_tiempo_overhaul[] = 3;
			}else if ($tiempo_transcurrido >= 10) {
				$factor_tiempo_overhaul[] = 4;
			}
		}

		return $factor_tiempo_overhaul;
}


public function calcular_radio_operacion(){

	$set_presure = array();
	$mop = array();
	$radio_operation = array();

	$query = $this->db->prepare('SELECT  NORMAL_OPERATION_PRESURE_SET_PRESURE_PSI ,  MOP_MAX_OPERATING_PRESSURE_PSI   FROM valvulas ');        
	$query->execute();


	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{			
			$set_presure[] = $row['NORMAL_OPERATION_PRESURE_SET_PRESURE_PSI'];				
			$mop[] = $row['MOP_MAX_OPERATING_PRESSURE_PSI'];			

		}		

		$i = 0;
		$length = count($set_presure);				

		for($i;$i<$length;$i++) {
			$radio_operation[] =  (int)($set_presure[$i]) / (int)($mop[$i]); 
		}

		return $radio_operation;

}

public function calcular_factor_ajuste_medio_ambiente(){

	$IT  = $this->calcular_indicador_temperatura();
	$RO  = $this->calcular_radio_operacion();
	$tuberia_vibraciones = array();
	$factor_ajuste_medio_ambiente = array();

	$query = $this->db->prepare('SELECT  Valvula_en_tuberia_vibraciones  FROM valvulas ');        
	$query->execute();

	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{			
			$tuberia_vibraciones[] = $row['Valvula_en_tuberia_vibraciones'];
		}

		$i = 0;
		$length = count($IT);				

		for($i;$i<$length;$i++) {

			if ($IT[$i] >= 2) {
				$v1 = 0;
			}else {
				$v1 = 0.4;
			}

			if ($RO[$i] >= 0.8) {
				$v2 = 0;
			}else{
				$v2 = 0.5;
			}

			if (trim($tuberia_vibraciones[$i]) == "SI"  ) {
				$v3 = 0.1;
			}else {
				$v3 = 0.3;
			}

			$factor_ajuste_medio_ambiente[] = $v1 + $v2 + $v3;
		}

		return $factor_ajuste_medio_ambiente;


}

public function calcular_PW_vida_caracteristica_modificada(){

	list($a, $vida_caracteristica) = $this->calcular_PW_FactorForma_Vidacaracteristica() ;
	$factor_tipo_aplicacion = $this->calcular_factor_tipo_aplicacion();
	$POFOD = $this-> calcular_factor_ajuste_medio_ambiente();
	$PW_VCModificada = array();

		$i = 0;
		$length = count($vida_caracteristica);				

		for($i;$i<$length;$i++) {
			$PW_VCModificada[] = $vida_caracteristica[$i] * $factor_tipo_aplicacion[$i] * $POFOD[$i];
		}

	return $PW_VCModificada;
}

public function calcular_factor_overhaul_API(){

	$factor_overhaul_api = array();

	$factor_Overhaul = $this->calcular_factor_overhaul();

	foreach ($factor_Overhaul as $value) {
		$factor_overhaul_api[] =  1 - $value;
	}

	return $factor_overhaul_api;
}

public function calcular_probalidad_condicional_falla_demanda(){

	list($factor_forma, $vida_caracteristica) = $this->calcular_PW_FactorForma_Vidacaracteristica() ;
	$parametro_WVCModificada =  $this->calcular_PW_vida_caracteristica_modificada();
	$int_inspeccion = array();	
	$factor_overhaul_api = $this-> calcular_factor_overhaul_API();
	$prob_previa_falla_dem = array();
	$prob_condicional_falla_dem = array();
	$prob_previa_falla_dem_API= array();
	$prob_condicional_falla_dem_Pasainspec  = array();
	$prob_condicional_falla_dem_NoPasainspec  = array();
	$prob_ponderada_falla_dem_Pasainspec  = array();
	

	$query = $this->db->prepare('SELECT Intervalo_de_inspeccion_anos_Tinsp  FROM valvulas ');        
	$query->execute();

	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{			
			$int_inspeccion[] = $row['Intervalo_de_inspeccion_anos_Tinsp'];
		}

		$i = 0;
		$length = count($parametro_WVCModificada);				

		for($i;$i<$length;$i++) {
			$calculo1 =  1 - exp( ( -1 * ( (int)($int_inspeccion[$i])/ $parametro_WVCModificada[$i]  )**  $factor_forma[$i] ) ) ;
			$prob_previa_falla_dem[] = $calculo1 ; 
			

			if ($factor_overhaul_api[$i] == 0) {
				$prob_condicional_falla_dem[] = $calculo1 * 0.7;
			}else {
				$prob_condicional_falla_dem[] = $calculo1 * $factor_overhaul_api[$i];
			}

			$calculo2 = $factor_overhaul_api[$i] - $calculo1;
			$prob_previa_falla_dem_API[] = $calculo2;

			$calculo3 = $calculo2 * (1 - 0.9);
			$prob_condicional_falla_dem_Pasainspec[] = $calculo3;

			$calculo4 = (0.95 * $calculo1) + ((1 - 0.9) * $calculo2);
			$prob_condicional_falla_dem_NoPasainspec[] = $calculo4;

			$calculo5 = $calculo1 - (0.2 * $calculo1 * (((int)($int_inspeccion[$i])/ $parametro_WVCModificada[$i] ))) + ( 0.2 * $calculo3 * (((int)($int_inspeccion[$i])/ $parametro_WVCModificada[$i] )));
			$prob_ponderada_falla_dem_Pasainspec[] = $calculo5;




		}		

		return array($prob_condicional_falla_dem, $prob_ponderada_falla_dem_Pasainspec ,$prob_condicional_falla_dem_NoPasainspec , $int_inspeccion);	

}public function calcular_probabilidad_falla_p(){

	list( $prob_ponderada_falla_dem , $prob_ponderada_falla_dem_Pasainspec, $prob_ponderada_falla_dem_NoPasainspec , $int_inspeccion) = $this->calcular_probalidad_condicional_falla_demanda();
	list($factor_forma, $vida_caracteristica) = $this->calcular_PW_FactorForma_Vidacaracteristica();

	$temp = array();
	$valvula_no_abre_cierra = array();
	$valvula_abre_cierra_descont = array();
	$valvula_abre_cierra_parcialmente= array();
	$factor_tiempo_overhaul = $this->calcular_factor_tiempo_overhaul();
	$parametro_weibull_vida_caracteristica_modificada = array();
	$parametro_weibull_vida_caracteristica_modificada_NoPasa = array();
	$parametro_weibull_vida_caracteristica_modificada_Pasa = array();
	$probabilidad_falla_p = array();
	$probabilidad_falla_p_NoPasa = array();
	$probabilidad_falla_p_Pasa = array();

	$query = $this->db->prepare('SELECT VALVULA_NO_ABRE_NO_CIERRA_VALVULA_ESTA_PEGADA_NANC, VALVULA_ABRE_O_CIERRA_DESCONTRLADAMENTE_ACD, VALVULA_ABRE_O_CIERRA_PARCIALMENTE_ACP  FROM valvulas ');        
	$query->execute();

	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{			
			$valvula_no_abre_cierra[] = $row['VALVULA_NO_ABRE_NO_CIERRA_VALVULA_ESTA_PEGADA_NANC'];
			$valvula_abre_cierra_descont[] = $row['VALVULA_ABRE_O_CIERRA_DESCONTRLADAMENTE_ACD'];
			$valvula_abre_cierra_parcialmente[] = $row['VALVULA_ABRE_O_CIERRA_PARCIALMENTE_ACP'];
		}


	$i = 0;
	$length = count($prob_ponderada_falla_dem);				

	for($i;$i<$length;$i++) {

		$parametro_weibull_vida_caracteristica_modificada[] = (int)($int_inspeccion[$i]) / ( (-1 * log( abs( 1 - $prob_ponderada_falla_dem[$i]  ))) ** ( 1 / $factor_forma[$i]) );
		$temp1= (int)($int_inspeccion[$i]) / ( (-1 * log( abs( 1 - $prob_ponderada_falla_dem_NoPasainspec[$i]  ))) ** ( 1 / $factor_forma[$i]) );
		$parametro_weibull_vida_caracteristica_modificada_NoPasa[] = $temp1;
		$temp2= (int)($int_inspeccion[$i]) / ( (-1 * log( abs( 1 - $prob_ponderada_falla_dem_Pasainspec[$i]  ))) ** ( 1 / $factor_forma[$i]) );
		$parametro_weibull_vida_caracteristica_modificada_Pasa[] = $temp2;

		$temp[] = (int)$valvula_no_abre_cierra[$i] ;
		$temp[] = (int)$valvula_abre_cierra_descont[$i];  
		$temp[] = (int)$valvula_abre_cierra_parcialmente[$i]; 

		$max = max($temp) + 1;   

		if ($max == 0) {
			$probabilidad_falla_p[] = $prob_ponderada_falla_dem[$i]  ;
		}else{
			$probabilidad_falla_p[] = $prob_ponderada_falla_dem[$i] * $max * $factor_tiempo_overhaul[$i];
		}


		$probabilidad_falla_p_NoPasa[] = 1 - (exp(-(((int)($int_inspeccion[$i]) / $temp1 )** $factor_forma[$i]))); 

		$probabilidad_falla_p_Pasa[] =  1 - (exp(-(((int)($int_inspeccion[$i]) / $temp2 )** $factor_forma[$i])));


	}

	return array($probabilidad_falla_p, $probabilidad_falla_p_NoPasa ,$probabilidad_falla_p_Pasa );
}

public function calcular_factor_material(){

	$body_abreviatura = array();
	$factor_material = array();

	$query = $this->db->prepare('SELECT Body_Abreviatura FROM valvulas ');        
	$query->execute();


	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{			
			$valvula_no_abre_cierra[] = $row['Body_Abreviatura'];			
		}

		foreach ($valvula_no_abre_cierra as  $value) {

			switch (trim($value)) {
			    case "SS":
			        $factor_material[] = 2.5;
			        break;
			    case "CSN":
			        $factor_material[] = 1;
			        break;
			    case "CSA":
			        $factor_material[] = 1.5;
			        break;
			    case "CSL":
			        $factor_material[] = 2;
			        break;
			    case "CSC":
			        $factor_material[] = 3;
			        break;
			    case "SSE":
			        $factor_material[] = 3.5;
			        break;
			    case "SA-216WCB":
			        $factor_material[] = 1;
			        break;
			    case "SA-105-F":
			        $factor_material[] = 1;
			        break;
			    case "Rubber":
			        $factor_material[] = 1;
			        break;
			     case "SA-350LF2MLT":
			        $factor_material[] = 1;
			        break;
			    case "WELD":
			        $factor_material[] = 1;
			        break;
			    case "ChromeAlloy":
			        $factor_material[] = 1;
			        break;
			    case "Alloysteel":
			        $factor_material[] = 1;
			        break;
			    case "SA-212B":
			        $factor_material[] = 1;
			        break;
			    case "SA-171":
			        $factor_material[] = 1;
			        break;
			    case "Fiberglass":
			        $factor_material[] = 1;
			        break;
			    case "Corezyn75":
			        $factor_material[] = 1;
			        break;
			    case "SA-234WPB":
			        $factor_material[] = 1;
			        break;
			    case "SA-182F304L":
			        $factor_material[] = 1;
			        break;
			    case "SA-182F304":
			        $factor_material[] = 1;
			        break;
			    case "SA-18160":
			        $factor_material[] = 1;
			        break;
			    case "SA-18170":
			        $factor_material[] = 1;
			        break;
			    case "SA-105N":
			        $factor_material[] = 1;
			        break;
			    case "SA-2662N":
			        $factor_material[] = 1;
			        break;
			    case "SA-182F316":
			        $factor_material[] = 1;
			        break;
			    case "SA-312F316":
			        $factor_material[] = 1;
			        break;
			    case "SA-182F22":
			        $factor_material[] = 1;
			        break;
			    case "SA-105":
			        $factor_material[] = 1;
			        break;
				}
		}

		return $factor_material;			
}



public function calular_costo_total_holecost(){

	$valve_function_description = array();
	$mop_psi = array();
	$size = array();
	$costo_total_reparo = array();

	$query = $this->db->prepare('SELECT VALVE_FUNCTION_DESCRIPTION , MOP_MAX_OPERATING_PRESSURE_PSI , SIZE_INLET FROM valvulas ');        
	$query->execute();


	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{			
			$valve_function_description[] = $row['VALVE_FUNCTION_DESCRIPTION'];
			$mop_psi[] = $row['MOP_MAX_OPERATING_PRESSURE_PSI'];	
			$size[] = $row['SIZE_INLET'];				
		}
				
	$i = 0;
	$length = count($size);				

	for($i;$i<$length;$i++) {			
		
		switch (trim($valve_function_description[$i])) {

			    case "HV-HandValveBall":
				     if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}
			        break;
			    case "HV-HandValveButterfly":
			        
			        if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "CK-CheckValve":

			        if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "GAV-HandValveGate":

			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}
			        
			        break;
			    case "GLB-HandValveGlobe":

			   		if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}
			        
			        break;
			    case "HVN-HandValveNeedle":

			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}
			        
			        break;
			    case "SDV-ShutDownValve":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1.2 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "SURFACESAFETYVALVE":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1.2 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "EMERGENCYSHUTDOWNVALVE":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1.2 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			     case "DobleBlock&BleedValve":
			        
			     	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "DIVERTVALVESOLENOID":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "FlowControlValve":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 1.1 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1.3 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "PVorPCV-PressureControlValve":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 1.1 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1.3 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "LVorLCV-LevelControlValve":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 1.1 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1.3 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "FLOWSAFETYVALVE(CHECK)":
			        
			        if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "BDV-BlowDownValve":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1.2 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "XXV-EmergencyShutDownValve(ESDV)":
			        
			    	if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1.2 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;
			    case "PL-Plug Valve":
			        
			        if ( $size[$i] < 6 ) {
							$costo_total_reparo [] = 0.7 * (int) $mop_psi[$i] * (int) $size[$i];
						}else{
							$costo_total_reparo [] = 1 * (int) $mop_psi[$i] * (int) $size[$i];
						}

			        break;			    
				}
			
	}

	echo count($costo_total_reparo);
}










  
      

}
?>