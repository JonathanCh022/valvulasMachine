<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" ng-app="listarValvulas">
<head>
    
    <title>Carga de datos Valvulas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css"  />
    
  
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> 
    <script type="text/javascript" src="js/Main.js"></script>
    
     
    

</head>
<body  >
<div class="panel-matriz-page">
  <div class="form-matriz-main"> 

    <a href="index.php?controlador=Menu&accion=mostrar" class="submitbuttones"> <p>Volver al menu</p></a>
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

          
        
        </tbody>
      </table>
      
         
      </div>   
      <h2>Matriz RAM</h2>
      <div class="matriz">
          
        <div class="fila">
          <div class="cuadrito informativo"><h4>  Probable <br> 6  </h4></div>
          <a href="#infovalvulasmatriz" class="boton" id="1"><div id="6F" class="cuadrito amarillo" > <p> <?php echo count($vars['matriz'][0]); ?> </p> </div></a>
          <a href="#infovalvulasmatriz" class="boton" id="2"><div id="5F" class="cuadrito amarillo"> <p> <?php echo count($vars['matriz'][1]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="3"><div id="4F" class="cuadrito naranja"><p>   <?php echo count($vars['matriz'][2]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="4"><div id="3F" class="cuadrito naranja"><p>   <?php echo count($vars['matriz'][3]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="5"><div id="2F" class="cuadrito rojo"><p>   <?php echo count($vars['matriz'][4]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="6"><div id="1F" class="cuadrito rojo"><p> <?php echo count($vars['matriz'][5]); ?>  </p></div></a>
        </div>
        <div class="fila">
          <div class="cuadrito informativo"><h4>  Ocasional <br> 5  </h4> </div>
          <a href="#infovalvulasmatriz" class="boton" id="7"><div class="cuadrito verde"><p>  <?php echo count($vars['matriz'][6]); ?>  </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="8"><div class="cuadrito amarillo"><p>  <?php echo count($vars['matriz'][7]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="9"><div class="cuadrito amarillo"><p>  <?php echo count($vars['matriz'][8]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="10"><div class="cuadrito naranja"><p>  <?php echo count($vars['matriz'][9]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="11"><div class="cuadrito naranja"><p>  <?php echo count($vars['matriz'][10]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="12"><div class="cuadrito rojo"> <p> <?php echo count($vars['matriz'][11]); ?> </p></div></a>
        </div>
        <div class="fila">
          <div class="cuadrito informativo"><h4>  Pocas <br> veces <br> 4  </h4></div>
          <a href="#infovalvulasmatriz" class="boton" id="13"><div class="cuadrito verde"><p> <?php echo count($vars['matriz'][12]); ?>  </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="14"><div class="cuadrito verde"><p> <?php echo count($vars['matriz'][13]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="15"><div class="cuadrito amarillo"><p> <?php echo count($vars['matriz'][14]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="16"><div class="cuadrito amarillo"><p> <?php echo count($vars['matriz'][15]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="17"><div class="cuadrito naranja"><p> <?php echo count($vars['matriz'][16]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="18"><div class="cuadrito naranja"><p> <?php echo count($vars['matriz'][17]); ?> </p></div></a>
        </div>
        <div class="fila">
          <div class="cuadrito informativo"><h4> Improbable <br> 3  </h4></div>
          <a href="#infovalvulasmatriz" class="boton" id="19"><div class="cuadrito verde-claro"><p> <?php echo count($vars['matriz'][18]); ?>  </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="20"><div class="cuadrito verde"> <p><?php echo count($vars['matriz'][19]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="21"><div class="cuadrito verde"><p> <?php echo count($vars['matriz'][20]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="22"><div class="cuadrito amarillo"> <p><?php echo count($vars['matriz'][21]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="23"><div class="cuadrito amarillo"><p> <?php echo count($vars['matriz'][22]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="24"><div class="cuadrito naranja"><p> <?php echo count($vars['matriz'][23]); ?> </p></div></a>
        </div>
        <div class="fila">
          <div class="cuadrito informativo"><h4> Remoto <br> 2  </h4></div>
          <a href="#infovalvulasmatriz" class="boton" id="25"><div class="cuadrito verde-claro"> <p>  <?php echo count($vars['matriz'][24]); ?>  </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="26"><div class="cuadrito verde-claro"><p>  <?php echo count($vars['matriz'][25]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="27"><div class="cuadrito verde"><p>  <?php echo count($vars['matriz'][26]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="28"><div class="cuadrito verde"><p>  <?php echo count($vars['matriz'][27]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="29"><div class="cuadrito amarillo"><p>  <?php echo count($vars['matriz'][28]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="30"><div class="cuadrito amarillo"> <p>  <?php echo count($vars['matriz'][29]); ?> </p></div></a>
        </div>
        <div class="fila">
          <div class="cuadrito informativo"> <h4> Raro <br> 1  </h4></div>
          <a href="#infovalvulasmatriz" class="boton" id="31"><div class="cuadrito verde-claro"> <p> <?php echo count($vars['matriz'][30]); ?>  </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="32"><div class="cuadrito verde-claro"><p> <?php echo count($vars['matriz'][31]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="33"><div class="cuadrito verde-claro"> <p> <?php echo count($vars['matriz'][32]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="34"><div class="cuadrito verde-claro"> <p> <?php echo count($vars['matriz'][33]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="35"><div class="cuadrito verde"><p> <?php echo count($vars['matriz'][34]); ?> </p></div></a>
          <a href="#infovalvulasmatriz" class="boton" id="36"><div class="cuadrito amarillo"><p>  <?php echo count($vars['matriz'][35]); ?></p></div></a>
        </div>
        <div class="fila">
          <div class="cuadrito informativo">  <h4> ---- </h4></div>
          <div class="cuadrito informativo">  <h4> Incidental <br> F  </h4> </div>
          <div class="cuadrito informativo">  <h4> Menor <br> E  </h4> </div>
          <div class="cuadrito informativo">  <h4> Moderado <br> D </h4></div>
          <div class="cuadrito informativo">  <h4> Mayor <br> C  </h4></div>
          <div class="cuadrito informativo">  <h4> Grave <br> B  </h4></div>
          <div class="cuadrito informativo">  <h4> Catastrofico <br> A  </h4></div>
        </div>        
      </div>
      <br>
      <br>

      <a id="accionar" class="btn3"> Explicacion categoria consecuencia</a>

      <br>
      <br>
      <div class="tablainformativa" id="tablainformativa">
          <table  class="table table-bordered">
            <tr>
              <td> -------- </td>
              <td> Incidental </td>
              <td> Menor </td>
              <td> Moderado </td>
              <td> Mayor </td>
              <td> Grave </td>
              <td> Catastrofico </td>
            </tr>
            <tr>
              <td> Daño de Equipos / Perdida de Valor Negocio </td>
              <td>  Ninguna. Costos menor que 20K  </td>
              <td> Algunos daños, perdida de activos y/o tiempo de inactividad </td>
              <td> Perdida de activos, daños a la instalación y/o tiempo de inactividad serios. Costo entre 100K y 1MM </td>
              <td> Perdida de activos, daños a la instalación y/o tiempo de inactividad serios Costos entre 1MM – 50MM </td>
              <td> Perdida de activos y/o daños a la instalación serios. Tiempo de inactividad significativo, con efecto económico apreciable. Costo entre 50MM y 500MM.</td>              
              <td> Destrucción o daño total. Posibilidad de pérdida de la producción permanente. Costo > a 500 MM. </td>
            </tr>
            <tr>
              <td> Salud y Seguridad </td>
              <td>  Ninguna. Costos menor que 20K  </td>
              <td> Lesiones o Enfermedades que requieran tratamiento  médico o trabajo restringido. </td>
              <td> Lesiones incapacitantes / serias/Significativas o con ausencia del trabajo.</td>
              <td> De 1 a 10 fatalidades dentro  y fuera de las instalaciones,  entre 10 o más lesionados que requieran  tratamiento de hospitalización. </td>
              <td> De 11 a 100 fatalidades  dentro o fuera de las instalaciones. </td>              
              <td> De 101  o más fatalidades dentro o fuera de las instalaciones. </td>
            </tr>
            <tr>
              <td> Medio Ambiente </td>
              <td> Afectación de área interna de las Instalaciones con recuperación menor a 7dias. </td> 
              <td> Afectación de un área Externa con recuperación inmediata menor a dos semanas. </td>
              <td> Afectación de un área sensible con recuperación menor a 2 semanas o > 2 y < a 4 Semanas. </td>
              <td> Afectación de un área sensible con recuperación en un período mayor a 2 semanas y < 1 año o afectación a área no sensible con recuperación de un periodo >a 4 semanas y > a 6 meses</td>
              <td> Daño extensivo con afectación de un área sensible con recuperación  entre 1 y 5 años.</td>                           
              <td> Daño extensivo a un área ambientalmente sensible con una recuperación >5 años.  </td>
            </tr>

            <tr>
              <td> Privilegio para operar / Reputación </td>
              <td> Quejas procedentes por parte de vecinos, quejas procedentes de proveedores o terceras partes. </td> 
              <td> Cubrimiento por medios locales, Municipales. Incumplimiento compromisos con terceras partes del ámbito local. </td>
              <td> Cubrimiento por medios regionales a corto plazo. Incumplimiento compromisos con terceras partes del ámbito Regional. </td>
              <td> Cubrimiento por medios regionales y nacionales de mediana duración. Afectación  de las relaciones en la industria con proveedores de bienes y servicios a nivel nacional e internacional.</td>
              <td> Perdida de una licencia local o regional, Impacto en la reputación de los accionistas, rechazo por parte del público en general, rechazo por parte delos inversionistas, Impacto en la reputación de los accionistas, Cubrimiento por medios internacionales a corto plazo.</td>                           
              <td> Afectación  a la reputación a nivel internacional, Cubrimiento por medios internacionales de larga duración, rechazo por parte de los accionistas de Equion y publico a nivel internacional.  </td>
            </tr>

          </table>
        </div>

      <div id="infovalvulasmatriz" class="infovalvulasmatriz">

        <div id="Info1" class="datos">           

          <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][0] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php
              
            }
            ?>                  
         </table>

        </div>
        <div id="Info2" class="datos">
             <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][1] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
         
        </div>
        <div id="Info3" class="datos">
          <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][2] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info4" class="datos">
            
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][3] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>

        </div>
        <div id="Info5" class="datos">
            
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][4] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info6" class="datos">
            
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][5] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info7" class="datos">
            
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][6] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>

        </div>
        <div id="Info8" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][7] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info9" class="datos">
           <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][8] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info10" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][9] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Inf11" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][10] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info12" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][11] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info13" class="datos">
           <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][12] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info14" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][13] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Inf15" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][14] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info16" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][15] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info17" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][16] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info18" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][17] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info19" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][18] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info20" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][19] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info21" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][20] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Inf22" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][21] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info23" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][22] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info24" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][23] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info25" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][24] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info26" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][25] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info27" class="datos">
           <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][26] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info28" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][27] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info29" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][28] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info30" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][29] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info31" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][30] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info32" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][31] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info33" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][32] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info34" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][33] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info35" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][34] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        <div id="Info36" class="datos">
            <table class="table table-bordered">
          <tr>
            <th>Item  </th>
            <th>Tag Number</th>
            <th>PID N°</th>
          </tr> 
           <?php
            foreach ($vars['matriz'][35] as $value) {              
                         
            ?>              
              <tr>
               <td><?php echo $value['ITEM'] ?></td>
               <td><?php echo $value['TAG_NUMBER'] ?></td>      
               <td><?php echo $value['PID_No'] ?></td>                              
              </tr>
            <?php              
            }
            ?>                  
         </table>
        </div>
        
        
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
    }
    , 
    function(response) { // optional
           $window.alert("fallo");
    });  



});
</script>
</html>