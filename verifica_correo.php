<?php
    require "conecta.php";
    $con = conecta();

    $id = $_REQUEST['id'];
    $correo = $_REQUEST['correo'];
    $num = 0;

    if ($correo) {
        $tx = ($id > 0) ? "AND ID_USUARIO != $id" : '';
        $sql = "SELECT * FROM USUARIOS 
                WHERE CORREO = '$correo' $tx";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);
        $tx = ($id > 0) ? "AND ID_ADMIN != $id" : '';
        $sql = "SELECT * FROM DIRECTIVOS 
                WHERE CORREO = '$correo' $tx";
        $res = mysqli_query($con, $sql);
        $num = $num + mysqli_num_rows($res);
    }

    echo $num;
?>