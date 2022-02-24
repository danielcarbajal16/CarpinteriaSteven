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
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Alta admins</title>
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
            function deleteUsers(id){
            //var id 	= $('#id_sel').val();
            //var correo	= $('#email').val();
            if (id > 0){
                $.ajax({
                    url 	: './eliminar_usuarios.php',
                    type 	: 'post',
                    dataType : 'text',
                    data    : 'id='+id,
                    success :function(res){
                        if (res>0){
                            $('#Fila'+id).hide();
                            //$('#mensaje').html('El correo: '+correo+' ya está registrado');
                            //setTimeout("$('#mensaje').html('');",5000);
                        }
                    }, error: function(){
                        alert ('Error al conectar al servidor...');
                    }
                });
            }
        }
            function deleteAdmins(id){
            if (id > 0){
                $.ajax({
                    url 	: './eliminar_directivos.php',
                    type 	: 'post',
                    dataType : 'text',
                    data    : 'id='+id,
                    success :function(res){
                        if (res>0){
                            $('#admin'+id).hide();
                            //$('#mensaje').html('El correo: '+correo+' ya está registrado');
                            //setTimeout("$('#mensaje').html('');",5000);
                        }
                    }, error: function(){
                        alert ('Error al conectar al servidor...');
                    }
                });
            }
        }
        function addAdmin(id) {
            var name = document.getElementById("name"+id).textContent;
            var lastname = document.getElementById("lastname"+id).textContent;
            var correo = document.getElementById("correo"+id).textContent;
            var pass = document.getElementById("pass"+id).value;

            /*alert(
                "Nombre: " + name +
                "\nApellido: " + lastname +
                "\nCorreo: " + correo +
                "\nContraseña: " + pass
            );*/
            window.location = "./guarda_directivos2.php?nombre="+name+"&apellido="+lastname+"&correo="+correo+"&pass="+pass;
        }
        function modAdmin(id) {
            window.location = "./modificaAdminsForm.php?id="+id;
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
                document.formulario.action = 'guarda_directivos.php';
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
                <!--<a href="./inicio_sesion.php">Regresar</a>--><br>
                <label style="text-align: left;">Nombre:</label>
                <input style="height: 25px;" type="text" name="nombre" placeholder="Nombre"></input><br>
                <label>Apellido:</label>
                <input style="height: 25px;" type="text" name="apellido" placeholder="Apellido"></input><br>
                <label style="text-align: left;">Correo electrónico</label>
                <input style="height: 25px;" id="email" type="text" name="email" placeholder="Correo Electrónico" onblur="vermail();"></input>
                <div id="mensaje" class="error"></div><br>
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
        <div align="center">
            <h2>Agregue administradores desde la lista de clientes</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Botón</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM USUARIOS";
                    $res = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($res);
                    if ($num > 0) {
                        while($user = mysqli_fetch_assoc($res)) {
                            echo "
                            <tr id=\"Fila".$user['ID_USUARIO']."\">
                                <td>".$user['ID_USUARIO']."</td>
                                <td id=\"name".$user['ID_USUARIO']."\">".$user['NOMBRE']."</td>
                                <td id=\"lastname".$user['ID_USUARIO']."\">".$user['APELLIDO']."</td>
                                <td id=\"correo".$user['ID_USUARIO']."\">".$user['CORREO']."</td>
                                <input type=\"hidden\" id=\"pass".$user['ID_USUARIO']."\"  value=\"".$user['CONTRASENA']."\"/>
                                <td><button onclick=\"addAdmin(".$user['ID_USUARIO'].");deleteUsers(".$user['ID_USUARIO'].");\">Añadir</button></td>
                            </tr>
                            ";
                        }
                    }
                ?>
            </table>
            <h2>Lista de administradores actuales</h2>
                <?php 
                    $sql = "SELECT * FROM DIRECTIVOS";
                    $res = mysqli_query($con, $sql);
                    $num = mysqli_num_rows($res);
                    if ($num > 0) {
                        echo "
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th colspan=\"2\">Botones</th>
                            </tr>
                        ";
                        while($user = mysqli_fetch_assoc($res)) {
                            echo "
                                <tr id=\"admin".$user['ID_ADMIN']."\">
                                    <td>".$user['ID_ADMIN']."</td>
                                    <td>".$user['NOMBRE']."</td>
                                    <td>".$user['APELLIDO']."</td>
                                    <td>".$user['CORREO']."</td>
                                    <td><button onclick=\"deleteAdmins(".$user['ID_ADMIN'].");\">Eliminar</button></td>
                                    <td><button onclick=\"modAdmin(".$user['ID_ADMIN'].");\">Modificar</button></td>
                                </tr>
                                ";
                            }
                        echo "</table>";
                    } else {
                        echo "No hay administradores para mostrar.";
                    }
                ?>
        </div>
    </body>
</html>