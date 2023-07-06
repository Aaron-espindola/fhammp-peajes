<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incio de Sesion</title>
</head>
<body>

<form action="cargadatos.php" method="post">
    <h1>Crear cuenta </h1>
    <input type="email" name="email" placeholder="emailusuario">
    <input type="contraseña" name="contra" placeholder="contraseña">
    <input type="text" name="nombre" placeholder="nombrecompleto">
    <input type="submit" name="registro">
</form>
<?php
    include("conexion.php");
    conexion::conexionBD();
?>

<form action="listado.php" method="post">
    <input type="submit" value="Lista de usuarios">
</form>
<form action = "admin.php" method = "post">
    <input type = "submit" value ="volver">
</form>
 
</body>
</html>