<?php
    require "./conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $num = 0;

    if ($id > 0) {
        $sql = "DELETE FROM CARRITO WHERE ID_CARRITO = $id";
        //$sql = "UPDATE productos SET eliminado = 1 WHERE id = $id";
        $res = mysqli_query($con, $sql);
        $num = mysqli_affected_rows($con);
    }

    echo $num;
?>