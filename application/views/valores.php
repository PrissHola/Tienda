

<!-- Tu contenido principal -->
<div id="Nosotros" class="id">
    <section class="container-fluid mvv-section">
        <div class="container">
            <h2 class="section-title">
                <?= isset($titulo_valores['titulo']) ? limpiaCadena($titulo_valores['titulo']) : 'Título no disponible'; ?>
            </h2>

            <div class="row text-center">
                <?php if ($valores): ?>
                    <?php foreach ($valores as $valor): ?>
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-header">
                                    <i class="<?= limpiaCadena($valor['icono']); ?> icon"></i>
                                </div>
                                <div class="card-body">
                                    <h4><?= limpiaCadena($valor['seccion']); ?></h4>
                                    <p><?= limpiaCadena($valor['descripcion']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay valores disponibles.</p>
                <?php endif; ?>
            </div>

            <br><br>

            <div class="row text-center">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3>Valores</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php if (!empty($valores2)): ?>
                                    <?php foreach ($valores2 as $valor): ?>
                                        <div class="col-md-3">
                                            <div class="text-center">
                                                <!-- Icono con tooltip personalizado -->
                                                <i class="<?= limpiaCadena($valor['icono']); ?> icon" style="font-size: 40px;" 
                                                   data-toggle="tooltip" data-placement="top" 
                                                   title="<?= limpiaCadena($valor['descripcion']); ?>"></i>
                                                
                                                <!-- Título con tooltip personalizado -->
                                                <h4 data-toggle="tooltip" data-placement="top" 
                                                    title="<?= limpiaCadena($valor['descripcion']); ?>">
                                                    <?= limpiaCadena($valor['valor']); ?>
                                                </h4>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No hay valores disponibles.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Bootstrap y jQuery (ya los tienes, por eso no es necesario volver a incluirlos) -->

<script>
    // Activa los tooltips para los elementos con el atributo data-toggle="tooltip"
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

