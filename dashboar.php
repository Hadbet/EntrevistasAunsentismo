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

            .logoAux {
                width: 20%;
            }

            .botonFlotante{
                display: none;
            }

            .menuNavegacion{
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
</head>
<body class="is-preload">

<button class="botonFlotante" onclick="toggleMenu()">☰</button>

<div class="menuNavegacion" id="menuNavegacion">
    <a href="index.php">Entrevista</a>
    <a href="Historico.php">Histórico</a>
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
            <li><a href="Historico.php">Histórico</a></li>
            <li><a href="Expedientes.php">Expedientes</a></li>
            <li><a href="dashboar.php" class="active">DashBoard</a></li>
            <li><a href="#cta">Capacitación</a></li>
            <li><a href="Administracion.php">Administración</a></li>
        </ul>
    </nav>

    <!-- Main -->
    <div id="main">
        <section style="margin: 40px" class="main special seccion-transicion" id="seccion1">

            <div class="spotlight" style="margin-bottom: 0px;    margin-top: -5%;">
                <div class="content">
                    <header class="major">
                        <h2>Resumen General.</h2>
                    </header>
                </div>
            </div>

            <div class="row gtr-uniform">
                <div class="col-5 col-12-xsmall">
                    <label style="text-align: center;">Fecha inicio:</label>
                    <input type="date" name="demo-name" id="txtFechaInicio" value="" placeholder="00012345"
                           onkeyup="verificarConEnter(event)"/>
                </div>
                <div class="col-5 col-12-xsmall">
                    <label style="text-align: center;">Fecha final:</label>
                    <input type="date" name="demo-name" id="txtFechaFin" value="" placeholder="Juan Perez Black"/>
                </div>

                <div class="col-2">
                    <label style="text-align: center;color: white">boton</label>
                    <ul class="actions" style="justify-content: center;">
                        <li><input type="submit" value="Enviar" id="verificar" class="primary"/></li>
                    </ul>
                </div>
            </div>
            <br>

            <div class="row gtr-uniform">

                <div class="col-12 col-12-xsmall" id="apusSeccion" style="display: none">
                    <ul class="statistics">
                        <li class="style3">
                            <span class="icon solid fa-code-branch"></span>
                                <strong id="txtApu1"></strong> Apu 1 - Sergio<br>
                            <button onclick="apuGraficas(1)" style="background-color: #00398e; margin-top: 20px" class="primary">Entrar</button>
                        </li>
                        <li class="style4">
                            <span class="icon fa-folder-open"></span>
                            <strong id="txtApu2"></strong> Apu 2 - Rhoman<br>
                            <button onclick="apuGraficas(2)" style="background-color: #00398e; margin-top: 20px" class="primary">Entrar</button>
                        </li>
                        <li class="style5">
                            <span class="icon solid fa-signal"></span>
                            <strong id="txtApu3"></strong> Apu 3 - Fernando<br>
                            <button onclick="apuGraficas(3)" style="background-color: #00398e; margin-top: 20px" class="primary">Entrar</button>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-12-xsmall" id="seccionSupervisor" style="display: none">
                    <div class="spotlight" style="margin-bottom: 0px;">
                        <div class="content">
                            <header class="major">
                                <h2>Ausencias por Supervisor.</h2>
                            </header>
                        </div>
                    </div>
                    <canvas id="myChart5"></canvas>
                </div>

                <div class="col-12 col-12-xsmall" id="seccionShift" style="display: none">
                    <div class="spotlight" style="margin-bottom: 0px;">
                        <div class="content">
                            <header class="major">
                                <h2>Ausencias por Shift Leader.</h2>
                            </header>
                        </div>
                    </div>
                    <canvas id="myChart3"></canvas>
                </div>

                <div class="col-12 col-12-xsmall" id="seccionEncargado" style="display: none">
                    <div class="spotlight" style="margin-bottom: 0px;">
                        <div class="content">
                            <header class="major">
                                <h2>Ausencias por encargado.</h2>
                            </header>
                        </div>
                    </div>
                    <canvas id="myChart"></canvas>
                </div>

                <div class="col-12 col-12-xsmall" id="seccionTipo" style="display: none">
                    <div class="spotlight" style="margin-bottom: 0px;">
                        <div class="content">
                            <header class="major">
                                <h2>Ausencias por tipo.</h2>
                            </header>
                        </div>
                    </div>
                    <canvas id="myChart2"></canvas>
                </div>
                <div class="col-12 col-12-xsmall" id="seccionNomina" style="display: none">
                    <div class="spotlight" style="margin-bottom: 0px;">
                        <div class="content">
                            <header class="major">
                                <h2>Ausencias por Usuarios.</h2>
                            </header>
                        </div>
                    </div>
                    <canvas id="myChart4"></canvas>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    var rol = '<?php echo $_SESSION["rol"];?>';

    if (rol==='2'){
        window.location.href = 'index.php';
    }

    window.onload = function () {

        var boton = document.getElementById("verificar");

        boton.addEventListener('click', function () {

            var fechaInicio = document.getElementById("txtFechaInicio");
            var fechaFinal = document.getElementById("txtFechaFin");

            contadorApu(fechaInicio.value,fechaFinal.value);

            document.getElementById("apusSeccion").style.display='block';

            document.getElementById("seccionShift").style.display = 'none';
            document.getElementById("seccionEncargado").style.display = 'none';
            document.getElementById("seccionTipo").style.display = 'none';
            document.getElementById("seccionNomina").style.display = 'none';
            document.getElementById("seccionSupervisor").style.display = 'none';

        });

    };

    function toggleMenu() {
        var menu = document.getElementById("menuNavegacion");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }

    function contadorApu(fechaInicio,fechaFin) {
        return new Promise(function (resolve) {
            $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/contadores.php?ruta=' + 1+'&fechaInicio='+fechaInicio+'&fechaFinal='+fechaFin, function (data) {
                if (data && data.data && data.data.length > 0) {
                    for (var i = 0; i < data.data.length; i++) {

                        if (data.data[i].Encargado === "APU 1"){
                            document.getElementById("txtApu1").innerHTML = data.data[i].contador;
                        }

                        if (data.data[i].Encargado === "APU 2"){
                            document.getElementById("txtApu2").innerHTML = data.data[i].contador;
                        }

                        if (data.data[i].Encargado === "APU 3"){
                            document.getElementById("txtApu3").innerHTML = data.data[i].contador;
                        }

                    }
                } else {

                }
            });
        });
    }
    function contadorGrafica(apu,fechaInicio,fechaFinal) {
        return new Promise(function (resolve) {
            $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/contadores.php?ruta=' + 2 +'&APU='+apu+'&fechaInicio='+fechaInicio+'&fechaFinal='+fechaFinal, function (data) {
                if (data && data.data && data.data.length > 0) {
                    var labels = [];
                    var dataValues = [];

                    for (var i = 0; i < data.data.length; i++) {
                        labels.push(data.data[i].ShiftLeader);
                        dataValues.push(data.data[i].contador);
                    }

                    // Llama a la función para inicializar o actualizar el gráfico
                    actualizarGrafico(labels, dataValues, 'myChart3');

                    resolve();  // Resuelve la promesa después de completar la operación
                } else {
                    // Puedes manejar el caso en que no haya datos si es necesario
                    resolve();
                }
            });
        });
    }

    function actualizarGrafico(labels, dataValues, chartId) {
        const ctx = document.getElementById(chartId);

        // Verifica si ya hay un gráfico existente y destrúyelo antes de crear uno nuevo
        var existingChart = window[chartId + '_chart'];
        if (existingChart instanceof Chart) {
            existingChart.destroy();
        }

        // Asigna una nueva variable de gráfico específica para este chartId
        window[chartId + '_chart'] = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'ShiftLeader',
                    data: dataValues,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {}
            }
        });
    }


    // Contador Grafica 2

    function contadorGraficaDos(apu,fechaInicio,fechaFinal) {
        return new Promise(function (resolve) {
            $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/contadores.php?ruta=' + 3 +'&APU='+apu+'&fechaInicio='+fechaInicio+'&fechaFinal='+fechaFinal, function (data) {
                if (data && data.data && data.data.length > 0) {
                    var labels = [];
                    var dataValues = [];

                    for (var i = 0; i < data.data.length; i++) {
                        labels.push(data.data[i].TipoAusencia);
                        dataValues.push(data.data[i].contador);
                    }

                    // Llama a la función para inicializar o actualizar el gráfico
                    actualizarGraficoDos(labels, dataValues, 'myChart2');

                    resolve();  // Resuelve la promesa después de completar la operación
                } else {
                    // Puedes manejar el caso en que no haya datos si es necesario
                    resolve();
                }
            });
        });
    }

    function actualizarGraficoDos(labels, dataValues, chartId) {
        const ctx2 = document.getElementById(chartId);

        // Verifica si ya hay un gráfico existente y destrúyelo antes de crear uno nuevo
        var existingChart = window[chartId + '_chart'];
        if (existingChart instanceof Chart) {
            existingChart.destroy();
        }

        var coloresPersonalizados = ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)', /* ... otros colores */];

        // Asigna una nueva variable de gráfico específica para este chartId
        window[chartId + '_chart'] = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'ShiftLeader',
                    data: dataValues,
                    backgroundColor: coloresPersonalizados,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {}
            }
        });
    }

    // Llama a la función contadorGraficaDos para obtener los datos y actualizar el gráfico


    // Contador Grafica 3

    function contadorGraficaTres(apu,fechaInicio,fechaFinal) {
        return new Promise(function (resolve) {
            $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/contadores.php?ruta=' + 4+'&APU='+apu+'&fechaInicio='+fechaInicio+'&fechaFinal='+fechaFinal, function (data) {
                if (data && data.data && data.data.length > 0) {
                    var labels = [];
                    var dataValues = [];

                    for (var i = 0; i < data.data.length; i++) {
                        labels.push(data.data[i].Area);
                        dataValues.push(data.data[i].contador);
                    }

                    actualizarGraficoTres(labels, dataValues, 'myChart');

                    resolve();  // Resuelve la promesa después de completar la operación
                } else {
                    // Puedes manejar el caso en que no haya datos si es necesario
                    resolve();
                }
            });
        });
    }

    function actualizarGraficoTres(labels, dataValues, chartId) {
        const ctx3 = document.getElementById(chartId);

        // Verifica si ya hay un gráfico existente y destrúyelo antes de crear uno nuevo
        var existingChart = window[chartId + '_chart'];
        if (existingChart instanceof Chart) {
            existingChart.destroy();
        }

        var coloresPersonalizados = ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)', /* ... otros colores */];

        // Asigna una nueva variable de gráfico específica para este chartId
        window[chartId + '_chart'] = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'ShiftLeader',
                    data: dataValues,
                    backgroundColor: coloresPersonalizados,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {}
            }
        });
    }

    // Contador Grafica 3

    function contadorGraficaCuatro(apu,fechaInicio,fechaFinal) {
        return new Promise(function (resolve) {
            $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/contadores.php?ruta=' + 5+'&APU='+apu+'&fechaInicio='+fechaInicio+'&fechaFinal='+fechaFinal, function (data) {
                if (data && data.data && data.data.length > 0) {
                    var labels = [];
                    var dataValues = [];

                    for (var i = 0; i < data.data.length; i++) {
                        labels.push(data.data[i].NominaEntrevistado);
                        dataValues.push(data.data[i].contador);
                    }

                    // Llama a la función para inicializar o actualizar el gráfico
                    actualizarGraficoCuatro(labels, dataValues, 'myChart4');

                    resolve();  // Resuelve la promesa después de completar la operación
                } else {
                    // Puedes manejar el caso en que no haya datos si es necesario
                    resolve();
                }
            });
        });
    }

    function actualizarGraficoCuatro(labels, dataValues, chartId) {
        const ctx3 = document.getElementById(chartId);

        // Verifica si ya hay un gráfico existente y destrúyelo antes de crear uno nuevo
        var existingChart = window[chartId + '_chart'];
        if (existingChart instanceof Chart) {
            existingChart.destroy();
        }

        var coloresPersonalizados = ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)', /* ... otros colores */];

        // Asigna una nueva variable de gráfico específica para este chartId
        window[chartId + '_chart'] = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'ShiftLeader',
                    data: dataValues,
                    backgroundColor: coloresPersonalizados,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {}
            }
        });
    }

    // Contador Grafica 4

    function contadorGraficaCinco(apu,fechaInicio,fechaFinal) {
        return new Promise(function (resolve) {
            console.log('https://arketipo.mx/RH/Entrevistas/dao/contadores.php?ruta=' + 7+'&APU='+apu+'&fechaInicio='+fechaInicio+'&fechaFinal='+fechaFinal);
            $.getJSON('https://arketipo.mx/RH/Entrevistas/dao/contadores.php?ruta=' + 7+'&APU='+apu+'&fechaInicio='+fechaInicio+'&fechaFinal='+fechaFinal, function (data) {
                if (data && data.data && data.data.length > 0) {
                    var labels = [];
                    var dataValues = [];

                    for (var i = 0; i < data.data.length; i++) {
                        labels.push(data.data[i].Supervisor);
                        dataValues.push(data.data[i].contador);
                    }

                    // Llama a la función para inicializar o actualizar el gráfico
                    actualizarGraficoCinco(labels, dataValues, 'myChart5');

                    resolve();  // Resuelve la promesa después de completar la operación
                } else {
                    // Puedes manejar el caso en que no haya datos si es necesario
                    resolve();
                }
            });
        });
    }

    function actualizarGraficoCinco(labels, dataValues, chartId) {
        const ctx3 = document.getElementById(chartId);

        // Verifica si ya hay un gráfico existente y destrúyelo antes de crear uno nuevo
        var existingChart = window[chartId + '_chart'];
        if (existingChart instanceof Chart) {
            existingChart.destroy();
        }

        var coloresPersonalizados = ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)', /* ... otros colores */];

        // Asigna una nueva variable de gráfico específica para este chartId
        window[chartId + '_chart'] = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'ShiftLeader',
                    data: dataValues,
                    backgroundColor: coloresPersonalizados,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {}
            }
        });
    }

    function apuGraficas(apu) {

        document.getElementById("seccionShift").style.display = 'block';
        document.getElementById("seccionEncargado").style.display = 'block';
        document.getElementById("seccionTipo").style.display = 'block';
        document.getElementById("seccionNomina").style.display = 'block';
        document.getElementById("seccionSupervisor").style.display = 'block';

        var fechaInicio = document.getElementById("txtFechaInicio").value;
        var fechaFinal = document.getElementById("txtFechaFin").value;

        switch (apu) {
            case 1:
                contadorGraficaCinco(apu,fechaInicio,fechaFinal)
                contadorGraficaCuatro(apu,fechaInicio,fechaFinal);
                contadorGraficaTres(apu,fechaInicio,fechaFinal);
                contadorGraficaDos(apu,fechaInicio,fechaFinal);
                contadorGrafica(apu,fechaInicio,fechaFinal);
                break;
            case 2:
                contadorGraficaCinco(apu,fechaInicio,fechaFinal)
                contadorGraficaCuatro(apu,fechaInicio,fechaFinal);
                contadorGraficaTres(apu,fechaInicio,fechaFinal);
                contadorGraficaDos(apu,fechaInicio,fechaFinal);
                contadorGrafica(apu,fechaInicio,fechaFinal);
                break;
            case 3:
                contadorGraficaCinco(apu,fechaInicio,fechaFinal)
                contadorGraficaCuatro(apu,fechaInicio,fechaFinal);
                contadorGraficaTres(apu,fechaInicio,fechaFinal);
                contadorGraficaDos(apu,fechaInicio,fechaFinal);
                contadorGrafica(apu,fechaInicio,fechaFinal);
                break;
            default:
                console.log("Ejecutando código para otro valor de apu");
        }
    }

</script>

</body>
</html>