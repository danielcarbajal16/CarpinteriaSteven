<?php
session_start();
if (!$_SESSION['idU']) {
    header("Location: ./inicio_sesion.php");
} /*else if ($_SESSION['tipo'] != 'user') {
        header("Location: ./alta_administradores.php");
      }*/ else {
    $idU = $_SESSION['idU'];
    $nombre = $_SESSION['nombre'];
}

require "./conecta.php";
$con = conecta();
$carrito = 0;

/*$sql = "SELECT * FROM PRODUCTO";
    $resProd = mysqli_query($con, $sql);
    $numProd = mysqli_num_rows($resProd);*/

$sql = "SELECT * FROM VENTAS WHERE STATUS = 0";
$resVentas = mysqli_query($con, $sql);
if (mysqli_num_rows($resVentas) > 0) {
    $pedido = mysqli_fetch_assoc($resVentas);

    $sql = "SELECT * FROM CARRITO WHERE ID_VENTA = " . $pedido['ID_VENTAS'] . "";
    $res = mysqli_query($con, $sql);
    $carrito = mysqli_num_rows($res);
    //$rowCarrito = mysqli_fetch_assoc($res);
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <meta property="og:title" content="House Repair Services 1">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#104e92">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        function categoria() {
            var selector = document.getElementById("Categorias").value;
            window.location = './catalogo_categoria.php?categoria=' + selector;
        }

        function deleteProd(id) {
            //var nombre = $('#name'+id).val();
            //console.log(nombre+' y '+id);
            if (id > 0) {
                if (confirm("Estás seguro de eliminar este producto?")) {
                    $.ajax({
                        url: './eliminar_pcarrito.php',
                        type: 'post',
                        dataType: 'text',
                        data: 'id=' + id,
                        success: function(res) {
                            if (res > 0) {
                                window.location = "./carrito.php";
                                //$('#Fila' + id).hide();
                                /*$('#mensaje').html('El producto ha sido eliminado');
                                setTimeout("$('#mensaje').html('');", 5000);*/
                            }
                        },
                        error: function() {
                            alert('Error al conectar al servidor...');
                        }
                    });
                }
            }
        }

        function actualizar(id) {
            var cant = $('#numeros' + id).val();
            console.log(cant + ' y ' + id);
            if (id > 0) {
                $.ajax({
                    url: './confirma_producto.php',
                    type: 'post',
                    dataType: 'text',
                    data: 'id=' + id + '&cantidad=' + cant,
                    success: function(res) {
                        if (res > 0) {
                            console.log(id + '+' + cant);
                            window.location = "carrito.php";
                        }
                    },
                    error: function() {
                        alert('Error al conectar al servidor...');
                    }
                });
            }
        }

        function confirmar(id) {
            //var nombre = $('#name'+id).val();
            //console.log(nombre+' y '+id);
            if (id > 0) {
                if (confirm("Estás seguro que no deseas agregar algo más?")) {
                    $.ajax({
                        url: './confirma_venta.php',
                        type: 'post',
                        dataType: 'text',
                        data: 'id=' + id,
                        success: function(res) {
                            if (res > 0) {
                                console.log("Pedido cerrado correctamente.");
                                window.location = "./index.php";
                            } else if (res == 0) {
                                console.log("No hubo cambios");
                                window.location = "./index.php";
                            }
                        },
                        error: function() {
                            alert('Error al conectar al servidor...');
                        }
                    });
                }
            }
        }
    </script>
</head>

<body data-home-page="https://website303650.nicepage.io/House-Repair-Services-1.html?version=44e14f81-1fe2-4e50-b81b-c7970ca063ac" data-home-page-title="House Repair Services 1" class="u-body">
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

                footer {
                    text-align: center;
                    padding: 3px;

                    position: absolute;
                    bottom: 0;
                    width: 99.5%;
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
                                        <option value="Ropero"> Roperos</option>
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
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;" wfd-invisible="true">
                    <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
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
    <?php
    $total = 0;
    if ($carrito > 0) {
        echo "
                    <table align=\"center\" style=\"border: 1px solid #000000; border-collapse: separate; background-color: blue;\">
                        <tr>
                            <th style=\"border: solid 1px #000000; background-color: #6AED62;\">Producto</th>
                            <th style=\"border: solid 1px #000000; background-color: #6AED62;\">Cantidad</th>
                            <th style=\"border: solid 1px #000000; background-color: #6AED62;\">Costo Unitario</th>
                            <th style=\"border: solid 1px #000000; background-color: #6AED62;\">Subtotal</th>
                            <th style=\"border: solid 1px #000000; background-color: #6AED62;\"></th>
                        </tr>
                    ";
        for ($i = 0; $i < $carrito; $i++) {
            $rowCarrito = mysqli_fetch_assoc($res);
            /*$idprod = mysql_result($res, $i, "id_producto");
                        $idPP = mysql_result($res, $i, "id");
                        $costo = mysql_result($res, $i, "precio");
                        $cantidad = mysql_result($res, $i, "cantidad");*/
            $sql = "SELECT * FROM PRODUCTO WHERE ID_PRODUCTO = " . $rowCarrito['ID_PRODUCTO'] . "";
            $resProd = mysqli_query($con, $sql);
            $numProd = mysqli_num_rows($resProd);
            $producto = mysqli_fetch_assoc($resProd);
            //$stock = mysql_result($resprod, $idprod-1, "stock");
            $subtotal = $producto['PRECIO'] * $rowCarrito['CANTIDAD'];
            $total = $total + $subtotal;
            //$prod = mysql_result($resprod, $idprod-1, "nombre");
            echo "
                        <tr id=\"Fila" . $rowCarrito['ID_CARRITO'] . "\">
                        <td style=\"border: solid 1px #000000; background-color: skyblue;\">" . $producto['NOMBRE_PRODUCTO'] . "</td>
                        <td style=\"border: solid 1px #000000; background-color: skyblue;\"><select id=\"numeros" . $producto['ID_PRODUCTO'] . "\" name=\"select\" onchange=\"actualizar(" . $producto['ID_PRODUCTO'] . ");\">";
            for ($j = 1; $j <= $producto['STOCK']; $j++) {
                if ($j == $rowCarrito['CANTIDAD']) {
                    $sel = 'selected';
                } else {
                    $sel = '';
                }
                echo "<option value = \"$j\" $sel>$j</option>";
            }
            echo "</select></td>";

            echo "<td style=\"border: solid 1px #000000; background-color: skyblue;\">$" . number_format($producto['PRECIO'], 2, '.', ',') . "</td>
                        <td style=\"border: solid 1px #000000; background-color: skyblue;\">$" . number_format($subtotal, 2, '.', ',') . "</td>
                        <td style=\"border: solid 1px #000000; background-color: skyblue;\"><button onclick = \"deleteProd(" . $rowCarrito['ID_CARRITO'] . ");\">Eliminar</button></td>
                        </tr>";
        }
        echo "<tr>
                        <td colspan=\"3\" style=\"border: solid 1px #000000; background-color: skyblue; font-weight:bold; text-align:center;\">Total</td>
                        <td style=\"border: solid 1px #000000; background-color: skyblue;\">$" . number_format($total, 2, '.', ',') . "</td>
                        <td style=\"border: solid 1px #000000; background-color: skyblue;\"></td>
                        </tr>";
    } else {
        $Nocarro = "No hay productos en el carrito";
    }
    ?>
    </table>
    <br><?php if ($carrito > 0) {
            echo "<div align=\"center\"><button onclick=\"confirmar(" . $pedido['ID_VENTAS'] . ");\">Continuar</button></div>";
        } else {
            echo "<div align=\"center\" style=\"font-weight:bold;font-size:x-large;text-align:center;\">$Nocarro</div>";
        } ?>
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-fdb7">
        <div>
            <p> Mas Sobre Nosotros.</p>
            <p> 5468 Marianna Street City Lake Eastonview</p>
            <p> (806) 765-3400 634 E-Mail carloscastellanos0200@gmail.com</p>
        </div>
    </footer>
</body>

</html>