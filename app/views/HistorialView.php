<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Carga de datos Valvulas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"  />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/Main.js"></script>

</head>
<body>
<div class="panel-page">
  <div class="form-main-log ">
    <h2>Historial log </h2>
    
           
      <div class="box4"> 
         
         <a href="index.php?controlador=Menu&accion=mostrar" class="submitbuttones" id="botonlog"> <p>Volver al menu</p></a>

         <form class="login-form form-inline" action="index.php" method="POST"  enctype="multipart/form-data" id="form3">        
          
            <input type="hidden" name="controlador" value="Historial" />
            <input type="hidden" name="accion" value="mostrar" /> 
            <select name="valvula" class="form-control">
             <?php  
             while ($valores = $vars['valvulas']->fetch()) {
                        
                echo '<option value="'.$valores['ITEM'].'">'.$valores['ITEM'].'</option>';
              }
             ?>
            </select>
            <input type="text" name="texto"  class="form-control" id="lbl1" /> 
            <input type="submit" class="form-control">           
          
        </form>  
        <div class="tablalog">

          <table class="table table-bordered ">
          <tr>
            <th>Fecha </th>
            <th>Accion</th>
          </tr>

           
            <?php

            while($item = $vars['informacion']->fetch()){              
            ?>
              
              <tr>
               <td><?php echo $item['fecha']?></td>
               <td><?php echo $item['accion']?></td>           
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
</html>