<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Carga de datos Valvulas</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css"  />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/Main.js"></script>

</head>
<body>
<div class="panel-page">
  <div class="form-main">
    <h2>Historial log </h2>
    
           
      <div class="box2"> 
         
         <a href="index.php?controlador=Menu&accion=mostrar" class="submitbuttones"> <p>Volver al menu</p></a>
         <table>
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

</body>
</html>