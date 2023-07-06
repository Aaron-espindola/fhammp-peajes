<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
</head>
<body>
    <?php
    include("conexion.php");
    conexion::conexionBD();

    $conection = mysqli_connect("localhost","root","","fhammp") or die ("ERROR 404: " . mysqli_error($conection));

    $registros = mysqli_query($conection, "SELECT * FROM usuarios WHERE email ='$_REQUEST[email]'") or die("Error al seleccionar el mail" . mysqli_error($conection));

    if ($reg = mysqli_fetch_array($registros)) {
        
    ?>
    <form action="update2.php" method="post">
        Ingrese un nuevo nombre:
        <input type="text" name="nuevonombre" value="<?php echo $reg['Nombre']?>">
        <br>
        <input type="hidden" name="nombreviejo" value="<?php echo $reg['Nombre']?>">

        Ingrese nueva contraseña:
        <input type="text" name="nuevacontra" value="<?php echo $reg['contra']?>">
        <br>
        <input type="hidden" name="contravieja" value="<?php echo $reg['contra']?>">

        <input type="submit" value="Modificar">
    </form>
    <?php
    }else{
        echo "No existe usuario con dicho email😕."; 
    };
    ?>

    <form action="admin.php" method="post">
        <input type="submit" value="Volver al menu">
    </form>
</body>
</html>