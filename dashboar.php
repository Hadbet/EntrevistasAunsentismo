<!DOCTYPE HTML>
<html>
<head>
    <?php
    session_start();

    if ($_SESSION["nomina"] == "" && $_SESSION["nomina"]== null && $_SESSION["rol"]== "" && $_SESSION["rol"]== null) {
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=login.html'>";
        session_destroy();
    }else{
        session_start();
    }
    ?>
    <title>Entrevistas Ausentismo</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="lib/css/raobhsad.css"/>
    <!-- CSS -->
    <link rel="stylesheet" href="lib/sweetalert2.css">
    <!-- JavaScript -->
    <script src="lib/sweetalert2.all.min.js"></script>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
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
    <a href="login.html" style="color: darkred">Salir</a>
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
            <li><a href="login.html" style="color: darkred">Salir</a></li>
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
                                <h2>Ausencias por Área.</h2>
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
<script src="lib/js/draobhsad.js"></script>
<script src="lib/js/niam.js"></script>

<script>
    var rol = '<?php echo $_SESSION["rol"];?>';

    if (rol==='2'){
        window.location.href = 'index.php';
    }

    if (rol==='3'){
        document.getElementById("navDashBoard").style.display='none';
        document.getElementById("navHistorico").style.display='none';

        document.getElementById("navDashBoardC").style.display='none';
        document.getElementById("navHistoricoC").style.display='none';
    }
</script>

</body>
</html>