<?php
    require "./conecta.php";
    $con = conecta();

    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['email'];
    $domCalle = $_REQUEST['domCalle'];
    $domNum = $_REQUEST['domNum'];
    $tarjeta = $_REQUEST['tarjeta'];
    $password = $_REQUEST['pass_one'];

    $password = substr(md5($password), 0, 24);
    $sql = "INSERT INTO USUARIOS VALUES (0, '$correo', '$password', '$nombre', '$apellido', '$domCalle', '$domNum', '$tarjeta')";
    //echo $sql;
    $res = mysqli_query($con, $sql);

    header("location: ./inicio_sesion.php");
?>