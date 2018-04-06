
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MVC - Modelo, Vista, Controlador - Jourmoly</title>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
    
<table>
    <tr>
        <th>ID</th>
        <th>Usuario </th>
        <th>Contraseña</th>
        <th>Correo</th>

    </tr>
    <?php
    // $listado es una variable asignada desde el controlador ItemsController.

    print_r($vars['listado']);

    while($item = $vars['listado']->fetch())
    {
    ?>
    <tr>
        <td><?php echo $item['ID']?></td>
        <td><?php echo $item['username']?></td>
        <td><?php echo $item['pass']?></td>
        <td><?php echo $item['correo']?></td>
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>