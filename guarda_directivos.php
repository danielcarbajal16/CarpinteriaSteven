<?php
    require "./conecta.php";
    $con = conecta();

    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['email'];
    $password = $_REQUEST['pass_one'];

    $password = substr(md5($password), 0, 24);
    $sql = "INSERT INTO DIRECTIVOS VALUES (0, '$correo', '$password', '$nombre', '$apellido')";
    //echo $sql;
    $res = mysqli_query($con, $sql);

    header("location: ./alta_administradores.php");
?>