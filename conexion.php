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

    ?>