<style>
  
</style>

<body>
<div class="dresses-sectionh">
    <div class="bg-1">
        <div class="container text-center">

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="list-group">
    <h3>Precio</h3>
    <input type="hidden" id="hidden_minimum_price" value="1000" />
    <input type="hidden" id="hidden_maximum_price" value="65000" />
    <p id="price_show">1000 - 65000</p>
    <div id="price_range"></div>
</div>


            <h3><?= isset($titulo_hombre['titulo']) ? limpiaCadena($titulo_hombre['titulo']) : 'Título no disponible' ?></h3>
            <p><?= isset($subt_hombre['titulo']) ? limpiaCadena($subt_hombre['titulo']) : 'Título no disponible' ?></p>

            <br>

            <!-- Filtros arriba como etiquetas -->
            <div class="filters-top">
                <h4>Filtrar por Subcategoría</h4>
                <a class="filter-tagh <?= empty($id_subcategoria) ? 'active' : '' ?>" href="<?= base_url('TuMedida/Hombre') ?>">Todos</a>
                <?php foreach ($subcategorias as $subcat): ?>
                    <a class="filter-tagh <?= (isset($id_subcategoria) && $id_subcategoria == $subcat['Id']) ? 'active' : '' ?>"
                       href="<?= base_url('TuMedida/Hombre/' . $subcat['Id']) ?>">
                        <?= limpiaCadena($subcat['Subcategoria']); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Contenedor de productos -->
            <div class="row">
                <?php foreach ($hombres as $item): ?>
                    <?php 
                        $id = isset($item['Id']) ? limpiaCadena($item['Id']) : (isset($item['id']) ? limpiaCadena($item['id']) : null);
                    ?>
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <img src="<?= base_url('Imagenes/' . (isset($item['imagen']) ? limpiaCadena($item['imagen']) : '')) ?>" 
                                 alt="<?= isset($item['nombre_categoria']) ? limpiaCadena($item['nombre_categoria']) : '' ?>" 
                                 class="product-image"
                                 data-id="<?= $id ?>">

                            <h4><?= isset($item['nombre_categoria']) ? limpiaCadena($item['nombre_categoria']) : '' ?></h4>
                            <p class="description"><?= isset($item['descripcion']) ? limpiaCadena($item['descripcion']) : '' ?></p>

                            <?php if (!empty($id)): ?>
                                <button class="btn detalles-btn" data-id="<?= $id ?>">Detalles</button>
                            <?php else: ?>
                                <p style="color: red;">⚠ ID no encontrado</p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Botón de detalles
        document.querySelectorAll(".detalles-btn").forEach(function (boton) {
            boton.addEventListener("click", function () {
                let id = this.getAttribute("data-id");
                if (id) {
                    window.location.href = "<?= base_url('TuMedida/consultar_producto2/') ?>" + id;
                } else {
                    alert("ID no encontrado.");
                }
            });
        });
    });
</script>

<script>
$(document).ready(function() {
    // Inicialización del slider
    $("#price_range").slider({
        range: true,
        min: 1000,
        max: 65000,
        values: [1000, 65000],
        step: 1000,
        slide: function(event, ui) {
            $("#price_show").html(ui.values[0] + " - " + ui.values[1]);
            $("#hidden_minimum_price").val(ui.values[0]);
            $("#hidden_maximum_price").val(ui.values[1]);
        },
        change: function(event, ui) {
            filtrarPorPrecio();
        }
    });

    // Función para filtrar productos por precio
    function filtrarPorPrecio() {
        let min = $("#hidden_minimum_price").val();
        let max = $("#hidden_maximum_price").val();

        $.ajax({
            url: "<?= base_url('TuMedida/filtrar_por_precio') ?>",
            method: "POST",
            data: { minimo: min, maximo: max },
            success: function(data) {
                // Actualizar el contenedor de productos con la respuesta
                $("#productos-container").html(data);

                // Reasignar eventos a los botones "Detalles" después de actualizar el contenido
                delegarEventosDetalles();  // Llamamos la función de delegación
            }
        });
    }

    // Delegación de eventos para los botones "Detalles"
    function delegarEventosDetalles() {
        // Usamos delegación de eventos para el contenedor #productos-container
        $("#productos-container").on("click", ".detalles-btn", function() {
            let id = $(this).data("id");
            if (id) {
                window.location.href = "<?= base_url().'TuMedida/consultar_producto/' ?>" + id;
            } else {
                alert("ID no encontrado.");
            }
        });
    }

    // Inicializar delegación para los botones "Detalles" al cargar la página
    delegarEventosDetalles();
});
</script>

</body>
</html>
