<?php 
    require "./conecta.php";
    $con = conecta();

    $id = $_REQUEST['id_sel'];
    $nombre = $_REQUEST['nombre'];
    $categoria = $_REQUEST['Categorias'];
    $archivo_n = $_FILES['archivo']['name'];
    $temp = $_FILES['archivo']['tmp_name'];
    $material = $_REQUEST['material'];
    $color = $_REQUEST['color'];
    $precio = $_REQUEST['precio'];
    $stock = $_REQUEST['stock'];
    $desc = $_REQUEST['descripcion'];
    $dir = "images/";
    $tx = "";

    if ($archivo_n != '') {
        $tx = "IMAGEN = '$archivo_n',";
        copy($temp, $dir.$archivo_n);
    }
    $sql = "UPDATE PRODUCTO SET NOMBRE_PRODUCTO = '$nombre',
            CATEGORIA = '$categoria', $tx
            MATERIAL = '$material', COLOR = '$color',
            PRECIO = $precio, STOCK = $stock,
            DESCRIPCION = '$desc' WHERE ID_PRODUCTO = $id";
    //echo $sql;
    $res = mysqli_query($con, $sql);

    header("location: ./listado_productos.php");
?>