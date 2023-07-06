
<!DOCTYPE html>
<html lang="ES">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="Style.css">
   <script src="conexion.php"></script>
</head>
<body>
    
  <header>

    <a href="#" class="logo">
    <img src="imagenes/logo.png" alt="logocompany">
    <h2 class="FHAMMP">FHAMMP</h2>
    </a>
<nav>
    <a href="" class="nav-link">INICIO</a>
    <a href="" class="nav-link">SOBRE NOSOTROS</a>
    <a href="" class="nav-link">CONTACTO</a>
</nav>
</header>
 


<div class="contenedor">
    <form  method="post"action="consultas.php" >
        <h2>INICIAR SESIÓN</h2>
        <input type="email" placeholder="Email" name ="Email"/>
        <input type="password" placeholder="Password" name="password"/>
        <input class="boton"type="submit" value ="Ingresar" name ="registro">
          
            </form>

</div>


 
    
</body>
</html>
