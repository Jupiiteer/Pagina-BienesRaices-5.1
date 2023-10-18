<?php

// Importrar la conexion
require 'includes/config/database.php';
$db = conectarDb();

// Crear email y password
$email = "correo@example.com";
$password = "123456";
$passwordHash = password_hash($password, PASSWORD_DEFAULT);


// Query para crear el usuario
$query = "INSERT INTO usuario (email, password) VALUES ('$email', '$passwordHash');";

// agregarlo a la bd
mysqli_query($db, $query);
