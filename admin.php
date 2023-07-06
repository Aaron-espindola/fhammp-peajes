
<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'fhammp');


    
    if (!$conexion) {
      die('Error al conectar a la base de datos: ' . mysqli_connect_error());
    }
    
    $consultaPrecios = mysqli_query($conexion, 'SELECT opcion, precio FROM precios');
    
    if (mysqli_num_rows($consultaPrecios) > 0) {
      
      $preciosNormal = array();
    
     
      while ($fila = mysqli_fetch_assoc($consultaPrecios)) {
        $preciosNormal[$fila['opcion']] = $fila['precio'];
      }
    }
    
    
    $consultaPreciosHoraPico = mysqli_query($conexion, 'SELECT opcion, precio FROM precioshorapico');
    
    
    if (mysqli_num_rows($consultaPreciosHoraPico) > 0) {
      
      $preciosHoraPico = array();
    
     
      while ($fila = mysqli_fetch_assoc($consultaPreciosHoraPico)) {
        $preciosHoraPico[$fila['opcion']] = $fila['precio'];
      }
    }
    
   
    mysqli_close($conexion);
    ?>




<!DOCTYPE html>
<html lang="ES">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
   <link rel="stylesheet" href="Style.css">
   <link rel="stylesheet" href="EstilosCabina.css">
   <script src="conexion.php"></script>
</head>
<body>
  <header>
    <div class="desplegable">
        <button class = "boton">Usuario</button>
    <div class="links">
            <a href="#">Perfil</a>
            <a href="#">Horas Trabajadas</a>
            <a href="#">Cerrar Sesion</a>
        </div>
    </div>
  </header>
    <form method = "post" action = "alta.php">  
        <h1>Agregar cuenta</h1>
        <input type="submit" value ="Aceptar">
        
    <form method = "post" action = "baja.php">  
        <h1>Dar de baja cuenta</h1>
        <input type="submit" value ="Aceptar">

    </form>
    
 

      <form>
       <div class="text_ejes">
        <div class="cantidadtexto">
             
    
         <label for="opciones">Precios por ejes Hora normal</label>
           
                <?php
                if (!empty($preciosNormal)) {
                    // Genera las opciones y agrégalas al elemento <select>
                    foreach ($preciosNormal as $opcion => $precio) {
                      echo '<option value="' . $opcion . '">' . $opcion . ' - $' . $precio . '</option>';
                    }
                  }
                ?>

                <label for="opciones">Precios por ejes Hora Pico</label>
           
                <?php
                if (!empty($preciosHoraPico)) {
                    // Genera las opciones y agrégalas al elemento <select>
                    foreach ($preciosHoraPico as $opcion => $precio) {
                      echo '<option value="' . $opcion . '">' . $opcion . ' - $' . $precio . '</option>';
                    }
                  }
                ?>
            
                 <div>

                     <h1>Actualizar Precios</h1>

                         <form action="actualizar_precios.php" method="post">
                                 <label for="id">id:</label>
                                 <input type="text" name="id" id="id">
                                 <br><br>
                                 <label for="precio">Nuevo Precio:</label>
                                 <input type="text" name="precio" id="precio">
                                 <br><br>
                                 <input type="submit" value="Actualizar Precio">
                         </form>

                 </div>
           </div>
         </div>
       </form>

    
</body>
</html>