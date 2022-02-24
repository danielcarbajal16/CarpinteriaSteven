<?php 
    session_start();

    require "./conecta.php";
    $con = conecta();

    if(!$_SESSION['idU']) {
        header("Location: ./inicio_sesion.php");
    } else if ($_SESSION['tipo'] != 'admin') {
        header("Location: ./index.php");
    } else {
        $idU = $_SESSION['idU'];
    }
    $idAdmin = $_REQUEST['id'];
    $sql = "SELECT * FROM DIRECTIVOS WHERE ID_ADMIN = $idAdmin";
    $res = mysqli_query($con, $sql);
    $admin = mysqli_fetch_assoc($res);
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modificación de admins</title>
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
            var pass1 = document.formulario.pass_one.value;
            var pass2 = document.formulario.pass_two.value;
            if (nombre == "" || apellido == "" || mail == "" || pass1 != pass2) {
                ok = false;
                console.log("No nombre");
            }

            if (ok == false) {
                alert("Faltan campos por llenar o la contraseña no coincide");
            } else {
                alert("Nombre: " + nombre +
                    "\nApellido: " + apellido +
                    "\nCorreo: " + mail +
                    "\nContraseña: " + pass1);
                document.formulario.method = 'post';
                document.formulario.action = 'modificaAdmins.php';
                document.formulario.submit();
            }
            return ok;
        }
        </script>
        <style>
            table {
            width: 750px;
            border-collapse: separate;
            border: 1px solid #000000;
            background-color: blue; 
        }
        th {
            width: 25%;
            border: 1px solid #000000;
            background-color: chartreuse;
        }
        td {
            width: 25%;
            border: 1px solid #000000;
            background-color: skyblue;
            text-align: center;
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
                <h2>Regístre al nuevo administrador</h2>
                <h4>Es Rápido y Fácil</h4>
                <a href="./alta_administradores.php">Regresar</a><br>
                <label style="text-align: left;">Nombre:</label>
                <input style="height: 25px;" type="text" name="nombre" placeholder="Nombre" value="<?php echo $admin['NOMBRE']?>"></input><br>
                <label>Apellido:</label>
                <input style="height: 25px;" type="text" name="apellido" placeholder="Apellido" value="<?php echo $admin['APELLIDO']?>"></input><br>
                <label style="text-align: left;">Correo electrónico</label>
                <input style="height: 25px;" id="email" type="text" name="email" placeholder="Correo Electrónico" value="<?php echo $admin['CORREO']?>" onblur="vermail();"></input>
                <div id="mensaje" class="error"></div><br>
                <label>Contraseña</label>
                <input style="height: 25px;" type="password" name="pass_one" placeholder="Contraseña" onblur="verpass();"></input><br>
                <label>Confirme contraseña</label>
                <input style="height: 25px;" type="password" name="pass_two" placeholder="Confirmar contraseña" onblur="verpass();"></input>
                <div id="messPass" class="error"></div><br>
                <!--<button>Registrarse</button>-->
                <input type="hidden" id="id_sel" name="id_sel" value="<?php echo $admin['ID_ADMIN']?>"/>
                <input onclick="valida();" type="button" value="Registrarse">
            </form>
        </div>
    </body>
</html>