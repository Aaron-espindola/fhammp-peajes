<?php
class conexion
{
     static function conexionBD()
    {
        $host="localhost";
        $dbname ="fhammp";
        $username ="root";
        $pasword = "";
        try
        {
            $conection = new PDO("mysql:host=$host;dbname=$dbname",$username,$pasword);
            echo "Se conecto a la base de datos $dbname";
        }
        catch(PDOException $ecepcion)
        {
            echo "No se pudo conectar a la base dedatos $dbname, error: $ecepcion";
        }
        return $conection;

    }
   
}

// Obtener los datos del formulario
$opcion = $_POST['opcion'];
$precio = $_POST['precio'];

// Validar los datos (puedes agregar más validaciones según tus requisitos)
if (empty($opcion) || empty($precio)) {
    echo "Por favor, complete todos los campos.";
    exit;
}

try {
    // Realizar la conexión a la base de datos
    $conexion = conexion::conexionBD();

    // Actualizar el precio en la base de datos usando una sentencia SQL
    $sql = "UPDATE precios SET precio = '$precio' WHERE opcion = '$opcion'";
    $resultado = $conexion->exec($sql);

    // Verificar si la actualización fue exitosa
    if ($resultado !== false) {
        echo "El precio se actualizó correctamente.";
    } else {
        echo "No se encontró ninguna fila para actualizar.";
    }
} catch (PDOException $ex) {
    echo "Error en la conexión o consulta: " . $ex->getMessage();
}

// Cerrar la conexión a la base de datos
$conexion = null;
?>
