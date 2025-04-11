<style>
    /* Estilos opcionales */
</style>

<body>
<div class="dresses-section">
  <div class="bg-1">
    <div class="container text-center">
    <h3><?= isset($titulo_mujer['titulo']) ? limpiaCadena($titulo_mujer['titulo']) : 'Título no disponible' ?></h3>
    <p><?= isset($subt_mujer['titulo']) ? limpiaCadena($subt_mujer['titulo']) : 'Título no disponible' ?></p>

      <div class="row">
        <?php foreach ($rebajas as $item): ?>
                        <?php 
                            $id = isset($item['Id']) ? limpiaCadena($item['Id']) : (isset($item['id']) ? limpiaCadena($item['id']) : null);
                        ?>
                        <div class="col-sm-4">
                            <div class="thumbnail">
                                <img src="../Imagenes/<?= isset($item['imagen']) ? limpiaCadena($item['imagen']) : '' ?>" 
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
            document.querySelectorAll(".detalles-btn").forEach(function (boton) {
                boton.addEventListener("click", function () {
                    let id = this.getAttribute("data-id");
                    if (id) {
                        window.location.href = "<?= base_url().'TuMedida/consultar_producto2/' ?>" + id;
                    } else {
                        alert("ID no encontrado.");
                    }
                });
            });
        });
    </script>
</body>
</html>
