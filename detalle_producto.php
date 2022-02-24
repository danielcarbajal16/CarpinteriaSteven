<?php
session_start();

require "./conecta.php";
$con = conecta();
if(!$_SESSION['idU']) {
    header("Location: ./inicio_sesion.php");
} else {
    $idU = $_SESSION['idU'];
}

$id = $_REQUEST['id'];
$sql = "SELECT * FROM PRODUCTO
    WHERE ID_PRODUCTO=$id";
$res = mysqli_query($con, $sql);
$producto = mysqli_fetch_assoc($res);
?>

<html>

<head>
    <title>Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Services, Need Help Right Away?">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="House-Repair-Services-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery-1.9.1.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.10.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:150,100i,300,150i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:150,100i,300,150i,400,400i,500,500i,700,700i,900,900i|Montserrat:150,100i,200,150i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Archivo+Black:400">


    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "url": "index.html",
            "logo": "images/default-logo.png"
        }
    </script>
    <script>
        function categoria() {
        var selector = document.getElementById("Categorias").value;
        window.location = './catalogo_categoria.php?categoria='+selector;
        }
        function agrega(id) {
            var cantidad = document.getElementById("agregar"+id).value;
            window.location = "./agregar_carrito.php?id="+id+"&cantidad="+cantidad;
        }
    </script>
    <meta property="og:title" content="House Repair Services 1">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#104e92">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
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
                    margin-bottom: 10px;
                }

                img {
                    border-radius: 20%;
                    margin-top: 10px;
                }

                button {
                    margin-bottom: 10px;
                    border-radius: 15%;
                }

                table {
                    margin-bottom: 50px;
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
                                        <option value="Ropero">Roperos</option>
                                        <option value="Jardineria">Jardinería</option>
                                        <option value="Cortineros">Cortineros</option>
                                    </select>
                                </a>
                            </li>
                            <li><a href="./index.php">Inicio</a></li>
                            <li><a href="./catalogo.php">Catalogo</a></li>
                            <li><a href="./perfil.php">Perfil</a></li>
                            <li><a href="./carrito.php">Carrito</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <a class="u-image u-logo u-image-1">
                <img src="images/Logo.jpg" class="u-logo-image u-logo-image-1">
            </a>
            <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="XL">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;" wfd-invisible="true">
                    <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base">
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
                        <li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-grey-90" href="Page-1.html" style="padding: 10px 0px;">House Repair Services</a>
                        </li>
                    </ul>
                </div>
                <div class="u-custom-menu u-nav-container-collapse" wfd-invisible="true">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="Page-1.html" style="padding: 10px 20px;">Contactenos</a><br>
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
</head>

<body data-home-page="https://website303650.nicepage.io/House-Repair-Services-1.html?version=44e14f81-1fe2-4e50-b81b-c7970ca063ac" data-home-page-title="House Repair Services 1" class="u-body">
    <div align="center" style="width: 100%; margin-top: 50px;">
        <?php
        //$arch_n = mysql_result($resprod, $id-1, "archivo_n");
        //$ext = substr(strrchr($arch_n, "."), 1);
        //$arch = mysql_result($resprod, $id-1, "archivo");
        echo "
                <table>
                    <tr>
                        <td rowspan=\"5\"><img src=\"./images/".$producto['IMAGEN']."\" style=\"width: 300px; height: 300px;\"/></td>
                        <th style=\"text-align: center; background-color:khaki;\">NOMBRE</th>
                        <td style=\"text-align: center; background-color:khaki;\">" . $producto['NOMBRE_PRODUCTO'] . "</td>
                        <td rowspan=\"5\" style=\"width: 400px; background-color: palegreen;\">" . $producto['DESCRIPCION'] . "</td>
                    </tr>
                    <tr><th style=\"text-align: center; background-color:khaki;\">PRECIO</th>
                    <td style=\"text-align: center; background-color:khaki;\">$" . number_format($producto['PRECIO'], 2, '.', ',') . "</td></tr>

                    <tr><th style=\"text-align: center; background-color:khaki;\">COLOR</th>
                    <td style=\"text-align: center; background-color:khaki;\">" . $producto['COLOR'] . "</td></tr>

                    <tr><th style=\"text-align: center; background-color:khaki;\">MATERIAL<input type=\"hidden\" id=\"id_sel\" name=\"id_sel\" value=\"$id\"/></th>
                    <td style=\"text-align: center; background-color:khaki;\">" . $producto['MATERIAL'] . "<input type=\"hidden\" id=\"id_sel\" name=\"id_sel\" value=\"$id\"/></td></tr>
                    
                    <tr><th style=\"text-align: center; background-color:khaki;\">STOCK</th> 
                    <td style=\"text-align: center; background-color:khaki;\"><button onclick=\"agrega($id);\">Agregar</button><input type=\"number\" id=\"agregar$id\" name=\"agregar\" min=\"1\" max=\"" . $producto['STOCK'] . "\" value=\"1\" style=\"width : 40px; heigth : 15px\"/></td></tr>
                    </table>
                ";
        ?>
    </div>
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-fdb7">
        <div >
            <p> Mas Sobre Nosotros.</p>
            <p> 5468 Marianna Street City Lake Eastonview</p>
            <p> (806) 765-3400 634 E-Mail carloscastellanos0200@gmail.com</p>
        </div>
    </footer>
</body>

</html>