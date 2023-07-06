<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>update</title>
</head>
<body>
    <?php
        include("conexion.php");
        conexion::conexionBD();
    
        $conection = mysqli_connect("localhost","root","","fhammp") or die ("ERROR 404: " . mysqli_error($conection));
    
        $registros = mysqli_query($conection, "UPDATE usuarios SET Nombre = '$_REQUEST[nuevonombre]' WHERE Nombre = '$_REQUEST[nombreviejo]'") or die("Error al modificar el Nuevo nombre" . mysqli_error($conection));
        $registros = mysqli_query($conection, "UPDATE usuarios SET contra = '$_REQUEST[nuevacontra]' WHERE contra = '$_REQUEST[contravieja]'") or die("Error al modificar la nueva contraseña" . mysqli_error($conection));
        echo "El nombre y contraseña a sido modificada";
    ?>
    <form action="admin.php" method="post">
        <input type="submit" value="Volver al menu">
    </form>
</body>
</html>