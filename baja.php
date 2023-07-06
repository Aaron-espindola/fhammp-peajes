<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>baja logica</title>
</head>
<body>
    <?php
    include("conexion.php");
    conexion::conexionBD();

    $conection = mysqli_connect("localhost","root","","fhammp") or die ("ERROR 404: " . mysqli_error($conection));

    $registros = mysqli_query($conection, "SELECT id FROM usuarios WHERE email ='$_REQUEST[email]'") or die("Error al seleccionar el mail" . mysqli_error($conection));

    if ($reg = mysqli_fetch_array($registros)) {
        mysqli_query($conection, "DELETE FROM usuarios WHERE email='$_REQUEST[email]'") or die("Error al eliminar al usuario" . mysqli_error($conection));
        echo "<br>";
        echo " El usuario a sido eliminado satisfactoriamente 👍.";
    }
    else {
        echo "El EMAIL seleccionado no existe en la base de datos😱.";
    }

    mysqli_close($conection);
    ?>

<form action="listado.php" method="post">
    <input type="submit" value="Volver a lista de usuarios">
</form>
</body>
</html>