<?php
    session_start();
    require "./conecta.php";
    $con = conecta();

    $pass = $_REQUEST['pass'];
    $correo  = $_REQUEST['correo'];
    $num = 0;
    $tipo = '';
    $pass = substr(md5($pass), 0, 24);

    if ($correo) {
        $sql = "SELECT * FROM USUARIOS 
                WHERE CORREO = '$correo' 
                AND CONTRASENA = '$pass'";
        $res = mysqli_query($con, $sql);
        $num = mysqli_num_rows($res);
        //echo "hasta aqui vamos bien ".$num;
        if ($num > 0) {
            $tipo = 'user';
            //echo $tipo." ".$num;
        } else {
            $sql = "SELECT * FROM DIRECTIVOS 
                    WHERE CORREO = '$correo' 
                    AND CONTRASENA = '$pass'";
            $res = mysqli_query($con, $sql);
            $num = mysqli_num_rows($res);
            if ($num > 0) {
                $tipo = 'admin';
                //echo $tipo." ".$num;
            }
        }
        
    }
    //echo $sql;
    if ($num) {
        $consulta = mysqli_fetch_assoc($res);
        $idU = ($tipo == 'admin') ? $consulta['ID_ADMIN'] : $consulta['ID_USUARIO'];
        $nombre = $consulta['NOMBRE'].' '.$consulta['APELLIDO'];
        $_SESSION['idU'] = $idU;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['tipo'] = $tipo;
    }

    echo $num;
?>