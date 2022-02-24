<?php
    require "./conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $cantidad = $_REQUEST['cantidad'];
    $num = 0;

    if ($id > 0) {
        $sql = "UPDATE CARRITO SET CANTIDAD = $cantidad WHERE ID_PRODUCTO = $id";
        //$sql = "UPDATE productos SET eliminado = 1 WHERE id = $id";
        $res = mysqli_query($con, $sql);
        $num = mysqli_affected_rows($con);
    }

    echo $num;
?>