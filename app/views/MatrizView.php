<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" ng-app="listarValvulas">
<head>
    
    <title>Carga de datos Valvulas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css"  />
    
  
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> 
    
     
    

</head>
<body  >
<div class="panel-matriz-page">
  <div class="form-matriz-main">
    <div class="">
      <h2> Confirmacion de parametros </h2>

      
      
    </div>



    <h2>Informacion valvulas</h2>
    
           
      <div  class="box3"  ng-controller="valvulasController"> 
       
        <table class="table table-bordered">
          <thead>
          <tr >
            <td ng-repeat="y in colum"> 
              {{ y }}
            </td>
                
         </tr>   
         </thead>
         <tbody>
          <tr ng-repeat="x in info ">
            <td> {{ x.id }}</td>
            <td> {{ x.ITEM }}</td>
            <td> {{ x.TAG_NUMBER }}</td>
            <td> {{ x.LOCATION }}</td>
            <td> {{ x.PID_No }}</td>
            <td> {{ x.SYSTEM }}</td>
            <td> {{ x.VALVE_TYPE }}</td>
            <td> {{ x.VALVE_SUBTYPE }}</td>
            <td> {{ x.LINE_SERVICE_Fluid }}</td>
            <td> {{ x.STATUS }}</td>
            <td> {{ x.DATA_SHEET }}</td>
            <td> {{ x.LOCATION_TECHNICAL_EQUIPMENT }}</td>
            <td> {{ x.VALVE_FUNCTION_DESCRIPTION }}</td>
            <td> {{ x.APPLICATION_TYPE }}</td>
            <td> {{ x.IDENTIFY }}</td>
            <td> {{ x.EQUIPMENT_TYPE }}</td>
            <td> {{ x.EQUIPO_PADRE }}</td>
            <td> {{ x.SIZE_INLET }}</td>
            <td> {{ x.RATING_INLET }}</td>
            <td> {{ x.CONNECTIONS_INLET }}</td>
            <td> {{ x.GASKET_TYPE }}</td>
            <td> {{ x.SIZE_IN_OUTLET_2 }}</td>
            <td> {{ x.RATING_OUTLET }}</td>
            <td> {{ x.CONNECTIONS_OUTLET }}</td>
            <td> {{ x.GASKET_TYPE_OUTLET_2 }}</td>
            <td> {{ x.TRIM_SIZE_2 }}</td>
            <td> {{ x.NORMAL_OPERATION_PRESURE_SET_PRESURE_PSI }}</td>
            <td> {{ x.MOP_MAX_OPERATING_PRESSURE_PSI }}</td>
            <td> {{ x.Normal_Tem }}</td>
            <td> {{ x.VALVE_SERIAL_NUMBER }}</td>
            <td> {{ x.VALVE_MANUFACTURER }}</td>
            <td> {{ x.VALVE_MODEL }}</td>
            <td> {{ x.MANUFACTURING_YEAR }}</td>
            <td> {{ x.Indicador_ABC_Criticidad_por_Ingenieria }}</td>
            <td> {{ x.CRITICALITY_AS_PER_STRATEGY }}</td>
            <td> {{ x.Body }}</td>
            <td> {{ x.Body_Abreviatura }}</td>
            <td> {{ x.Puesta_en_Marcha }}</td>
            <td> {{ x.Intervalo_de_inspeccion_anos_Tinsp }}</td>
            <td> {{ x.FALTA_ESTANQUEIDAD_Fuga_Externa_de_Fluido_FEF }}</td>
            <td> {{ x.ACTIVIDAD_DE_MANTENIMIENTO_INSPECCION_PROGRAMADA_SCH }}</td>
            <td> {{ x.VALVULA_PRESENTA_PASE_INTERNO_PPI }}</td>
            <td> {{ x.VALVULA_NO_ABRE_NO_CIERRA_VALVULA_ESTA_PEGADA_NANC }}</td>
            <td> {{ x.VALVULA_ABRE_O_CIERRA_DESCONTRLADAMENTE_ACD }}</td>
            <td> {{ x.VALVULA_ABRE_O_CIERRA_PARCIALMENTE_ACP }}</td>
            <td> {{ x.VALVULA_FALLA_MECANIC_PFM }}</td>
            <td> {{ x.TOTAL_FALLAS_INSPECCION_2014 }}</td>
            <td> {{ x.Valvula_en_tuberia_vibraciones }}</td>
            <td> {{ x.Prueba_operativa_de_lazo_de_control }}</td>
            <td> {{ x.Overhaul_de_actuador }}</td>
            <td> {{ x.Overhaul_de_instrumentacion_y_control }}</td>
            <td> {{ x.Overhaul_de_cuerpo }}</td>
            <td> {{ x.Mantenimiento_preventivo }}</td>
            <td> {{ x.Documentacion_registro_adecuado_y_detallado_de_las_actividades }}</td>
            <td> {{ x.ANO_ULTIMO_OVERHAUL_CUERPO_Y_ACTUADOR }}</td>
            <td> {{ x.FACTOR_DE_MANTENIBILIDAD }}</td>
            <td> {{ x.CALIFICACION_MANTENIBILIDAD }}</td>                 
          </tr>

          
        </table>
        </tbody>
      
         
      </div>      
   </div>
</div>    



</body>

<script type="text/javascript">

var app = angular.module('listarValvulas', []);

app.controller('valvulasController', function($scope, $window ,$http){

    $http.get("JSONcolumnas.php")
    .then(function(response) {
        $scope.colum = response.data.columnas;
      
    });


   $http.post("JSONdatos.php")
    .then(function(response) {
        console.log(response.data.records);
        $scope.info = response.data.records;
      $window.alert("funciono");
    }
    , 
    function(response) { // optional
           $window.alert("fallo");
    });

    


    



});
</script>
</html>