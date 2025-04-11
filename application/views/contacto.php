
<!-- Sección de Contacto -->
<section class="contact-section">
    <div class="container">
        <h3 class="text-center"><?= isset($titulo_contacto['titulo']) ? limpiaCadena($titulo_contacto['titulo']) : 'Título no disponible' ?></h3>
        <p class="text-center"><em>¡valoramos a nuestros clientes!</em></p>

        <div class="row">
            <div class="col-md-4">
            <img src="<?= base_url('Imagenes/' . limpiaCadena($contacto['metodos_pago'])) ?>" >
                
                
                <p><span class="glyphicon glyphicon-map-marker"></span> <?= isset($contacto['ubicacion']) ? limpiaCadena($contacto['ubicacion']) : '' ?></p>
                <p><span class="glyphicon glyphicon-phone"></span> Teléfono: <?= isset($contacto['telefono']) ? limpiaCadena($contacto['telefono']) : '' ?></p>
                <p><span class="glyphicon glyphicon-envelope"></span> Correo: <?= isset($contacto['correo']) ? limpiaCadena($contacto['correo']) : '' ?></p>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Nombre" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Correo" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comentario" rows="5"></textarea>
                <br>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button class="btn pull-right" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
  

        <!-- Redes Sociales -->
        <div class="social-icons">
    <h4><?= isset($titulo_redes['titulo']) ? limpiaCadena($titulo_redes['titulo']) : 'Título no disponible' ?></h4>
    <?php if (!empty($redes_sociales)): ?>
        <?php foreach ($redes_sociales as $red): ?>
            <a href="<?= $red['enlace'] ?>" class="<?= $red['icono'] ?>" target="_blank"></a>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay redes sociales disponibles.</p>
    <?php endif; ?>
</div>
    </div>
</section>

