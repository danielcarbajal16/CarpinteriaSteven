<?php 
  session_start();
  require "./conecta.php";
  $con = conecta();

  if(!$_SESSION['idU']) {
    header("Location: ./inicio_sesion.php");
  } else {
      $idU = $_SESSION['idU'];
      $nombre = $_SESSION['nombre'];
  }
?>

<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Services, Need Help Right Away?">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>Carpintería</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="House-Repair-Services-1.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 3.10.4, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Archivo+Black:400">

  <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html",
		"logo": "images/default-logo.png"
}</script>
<script>
  function admin() {
            var selector = document.getElementById("Administrador").value;
            if (selector == 'Cuentas') {
                window.location = "./alta_administradores.php";
            } else if (selector == 'Productos') {
                window.location = "./listado_productos.php";
            } else {
                window.location = "./listado_ventas.php";
            }
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
      </style>

      

      <div class="anchoMenu">
        <div class="CentrarMenu">
          <div>
            <ul id="lista1">
              <li><a href="./catalogo.php">Catálogo</a></li>
              <li><a href="./perfil.php">Perfil</a></li>
              <!--<li><a href="#">Historial </a></li>-->
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
      <a href="#" class="u-image u-logo u-image-1">
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

    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-col">
            <div class="u-size-30">
              <div class="u-layout-row">
                <div
                  class="u-align-left u-container-style u-layout-cell u-left-cell u-right-cell u-size-60 u-layout-cell-1">
                  <div class="u-container-layout u-container-layout-1">
                    <h1 style="color: #fff000; -webkit-text-stroke: 2px black;">Carpintería Steven</h1>
                    <h3 style="color: #fff000; -webkit-text-stroke: 1px black;">Servicios</h3>
                    <div class="u-border-11 u-border-white u-expanded-width u-line u-line-horizontal u-line-1"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-size-30">
              <div class="u-layout-row">
                <div
                  class="u-align-left u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-left-cell u-size-20 u-layout-cell-2">
                  <div class="u-container-layout u-valign-top u-container-layout-2"><span
                      class="u-icon u-icon-circle u-spacing-10 u-text-body-alt-color u-icon-1"><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="Layer_1" x="0px" y="0px" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;"
                        xml:space="preserve">
                        <path style="fill:#FF2970;"
                          d="M496,465.6c0,16.8-13.6,30.4-30.4,30.4h-208c-16.8,0-30.4-13.6-30.4-30.4v-208  c0-16.8,13.6-30.4,30.4-30.4h208c16.8,0,30.4,13.6,30.4,30.4V465.6z" />
                        <path style="fill:#D10257;"
                          d="M465.6,227.2c16.8,0,30.4,13.6,30.4,30.4v208c0,16.8-13.6,30.4-30.4,30.4h-208  c-16.8,0-30.4-13.6-30.4-30.4" />
                        <path style="fill:#5349B7;"
                          d="M382.4,352c0,16.8-13.6,30.4-30.4,30.4H144c-16.8,0-30.4-13.6-30.4-30.4V144  c0-16.8,13.6-30.4,30.4-30.4h208c16.8,0,30.4,13.6,30.4,30.4V352z" />
                        <g>
                          <path style="fill:#3B38A5;"
                            d="M171.2,113.6l-57.6,57.6V292h148c16.8,0,30.4-13.6,30.4-30.4v-148H171.2z" />
                          <path style="fill:#3B38A5;"
                            d="M352,113.6c16.8,0,30.4,13.6,30.4,30.4v208c0,16.8-13.6,30.4-30.4,30.4H144   c-16.8,0-30.4-13.6-30.4-30.4" />
                        </g>
                        <path style="fill:#D10257;"
                          d="M274.4,227.2l-47.2,47.2v126.4h143.2c16.8,0,30.4-13.6,30.4-30.4V227.2H274.4z" />
                        <path style="fill:#37167F;"
                          d="M257.6,227.2c-16.8,0-30.4,13.6-30.4,30.4v124.8H352c16.8,0,30.4-13.6,30.4-30.4V227.2H257.6z" />
                        <path style="fill:#2EB9FF;"
                          d="M268.8,238.4c0,16.8-13.6,30.4-30.4,30.4h-208C13.6,268.8,0,255.2,0,238.4v-208C0,13.6,13.6,0,30.4,0  h208c16.8,0,30.4,13.6,30.4,30.4V238.4z" />
                        <path style="fill:#0097F4;"
                          d="M238.4,0c16.8,0,30.4,13.6,30.4,30.4v208c0,16.8-13.6,30.4-30.4,30.4h-208  C13.6,268.8,0,255.2,0,238.4" />
                        <!--<g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>-->
                      </svg>
                      <h5 style="color: #000;" class="u-text u-text-body-alt-color u-text-3">Pintar</h5>
                  </div>
                </div>
                <div
                  class="u-align-left u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-size-20 u-layout-cell-3">
                  <div class="u-container-layout u-valign-top u-container-layout-3"><span
                      class="u-icon u-icon-circle u-spacing-10 u-text-body-alt-color u-icon-2"><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                        xml:space="preserve">
                        <path style="fill:#9197A8;"
                          d="M315.554,14.183c74.346,0,148.693,38.294,148.693,131.886c0,0-21.927-31.528-64.291-51.044  c-22.466-10.353-50.718-14.892-84.402-14.892V14.183z" />
                        <path style="fill:#C0BFD4;"
                          d="M315.554,80.133v36.166c0,16.438-13.332,29.77-29.77,29.77h-5.673h-61h-5.659  c-16.452,0-29.784-13.332-29.784-29.77v-3.886V47.839v-3.872c0-16.452,13.332-29.784,29.784-29.784h102.102V80.133L315.554,80.133z" />
                        <path style="fill:#DBB67E;"
                          d="M280.111,245.363v221.961c0,16.835-13.658,30.493-30.493,30.493  c-16.849,0-30.507-13.658-30.507-30.493V245.363H280.111z" />
                        <rect x="219.11" y="146.069" style="fill:#6E5B3F;" width="61" height="99.294" />
                        <rect x="128.113" y="47.839" style="fill:#9197A8;" width="55.554" height="64.574" />
                        <path style="fill:#C0BFD4;"
                          d="M128.113,47.839v64.574v6.014c0,9.006-7.29,16.296-16.296,16.296H64.05  c-9.006,0-16.296-7.29-16.296-16.296V41.839c0-9.006,7.29-16.31,16.296-16.31h47.768c9.006,0,16.296,7.304,16.296,16.31V47.839  L128.113,47.839z" />
                        <path
                          d="M426.384,33.754C397.857,11.987,358.496,0,315.554,0H213.452c-20.691,0-38.079,14.373-42.734,33.656h-29.568  c-3.587-12.847-15.363-22.31-29.332-22.31H64.05c-16.807,0-30.479,13.679-30.479,30.493v76.587  c0,16.807,13.674,30.479,30.479,30.479h47.768c13.973,0,25.752-9.464,29.334-22.31h29.563c3.994,16.566,17.392,29.503,34.213,32.82  v71.764H193.95c-7.833,0-14.183,6.35-14.183,14.183c0,7.833,6.35,14.183,14.183,14.183h10.978v207.778  c0,24.634,20.047,44.676,44.69,44.676c24.634,0,44.676-20.042,44.676-44.676v-88.997c0-7.833-6.35-14.183-14.183-14.183  s-14.183,6.35-14.183,14.183v88.997c0,8.993-7.317,16.31-16.31,16.31c-9.002,0-16.324-7.317-16.324-16.31V259.546h32.635v33.33  c0,7.833,6.35,14.183,14.183,14.183s14.183-6.35,14.183-14.183v-33.33h10.992c7.833,0,14.183-6.35,14.183-14.183  c0-7.833-6.35-14.183-14.183-14.183h-10.992v-71.762c20.176-3.975,35.443-21.795,35.443-43.119V94.624  c26.247,1.129,47.386,5.496,64.285,13.284c38.04,17.523,58.405,46.009,58.581,46.26c2.702,3.885,7.09,6.086,11.646,6.086  c1.413,0,2.842-0.211,4.242-0.65c5.914-1.855,9.939-7.335,9.939-13.533C478.429,98.571,460.433,59.732,426.384,33.754z   M169.485,98.23h-27.188V62.021h27.188V98.23z M113.931,118.427c0,1.166-0.947,2.113-2.113,2.113H64.05  c-1.166,0-2.113-0.947-2.113-2.113V41.839c0-1.173,0.947-2.127,2.113-2.127h47.768c1.166,0,2.113,0.955,2.113,2.127L113.931,118.427  L113.931,118.427z M233.293,231.18v-70.928h32.635v70.928H233.293z M301.371,116.299c0,8.595-6.992,15.587-15.587,15.587h-72.332  c-8.602,0-15.601-6.992-15.601-15.587v-3.886V47.839v-3.872c0-8.602,6.999-15.601,15.601-15.601h87.919v51.767V116.299z   M405.893,82.144c-20.554-9.473-45.569-14.713-76.155-15.922V28.863c49.195,3.478,97.88,25.542,114.409,76.86  C433.855,97.566,421.092,89.146,405.893,82.144z" />
                        <path
                          d="M280.111,315.568c-7.833,0-14.183,6.35-14.183,14.183v4.609c0,7.833,6.35,14.183,14.183,14.183s14.183-6.35,14.183-14.183  v-4.609C294.294,321.918,287.944,315.568,280.111,315.568z" />
                        <!--<g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>-->
                      </svg>
                      <h5 class="u-text u-text-body-alt-color u-text-4">Crear</h5>
                  </div>
                </div>
                <div
                  class="u-align-left u-container-style u-hidden-sm u-hidden-xs u-layout-cell u-right-cell u-size-20 u-layout-cell-4">
                  <div class="u-container-layout u-valign-top u-container-layout-4"><span
                      class="u-icon u-icon-circle u-spacing-10 u-text-body-alt-color u-icon-3"><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                        id="Capa_1" x="0px" y="0px" viewBox="0 0 470 470" style="enable-background:new 0 0 470 470;"
                        xml:space="preserve">
                        <g>
                          <path style="fill:#F2EBD9;"
                            d="M15,342.428c17.988,0.225,35.38,0.601,51.796,1.124c4.14,0.131,7.39,3.594,7.258,7.734   c-0.129,4.059-3.46,7.262-7.492,7.262c-0.081,0-0.161-0.001-0.243-0.004c-16.264-0.517-33.494-0.891-51.32-1.115v27.502   c104.728,1.331,163.718,7.659,220.802,13.784c56.699,6.084,115.292,12.369,219.198,13.697v-27.499   c-99.659-1.276-154.159-7.071-211.768-13.199l-3.784-0.402c-41.235-4.387-83.874-8.922-143.23-11.619   c-4.138-0.188-7.34-3.695-7.152-7.833c0.188-4.138,3.688-7.344,7.833-7.152c59.81,2.717,102.679,7.277,144.136,11.687l3.784,0.402   c57.211,6.085,111.336,11.841,210.181,13.114V342.5h-19.762c-17.92,0-32.5-14.58-32.5-32.5s14.58-32.5,32.5-32.5H455v-15H15   V342.428z M324.058,292.5c1.556,0,2.999,0.472,4.196,1.281c0.599,0.404,1.136,0.893,1.594,1.449   c0.306,0.37,0.577,0.771,0.808,1.196c0.346,0.637,0.603,1.331,0.753,2.063c0.1,0.488,0.152,0.993,0.152,1.511   s-0.052,1.023-0.152,1.511c-0.15,0.732-0.407,1.426-0.753,2.063c-0.231,0.425-0.502,0.825-0.808,1.196   c-0.459,0.556-0.996,1.044-1.594,1.449c-1.197,0.809-2.64,1.281-4.192,1.281c-4.146,0-7.503-3.358-7.503-7.5   S319.916,292.5,324.058,292.5z M294.058,312.5c1.556,0,2.999,0.472,4.196,1.281c0.599,0.404,1.136,0.893,1.594,1.449   c0.306,0.37,0.577,0.771,0.808,1.196c0.346,0.637,0.603,1.331,0.753,2.063c0.1,0.488,0.152,0.993,0.152,1.511   s-0.052,1.023-0.152,1.511c-0.15,0.732-0.407,1.426-0.753,2.063c-0.231,0.425-0.502,0.825-0.808,1.196   c-0.459,0.556-0.996,1.044-1.594,1.449c-1.197,0.809-2.64,1.281-4.192,1.281c-4.146,0-7.503-3.358-7.503-7.5   S289.916,312.5,294.058,312.5z" />
                          <path style="fill:#F2EBD9;"
                            d="M455,427.414c-104.726-1.331-163.716-7.659-220.798-13.784   c-56.7-6.084-115.294-12.369-219.202-13.697V455h440V427.414z" />
                          <path style="fill:#6DA8D6;"
                            d="M30,47.5C30,38.014,38.014,30,47.5,30h237.942c9.486,0,17.5,8.014,17.5,17.5v160h15v-160   c0-17.92-14.58-32.5-32.5-32.5H47.5C29.58,15,15,29.58,15,47.5v160h15V47.5z" />
                          <path style="fill:#C1E8E6;"
                            d="M287.942,200.063V172.5H45v27.573l4.154-3.09c2.657-1.977,6.296-1.977,8.953,0l11.653,8.668   l11.643-8.667c2.658-1.979,6.298-1.978,8.956,0l11.646,8.667l11.642-8.667c2.657-1.979,6.298-1.978,8.957,0l11.645,8.667   l11.644-8.667c2.657-1.979,6.299-1.979,8.956,0l11.643,8.667l11.642-8.667c2.657-1.979,6.298-1.978,8.957,0l11.644,8.667   l11.642-8.667c2.659-1.978,6.3-1.979,8.958,0l11.639,8.665l11.639-8.665c2.658-1.979,6.299-1.979,8.958,0l11.641,8.666   l11.639-8.666c2.659-1.979,6.301-1.979,8.958,0L287.942,200.063z" />
                          <path style="fill:#FF6E1D;"
                            d="M362.942,172.5v35H437.5c9.649,0,17.5-7.851,17.5-17.5s-7.851-17.5-17.5-17.5H362.942z" />
                          <path style="fill:#082947;"
                            d="M7.5,222.5h29.997c0.378-0.003,0.712-0.034,1.041-0.08c0.083-0.012,0.165-0.023,0.248-0.038   c0.341-0.059,0.676-0.136,1-0.24c0.04-0.013,0.079-0.03,0.119-0.044c0.319-0.108,0.627-0.238,0.924-0.386   c0.048-0.024,0.097-0.045,0.145-0.07c0.321-0.168,0.627-0.362,0.919-0.573c0.027-0.02,0.057-0.032,0.083-0.052l11.654-8.67   l11.654,8.67c2.658,1.977,6.297,1.977,8.955-0.001l11.642-8.667l11.646,8.667c2.658,1.978,6.298,1.978,8.956,0l11.642-8.667   l11.645,8.667c2.658,1.978,6.299,1.978,8.956,0l11.644-8.667l11.644,8.667c2.657,1.979,6.298,1.979,8.957,0l11.642-8.667   l11.644,8.667c2.658,1.978,6.298,1.978,8.957,0l11.641-8.666l11.64,8.666c2.658,1.979,6.3,1.98,8.958,0l11.639-8.666l11.641,8.666   c2.658,1.979,6.299,1.979,8.958,0l11.638-8.665l11.634,8.664c0.042,0.031,0.086,0.055,0.128,0.085   c0.118,0.084,0.238,0.164,0.361,0.241c0.09,0.057,0.18,0.113,0.272,0.165c0.119,0.068,0.24,0.131,0.363,0.193   c0.101,0.051,0.202,0.101,0.305,0.147c0.115,0.051,0.233,0.098,0.352,0.144c0.114,0.044,0.228,0.088,0.344,0.126   c0.111,0.037,0.223,0.069,0.336,0.1c0.127,0.035,0.254,0.07,0.382,0.098c0.106,0.024,0.214,0.043,0.322,0.062   c0.138,0.025,0.277,0.047,0.416,0.063c0.102,0.012,0.205,0.021,0.309,0.029c0.147,0.011,0.295,0.02,0.442,0.022   c0.05,0.001,0.099,0.008,0.149,0.008h30c4.142,0,7.5-3.358,7.5-7.5v-17.5h15V215c0,4.142,3.358,7.5,7.5,7.5H437.5   c17.92,0,32.5-14.58,32.5-32.5s-14.58-32.5-32.5-32.5h-82.058c-4.142,0-7.5,3.358-7.5,7.5v17.5h-15v-135   c0-26.191-21.309-47.5-47.5-47.5H47.5C21.309,0,0,21.309,0,47.5V215C0,219.142,3.358,222.5,7.5,222.5z M455,190   c0,9.649-7.851,17.5-17.5,17.5h-74.558v-35H437.5C447.149,172.5,455,180.351,455,190z M15,47.5C15,29.58,29.58,15,47.5,15h237.942   c17.92,0,32.5,14.58,32.5,32.5v160h-15v-160c0-9.486-8.014-17.5-17.5-17.5H47.5C38.014,30,30,38.014,30,47.5v160H15V47.5z    M274.85,196.984l-11.639,8.666l-11.641-8.666c-2.658-1.979-6.299-1.979-8.958,0l-11.639,8.665l-11.639-8.665   c-2.657-1.979-6.298-1.979-8.958,0l-11.642,8.667l-11.644-8.667c-2.658-1.978-6.299-1.978-8.957,0l-11.642,8.667l-11.643-8.667   c-2.657-1.979-6.299-1.979-8.956,0l-11.644,8.667l-11.645-8.667c-2.658-1.978-6.299-1.978-8.957,0l-11.642,8.667l-11.646-8.667   c-2.658-1.978-6.298-1.978-8.956,0l-11.643,8.667l-11.653-8.668c-2.657-1.977-6.296-1.977-8.953,0L45,200.073V172.5h242.942v27.563   l-4.134-3.079C281.151,195.006,277.509,195.005,274.85,196.984z M287.942,157.5H45v-110c0-1.285,1.215-2.5,2.5-2.5h237.942   c1.285,0,2.5,1.215,2.5,2.5V157.5z" />
                          <path style="fill:#082947;"
                            d="M462.5,247.5H7.5c-4.142,0-7.5,3.358-7.5,7.5v207.5c0,4.142,3.358,7.5,7.5,7.5h455   c4.142,0,7.5-3.358,7.5-7.5V335c0-4.142-3.358-7.5-7.5-7.5h-27.262c-9.649,0-17.5-7.851-17.5-17.5s7.851-17.5,17.5-17.5H462.5   c4.142,0,7.5-3.358,7.5-7.5v-30C470,250.858,466.642,247.5,462.5,247.5z M455,277.5h-19.762c-17.92,0-32.5,14.58-32.5,32.5   s14.58,32.5,32.5,32.5H455v27.412c-98.845-1.273-152.97-7.028-210.181-13.114l-3.784-0.402   c-41.457-4.41-84.326-8.97-144.136-11.687c-4.144-0.192-7.645,3.014-7.833,7.152c-0.188,4.138,3.014,7.645,7.152,7.833   c59.356,2.696,101.995,7.232,143.23,11.619l3.784,0.402c57.609,6.128,112.108,11.923,211.768,13.199v27.499   c-103.906-1.328-162.499-7.613-219.198-13.697C178.718,392.59,119.728,386.262,15,384.931v-27.502   c17.826,0.224,35.056,0.598,51.32,1.115c0.082,0.003,0.162,0.004,0.243,0.004c4.032,0,7.363-3.203,7.492-7.262   c0.132-4.14-3.118-7.603-7.258-7.734c-16.417-0.522-33.808-0.899-51.796-1.124V262.5h440V277.5z M15,399.933   c103.908,1.328,162.502,7.613,219.202,13.697c57.082,6.125,116.072,12.453,220.798,13.784V455H15V399.933z" />
                          <path style="fill:#082947;"
                            d="M294.058,327.5c1.556,0,2.999-0.472,4.196-1.281c0.599-0.404,1.136-0.893,1.594-1.449   c0.306-0.37,0.577-0.771,0.808-1.196c0.346-0.637,0.603-1.331,0.753-2.063c0.1-0.488,0.152-0.993,0.152-1.511   s-0.052-1.023-0.152-1.511c-0.15-0.732-0.407-1.426-0.753-2.063c-0.231-0.425-0.502-0.825-0.808-1.196   c-0.459-0.556-0.996-1.044-1.594-1.449c-1.197-0.809-2.64-1.281-4.192-1.281c-4.146,0-7.503,3.358-7.503,7.5   S289.916,327.5,294.058,327.5z" />
                          <path style="fill:#082947;"
                            d="M324.058,307.5c1.556,0,2.999-0.472,4.196-1.281c0.599-0.404,1.136-0.893,1.594-1.449   c0.306-0.37,0.577-0.771,0.808-1.196c0.346-0.637,0.603-1.331,0.753-2.063c0.1-0.488,0.152-0.993,0.152-1.511   s-0.052-1.023-0.152-1.511c-0.15-0.732-0.407-1.426-0.753-2.063c-0.231-0.425-0.502-0.825-0.808-1.196   c-0.459-0.556-0.996-1.044-1.594-1.449c-1.197-0.809-2.64-1.281-4.192-1.281c-4.146,0-7.503,3.358-7.503,7.5   S319.916,307.5,324.058,307.5z" />
                        </g>
                        <!--<g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>-->
                      </svg>
                      <h5 class="u-text u-text-body-alt-color u-text-5">Personalizar<br>
                      </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="u-align-center u-clearfix u-grey-5 u-section-2" id="carousel_4ff3">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <h5 class="u-text u-text-grey-40 u-text-1">NUESTROS SERVICIOS</h5>
      <h1 class="u-text u-text-2">COMO TE PODEMOS AYUDAR?</h1>
      <p class="u-text u-text-3">Nos especializamos en la creación de productos de madera, pregunte sin compromiso!</p>
      <a href="https://nicepage.com/"
        class="u-border-1 u-border-palette-2-base u-btn u-btn-round u-button-style u-palette-2-base u-radius-3 u-btn-1"
        target="_blank">Book now</a>
    </div>
  </section>
  <section class="u-align-center u-clearfix u-section-3" id="carousel_1dd3">
    <div
      class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-valign-middle-xs u-sheet-1">
      <div
        class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gutter-30 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-size-30 u-size-60-md">
              <div class="u-layout-col">
                <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-40 u-image-1">
                  <div class="u-container-layout"></div>
                </div>
                <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-2">
                  <div class="u-container-layout u-valign-middle u-container-layout-2">
                    <p class="u-text u-text-1">Contamos con un servicio de personalización de muebles para que escojas
                      las medidas de tus productos </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="u-size-30 u-size-60-md">
              <div class="u-layout-col">
                <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-20 u-layout-cell-3">
                  <div class="u-container-layout u-valign-middle u-container-layout-3">
                    <h2 class="u-text u-text-2">Contactenos</h2>
                    <h3 class="u-text u-text-palette-2-base u-text-3"><b>(806) 765-3400 634</b>&nbsp;<br>
                    </h3>
                  </div>
                </div>
                <div class="u-align-left u-container-style u-image u-layout-cell u-right-cell u-size-40 u-image-2">
                  <div class="u-container-layout"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="u-align-center u-clearfix u-image u-section-4" id="carousel_3760">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-image u-layout-cell u-left-cell u-size-27 u-size-xs-60 u-image-1" src="">
              <div class="u-container-layout u-container-layout-1" src=""></div>
            </div>
            <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-33 u-size-xs-60 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <h2 class="u-text u-text-palette-1-base u-text-1">La Mejor Calidad</h2>
                <div class="u-border-10 u-border-palette-2-base u-expanded-width u-line u-line-horizontal u-line-1">
                </div>
                <p class="u-text u-text-2">Tras 30 años de experiencia aseguramos ser la mejor opción para la creación
                  de tus mubles</p>
                <a href="https://nicepage.com/"
                  class="u-border-1 u-border-palette-2-base u-btn u-btn-round u-button-style u-palette-2-base u-radius-3 u-btn-1">Book
                  now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
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