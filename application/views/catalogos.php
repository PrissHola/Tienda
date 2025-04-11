<div  class="row text-center">
    <?php if (!empty($catalogos)): ?>
        <?php foreach ($catalogos as $item): ?>
            <div class="col-sm-4 mb-4">
                <div class="thumbnail">
                    <img src="<?= base_url('Imagenes/' . limpiaCadena($item['imagen'])) ?>" 
                         alt="<?= limpiaCadena($item['nombre_categoria']) ?>" 
                         width="400" height="300">
                    <p><strong><?= limpiaCadena($item['nombre_categoria']) ?></strong></p>
                    <p><?= limpiaCadena($item['descripcion']) ?></p>
                    <a href="<?= limpiaCadena($item['link']) ?>" class="btn btn-primary" target="_blank">Abrir</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron catálogos disponibles.</p>
    <?php endif; ?>
</div>
</div>
