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
                        <h2>Históricos.</h2>
                    </header>
                </div>
            </div>
            <div class="row gtr-uniform">
                <div class="col-12 col-12-xsmall">
                    <!-- Contenido de la tabla -->
                    <table id="miTabla">
                        <thead>
                        <tr>
                            <th>Nómina Entrevistado</th>
                            <th>Fecha Ausentismo</th>
                            <th>Tipo Ausentismo</th>
                            <th>Motivo</th>
                            <th>Área</th>
                            <th>Encargado</th>
                            <th>Supervisor</th>
                            <th>ShiftLeader</th>
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
    function inicializarTabla() {
        $('#miTabla').DataTable({
            ajax: {
                url: 'https://arketipo.mx/RH/Entrevistas/dao/daoHistoricoGeneral.php',
                dataSrc: 'data'
            },
            columns: [
                {data: 'NominaEntrevistado'},
                {data: 'FechaAusentismo'},
                {data: 'TipoAusencia'},
                {data: 'Motivo'},
                {data: 'Area'},
                {data: 'Encargado'},
                {data: 'Supervisor'},
                {data: 'ShiftLeader'}
            ]
        });
    }

    // Llama a la función al cargar la página
    $(document).ready(function () {
        inicializarTabla();
    });


</script>

</body>
</html>