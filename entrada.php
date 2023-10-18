<?php
require 'includes/funciones.php';

incluirTemplate('header');

?>
<main class="contenedor seccion contenido-centrado">
    <h1>Guía para la decoración de tu hogar</h1>
    <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp">
        <img loading="lazy" width="200" height="300" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
    </picture>
    <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
    <div class="resumen-propiedad">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti quod, quisquam debitis animi
            voluptatem fugit voluptatum eos facilis atque placeat, amet, iure architecto a autem facere temporibus
            vero! Voluptatem, veniam? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, mollitia.
            Consectetur nulla praesentium, soluta voluptates placeat dolorem molestias. Nam molestiae, obcaecati
            temporibus error laborum eveniet doloremque necessitatibus nemo perspiciatis similique?</p>
    </div>
</main>

<?php

incluirTemplate('footer');

?>