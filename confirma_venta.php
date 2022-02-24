<?php
    require "./conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $num = 0;

    if ($id > 0) {
        $sql = "UPDATE VENTAS SET STATUS = 1 WHERE ID_VENTAS = $id";
        $res = mysqli_query($con, $sql);
        $num = mysqli_affected_rows($con);
    }

    echo $num;
?>