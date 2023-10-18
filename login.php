<?php

require "includes/config/database.php";
$db = conectarDb();

// Autenticar usuario
$errores = [];

if ($_POST['REQUEST_METHOD'] == 'POST') {
    // echo "<pre>";
    // // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = 'El email es obligatorio o no es válido';
    }

    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if (empty($errores)) {
        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // Verificar el password
            $auth = password_verify($password, $usuario['password']);
            if ($auth) {
                // el usuario esta autenticado
                session_start();

                // Llenar el arreglo de la sesión
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location:/admin');

                // echo "<pre>";
                // var_dump($_SESSION);
                // echo "</pre>";
            } else {
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

// Incluey el header
require 'includes/funciones.php';

incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" action="" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-Mail</label>
            <input name="email" type="email" id="email" required placeholder="Tu correo electronico">

            <label for="password">Contraseña</label>
            <input name="password" type="password" id="password" required placeholder="Tu contraseña">

        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php

incluirTemplate('footer');

?>