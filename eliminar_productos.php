<?php 
    require "./conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $num = 0;

    $sql = "DELETE FROM PRODUCTO WHERE ID_PRODUCTO = $id";
    //DELETE FROM `USUARIO` WHERE `USUARIO`.`ID_USUARIO` = 2
    mysqli_query($con, $sql);
    $num = mysqli_affected_rows($con);

    echo $num;
?>