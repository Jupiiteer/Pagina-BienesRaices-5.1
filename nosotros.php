<?php
require 'includes/funciones.php';

incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Conoce Sobre Nosotros</h1>
    <div class="contenido-nosotros">
        <picture>
            <source srcset="build/img/nosotros.webp" type="image/webp">
            <img loading="lazy" width="200" height="300" src="build/img/nosotros.jpg" alt="Imagen sobre nosotros">
        </picture>
        <div class="texto-nosotros">
            <blockquote>25 Años de Experiencia</blockquote>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero repellendus deleniti facilis, earum
                ipsam
                soluta tenetur numquam accusamus esse? Dolore animi est delectus a sunt deleniti ullam, quasi
                asperiores
                officia. </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam illum exercitationem tenetur deserunt
                est
                iste labore qui quo accusamus corrupti aliquam, illo ipsam tempora reiciendis similique perferendis
                praesentium recusandae repudiandae!</p>
        </div>
    </div>

</main>

<section class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt aliquid sequi quos debitis beatae
                repudiandae perspiciatis delectus deleniti possimus, ut, illo numquam quia tempore ratione facere
                maiores vel laborum doloremque.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt aliquid sequi quos debitis beatae
                repudiandae perspiciatis delectus deleniti possimus, ut, illo numquam quia tempore ratione facere
                maiores vel laborum doloremque.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt aliquid sequi quos debitis beatae
                repudiandae perspiciatis delectus deleniti possimus, ut, illo numquam quia tempore ratione facere
                maiores vel laborum doloremque.</p>
        </div>
    </div>
</section>

<?php

incluirTemplate('footer');

?>