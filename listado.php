<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista</title>
</head>
<body>
<?php
    include("conexion.php");
    conexion::conexionBD();

    $conection = mysqli_connect("localhost","root","","fhammp_db") or die ("ERROR 404: " . mysqli_error($conection));
    $registros = mysqli_query($conection, "SELECT id,email,Nombre FROM usuarios") or die ("Error 404" . mysqli_error($conection));

    while ($reg = mysqli_fetch_array($registros)) {
        echo "<br>";
        echo"ID: " . $reg['id'] . "<br>";
        echo"Nombre: " . $reg['Nombre'] . "<br>";
        echo"Mail: " . $reg['email'] . "<br>";
    }
    mysqli_close($conection);
    echo "<br>";
?>
<form action="baja.php" method="post">

    <input type="text" name="email" placeholder="emailusuario">
    <input type="submit" value="Buscar y dar de baja">
    
</form>

<form action="update.php" method="post">
    <input type="text" name="email" placeholder="emailusuario">
    <input type="submit" value="Buscar y Modificar">
</form>
<br>
<form action="admin.php" method="post">
    <input type="submit" value="Volver al menu">
</form>
</body>
</html>