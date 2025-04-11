<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-info-circle"></i> Descripción Detallada
            </div>
            <div class="card-body">
                <?= isset($detalles['descripcion_larga']) ? limpiaCadena($detalles['descripcion_larga']) : 'No disponible' ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-cogs"></i> Materiales y Características
            </div>
            <div class="card-body">
                <?= isset($detalles['materiales']) ? limpiaCadena($detalles['materiales']) : 'No disponible' ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-star"></i> Opiniones de Clientes
            </div>
            <div class="card-body">
                <ul>
                    <?= isset($detalles['review']) ? limpiaCadena($detalles['review']) : 'No disponible' ?>
                </ul>
            </div>
        </div>
    </div>
</div>
