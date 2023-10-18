<?php


function conectarDb(): mysqli
{
    $db = mysqli_connect('localhost', 'root', 'root', 'bienesraices_crud', 3306);

    if (!$db) {
        echo "Error no se pudo conectar";
        exit();
    }

    return $db;
}
