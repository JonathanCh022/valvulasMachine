<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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
    <h2>Informacion valvulas</h2>
    
           
      <div  class="box3" ng-app="listarValvulas" ng-controller="valvulasController"> 
       
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