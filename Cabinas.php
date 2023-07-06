

<?php
// Realiza la conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'fhammp');


// Verifica si la conexión fue exitosa
if (!$conexion) {
  die('Error al conectar a la base de datos: ' . mysqli_connect_error());
}

$consultaPrecios = mysqli_query($conexion, 'SELECT opcion, precio FROM precios');
// Consulta los precios de la tabla
if (mysqli_num_rows($consultaPrecios) > 0) {
  // Crea un array para almacenar los precios de "Hora Normal"
  $preciosNormal = array();

  // Recorre los resultados y guarda las opciones y precios de "Hora Normal" en el array
  while ($fila = mysqli_fetch_assoc($consultaPrecios)) {
    $preciosNormal[$fila['opcion']] = $fila['precio'];
  }
}

// Consulta los precios de la tabla "precioshorapico"
$consultaPreciosHoraPico = mysqli_query($conexion, 'SELECT opcion, precio FROM precioshorapico');

// Verifica si se encontraron resultados
if (mysqli_num_rows($consultaPreciosHoraPico) > 0) {
  // Crea un array para almacenar los precios de "Hora Pico"
  $preciosHoraPico = array();

  // Recorre los resultados y guarda las opciones y precios de "Hora Pico" en el array
  while ($fila = mysqli_fetch_assoc($consultaPreciosHoraPico)) {
    $preciosHoraPico[$fila['opcion']] = $fila['precio'];
  }
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>






<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <title>Cabinas Fhammp</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="EstilosCabina.css">
    <script src="Script.js"></script>
</head>
<body>

    

<header >

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

    
    <div>
    <footer>
        <header  class="Headerinferior" style="position: fixed; height: 75px; bottom: 0; left: 0; width: 100%; background-color:#41566b; padding: 10px; text-align: center;">
          <div class="BotonesInferiores">
            <div class="boton">
            <button onclick="redirectToLogin()" style="background-color: transparent;"> <img src="./Imagenes/cabinas/logout.png" alt="Descripción de la imagen" width = "20" height="20"> </button>
            <span class="spaninferior">Logout</span>
            </div>
           <div class="boton">
            <button style="background-color: transparent;" > <img src="./Imagenes/cabinas/pasa.png" alt="Descripción de la imagen" width = "20" height="20"></button>
            <span class="spaninferior"> Abrir via</span>
           </div>
           <div class="boton">
            <button style="background-color: transparent;"> <img src="./Imagenes/cabinas/nopasa.png" alt="Descripción de la imagen" width = "20" height="20"></button>
            <span class="spaninferior"> Cerrar via</span>
           </div>
           <div class="boton">
            <button style="background-color: transparent;"> <img src="./Imagenes/cabinas/ayuda.png" alt="Descripción de la imagen" width = "20" height="20"></button>
            <span class="spaninferior">Ayuda</span>
           </div>
       
           <div class="boton">
            <button style="background-color: transparent;"> <img src="./Imagenes/cabinas/911.png" alt= "Descripción de la imagen" width = "20" height="20"> </button>
            <span class="spaninferior">911</span>
           </div>
         </div> 
       </header>
    </footer>
</div>

    <div class="texto">
    <h1 >SELECCIONAR CABINA</h1>        
    </div>
    
    <div class="botones" >
        
       <button>  <img src="./Imagenes/cabinas/auto2.png" width = "40" alt="Descripción de la imagen" class="bordeimagen";></button>
       
        <button>  <img src="./Imagenes/cabinas/auto2.png" width = "40" alt="Descripción de la imagen" class="bordeimagen";></button>
        
        <button>  <img src="./Imagenes/cabinas/auto2.png" width = "40" alt="Descripción de la imagen" class="bordeimagen";></button>
        
        <button>  <img src="./Imagenes/cabinas/auto1.png" width = "40" alt="Descripción de la imagen" class="bordeimagen";> </button>
       
    </div>
    <br>
   
    
    <div class = "tipovehiculo">
      <div class="spanprecios">

        <span> Precios Hora normal </span>

      </div>
       <form>
            <div class="text_ejes">
                <div class="cantidadtexto">
                     
            
                 <label for="opciones">Cantidad de ejes</label>
                    <select class="ejes" id="opciones" name="opciones">
                    
                        <?php
                        if (!empty($preciosNormal)) {
                            // Genera las opciones y agrégalas al elemento <select>
                            foreach ($preciosNormal as $opcion => $precio) {
                              echo '<option value="' . $opcion . '">' . $opcion . ' - $' . $precio . '</option>';
                            }
                          }
                        ?>
                    </select>
                       
                    
                </div>
            </div>
       </form>
       
    </div>
     
    <div class = "tipovehiculo">
    <div class="spanprecios">

        <span> Precios Hora Pico </span>

      </div>
       <form>
            <div class="text_ejes">
                <div class="cantidadtexto">
                     
            
                 <label for="opciones">Cantidad de ejes</label>
                    <select class="ejes" id="opciones" name="opciones">
                    
                        <?php
                        if (!empty($preciosHoraPico)) {
                            // Genera las opciones y agrégalas al elemento <select>
                            foreach ($preciosHoraPico as $opcion => $precio) {
                              echo '<option value="' . $opcion . '">' . $opcion . ' - $' . $precio . '</option>';
                            }
                          }
                        ?>
                    </select>
                       
                    
                </div>
            </div>
       </form>
    </div>
   
  <div>

  


</body>
</html>