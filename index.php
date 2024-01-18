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
            .imagenAux {
                width: 50%;
                margin-bottom: -90px !important;
                margin-top: -200px;
            }

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

            .imagenAux {
                margin-top: -25px;
                width: 100%;
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
</head>
<body class="is-preload">

<button class="botonFlotante" onclick="toggleMenu()">☰</button>

<div class="menuNavegacion" id="menuNavegacion">
    <a id="navEntrevista" href="index.php" class="active">Entrevista</a>
    <a id="navHistorico" href="#first">Histórico</a>
    <a id="navExpedientes" href="Expedientes.html">Expedientes</a>
    <a id="navDashBoard" href="dashboar.html">DashBoard</a>
    <a id="navCapacitacion" href="#cta">Capacitación</a>
    <a id="navAdministracion" href="Administracion.html">Administración</a>
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
            <li><a id="navEntrevistaC" href="index.php" class="active">Entrevista</a></li>
            <li><a id="navHistoricoC" href="#first">Histórico</a></li>
            <li><a id="navExpedientesC" href="Expedientes.html">Expedientes</a></li>
            <li><a id="navDashBoardC" href="dashboar.html">DashBoard</a></li>
            <li><a id="navCapacitacionC" href="#cta">Capacitación</a></li>
            <li><a id="navAdministracionC" href="Administracion.html">Administración</a></li>
        </ul>
    </nav>

    <!-- Main -->
    <div id="main">
        <section style="margin: 40px" class="main special seccion-transicion" id="seccion1">

            <div class="row gtr-uniform">
                <div class="col-12 col-12-xsmall">
                    <img src="images/entrevista-min.gif" class="imagenAux">
                </div>
            </div>

            <div class="spotlight" style="margin-bottom: 0px;">
                <div class="content">
                    <header class="major">
                        <h2>Conteste el formulario.</h2>
                    </header>
                </div>
            </div>

            <div class="row gtr-uniform">
                <div class="col-12 col-12-xsmall">
                    <label style="text-align: center;">Nómina del entrevistado:</label>
                    <input type="number" name="demo-name" id="txtNomina" value="" placeholder="00012345"/>
                </div>

                <div class="col-12">
                    <ul class="actions" style="justify-content: center;">
                        <li><input type="submit" value="Verificar" id="verificar" class="primary"/></li>
                    </ul>
                </div>
            </div>
        </section>

        <section style="margin: 40px; display: none" class="main special seccion-transicion" id="seccion2">
            <div class="spotlight" style="margin-bottom: 0px;">
                <div class="content">
                    <header class="major">
                        <h2 id="nombreEntrevistado"></h2>
                    </header>
                </div>
            </div>

            <div class="row gtr-uniform">

                <div class="col-12 col-12-medium" id="seccionHistorico">
                    <h3>Últimos registros del entrevistado</h3>
                    <div id="historico">
                    </div>
                    <code><a href="Expedientes.html">Ver expediente del usuario</a></code>
                </div>

                <div class="col-12 col-12-medium">
                    <hr>
                </div>
                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">Fecha de ausencia:</label>
                    <input type="date" name="demo-email" id="txtFechaAusencia" value="" placeholder=""/>
                </div>
                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">Tipo ausentismo:</label>
                    <select name="demo-category" id="cbTipoAusentismo" onchange="mostrarSeccionTipo()">
                        <option value="">- Seleccione -</option>
                        <option value="Por qué no me autorizaron vacaciones">Por qué no me autorizaron vacaciones.
                        </option>
                        <option value="Estaba enfermo y no acudí al IMSS">Estaba enfermo y no acudí al IMSS.</option>
                        <option value="Cuidado de hijos">Cuidado de hijos.</option>
                        <option value="Trámite Legal">Trámite Legal.</option>
                        <option value="Familiar Enfermo">Familiar Enfermo.</option>
                        <option value="Cambio de domicilio">Cambio de domicilio.</option>
                        <option value="Me quede dormido">Me quede dormido.</option>
                        <option value="Por transporte">Por transporte.</option>
                        <option value="Junta y/o evento escolar">Junta y/o evento escolar.</option>
                        <option value="Mucho trafico">Mucho trafico.</option>
                        <option value="Lluvia">Lluvia.</option>
                        <option value="Falla mecánica">Falla mecánica.</option>
                        <option value="Otro">Otro.</option>
                    </select>
                </div>
                <div class="col-4 col-12-xsmall" id="seccionTipo" style="display: none">
                    <label style="text-align: center;">Ingrese el tipo:</label>
                    <input type="text" name="demo-email" id="txtTipo" value="" placeholder=""/>
                </div>
                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">APU :</label>
                    <select name="demo-category" id="cbEncargado" onchange="llenarSuper()">
                        <option value="">- Seleccione -</option>
                    </select>
                </div>

                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">Supervisor :</label>
                    <select name="demo-category" id="cbSupervisor" onchange="llenarShift()">
                        <option value="">- Seleccione -</option>
                    </select>
                </div>

                <div class="col-4 col-12-xsmall">
                    <label style="text-align: center;">ShiftLeader:</label>
                    <select name="demo-category" id="cbShiftLeader">
                        <option value="">- Seleccione -</option>
                    </select>
                </div>
                <div class="col-12">
                    <label style="text-align: center;">Comentarios:</label>
                    <textarea name="demo-message" id="txtMotivo" placeholder="Ingresa el motivo del ausentismo."
                              rows="6"></textarea>
                </div>

                <div class="col-12 col-12-xsmall">
                    <label style="text-align: center;">Número de tag del entrevistado:</label>
                    <input type="text" name="demo-name" id="txtTag" value="" placeholder="0005618130"/>
                </div>

                <div class="col-12 col-12-xsmall">
                    <ul class="actions" style="justify-content: center;">
                        <li><input type="submit" id="btnEnviar" value="Enviar" class="primary"/></li>
                        <li><input type="reset" id="btnReset" value="Resetear"/></li>
                    </ul>
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

<script>
    var rol = '<?php echo $_SESSION["rol"];?>';

    if (rol==='2'){
        document.getElementById("navAdministracion").style.display='none';
        document.getElementById("navDashBoard").style.display='none';
        document.getElementById("navExpedientes").style.display='none';
        document.getElementById("navHistorico").style.display='none';

        document.getElementById("navAdministracionC").style.display='none';
        document.getElementById("navDashBoardC").style.display='none';
        document.getElementById("navExpedientesC").style.display='none';
        document.getElementById("navHistoricoC").style.display='none';
    }

    function toggleMenu() {
        var menu = document.getElementById("menuNavegacion");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }

    llenarAPU();

    function llenarAPU() {
        $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/daoApu.php', function (data) {
            var select = document.getElementById("cbEncargado");
            for (var i = 0; i < data.data.length; i++) {
                var createOption = document.createElement("option");
                createOption.text = data.data[i].Nombre;
                createOption.value = data.data[i].Puesto;
                select.appendChild(createOption);
            }
        });
    }

    function llenarSuper() {
        $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/daoSupervisor.php?APU=' + document.getElementById("cbEncargado").value, function (data) {
            var selectS = document.getElementById("cbSupervisor");
            selectS.innerHTML = "";

            var selectA = document.getElementById("cbShiftLeader");
            selectA.innerHTML = "";


            var createOptionDef = document.createElement("option");
            createOptionDef.text = "Seleccione";
            createOptionDef.value = "";
            selectS.appendChild(createOptionDef);

            for (var i = 0; i < data.data.length; i++) {
                var createOptionS = document.createElement("option");
                createOptionS.text = data.data[i].Supervisor;
                createOptionS.value = data.data[i].Supervisor;
                selectS.appendChild(createOptionS);
            }
        });
    }

    function llenarShift() {
        $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/daoShiftLeader.php?APU=' + document.getElementById("cbSupervisor").value, function (data) {
            var selectS = document.getElementById("cbShiftLeader");
            selectS.innerHTML = "";

            var createOptionDefS = document.createElement("option");
            createOptionDefS.text = "Seleccione";
            createOptionDefS.value = "";
            selectS.appendChild(createOptionDefS);

            for (var i = 0; i < data.data.length; i++) {
                var createOptionS = document.createElement("option");
                createOptionS.text = data.data[i].ShiftLeader;
                createOptionS.value = data.data[i].ShiftLeader;
                selectS.appendChild(createOptionS);
            }
        });
    }

    var numeroTag, area, nomina, banderaTipo;

    function mostrarSeccionTipo() {
        var cbTipoAusentismo = document.getElementById("cbTipoAusentismo");
        var seccionTipo = document.getElementById("seccionTipo");

        if (cbTipoAusentismo.value === "Otro") {
            seccionTipo.style.display = 'block';
            banderaTipo = true;
        } else {
            seccionTipo.style.display = 'none';
            banderaTipo = false;
        }
    }

    window.onload = function () {
        var boton = document.getElementById("verificar");
        var seccionUno = document.getElementById("seccion1");
        var seccionDos = document.getElementById("seccion2");
        var botonGuardar = document.getElementById("btnEnviar");
        var botonResetear = document.getElementById("btnReset");

        boton.addEventListener('click', function () {
            seccionUno.style.opacity = '0';
            seccionDos.style.opacity = '1';

            verificarNombre().then(function (esValido) {
                if (esValido) {
                    setTimeout(function () {
                        seccionUno.style.display = 'none';
                        seccionDos.style.display = 'block';
                    }, 500);
                    historicoUsuario();
                }
            });
        });

        botonGuardar.addEventListener('click', function () {
            enviar();
        });

        botonResetear.addEventListener('click', function () {
            window.onload();
        });


    };

    function verificarNombre() {
        return new Promise(function (resolve) {
            var txtNomina = document.getElementById("txtNomina");
            var nominaAux;

            if (txtNomina.value.trim() === "") {
                alert("Por favor, ingresa una nómina válida.");
                resolve(false);
            } else {
                nominaAux = llenarNomina(txtNomina.value);
                $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/daoVerificarUsuario.php?nomina=' + nominaAux, function (data) {
                    if (data && data.data && data.data.length > 0) {
                        nomina = nominaAux;
                        document.getElementById("nombreEntrevistado").innerHTML = data.data[0].NomUser;
                        numeroTag = data.data[0].IdTag;
                        area = data.data[0].NombreWC + " ";
                        resolve(true);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...', showConfirmButton: false, input: 'none',
                            text: 'El correo ingresado del encargado es incorrecto no pertenece al dominio de grammer "@grammer.com"'
                        })
                        resolve(false);
                    }
                });
            }
        });
    }

    function historicoUsuario() {
        var historicosReport = document.getElementById("historico");
        return new Promise(function (resolve) {
            $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/daoExpedienteUsuario.php?nomina=' + nomina, function (data) {
                if (data && data.data && data.data.length > 0) {
                    for (var i = 0; i < data.data.length; i++) {
                        historicosReport.innerHTML += "<p><strong>" + data.data[i].FechaAusentismo + "</strong> : " + data.data[i].TipoAusencia + ".</p>";
                    }
                } else {
                    document.getElementById("seccionHistorico").style.display = "none";
                }
            });
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

    function enviar() {

        var fechaAusencia = document.getElementById('txtFechaAusencia');
        var tipoAusentismo = document.getElementById('cbTipoAusentismo');
        var encargado = document.getElementById('cbEncargado');
        var motivo = document.getElementById('txtMotivo');
        var nominaEntrevistador = "00001606";
        var tag = document.getElementById("txtTag");
        var tipoOtro = document.getElementById("txtTipo");
        var shiftleader = document.getElementById("cbShiftLeader");
        var supervisor = document.getElementById("cbSupervisor");

        if (tag.value == numeroTag) {
            if (nomina != "") {
                if (area != "") {
                    if (fechaAusencia.value != "") {
                        if (tipoAusentismo.value != "") {
                            if (encargado.value != "") {
                                if (motivo.value != "") {
                                    if (nominaEntrevistador.value != "") {
                                        if (supervisor.value != "") {

                                            /*
                                        document.getElementById('first').style.display = 'none';
                                        document.getElementById('carga').style.display = 'block';
                                        document.getElementById('carga').innerHTML = '<div class="loading"><center><img src="images/carga.gif" height="350px"><br/>Un momento, por favor...</center></div>';

                                         */
                                            const data = new FormData();

                                            data.append('nomina', nomina.trim());
                                            data.append('area', area.trim());
                                            data.append('fechaAusencia', fechaAusencia.value);

                                            if (banderaTipo) {
                                                data.append('tipoAusentismo', tipoOtro.value);
                                            } else {
                                                data.append('tipoAusentismo', tipoAusentismo.value);
                                            }

                                            data.append('encargado', encargado.value);
                                            data.append('motivo', motivo.value.replace(/["'\\\/]/g, ''));
                                            data.append('nominaEntrevistador', nominaEntrevistador);
                                            data.append('shiftLeader', shiftleader.value);
                                            data.append('supervisor', supervisor.value);

                                            fetch('dao/daoGuardarEntrevista.php', {
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
                                                        location.reload();
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
                                        }else{
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...', showConfirmButton: false, input: 'none',
                                                text: 'Selecciones supervisor'
                                            })
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...', showConfirmButton: false, input: 'none',
                                            text: 'Ingrese la nómina del entrevistador'
                                        })
                                    }
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...', showConfirmButton: false, input: 'none',
                                        text: 'Ingrese el motivo'
                                    })
                                }
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...', showConfirmButton: false, input: 'none',
                                    text: 'Ingrese el encargado'
                                })
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...', showConfirmButton: false, input: 'none',
                                text: 'Ingrese el tipo de ausentismo'
                            })
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...', showConfirmButton: false, input: 'none',
                            text: 'Ingrese la fecha'
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...', showConfirmButton: false, input: 'none',
                        text: 'Ingrese la área'
                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...', showConfirmButton: false, input: 'none',
                    text: 'Ingrese la nómina'
                })
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...', showConfirmButton: false, input: 'none',
                text: 'El número de tag no corresponde con la nomina ingresada.'
            })
        }
    }


</script>

</body>
</html>