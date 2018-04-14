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
    <h2>Carga el archivo (.csv) con la informacion de las valvulas </h2>
    
    <form class="login-form" action="index.php" method="POST"  enctype="multipart/form-data" id="form2">        
      <div class="box"> 
        <input type="hidden" name="controlador" value="Archivo" />
        <input type="hidden" name="accion" value="cargar" />
        <input type="file" name="archivo" id="archivo"  class="inputfile" />        
        <label for="archivo"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" id="svg"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Selecciona el archivo&hellip;</span></label>
      </div>      
    </form>    

    <input type="button" value="Subir archivo" onclick="submitForms()" />

  </div>
</div>    

</body>
</html>