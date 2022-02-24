<?php 
  session_start();
  if(!$_SESSION['idU']) {
    header("Location: ./inicio_sesion.php");
  } else if ($_SESSION['tipo'] != 'user') {
    header("Location: ./alta_administradores.php");
  } else {
    $idU = $_SESSION['idU'];
    $nombre = $_SESSION['nombre'];
  }

  require "./conecta.php";
  $con = conecta();

  $sql = "SELECT * FROM USUARIOS WHERE ID_USUARIO = $idU";
  //echo $sql;
  $res = mysqli_query($con, $sql);
  $cliente = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta charset="utf-8">
  <title>Carpintería</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="Services, Need Help Right Away?">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="House-Repair-Services-1.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 3.10.4, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:150,100i,300,150i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:150,100i,300,150i,400,400i,500,500i,700,700i,900,900i|Montserrat:150,100i,200,150i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Archivo+Black:400">


  <script type="application/ld+json">
    {
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html",
		"logo": "images/default-logo.png"}
  </script>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script>
    function vermail(){
            var id 	= $('#id_sel').val();
            var correo	= $('#email').val();
            if (correo != ''){
                $.ajax({
                    url 	: 'verifica_correo.php',
                    type 	: 'post',
                    dataType : 'text',
                    data    : 'id='+id+'&correo='+correo,
                    success :function(res){
                        if (res>0){
                            $('#messPass').html('El correo: '+correo+' ya está registrado');
                            $('#email').val('');
                            setTimeout("$('#messPass').html('');",5000);
                        }
                    }, error: function(){
                        alert ('Error al conectar al servidor...');
                    }
                });
            }
        }
    function verpass() {
            var pass1 = document.getElementById('pass_one').value;
            var pass2 = document.getElementById('pass_two').value;
            if (pass1 != pass2) {
                $('#messPass').html('La contraseña no coincide');
            }
            else {
                $('#messPass').html('');
            }
        }
    function categoria() {
      var selector = document.getElementById("Categorias").value;
      window.location = './catalogo_categoria.php?categoria='+selector;
    }
    function valida() {
            var ok = true;
            var nombre = document.formulario.nombre.value;
            var apellido = document.formulario.apellido.value;
            var mail = document.formulario.email.value;
            var domCalle = document.formulario.domCalle.value;
            var domNum = document.formulario.domNum.value;
            var tarjeta = document.formulario.tarjeta.value;
            var pass1 = document.formulario.pass_one.value;
            var pass2 = document.formulario.pass_two.value;
            if (nombre == "" || apellido == "" || mail == "" || domCalle == "" || domNum == 0 || tarjeta == "" || pass1 != pass2) {
                ok = false;
                console.log("No nombre");
            }

            if (ok == false) {
                alert("Faltan campos por llenar o la contraseña no coincide");
            } else {
                alert("Nombre: " + nombre +
                    "\nApellido: " + apellido +
                    "\nDomicilio (calle): " + domCalle +
                    "\nDomicilio (número): " + domNum +
                    "\nTarjeta: " + tarjeta +
                    "\nCorreo: " + mail +
                    "\nContraseña: " + pass1);
                document.formulario.method = 'post';
                document.formulario.action = 'modificaUsuarios.php';
                document.formulario.submit();
            }
            return ok;
        }
  </script>
  <meta property="og:title" content="House Repair Services 1">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#104e92">
  <link rel="canonical" href="index.html">
  <meta property="og:url" content="index.html">
</head>


<body
  data-home-page="https://website303650.nicepage.io/House-Repair-Services-1.html?version=44e14f81-1fe2-4e50-b81b-c7970ca063ac"
  data-home-page-title="House Repair Services 1" class="u-body">
  <header class="u-clearfix u-header u-header" id="sec-e2e7">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <style>
        .CentrarMenu {
          margin-left: 40%;
          margin-top: 4%;
        }

        .anchoMenu {
          height: 10px;
        }

        #lista1 li {
          display: inline;
          padding-left: 3px;
          padding-right: 3px;
        }

        ul#display-inline-block-example,
        ul#display-inline-block-example li {
          display: inline;
          padding-left: 3px;
          padding-right: 3px;
        }

        ul#display-inline-block-example li {
          display: inline-block;
          width: 160px;
          min-height: 200px;
          background: #ccc;
        }

        img {
          border-radius: 20%;
        }

        table {
            width: 750px;
            border-collapse: separate;
            border: 1px solid #000000;
            background-color: blue; 
        }
        th {
            width: 25%;
            border: 1px solid #000000;
            background-color: gray;
        }
        td {
            width: 25%;
            border: 1px solid #000000;
            background-color: gainsboro;
            text-align: center;
        }

        .error {
            display: inline;
            color: red;
        }
      </style>

      <div class="anchoMenu">
        <div class="CentrarMenu">
          <div>
            <ul id="lista1">
              <li>
                <a>
                  <select name="Categorias" label="Categorias" id="Categorias" onchange="categoria();">
                    <option disabled selected value="Escoge">Artículos</option>
                    <option value="Mesas">Mesas</option>
                    <option value="Sillas">Sillas</option>
                    <option value="Recamaras">Recamaras</option>
                    <option value="Roperos"> Roperos</option>
                    <option value="Jardineria">Jardinería</option>
                    <option value="Cortineros">Cortineros</option>
                  </select>
                </a>
              </li>
              <li><a href="./index.php">Inicio</a></li>
              <li><a href="./catalogo.php">Catálogo</a></li>
              <li><a href="./perfil.php">Perfil</a></li>
              <li><a href="./carrito.php">Carrito</a></li>
              <?php 
                                if ($_SESSION['tipo'] == 'admin') {
                                    echo "
                                    <li>
                                    <a>
                                        <select name=\"Administrador\" id=\"Administrador\" onchange=\"admin();\">
                                            <option disabled selected value=\"Escoge\">Administrar</option>
                                            <option value=\"Cuentas\">Cuentas</option>
                                            <option value=\"Productos\">Productos</option>
                                            <option value=\"Ventas\">Ventas</option>
                                        </select>
                                    </a>
                                    </li>
                                    ";
                                }
                            ?>
            </ul>
          </div>
        </div>
      </div>
      <a href="./index.php" class="u-image u-logo u-image-1">
        <img src="images/Logo.jpg" class="u-logo-image u-logo-image-1">
      </a>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="XL">
        <div class="menu-collapse"
          style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;"
          wfd-invisible="true">
          <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
            href="#">
            <svg>
              <use xlink:href="#menu-hamburger"></use>
            </svg>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <defs>
                <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                  <rect y="1" width="16" height="2"></rect>
                  <rect y="7" width="16" height="2"></rect>
                  <rect y="13" width="16" height="2"></rect>
                </symbol>
              </defs>
            </svg>
          </a>
        </div>
        <div class="u-custom-menu u-nav-container" wfd-invisible="true">
          <ul class="u-nav u-spacing-30 u-unstyled u-nav-1">
            <li class="u-nav-item"><a
                class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90"
                href="Page-1.html" style="padding: 10px 0px;">House Repair Services</a>
            </li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse" wfd-invisible="true">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item">
                  <a class="u-button-style u-nav-link" href="Page-1.html"
                    style="padding: 10px 20px;">Contactenos</a><br>
                  <a href="./ubicacion.php"> Dirección</a><br><br>
                  <a> Teléfono</a><br><br>
                  <a> Facebook</a><br><br>
                  <a> Instagram</a><br><br>
                  <a href="./cerrar_sesion.php"> Cerrar Sesión</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70" wfd-invisible="true"></div>
        </div>
      </nav>
    </div>
  </header>

  <section class="u-align-center u-clearfix u-image u-section-1" id="carousel_ceea">

  </section>

  <section class="u-align-center u-clearfix u-grey-5 u-section-2" id="carousel_4ff3">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <a>Bienvenido <?php echo $cliente['NOMBRE'].' '.$cliente['APELLIDO'] ?>!</a>
      <ul>
        <li>Mis pedidos</li>
        <?php 
          $sql = "SELECT * FROM VENTAS WHERE ID_CLIENTE = $idU";
          $res = mysqli_query($con, $sql);
          if (mysqli_num_rows($res) > 0) {
            echo "
            <li>
            <div align=\"center\">
            <table>
            <tr>
            <th>Id</th>
            <th>Nombre Producto</th>
            <th>Fecha</th>
            </tr>
            ";
            while ($venta = mysqli_fetch_assoc($res)) {
              $sql = "SELECT * FROM CARRITO WHERE ID_VENTA = ".$venta['ID_VENTAS']."";
              $resCarro = mysqli_query($con, $sql);
              if (mysqli_num_rows($resCarro) > 0) {
                while ($carro = mysqli_fetch_assoc($resCarro)) {
                  $sql = "SELECT * FROM PRODUCTO WHERE ID_PRODUCTO = ".$carro['ID_PRODUCTO']."";
                  $resProd = mysqli_query($con, $sql);
                  $prod = mysqli_fetch_assoc($resProd);
                  echo "
                  <tr>
                    <td>".$venta['ID_VENTAS']."</td>
                    <td>".$prod['NOMBRE_PRODUCTO']."</td>
                    <td>".$venta['FECHA']."</td>
                  </tr>
                  ";
                }
              }
            }
            echo "
            </table>
          </div>
        </li><br>
            ";
          } else {
            echo "No hay registro de compra aún";
          }
        ?>
        <li>Configuración de cuenta</li>
        <li>
          <form name="formulario">
            <table align="center">
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
              </tr>
              <tr>
                <td><input style="height: 25px;" type="text" name="nombre" placeholder="Nombre" value="<?php echo $cliente['NOMBRE']?>"></input></td>
                <td><input style="height: 25px;" type="text" name="apellido" placeholder="Apellido" value="<?php echo $cliente['APELLIDO']?>"></input></td>
                <td><input style="height: 25px;" id="email" type="text" name="email" placeholder="Correo Electrónico" value="<?php echo $cliente['CORREO']?>" onblur="vermail();"></input></td>
              </tr>
              <tr>
                <th>Dom. Calle</th>
                <th>Dom. Número</th>
                <th>Tarjeta</th>
              </tr>
              <tr>
                <td><input style="height: 25px;" type="text" name="domCalle" placeholder="Domicilio (Calle)" value="<?php echo $cliente['DOM_CALLE']?>"></input></td>
                <td><input style="height: 25px;" type="number" name="domNum" placeholder="Domicilio (Número)" value="<?php echo $cliente['DOM_NUMERO']?>"></input></td>
                <td><input style="height: 25px;" type="number" name="tarjeta" placeholder="No. de Tarjeta" value="<?php echo $cliente['TARJETA']?>"></input></td>
              </tr>
              <tr>
                <th colspan="2">Contraseña</th>
                <th colspan="2">Confirmar Contraseña</th>
              </tr>
              <tr>
                <td colspan="2"><input style="height: 25px;" type="password" id="pass_one" name="pass_one" placeholder="Contraseña" onblur="verpass();"></input></td>
                <td colspan="2"><input style="height: 25px;" type="password" id="pass_two" name="pass_two" placeholder="Confirmar Contraseña" onblur="verpass();"></input></td>
              </tr>
            </table>
            <div id="messPass" class="error"></div><br>
            <input type="hidden" id="id_sel" name="id_sel" value="<?php echo $idU?>"/>
            <input onclick="valida();" type="button" value="Actualizar">
          </form>
        </li>
      </ul>
    </div>
  </section>

  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-fdb7">
    <div >
      <p> Mas Sobre Nosotros.</p>
      <p> 5468 Marianna Street City Lake Eastonview</p>
      <p> (806) 765-3400 634 E-Mail carloscastellanos0200@gmail.com</p>
    </div>
  </footer>

</body>

</html>