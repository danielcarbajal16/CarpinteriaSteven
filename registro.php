<?php 
    session_start();

    require "./conecta.php";
    $con = conecta();

    /*if(!$_SESSION['idU']) {
        header("Location: ./inicio_sesion.php");
    } else {
        $idU = $_SESSION['idU'];
    }*/
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registro de usuario</title>
    <meta charset="utf8">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script>
        function vermail(){
            var id 	= $('#id_sel').val();
            var correo	= $('#email').val();
            if (correo != ''){
                $.ajax({
                    url 	: 'verifica_correo.php',
                    type 	: 'post',
                    dataType : 'text',
                    data    : 'id='+id+'&correo='+correo,
                    success :function(res){
                        if (res>0){
                            $('#mensaje').html('El correo: '+correo+' ya está registrado');
                            $('#email').val('');
                            setTimeout("$('#mensaje').html('');",5000);
                        }
                    }, error: function(){
                        alert ('Error al conectar al servidor...');
                    }
                });
            }
        }
        function verpass() {
            var pass1 = document.formulario.pass_one.value;
            var pass2 = document.formulario.pass_two.value;
            if (pass1 != pass2 && pass1 != '' && pass2 != '') {
                $('#messPass').html('La contraseña no coincide');
            }
            else {
                $('#messPass').html('');
            }
        }
        function valida() {
            var ok = true;
            var nombre = document.formulario.nombre.value;
            var apellido = document.formulario.apellido.value;
            var mail = document.formulario.email.value;
            var domCalle = document.formulario.domCalle.value;
            var domNum = document.formulario.domNum.value;
            var tarjeta = document.formulario.tarjeta.value;
            var pass1 = document.formulario.pass_one.value;
            var pass2 = document.formulario.pass_two.value;
            if (nombre == "") {
                ok = false;
                console.log("No nombre");
            }

            if (apellido == "") {
                ok = false;
                console.log("No apellido");
            }

            if (mail == "") {
                ok = false;
                console.log("No mail");
            }

            if (domCalle == "") {
                ok = false;
                console.log("No hay domicilio");
            }

            if (domNum == 0) {
                ok = false;
                console.log("No hay numero")
            }

            if (tarjeta == "") {
                ok = false;
                console.log("No hay numero de tarjeta");
            }
            
            if (pass1 == "" || pass2 == "") {
                ok = false;
                console.log("No password");
            }

            if (pass1 != pass2) {
                ok = false;
                console.log("La contraseña no coincide");
            }

            if (ok == false) {
                alert("Faltan campos por llenar o la contraseña no coincide");
            } else {
                alert("Nombre: " + nombre +
                    "\nApellido: " + apellido +
                    "\nDomicilio (calle): " + domCalle +
                    "\nDomicilio (número): " + domNum +
                    "\nTarjeta: " + tarjeta +
                    "\nCorreo: " + mail +
                    "\nContraseña: " + pass1);
                document.formulario.method = 'post';
                document.formulario.action = 'guarda_usuarios.php';
                document.formulario.submit();
            }
            return ok;
        }
    </script>
    <style>
        label {
            text-transform: uppercase;
        }

        input {
            align-self: flex-end;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            margin-bottom: 10px;
            margin-left: auto;
        }

        .centro {
            width: 400px;
            height: 400px;
            background-color: green;
            border-radius: 15%;
            align-content: center;
        }
        .error {
            display: inline;
            color: red;
        }
    </style>
</head>


<body>
    <div class="centro">
        <form align="center" name="formulario">
            <h2>Regístrate</h2>
            <h4>Es Rápido y Fácil</h4>
            <a href="./inicio_sesion.php">Regresar</a><br>
            <label style="text-align: left;">Nombre:</label>
            <input style="height: 25px;" type="text" name="nombre" placeholder="Nombre"></input><br>
            <label>Apellido:</label>
            <input style="height: 25px;" type="text" name="apellido" placeholder="Apellido"></input><br>
            <label style="text-align: left;">Correo electrónico</label>
            <input style="height: 25px;" id="email" type="text" name="email" placeholder="Correo Electrónico" onblur="vermail();"></input>
            <div id="mensaje" class="error"></div><br>
            <label style="text-align: left;">Domicilio (Calle):</label>
            <input style="height: 25px;" type="text" name="domCalle" placeholder="Domicilio (Calle)"></input><br>
            <label style="text-align: left;">Domicilio (Número):</label>
            <input style="height: 25px;" type="number" name="domNum" placeholder="Domicilio (Número)"></input><br>
            <label style="text-align: left;">No. de Tarjeta:</label>
            <input style="height: 25px;" type="number" name="tarjeta" placeholder="No. de Tarjeta"></input><br>
            <label>Contraseña</label>
            <input style="height: 25px;" type="password" name="pass_one" placeholder="Contraseña" onblur="verpass();"></input><br>
            <label>Confirme contraseña</label>
            <input style="height: 25px;" type="password" name="pass_two" placeholder="Confirmar contraseña" onblur="verpass();"></input>
            <div id="messPass" class="error"></div><br>
            <!--<button>Registrarse</button>-->
            <input type="hidden" id="id_sel" name="id_sel" value="0"/>
            <input onclick="valida();" type="button" value="Registrarse">
        </form>
    </div>
</body>


</html>