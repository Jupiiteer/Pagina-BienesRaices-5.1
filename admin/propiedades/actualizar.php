<?php


require '../../includes/funciones.php';
$auth = estaAutenticado();
if (!$auth) {
    header('location:/');
}

// Validar la URL por id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location:/admin');
}


// base de datos
require '../../includes/config/database.php';

$db = conectarDb();

// Obtener los datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = $id";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con errores
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$imagenPropiedad = $propiedad['imagen'];


// Ejecutar el codigo despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedorid']);
    $creado = date('Y/m/d');

    // Asignar files a una variable
    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes Añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "Debes Añadir un precio";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripcion es obligatoria debe tener al menos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "Debes Añadir un numero de habitaciones";
    }
    if (!$wc) {
        $errores[] = "Debes Añadir un numero de baños";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes Añadir un numero de estacionamientos";
    }
    if (!$vendedorId) {
        $errores[] = "Debes elegir un vendedor";
    }

    // Validar por tamaño (1mb maximo)
    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
    }

    // Revisar que el array de errores este vacio
    if (empty($errores)) {
        // /* Subida de archivos */

        // // Crear carpeta
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';

        if ($imagen['name']) {
            // Eliminar la imagen previa

            unlink($carpetaImagenes . $propiedad['imagen']);
            // // Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            // // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }

        // Insertar en la base de datos
        $query = "UPDATE propiedades SET titulo = '$titulo',  precio = '$precio', imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedorId = $vendedorId WHERE id = $id";

        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input name="titulo" type="text" id="titulo" placeholder="Titulo de la Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input name="precio" type="text" id="precio" placeholder="Precio de la Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <img src="/imagenes/<?php echo $imagenPropiedad ?>" alt="imagen de la propiedad" class="imagen-small">

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input name="habitaciones" type="number" id="habitaciones" placeholder="Habitaciones de la Propiedad" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input name="wc" type="text" id="wc" placeholder="Baños de la Propiedad" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input name="estacionamiento" type="text" id="estacionamiento" placeholder="Estacionamiento de la Propiedad" value="<?php echo $estacionamiento; ?>">


        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="vendedor">
                <option value="" selected disabled>-- Seleccione --</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>

                <?php endwhile ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
    </form>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <a href="/admin/index.php" class="boton-verde boton">Volver</a>
</main>

<?php

incluirTemplate('footer');

?>