<?php
    session_start();

    if(!$_SESSION['idU']) {
        header("Location: ./inicio_sesion.php");
    } else if ($_SESSION['tipo'] != 'admin') {
        header("Location: ./index.php");
    }
    $idU = $_SESSION['idU'];
    $name = $_SESSION['nombre'];
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Alta Productos</title>
    <header align="center" style="font-weight: bold; font-size:large">Alta Productos</header>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script>
        function valida() {
            var ok = true;
            var nombre = document.forma01.nombre.value;
            var selector = document.getElementById("Categorias").value;
            var material = document.forma01.material.value;
            var color = document.forma01.color.value;
            var costo = document.forma01.precio.value;
            var stock = document.forma01.stock.value;
            var desc = document.forma01.descripcion.value;
            if (nombre == "" || material == "" || color == "" ||  desc == "" || costo == "" || stock == "" || selector == "Default" || $('#archivo').get(0).files.length === 0) {
                ok = false;
                console.log("No nombre");
            }

            if (costo < 1) {
                ok = false;
                $('#messCost').html('Valor no aceptado');
                $('#costo').val('');
                setTimeout("$('#messCost').html('');",5000);
            }

            if (desc.length > 100) {
                ok = false;
                $('#messDesc').html('Excede la cantidad de caracteres para la descripción');
                setTimeout("$('#messDesc').html('');",5000);
            } 

            if (stock < 0) {
                ok = false;
                $('#messStock').html('Valor no aceptado');
                $('#stock').val('');
                setTimeout("$('#messStock').html('');",5000);
            }

            if (ok == false) {
                $('#error').html('Faltan campos por llenar');
                setTimeout("$('#error').html('');",5000);
            }
            else {
                document.forma01.method = 'post';
                document.forma01.action = 'guarda_productos.php';
                document.forma01.submit();
            }
            return ok;
        }
    </script>
    <style>
        .error {
            display: inline;
            color: red;
        }
        body {
            background: linear-gradient(green, yellow);
        }
    </style>
</head>

<body>
        <div align="center">
            <p>Para regresar al listado presione <a href="./listado_productos.php">aquí</a></p>
            <form enctype="multipart/form-data" name="forma01" action="" method="">
                <label>Nombre:</label>
                <input id="campo1" type="text" name="nombre" placeholder="Escribe el nombre del producto">
                <br><br>
                <label>Categoría:</label>
                <select name="Categorias" label="Categorias" id="Categorias">
                    <option disabled selected value="Default">Seleccione la categoría del producto</option>
                    <option value="Mesas">Mesas</option>
                    <option value="Sillas">Sillas</option>
                    <option value="Recamaras">Recamaras</option>
                    <option value="Ropero">Roperos</option>
                    <option value="Jardineria">Jardinería</option>
                    <option value="Cortineros">Cortineros</option>
                  </select>
                <br><br>
                <label for="foto">Imagen:</label>
                <input type="file" id="archivo" name="archivo">
                <br><br>
                <label>Material:</label>
                <input id="material" type="text" name="material" placeholder="Escribe el material">
                <br><br>
                <label>Color:</label>
                <input id="color" type="text" name="color" placeholder="Escribe el color que desea">
                <br><br>
                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Escribe un precio" min="1">
                <div id="messCost" class="error"></div><br><br>
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" placeholder="Productos en almacén" min="0">
                <div id="messStock" class="error"></div><br><br>
                <label>Descripción:</label>
                <textarea name="descripcion" id="descripcion" placeholder="Escriba aquí la descripción del producto" cols="30" rows="5"></textarea>
                <div id="messDesc" class="error"><br><br>
                <input style="margin-right: 50px;" onClick="valida();" type="button" value="Enviar"/>
                <input type="hidden" id="id_sel" name="id_sel" value="0"/>
                <input type="reset" value="Borrar" /><br>
                <div id="error" class="error"></div>
            </form>
        </div>
</body>

</html>