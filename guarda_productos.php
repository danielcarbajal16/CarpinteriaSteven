<?php
    require "./conecta.php";
    $con = conecta();

    $nombre = $_REQUEST['nombre'];
    $categoria = $_REQUEST['Categorias'];
    $archivo_n = $_FILES['archivo']['name'];
    $temp = $_FILES['archivo']['tmp_name'];
    $material = $_REQUEST['material'];
    $color = $_REQUEST['color'];
    $precio = $_REQUEST['precio'];
    $stock = $_REQUEST['stock'];
    $desc = $_REQUEST['descripcion'];
    $archName = substr($archivo_n, 0,strripos($archivo_n, "."));
    $ext = substr(strrchr($archivo_n, "."), 1);
    $archivo = md5_file($temp);
    $dir = "images/";

    $sql = "INSERT INTO PRODUCTO VALUES (0, '$nombre', '$categoria', '$archivo_n', '$material', '$color', $precio, $stock, '$desc')";
    //echo $sql;
    $res = mysqli_query($con, $sql);
    if ($archivo_n != '') {
        //$fileName1 = "$archivo.$ext";
        copy($temp, $dir.$archivo_n);
    }

    header("location: ./listado_productos.php");
?>