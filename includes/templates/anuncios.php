<?php

// importar base de datos
require __DIR__ . '/../config/database.php';
$db = conectarDb();

// consultar
$query = "SELECT * FROM propiedades LIMIT $limite";

// obtener resultado
$resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">

    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">
            <picture>
                <img loading="lazy" src="build/img/<?php echo $propiedad['imagen']; ?>" alt="Anuncio">
                <source srcset="build/img/<?php echo $propiedad['imagen']; ?>" type="image/avif">
            </picture>
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p><?php echo $propiedad['descripcion']; ?></p>
                <p class="precio">$<?php echo $propiedad['precio']; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" loading="lazy" alt="icono wc">
                        <p><?php echo $propiedad['wc']; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" loading="lazy" alt="icono estacionamiento">
                        <p><?php echo $propiedad['estacionamientos']; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" loading="lazy" alt="icono habitaciones">
                        <p><?php echo $propiedad['habitaciones']; ?></p>
                    </li>
                </ul>
            </div>
            <a href="anuncios.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div>
    <?php endwhile; ?>
</div>


<?php

// cerrar la conexion
mysqli_close($db);

?>