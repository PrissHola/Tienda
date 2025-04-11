<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach ($carrusel as $index => $item): ?>
            <li data-target="#" data-slide-to="<?= $index ?>" class="<?= ($index == 0) ? 'active' : '' ?>"></li>
        <?php endforeach; ?>
    </ol>

   <!-- Wrapper for slides -->
<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox"class="img-responsive">
    <?php foreach ($carrusel as $index => $item): ?>
        <div class="item <?= ($index == 0) ? 'active' : '' ?>">
            <center>
                <img src="<?= base_url('Imagenes/' . limpiaCadena($item['imagen'])) ?>" 
                     alt="<?= limpiaCadena($item['nombre_categoria'] ?? '') ?>" 
                     width="1200" height="400">
            </center>
            <div class="carousel-caption">
                <?php if (!empty($item['nombre_categoria'])): ?>
                    <h3><?= limpiaCadena($item['nombre_categoria']) ?></h3>
                <?php endif; ?>
                <?php if (!empty($item['descripcion'])): ?>
                    <p><?= limpiaCadena($item['descripcion']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
