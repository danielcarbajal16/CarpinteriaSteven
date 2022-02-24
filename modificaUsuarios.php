<?php
    require "./conecta.php";
    $con = conecta();
    
    $id = $_REQUEST['id_sel'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $correo = $_REQUEST['email'];
    $domCalle = $_REQUEST['domCalle'];
    $domNum = $_REQUEST['domNum'];
    $tarjeta = $_REQUEST['tarjeta'];
    $password = $_REQUEST['pass_one'];
    $txt = '';

    if ($password != '') {
        $password = substr(md5($password), 0, 24);
        $txt = "CONTRASENA = '$password',";
    }
    $sql = "UPDATE USUARIOS SET
            CORREO = '$correo', $txt
            NOMBRE = '$nombre', APELLIDO = '$apellido',
            DOM_CALLE = '$domCalle', DOM_NUMERO = $domNum,
            TARJETA = $tarjeta WHERE ID_USUARIO = $id";
    //echo $sql;
    $res = mysqli_query($con, $sql);

    header("Location: ./perfil.php");
?>