
<body>

  <!-- Barra de navegación -->
<nav class="navbar navbar-inverse" style="position: fixed; top: 0; width: 100%; z-index: 9999;">
  <div class="container-fluid">
    <!-- Navbar Header con botón colapsable -->
      <!-- Botón hamburguesa -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#miNavbarResponsive" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <!-- Logo y marca -->
      <a class="navbar-brand" href="#">
        <img src="<?= base_url(limpiaCadena($quienes_somos['logo'])) ?>" alt="Logo" style="max-height: 30px; display: inline;">
        <span class="titulo2"><?= limpiaCadena($quienes_somos['marca']) ?></span>
      </a>
    </div>

 

    <!-- Contenido colapsable -->
    <div class="collapse navbar-collapse" id="miNavbarResponsive">
      <!-- Menú de navegación -->
      <ul class="nav navbar-nav">
        <?php
        if(!empty($secciones2)){
          foreach($secciones2 as $item){
            echo "<li><a href='" . $item['link'] . "'>" . limpiaCadena($item['nombre_seccion']) . "</a></li>";
          }
        }
        ?>
      </ul>


      <!-- Buscador con menú de opciones al enfocar el input -->
<form class="navbar-form navbar-left" role="search" id="form-busqueda" style="position: relative;">
  <div class="form-group" style="position: relative;">
    <input type="text" class="form-control" placeholder="¿Qué estás buscando?" id="inputBusqueda" autocomplete="off">

    <!-- Menú de opciones -->
    <ul id="menuOpciones" class="dropdown-menu" style="display:none; position:absolute; top:35px; left:0; z-index:999;">
    <?php
        if(!empty($catalogos)){
          foreach($catalogos as $item){
            echo "<li><a href='" . base_url($item['link']) . "'>" . limpiaCadena($item['buscador']) . "</a></li>";

          }
        }
        ?>
    </ul>
  </div>
  <button type="submit" class="btn btn-default">Buscar</button>
</form>

<!-- Script jQuery para mostrar las opciones -->
<script>
  $(document).ready(function () {
    // Mostrar el menú al enfocar el input
    $('#inputBusqueda').on('focus', function () {
      $('#menuOpciones').show();
    });

    // Ocultar el menú si se hace clic fuera del formulario
    $(document).on('click', function (e) {
      if (!$(e.target).closest('#form-busqueda').length) {
        $('#menuOpciones').hide();
      }
    });
  });
</script>

      <ul class="nav navbar-nav navbar-right">
        
          <li><a href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
          <li><a href="#" data-toggle="modal" data-target="#registerModal"><span class="glyphicon glyphicon-user"></span> Crear cuenta</a></li>
        </ul>
    </div>
  </div>
</nav>
<!-- Modal de login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="loginModalLabel">Iniciar Sesión</h4>
        </div>
        <div class="modal-body">
          <form onsubmit="loginUser(event)">
            <div class="form-group">
              <label for="username">Usuario</label>
              <input type="text" class="form-control" id="username" placeholder="Ingrese su usuario">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Crear cuenta -->
<!-- Modal de Crear cuenta -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="registerForm">
        <div class="modal-header">
          <h4 class="modal-title" id="registerModalLabel">Crear Cuenta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="registerEmail">Correo electrónico</label>
            <input type="email" class="form-control" id="registerEmail" name="correo" required>
          </div>
          <div class="form-group">
            <label for="registerPassword">Contraseña</label>
            <input type="password" class="form-control" id="registerPassword" name="contrasena" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Registrarse</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Script AJAX -->
<script>
  $('#registerForm').submit(function(e) {
    e.preventDefault();

    const correo = $('#registerEmail').val();
    const contrasena = $('#registerPassword').val();

    if (!correo || !contrasena) {
      return alert('Por favor, completa todos los campos.');
    }

    $.post('<?= base_url("TuMedida/registrar") ?>', { correo, contrasena })
      .done(function(response) {
        const res = JSON.parse(response);
        if (res.status === 'success') {
          alert('¡Usuario registrado correctamente!');
          $('#registerModal').modal('hide').find('form')[0].reset();
        } else {
          alert('Error: ' + res.message);
        }
      })
      .fail(function(xhr, status, error) {
        alert('Hubo un error en la conexión con el servidor: ' + error);
      });
  });
</script>

