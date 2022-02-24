<?php
    session_start();

    require "./conecta.php";
    $con = conecta();

    $idProducto = $_REQUEST['id'];
    $cantidad = $_REQUEST['cantidad'];
    //echo $idProducto.' '.$cantidad;

    //$fecha = CURDATE();
    //echo "<br>".$_SESSION['nombre'];
    if ($_SESSION['nombre']) {
        $usuario = $_SESSION['idU'];
    }
    /*else {
        $_SESSION['nombre'] = time()+rand();
        $usuario = $_SESSION['nombre'];
    }*/
    //echo "<br>".$usuario;
    //Verifica que haya o no un pedido abierto
    $sql = "SELECT * FROM VENTAS WHERE STATUS = 0 AND ID_CLIENTE = $usuario";
    //echo $sql;
    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);
    //echo " ".$num;
    if ($num == 1) {
        $pedido = mysqli_fetch_assoc($res);
        $idPedido = $pedido['ID_VENTAS'];
    } else {
        $sql = "INSERT INTO VENTAS VALUES (0, CURDATE(), $usuario, 0)";
        $res = mysqli_query($con, $sql);
        $sql = "SELECT * FROM VENTAS WHERE STATUS = 0 AND ID_CLIENTE = $usuario";
        //echo $sql;
        $res = mysqli_query($con, $sql);
        $pedido = mysqli_fetch_assoc($res);
        $idPedido = $pedido['ID_VENTAS'];
    }   


    //saca costo actual
    $sql = "SELECT * FROM PRODUCTO WHERE ID_PRODUCTO = $idProducto";
    //echo "<br>".$sql;
    $res = mysqli_query($con, $sql);
    $producto = mysqli_fetch_assoc($res);

    //verifica existencia del producto
    $sql = "SELECT * FROM CARRITO WHERE ID_VENTA = $idPedido AND ID_PRODUCTO = $idProducto";
    //echo "<br>".$sql;
    $res = mysqli_query($con, $sql);
    $num = mysqli_num_rows($res);
    if ($num == 1) {
        //Actualiza cantidad
        $carrito = mysqli_fetch_assoc($res);
        //$idPP = mysql_result($res, 0, "id");
        if ($carrito['CANTIDAD'] + $cantidad <= $producto['STOCK']) {
            $sql = "UPDATE CARRITO SET CANTIDAD = CANTIDAD + $cantidad WHERE ID_CARRITO = ".$carrito['ID_CARRITO']."";
            //echo "<br>".$sql;
            $res = mysqli_query($con, $sql);
        }
    }
    else {
        $sql = "INSERT INTO CARRITO VALUES (0, $idPedido, $idProducto, $cantidad, ".$producto['PRECIO'].")";
        $res = mysqli_query($con, $sql);
        //echo "<br>".$sql;
    }

    header("location: ./carrito.php");
?>