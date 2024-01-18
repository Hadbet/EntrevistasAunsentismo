<!DOCTYPE HTML>
<html>
<head>
    <?php
    session_start();

    if ($_SESSION["nomina"] == "" && $_SESSION["nomina"]== null && $_SESSION["rol"]== "" && $_SESSION["rol"]== null) {
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=index.html'>";
        session_destroy();
    }else{
        session_start();
    }
    ?>
    <title>Entrevistas Ausentismo</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>

    <!-- CSS -->
    <link rel="stylesheet" href="lib/sweetalert2.css">

    <!-- JavaScript -->
    <script src="lib/sweetalert2.all.min.js"></script>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
    <style>
        .seccion-transicion {
            transition: opacity 0.5s ease-in-out;
        }

        @media only screen and (min-width: 768px) {
            /* Estilos específicos para pantallas grandes */
            .logoAux {
                width: 20%;
            }

            .botonFlotante {
                display: none;
            }

            .menuNavegacion {
                display: none;
            }

            /* Agrega más estilos según sea necesario */
        }

        @media only screen and (max-width: 600px) {

            .logoAux {
                width: 50%;
            }

            .botonFlotante {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                background-color: #333;
                color: white;
                padding: 20px;
                height: 51px;
                cursor: pointer;
                border: none;
                border-radius: 50%;
                text-align: center; /* Centrar el contenido horizontalmente */
                line-height: 0.3; /* Ajustar la altura de línea para centrar verticalmente */
            }

            .menuNavegacion {
                display: none;
                position: fixed;
                top: 40px;
                left: 10px;
                background-color: #333;
                padding: 10px;
                border-radius: 5px;
            }

            .menuNavegacion a {
                display: block;
                color: white;
                text-decoration: none !important;
                margin-bottom: 10px;
            }

            .menuNavegacion a:hover {
                text-decoration: none;
            }
        }

    </style>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>


</head>
<body class="is-preload">

<button class="botonFlotante" onclick="toggleMenu()">☰</button>

<div class="menuNavegacion" id="menuNavegacion">
    <a href="index.php">Entrevista</a>
    <a href="#first">Histórico</a>
    <a href="Expedientes.php" class="active">Expedientes</a>
    <a href="dashboar.php">DashBoard</a>
    <a href="#cta">Capacitación</a>
    <a href="Administracion.php">Administración</a>
</div>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <span class="logo"><img class="logoAux" src="images/logo_blanco.png" alt=""/></span>
        <h1>Entrevistas Ausentismo</h1>
        <p>Recuerda que es importante mantener informado al trabajador<br/>
            de todos los datos ingresados en este sistema.</p>
    </header>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="index.php">Entrevista</a></li>
            <li><a href="#first">Histórico</a></li>
            <li><a href="Expedientes.php">Expedientes</a></li>
            <li><a href="dashboar.php">DashBoard</a></li>
            <li><a href="#cta">Capacitación</a></li>
            <li><a href="Administracion.php" class="active">Administración</a></li>
        </ul>
    </nav>

    <!-- Main -->
    <div id="main">
        <section class="main special seccion-transicion" id="seccion1">

            <div class="spotlight" style="margin-bottom: 0px;">
                <div class="content">
                    <header class="major">
                        <h2>Usuarios.</h2>
                    </header>
                </div>
            </div>

            <hr>

            <div class="row gtr-uniform">
                <div class="col-2 col-12-xsmall">
                    <label style="text-align: center;">Nómina:</label>
                    <input type="number" name="demo-name" id="txtNomina" value="" placeholder="00012345"
                           onkeyup="verificarConEnter(event)"/>
                </div>
                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">Nombre:</label>
                    <input type="text" name="demo-name" id="txtNombre" value="" placeholder="Juan Perez Black"/>
                </div>
                <div class="col-2 col-12-xsmall">
                    <label style="text-align: center;">APU:</label>
                    <select name="demo-category" id="cbEncargado">
                        <option value="">- Seleccione -</option>
                        <option value="APU 1">APU 1.</option>
                        <option value="APU 2">APU 2.</option>
                        <option value="APU 3">APU 3.</option>
                        <option value="NA">NA</option>
                    </select>
                </div>
                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">Puesto:</label>
                    <select name="demo-category" id="cbPuesto">
                        <option value="">- Seleccione -</option>
                        <option value="Supervisor">Supervisor.</option>
                        <option value="Coordinador">Coordinador.</option>
                        <option value="ShiftLeader">ShiftLeader.</option>
                        <option value="RH">Recursos Humanos.</option>
                        <option value="APU 1">APU 1.</option>
                        <option value="APU 2">APU 2.</option>
                        <option value="APU 3">APU 3.</option>
                    </select>
                </div>
                <div class="col-6 col-12-xsmall">
                    <label style="text-align: center;">Contraseña:</label>
                    <input type="password" name="demo-name" id="txtPassword" value="" placeholder="Grammer1"/>
                </div>
                <div class="col-6 col-12-xsmall">
                    <label style="text-align: center;">Rol:</label>
                    <select name="demo-category" id="cbRol">
                        <option value="">- Seleccione -</option>
                        <option value="1">Administrador.</option>
                        <option value="2">Entrevistador.</option>
                    </select>
                </div>

                <div class="col-12">
                    <ul class="actions" style="justify-content: center;">
                        <li><input type="submit" value="Enviar" id="verificar" class="primary"/></li>
                        <li><input style="background-color: #ea5455" type="submit" value="Eliminar" id="eliminarUsu" class="primary"/></li>
                        <li><input type="submit" value="Reset" id="reset" class="secondary"/></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row gtr-uniform">
                <div class="col-12 col-12-xsmall">
                    <!-- Contenido de la tabla -->
                    <table id="miTabla">
                        <thead>
                        <tr>
                            <th>Nómina</th>
                            <th>Nombre</th>
                            <th>APU</th>
                            <th>Puesto</th>
                            <th>Rol</th>
                            <th>Password</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Los datos se agregarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="main special seccion-transicion" id="seccionEncargado">

            <div class="spotlight" style="margin-bottom: 0px;">
                <div class="content">
                    <header class="major">
                        <h2>Encargados.</h2>
                    </header>
                </div>
            </div>

            <hr>

            <div class="row gtr-uniform">
                <div class="col-2 col-12-xsmall">
                    <label style="text-align: center;">ID:</label>
                    <input type="number" name="demo-name" id="txtIdEncargados" value="" placeholder="00012345"
                           onkeyup="verificarConEnter(event)" disabled/>
                </div>
                <div class="col-2 col-12-xsmall">
                    <label style="text-align: center;">APU:</label>
                    <select name="demo-category" id="cbApuEncargados">
                        <option value="">- Seleccione -</option>
                        <option value="APU 1">APU 1.</option>
                        <option value="APU 2">APU 2.</option>
                        <option value="APU 3">APU 3.</option>
                    </select>
                </div>
                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">Supervisor:</label>
                    <input type="text" name="demo-name" id="txtSupervisorEncargados" value="" placeholder="Grammer1"/>
                </div>
                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">ShiftLeader:</label>
                    <input type="text" name="demo-name" id="txtShiftLeaderEncargados" value="" placeholder="Grammer1"/>
                </div>

                <div class="col-12">
                    <ul class="actions" style="justify-content: center;">
                        <li><input type="submit" value="Agregar o Actualizar" id="verificarDos" class="primary"/></li>
                        <li><input type="submit" value="Eliminar" id="eliminarDos" class="primary"
                                   style="background-color: #ea5455"/></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row gtr-uniform">
                <div class="col-12 col-12-xsmall">
                    <!-- Contenido de la tabla -->
                    <table id="miTablaDos">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>APU</th>
                            <th>Supervisor</th>
                            <th>ShiftLeader</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Los datos se agregarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>


        <br>
        <!-- First Section -->


    </div>

    <!-- Footer -->
    <footer id="footer">
        <section>
            <h2>Información</h2>
            <dl class="alt">
                <dt>Address</dt>
                <dd>Av. De la Luz No. 24 Int: B 1 y 2 ACC III</dd>
                <dd>Queretaro, Queretaro 76120 Mexico</dd>
                <dt>Phone</dt>
                <dd>(000) 000-0000 x 0000</dd>
                <dt>Email</dt>
                <dd><a href="#">information@untitled.tld</a></dd>
            </dl>
            <ul class="icons">
                <li><a href="#" class="icon brands fa-linkedin alt"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
            </ul>
        </section>
        <p class="copyright">&copy; Grammer Automotive Puebla S.A de C.V. Design: Grammer.</p>
    </footer>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>

    var rol = '<?php echo $_SESSION["rol"];?>';

    if (rol==='2'){
        window.location.href = 'index.php';
    }

    function toggleMenu() {
        var menu = document.getElementById("menuNavegacion");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }

    function llenarParametros(id, apu, supervisor, shift) {
        document.getElementById("txtIdEncargados").value = id;
        document.getElementById("txtSupervisorEncargados").value = supervisor;
        document.getElementById("txtShiftLeaderEncargados").value = shift;
        document.getElementById("cbApuEncargados").value = apu;
        var elementoSuperior = document.getElementById("seccionEncargado");

        // Utiliza scrollIntoView para desplazar la vista hacia arriba
        elementoSuperior.scrollIntoView({behavior: "smooth"});
    }

    function llenarParametrosUsu(nomina, nombre, apu, puesto, rol, password) {
        document.getElementById("txtNomina").value = nomina;
        document.getElementById("txtNombre").value = nombre;
        document.getElementById("cbEncargado").value = apu;
        document.getElementById("cbPuesto").value = puesto;
        document.getElementById("txtPassword").value = password;
        document.getElementById("cbRol").value = rol;

        var elementoSuperior = document.getElementById("seccion1");

        // Utiliza scrollIntoView para desplazar la vista hacia arriba
        elementoSuperior.scrollIntoView({behavior: "smooth"});
    }

    function inicializarTabla() {
        $('#miTabla').DataTable({
            ajax: {
                url: 'https://arketipo.mx/RH/Entrevistas/dao/daoUsuarios.php',
                dataSrc: 'data'
            },
            columns: [
                {data: 'IdNomina'},
                {data: 'Nombre'},
                {data: 'APU'},
                {data: 'Puesto'},
                {data: 'Rol'},
                {data: 'Password'},
                {data: 'boton'}
            ]
        });
    }

    function inicializarTablaDos() {
        $('#miTablaDos').DataTable({
            ajax: {
                url: 'https://arketipo.mx/RH/Entrevistas/dao/daoEcargados.php',
                dataSrc: 'data'
            },
            columns: [
                {data: 'IdEncargado'},
                {data: 'APU'},
                {data: 'Supervisor'},
                {data: 'ShiftLeader'},
                {data: 'boton'}
            ]
        });
    }

    // Llama a la función al cargar la página
    $(document).ready(function () {
        inicializarTabla();
        inicializarTablaDos();
    });

    // Ejemplo de cómo podrías llamar a la función para actualizar la tabla
    function actualizarTabla() {
        // Destruye la tabla actual antes de volver a inicializarla
        $('#miTabla').DataTable().destroy();
        inicializarTabla();
    }

    function actualizarTablaDos() {
        // Destruye la tabla actual antes de volver a inicializarla
        $('#miTablaDos').DataTable().destroy();
        inicializarTablaDos();
    }

    $('#verificar').on('click', function () {
        enviar();
        actualizarTabla();
    });

    $('#verificarDos').on('click', function () {
        enviarEncargado()
        actualizarTablaDos();
    });

    $('#eliminarDos').on('click', function () {
        eliminarEncargado();
        actualizarTablaDos();
    });


    $('#eliminarUsu').on('click', function () {
        eliminarUsuario();
        actualizarTabla();
    });

    $('#reset').on('click', function () {
        limpiar();
    });


    function enviar() {

        var nomina = document.getElementById('txtNomina');
        var nombre = document.getElementById('txtNombre');
        var apu = document.getElementById('cbEncargado');
        var puesto = document.getElementById('cbPuesto');
        var password = document.getElementById('txtPassword');
        var rol = document.getElementById("cbRol");

        if (nomina.value.trim() !== '') {
            if (nombre.value.trim() !== '') {
                if (apu.value.trim() !== '') {
                    if (puesto.value.trim() !== '') {
                        if (password.value.trim() !== '') {
                            if (rol.value.trim() !== '') {
                                /*
                                document.getElementById('first').style.display = 'none';
                                document.getElementById('carga').style.display = 'block';
                                document.getElementById('carga').innerHTML = '<div class="loading"><center><img src="images/carga.gif" height="350px"><br/>Un momento, por favor...</center></div>';

                                 */
                                const data = new FormData();
                                console.log(nomina.value.trim().padStart(8, '0'));
                                data.append('nomina', nomina.value.trim().padStart(8, '0'));
                                data.append('nombre', nombre.value.trim());
                                data.append('apu', apu.value.trim());
                                data.append('Puesto', puesto.value.trim());
                                data.append('Password', password.value.trim());
                                data.append('Rol', rol.value.trim());

                                fetch('dao/daoUsuariosGuardar.php', {
                                    method: 'POST',
                                    body: data
                                })
                                    .then(function (response) {
                                        if (response.ok) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Enviado.', showConfirmButton: false, input: 'none',
                                                text: 'Registro enviardo.'
                                            })
                                            limpiar();
                                        } else {
                                            throw "Error en la llamada Ajax";
                                        }

                                    })
                                    .then(function (texto) {
                                        console.log(texto);
                                    })
                                    .catch(function (err) {
                                        console.log(err);
                                    });

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...', showConfirmButton: false, input: 'none',
                                    text: 'Ingrese el rol'
                                })
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...', showConfirmButton: false, input: 'none',
                                text: 'Ingrese el password'
                            })
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...', showConfirmButton: false, input: 'none',
                            text: 'Ingrese el puesto'
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...', showConfirmButton: false, input: 'none',
                        text: 'Ingrese APU'
                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...', showConfirmButton: false, input: 'none',
                    text: 'Ingrese la nombre'
                })
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...', showConfirmButton: false, input: 'none',
                text: 'Ingrese el nómina'
            })
        }
    }

    function verificarConEnter(event) {
        // Verifica si la tecla presionada es "Enter"
        if (event.keyCode === 13) {
            buscarNombre(llenarNomina(document.getElementById("txtNomina").value));
        }
    }

    function buscarNombre(nomina) {
        $.getJSON('https://arketipo.mx/Controlling/BonoSalida/dao/DaoNombre.php?nomina=' + nomina, function (data) {
            document.getElementById("txtNombre").value = data.data[0].NomUser;
        });
    }

    function llenarNomina(nomina) {
        if (nomina.length === 1) {
            return nomina = "0000000" + nomina;
        }
        if (nomina.length === 2) {
            return nomina = "000000" + nomina;
        }
        if (nomina.length === 3) {
            return nomina = "00000" + nomina;
        }
        if (nomina.length === 4) {
            return nomina = "0000" + nomina;
        }
        if (nomina.length === 5) {
            return nomina = "000" + nomina;
        }
        if (nomina.length === 6) {
            return nomina = "00" + nomina;
        }
        if (nomina.length === 7) {
            return nomina = "0" + nomina;
        }
        return nomina;
    }

    function limpiar() {
        document.getElementById('txtIdEncargados').value = '';
        document.getElementById('txtSupervisorEncargados').value = '';
        document.getElementById('txtShiftLeaderEncargados').value = '';
        document.getElementById('txtNomina').value = '';
        document.getElementById('txtNombre').value = '';
        document.getElementById('txtPassword').value = '';

        document.getElementById('txtIdEncargados').value = '';
        document.getElementById('cbApuEncargados').value = '';
        document.getElementById('txtSupervisorEncargados').value = '';
        document.getElementById('txtShiftLeaderEncargados').value = '';
    }

    function enviarEncargado() {

        var id = document.getElementById('txtIdEncargados');
        var apu = document.getElementById('cbApuEncargados');
        var supervisor = document.getElementById('txtSupervisorEncargados');
        var shiftLeader = document.getElementById('txtShiftLeaderEncargados');

        if (apu.value.trim() !== '') {
            if (supervisor.value.trim() !== '') {
                if (shiftLeader.value.trim() !== '') {

                    const data = new FormData();

                    if (id.value.trim() !== '') {
                        data.append('id', id.value);
                    } else {
                        data.append('id', "n");
                    }

                    data.append('apu', apu.value.trim());
                    data.append('supervisor', supervisor.value.trim());
                    data.append('shiftLeader', shiftLeader.value.trim());

                    fetch('dao/daoEncargadosGuardar.php', {
                        method: 'POST',
                        body: data
                    })
                        .then(function (response) {
                            if (response.ok) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Enviado.', showConfirmButton: false, input: 'none',
                                    text: 'Registro enviardo.'
                                })
                                limpiar();
                            } else {
                                throw "Error en la llamada Ajax";
                            }

                        })
                        .then(function (texto) {
                            console.log(texto);
                        })
                        .catch(function (err) {
                            console.log(err);
                        });

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...', showConfirmButton: false, input: 'none',
                        text: 'Ingrese APU'
                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...', showConfirmButton: false, input: 'none',
                    text: 'Ingrese la nombre'
                })
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...', showConfirmButton: false, input: 'none',
                text: 'Ingrese el nómina'
            })
        }
    }

    function eliminarEncargado() {

        var id = document.getElementById('txtIdEncargados');

        if (id.value.trim() !== '') {

            const data = new FormData();

            data.append('id', id.value.trim());

            fetch('dao/daoEncargadosEliminar.php', {
                method: 'POST',
                body: data
            })
                .then(function (response) {
                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado.', showConfirmButton: false, input: 'none',
                            text: 'Registro enviardo.'
                        })
                        limpiar();
                    } else {
                        throw "Error en la llamada Ajax";
                    }

                })
                .then(function (texto) {
                    console.log(texto);
                })
                .catch(function (err) {
                    console.log(err);
                });

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...', showConfirmButton: false, input: 'none',
                text: 'No se selecciono ningun usuario'
            })
        }
    }


    function eliminarUsuario() {

        var id = document.getElementById('txtNomina');

        if (id.value.trim() !== '') {

            const data = new FormData();

            data.append('id', id.value.trim());

            fetch('dao/daoUsuariosEliminar.php', {
                method: 'POST',
                body: data
            })
                .then(function (response) {
                    if (response.ok) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Eliminado.', showConfirmButton: false, input: 'none',
                            text: 'Registro enviardo.'
                        })
                        limpiar();
                    } else {
                        throw "Error en la llamada Ajax";
                    }

                })
                .then(function (texto) {
                    console.log(texto);
                })
                .catch(function (err) {
                    console.log(err);
                });

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...', showConfirmButton: false, input: 'none',
                text: 'No se selecciono ningun usuario'
            })
        }
    }
</script>

</body>
</html>