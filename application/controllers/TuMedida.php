<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TuMedida extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Pagina_model','mP'); // Usamos este modelo para las consultas generales
        $this->load->library('session'); // Para manejar sesiones si es necesario
    }

    public function index(){
        // Cargar los datos generales para la vista (los que ya tenías)
        $datos['secciones'] = $this->mP->consultar_secciones();
        $datos['secciones2'] = $this->mP->consultar_secciones2();
        $datos['nav'] = $this->mP->consultar_secciones_nav();
        $datos['servicios'] = $this->mP->consultar_servicios();
        $datos['carrusel'] = $this->mP->consultar_carrusel();
        $datos['catalogos'] = $this->mP->consultar_catalogos();
        $datos['quienes_somos'] = $this->mP->obtener_quienes_somos();
        $datos['valores'] = $this->mP->consultar_valores();
        $datos['valores2'] = $this->mP->valores();
        $datos['contacto'] = $this->mP->consultar_contacto();
        $datos['redes_sociales'] = $this->mP->consultar_redes_sociales();
        $datos['titulo_catalogos'] = $this->mP->consultar_titulo(1);
        $datos['titulo_valores'] = $this->mP->consultar_titulo(2);
        $datos['titulo_contacto'] = $this->mP->consultar_titulo(3);
        $datos['titulo_redes'] = $this->mP->consultar_titulo(4);
        
        $this->load->view('genericos/header');
        $this->load->view('navbar',$datos);
        $this->load->view('carrousel', $datos);
        $this->load->view('intro', $datos);
        $this->load->view('catalogos', $datos); 
        $this->load->view('valores', $datos);  
        $this->load->view('contacto', $datos);
    }


public function registrar() {
    
    $correo = $this->input->post('correo');
    $contrasena = $this->input->post('contrasena');

 
    if (empty($correo) || empty($contrasena)) {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
        return;
    }

    // Llamada al modelo para registrar
    $resultado = $this->mP->registrar($correo, $contrasena);

 
    if ($resultado) {
        echo json_encode(['status' => 'success', 'message' => '¡Usuario registrado correctamente!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No se pudo registrar el usuario. Intente nuevamente.']);
    }
}

    
//seccion de catalogo de mujeres
public function Mujer($id_subcategoria = NULL)
{
    $datos['quienes_somos'] = $this->mP->obtener_quienes_somos();
    $datos['catalogos'] = $this->mP->consultar_catalogos();
    $datos['secciones2']=$this->mP->consultar_secciones2();
    $datos['nav']=$this->mP->consultar_secciones_nav();
    
    // Pasamos el id_subcategoria al modelo para filtrar
    $datos['mujeres'] = $this->mP->consultar_mujeres($id_subcategoria); 
    $datos['titulo_mujer'] = $this->mP->consultar_titulo(9);
    $datos['subt_mujer'] = $this->mP->consultar_titulo(13);
    $datos['subcategorias'] = $this->mP->consultar_subcategorias_M(); // 

    $this->load->view('genericos/header');
    $this->load->view('navbar',$datos);
    $this->load->view('CatalogosList/catalogo_mujer', $datos);    
}
//seccion de catalogo de hombres
	public function Hombre($id_subcategoria = NULL)
	{
		$datos['quienes_somos'] = $this->mP->obtener_quienes_somos();
		$datos['catalogos'] = $this->mP->consultar_catalogos();
		$datos['secciones2']=$this->mP->consultar_secciones2();
		$datos['nav']=$this->mP->consultar_secciones_nav();
		$datos['hombres'] = $this->mP->consultar_hombre($id_subcategoria); 
		$datos['titulo_hombre'] = $this->mP->consultar_titulo(6);
		$datos['subt_hombre'] = $this->mP->consultar_titulo(7);
		$datos['subcategorias'] = $this->mP->consultar_subcategorias_H(); // 

		$this->load->view('genericos/header');
		$this->load->view('navbar',$datos);
		$this->load->view('CatalogosList/catalogo_hombre', $datos);
	}

//seccion de catalogo de rebajas
	public function Rebaja()
	{
		$datos['quienes_somos'] = $this->mP->obtener_quienes_somos();
		$datos['catalogos'] = $this->mP->consultar_catalogos();
		$datos['secciones2']=$this->mP->consultar_secciones2();
		$datos['nav']=$this->mP->consultar_secciones_nav();
		$datos['rebajas'] = $this->mP->consultar_rebajas(); 
		$datos['titulo_mujer'] = $this->mP->consultar_titulo(6);
		$datos['subt_mujer'] = $this->mP->consultar_titulo(7);

		$this->load->view('genericos/header');
		$this->load->view('navbar',$datos);
		$this->load->view('CatalogosList/catalogo_rebajas', $datos);
		
	}


		public function traer_producto(){
			$datos['quienes_somos'] = $this->mP->obtener_quienes_somos();
   			 $id=$this->input->post('id');
   			 $datos["caracteristicas"]=$this->mP->consultar_detalle($id);
    			//log_message('error',$id);
    		$respuesta=$this->load->view('caracteristicas',$datos);
    		return $respuesta;
}

		public function consultar_producto($Id){
		$datos['quienes_somos'] = $this->mP->obtener_quienes_somos();
		$datos['detalles'] = $this->mP->consultar_detalle_hombre($Id);
		$datos['secciones2']=$this->mP->consultar_secciones2();
		$datos["Id"]=$Id;

		$this->load->view('genericos/header');
		$this->load->view('navbar',$datos);
		$this->load->view('CatalogosList/detalle');
	}

		public function consultar_producto2($Id){
		$datos['quienes_somos'] = $this->mP->obtener_quienes_somos();
		$datos['detalles'] = $this->mP->consultar_detalle($Id);
		$datos['secciones2']=$this->mP->consultar_secciones2();
		$datos["Id"]=$Id;

		$this->load->view('genericos/header');
		$this->load->view('navbar',$datos);
		$this->load->view('CatalogosList/detalle');
	}
	
public function actualizar_precio() {
    $id = $this->input->post('id');
    $tipo = $this->input->post('tipo');

    // Obtener la URL de donde vino la petición
    $referer = $_SERVER['HTTP_REFERER'];
    log_message('debug', 'URL Referer: ' . $referer); // Depuración

    // Determinar si la URL de referencia contiene "consultar_producto" o "consultar_producto2"
    if (strpos($referer, 'consultar_producto2') !== false) {
        $detalles = $this->mP->consultar_detalle($id); // Mujeres
    } else {
        $detalles = $this->mP->consultar_detalle_hombre($id); // Hombres
    }

    if ($detalles) {
        $precio = ($tipo == 'venta') ? $detalles['precio_venta'] : $detalles['precio_renta'];
        echo json_encode(['success' => true, 'precio' => $precio]);
    } else {
        echo json_encode(['success' => false, 'error' => 'No se encontraron datos']);
    }
}


public function cargar_detalle_extra() {
    $id = $this->input->post('id');

    // Determinar si es hombre o mujer con la URL
    $referer = $_SERVER['HTTP_REFERER'];
    if (strpos($referer, 'consultar_producto2') !== false) {
        $detalles = $this->mP->consultar_detalle($id); // Mujeres
    } else {
        $detalles = $this->mP->consultar_detalle_hombre($id); // Hombres
    }

    // Cargar la vista y enviar los detalles
	$this->load->view('genericos/header');
    $this->load->view('detalle_extra', ['detalles' => $detalles]);
}

public function filtrar_por_precio() {
    $min = $this->input->post('minimo');
    $max = $this->input->post('maximo');

    $productos = $this->mP->obtener_precios_venta();
    

    $ids_filtrados = array_filter($productos, function($producto) use ($min, $max) {
        return $producto['precio_venta'] >= $min && $producto['precio_venta'] <= $max;
    });

    $ids = array_column($ids_filtrados, 'Id_prenda');

    $todos_productos = $this->mP->consultar_hombre(); // o como se llame tu método principal
    $productos_filtrados = array_filter($todos_productos, function($prod) use ($ids) {
        return in_array($prod['id'], $ids);
    });

    // Renderiza solo los productos filtrados como HTML (o puedes devolver JSON si prefieres)
    $output = '';
    foreach ($productos_filtrados as $item) {
        $output .= '
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="../Imagenes/' . limpiaCadena($item['imagen']) . '" class="product-image">
                <h4>' . limpiaCadena($item['nombre_categoria']) . '</h4>
                <p class="description">' . limpiaCadena($item['descripcion']) . '</p>
                <button class="btn detalles-btn" data-id="' . $item['id'] . '">Detalles</button>
            </div>
        </div>';
    }

    echo $output;
}

public function filtrar_por_precio_mujer() {
    $min = $this->input->post('minimo');
    $max = $this->input->post('maximo');

    $productos = $this->mP->obtener_precios_venta_mujer();

    $ids_filtrados = array_filter($productos, function($producto) use ($min, $max) {
        return $producto['precio_venta'] >= $min && $producto['precio_venta'] <= $max;
    });

    $ids = array_column($ids_filtrados, 'Id_prenda');

    $todos_productos = $this->mP->consultar_mujeres();

    $productos_filtrados = array_filter($todos_productos, function($prod) use ($ids) {
        return in_array($prod['id'], $ids);
    });

   
    $output = '';
    foreach ($productos_filtrados as $item) {
        $id = isset($item['Id']) ? limpiaCadena($item['Id']) : (isset($item['id']) ? limpiaCadena($item['id']) : null);
        $output .= '
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="../Imagenes/' . limpiaCadena($item['imagen']) . '" class="product-image" data-id="' . $id . '">
                <h4>' . limpiaCadena($item['nombre_categoria']) . '</h4>
                <p class="description">' . limpiaCadena($item['descripcion']) . '</p>';

        if (!empty($id)) {
            $output .= '<button class="btn detalles-btn" data-id="' . $id . '">Detalles</button>';
        } else {
            $output .= '<p style="color: red;">⚠ ID no encontrado</p>';
        }

        $output .= '
            </div>
        </div>';
    }

    echo $output;
}


}
