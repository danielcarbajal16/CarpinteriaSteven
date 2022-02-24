<?php
    require "./conecta.php";
    $con = conecta();
    
    $id = $_REQUEST['id_sel'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['email'];
    $password = $_REQUEST['pass_one'];
    $txt = '';

    if ($password != '') {
        $password = substr(md5($password), 0, 24);
        $txt = "CONTRASENA = '$password',";
    }
    $sql = "UPDATE DIRECTIVOS SET
            CORREO = '$correo', $txt
            NOMBRE = '$nombre', APELLIDO = '$apellido'
            WHERE ID_ADMIN = $id";
    //echo $sql;
    $res = mysqli_query($con, $sql);

    header("Location: ./alta_administradores.php");
?>