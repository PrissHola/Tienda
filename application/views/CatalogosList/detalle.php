

<div class="container-fluid2">
<div class="producto">
  <div class="row">
    <div class="col-md-4">
      <center>
        <img id="item-display" class="img-responsive" src="<?= base_url('Imagenes/' . limpiaCadena($detalles['imagen'])) ?>">
      
      <div class="row">
        <div class="col-xs-4">
          <img src="<?= base_url('Imagenes/' . limpiaCadena($detalles['imagen_sec1'])) ?>">
        </div>
        <div class="col-xs-4">
          <img src="<?= base_url('Imagenes/' . limpiaCadena($detalles['imagen_sec2'])) ?>">
      

        </div>
        
      </div>
    </div>
    </center>
    <div class="col-md-8">
      <h2><?= isset($detalles['nombre_categoria']) ? limpiaCadena($detalles['nombre_categoria']) : '' ?></h2>
      <p><?= isset($detalles['descripcion']) ? limpiaCadena($detalles['descripcion']) : '' ?></p>
      <div class="product-rating">
      <?= isset($detalles['estrellas']) ? limpiaCadena($detalles['estrellas']) : '' ?>
      </div>


      <hr>
<div>
    <label><input type="radio" name="tipo" value="venta"> Venta</label>
    <label><input type="radio" name="tipo" value="renta"> Renta</label>
</div>
<div class="product-price" id="product-price">
    Precio: Cargando...
</div>
<div class="product-stock">Disponible</div>
<hr>



      <p>Talla:</p>
      <label class="radio-inline">
        <input type="radio" name="optradio" checked>S
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio">M
      </label>
      <label class="radio-inline">
        <input type="radio" name="optradio">L
      </label>
      <hr>
      <label for="sel1">Color:</label>
      <select class="form-control" id="sel1">
        <option><?= isset($detalles['color1']) ? limpiaCadena($detalles['color1']) : 'x' ?></option>
        <option><?= isset($detalles['color2']) ? limpiaCadena($detalles['color2']) : 'x' ?></option>
      </select>
      <div class="btn-group cart">
        <button type="button" class="btn btn-success">Añadir al carrito</button>
      </div>
      <div class="btn-group wishlist">
        <button type="button" class="btn btn-danger">Comprar ahora</button>
      </div>
    </div>
  </div>
  </div>
</div>



<div class="container-fluid2">
    <button id="ver-mas" class="btn btn-primary">Ver más detalles</button>

<div class="col-md-12 product-info">
    <div id="detalle-extra" style="display: none;">
        <!-- Aquí se cargará dinámicamente la vista detalle_extra.php -->
    </div>
</div>

</div>
   
				<hr>
			

<script>
$(document).ready(function() {
    $("input[name='tipo']").on("change", function() {
        var tipo = $("input[name='tipo']:checked").val();
        var id = "<?=$Id?>"; // Asegúrate de que esta variable tenga el ID correcto

        $("#product-price").html("Precio: Cargando...");

        var urlAjax = "<?= base_url() ?>TuMedida/actualizar_precio";

        console.log("Enviando solicitud a:", urlAjax); // Depuración

        $.ajax({
            url: urlAjax,
            type: "POST",
            data: { id: id, tipo: tipo },
            dataType: "json",
            success: function(response) {
                console.log("Respuesta del servidor:", response); // Depuración

                if (response.success) {
                    let precio = response.precio ? response.precio : "No disponible";
                    $("#product-price").html("Precio: $" + precio + " (" + tipo.charAt(0).toUpperCase() + tipo.slice(1) + ")");
                } else {
                    $("#product-price").html("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.log("Error AJAX:", xhr.responseText);
                $("#product-price").html("Error de conexión al obtener el precio.");
            }
        });
    });
});
</script>


<script>
$(document).ready(function() {
    $("#ver-mas").on("click", function() {
        var id = "<?=$Id?>"; // Asegurar que esta variable tenga el ID correcto
        var urlAjax = "<?= base_url() ?>TuMedida/cargar_detalle_extra";

        $("#ver-mas").text("Cargando...").prop("disabled", true);

        $.ajax({
            url: urlAjax,
            type: "POST",
            data: { id: id },
            dataType: "html",
            success: function(response) {
                $("#detalle-extra").html(response).fadeIn();
                $("#ver-mas").hide(); // Ocultar botón después de cargar los datos
            },
            error: function(xhr, status, error) {
                console.log("Error AJAX:", xhr.responseText);
                alert("Error al cargar los detalles.");
                $("#ver-mas").text("Ver más detalles").prop("disabled", false);
            }
        });
    });
});
</script>

<style>


/*********************************************
        		Theme Elements
*********************************************/

.gold{
	color: #FFBF00;
}

/*********************************************
					PRODUCTS
*********************************************/

.product{
	border: 1px solid #dddddd;
	height: 321px;
}


.product>img{
	max-width: 230px;
}

.product-rating{
	font-size: 20px;
	margin-bottom: 25px;
}

.product-title{
	font-size: 20px;
}

.product-desc{
	font-size: 14px;
}

.product-price{
	font-size: 22px;
}

.product-stock{
	color: #74DF00;
	font-size: 20px;
	margin-top: 10px;
}

.product-info{
		margin-top: 40px;
		background-color: #E3DED5;
}

.product-info2{
		margin-top: 40px;
		background-color: #E3DED5;
}
.form-control{
    
    width: 280px;
    padding: 5px 10px;
}
.product-info3{
		margin-top: 40px;
		background-color: #E3DED5;
}
/*********************************************
					VIEW
*********************************************/

.content-wrapper {
	max-width: 1140px;
	background: #fff;
	margin: 0 auto;
	margin-top: 0px;
	margin-bottom: 10px;
	border: 0px;
	border-radius: 0px;
}

.container-fluid2{
	max-width: 1140px;
	margin: 0 auto;
}

.view-wrapper {
	float: right;
	max-width: 70%;
	margin-top: 25px;
}

.container {
	padding-left: 0px;
	padding-right: 0px;
	max-width: 100%;
}
.card {
    margin-top: 19px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 20px;
    background-color: red;
}
.producto{
background-color: #5ba88a;
margin-left:5px;
padding-top:5px;
padding-left:5px;
padding-right:5px;


}
.card-header {
    background-color: rgba(89, 19, 0, 0.9); 
    color: white;
    font-size: 18px;
    font-weight: bold;
    padding: 10px;
    display: flex;
    align-items: center;
}

.card-header i {
    margin-right: 10px;
    font-size: 20px;
    color: #333;
}

.card-body {
    padding: 15px;
    background-color: #fff;
    font-size: 14px;
}

.card-body ul {
    padding-left: 20px;
}

.card-body ul li {
    margin-bottom: 10px;
}
/*********************************************
				ITEM 
*********************************************/


.product {
    border: 1px solid #8C897C;
    background-color: #C4BFB3;
    padding: 20px;
    border-radius: 5px;
}

.product-title {
    font-size: 22px;
    color: #322D2E;
}

.product-desc {
    font-size: 14px;
    color: #322D2E;
}

.product-price {
    font-size: 24px;
    color: black;
}

.product-stock {
    color: #A7C66B;
    font-size: 20px;
    margin-top: 10px;
    font-weight: bold;
}

.custom-btn {
    background-color: #A7C66B !important;
    border-color: #8C897C !important;
    color: #322D2E !important;
    font-weight: bold;
}

.custom-btn:hover {
    background-color: #8C897C !important;
    color: #E3DED5 !important;
}



.service1-items {
	padding: 0px 0 0px 0;
	float: left;
	position: relative;
	overflow: hidden;
	max-width: 100%;
	height: 321px;
	width: 130px;
}

.service1-item {
	height: 100%;
	width: auto;
	display: block;
	float: left;
	position: relative;
	padding-right: 20px;
	border-right: 1px solid #DDD;
	border-top: 1px solid #DDD;
	border-bottom: 1px solid #DDD;
}

.service1-item > img {
	max-height: 110px;
	max-width: 110px;
	opacity: 0.6;
	transition: all .2s ease-in;
	-o-transition: all .2s ease-in;
	-moz-transition: all .2s ease-in;
	-webkit-transition: all .2s ease-in;
}

.service1-item > img:hover {
	cursor: pointer;
	opacity: 1;
}

.service-image-left {
	padding-right: 50px;
}

.service-image-right {
	padding-left: 50px;
}

.service-image-left > center > img,.service-image-right > center > img{
	max-height: 300px;
}


</style>