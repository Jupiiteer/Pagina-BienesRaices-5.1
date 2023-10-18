<?php
require 'includes/funciones.php';

incluirTemplate('header');

?>
<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <img loading="lazy" width="200" height="300" src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>
    <h2>Llene el formulario de contacto</h2>
    <form action="" class="formulario">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Tu nombre">

            <label for="email">E-Mail</label>
            <input type="email" id="email" placeholder="Tu correo electronico">

            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" placeholder="Tu teléfono">

            <label for="mensaje">Mensaje</label>
            <textarea name="" id="mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra</label>

            <select name="" id="opciones">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Comprar</option>
                <option value="Venta">Vender</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" id="presupuesto" placeholder="#########">

        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <p>¿Como desea ser contactado?</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" name="contacto" id="contactar-telefono" value="telefono">

                <label for="contactar-email">E-mail</label>
                <input type="radio" name="contacto" id="contactar-email" value="email">
            </div>

            <p>Seleccione el horario de contacto</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha">
            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>

        <input type="submit" class="boton-verde" value="Enviar">
    </form>
</main>

<?php
incluirTemplate('footer');

?>